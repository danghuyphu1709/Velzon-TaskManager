<?php

namespace App\Http\Controllers\Client;

use App\Enums\TypeUnitEnum;
use App\Enums\UserHasRole;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Http\Repositories\Repository\SpaceUserRepository;
use App\Http\Requests\SpacesRequest;
use App\Models\AccessLevelSpace;
use App\Models\RoleSpace;
use App\Models\Spaces;
use App\Models\Tables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpacesRequest $request)
    {

        $validatedData = $request->validated();
        // tạo spaces
        $validatedData['code'] = $this->spaceRepository->code();
        $space = $this->spaceRepository->create($validatedData);
        $this->spaceUserRepository->create([
            'spaces_id' => $space->id,
            'user_id' => Auth::user()->id,
            'role_space_id' => UserHasRole::admin->value
        ]);
        return redirect()->route('spaces.show',$space->code);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $spaceDetail = Spaces::where('code','=',$code)->with('AccessLevelSpace')->first();
        $spaceUser  = Spaces::OrderBy('created_at','asc')->where('code','=',$code)->with('users')->get();
        $members = [];
        foreach ($spaceUser as $space) {
            foreach ($space->users as $user) {
                if($spaceDetail->access_level_space_id == TypeUnitEnum::public->value || Auth::user()->id == $user->id){
                    $roleSpace = RoleSpace::find($user->pivot->role_space_id);
                    if ($roleSpace) {
                        $members[] = [
                            'user' => $user,
                            'role_name' => $roleSpace->role_name,
                            'role_space_id' => $user->pivot->role_space_id
                        ];
                    }
                }else{
                    return redirect()->route('system.private');
                }

            }
        }
        $tableSpace = Tables::where('spaces_id','=',$spaceDetail->id)->get();

        $spaces = User::find(Auth::user()->id)->Spaces()->get();
        $tables = User::find(Auth::user()->id)->spaces()->with('tables')->get();


        return view(self::DEFAULT.__FUNCTION__,compact(['spaceDetail','tableSpace','tables','spaces','members']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
