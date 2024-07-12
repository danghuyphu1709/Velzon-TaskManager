<?php

namespace App\Http\Controllers\Client;

use App\Enums\TypeUnitEnum;
use App\Enums\UserHasRole;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Http\Repositories\Repository\SpaceUserRepository;
use App\Http\Requests\SpacesRequest;
use App\Models\Spaces;
use App\Models\SpaceUser;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use PHPUnit\Event\Exception;


class SpaceController extends Controller
{
    public $spaceRepository;
    public $spaceUserRepository;

    const DEFAULT = 'client.space.';
    public function __construct(SpaceRepository $spaceRepository,SpaceUserRepository $spaceUserRepository)
    {
         $this->spaceRepository = $spaceRepository;
         $this->spaceUserRepository = $spaceUserRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpacesRequest $request)
    {
        $validatedData = $request->validated();
        // tạo spaces
        try {
            DB::beginTransaction();
            $validatedData['code'] = $this->spaceRepository->code();
            $space = $this->spaceRepository->create($validatedData);
            $this->spaceUserRepository->create([
                'spaces_id' => $space->id,
                'user_id' => Auth::user()->id,
                'is_created' => UserHasRole::admin->value,
                'role_space_id' => UserHasRole::admin->value,
            ]);
            DB::commit();
            return redirect()->route('spaces.show',$space->code);
        }catch(\Mockery\Exception $exception){
            DB::rollBack();
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {

        session()->flash('error-alert', 'Lỗi hệ thống, vui lòng gửi lại sau');

        $space = Spaces::query()->where('code',$code)->first();
        if($space != null){
            $auth = $space->users->where('id',Auth::user()->id)->first();
            if(!$auth && $space->access_level_space_id == TypeUnitEnum::private->value){
                return redirect()->route('system.private');
            }
            return view(self::DEFAULT.__FUNCTION__,compact(['space','auth']));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpacesRequest $request, string $id)
    {
        $space = $this->spaceRepository->update($id,$request->validated());
        return redirect()->route('spaces.show',$space->code);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code,int $user)
    {
        $space = Spaces::query()->where('code',$code)->first();
        $auth = $space->users->where('id',Auth::user()->id)->first();
        if($auth && $auth->pivot->role_space_id == 1){
            try {
                $spaces_user = SpaceUser::query()->where('spaces_id', $space->id)
                    ->where('user_id', $user);
                $spaces_user->delete();
                return redirect()->route('spaces.show', $space->code);
            }catch (Exception $exception){
                session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
                return redirect()->back();
            }
        }else{
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return redirect()->back();
        }
    }

    public function leave(Spaces $spaces)
    {
        $spaces_user = SpaceUser::query()->where('spaces_id', $spaces->id)
            ->where('user_id', Auth::user()->id);
        if ($spaces_user->first() != null) {
            $created = $spaces_user->first();
            $spaces_user->delete();
            if($created->is_created){
                $spaces->delete();
                return redirect()->route('home');
            }
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return redirect()->back();
        }
    }

    public function accede(Spaces $spaces)
    {
        try {
             $this->spaceUserRepository->create([
                'spaces_id' => $spaces->id,
                'user_id' => Auth::user()->id,
                'role_space_id' => UserHasRole::member->value
            ]);
            return redirect()->route('spaces.show', $spaces->code);
        }catch(Exception $exception){
            Log::debug($exception);
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return redirect()->back();
        }
    }
}
