<?php

namespace App\Http\Controllers\Client;

use App\Enums\TypeUnitEnum;
use App\Enums\UserHasRole;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\TableRepository;
use App\Http\Repositories\Repository\TableUserRepository;
use App\Http\Requests\TableRequest;
use App\Models\AccessLevelTables;
use App\Models\Tables;
use App\Models\TableUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mockery\Exception;

class TableController extends Controller
{
    public $tableRepository;

    public $tableUserRepository;
    public function __construct(TableRepository $tableRepository ,TableUserRepository $tableUserRepository)
    {
        $this->tableRepository = $tableRepository;
        $this->tableUserRepository = $tableUserRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $code)
    {
        $table = Tables::query()->with(['users','AccessLevelTables','ListTask','ListTask.Task'])->where('code',$code)->first();

        if(!empty($table)){
            $auth = $table->users->where('id',Auth::user()->id)->first();
            if(!$auth && $table->access_level_tables_id == TypeUnitEnum::private->value){
                return redirect()->route('system.private');
            }
            return view('client.table.index',compact(['table','auth']));
        }
        return redirect()->back();
    }

    public function store(TableRequest $request)
    {
        $table = $request->validated();
        $table['code'] = $this->tableRepository->code();
        try {
            DB::beginTransaction();
            $tableCreated = $this->tableRepository->create($table);
            $this->tableUserRepository->create([
                'tables_id' => $tableCreated->id,
                'user_id' => Auth::user()->id,
                'roles_id' => UserHasRole::admin->value,
                'is_created' => UserHasRole::admin->value
            ]);
            DB::commit();
            return redirect()->route('tables.index',$tableCreated->code);
        }catch (Exception $exception){
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
        $table = Tables::query()->with(['users','AccessLevelTables'])->where('code',$code)->first();

        if(!empty($table)){
            $auth = $table->users->where('id',Auth::user()->id)->first();
            $accessLevel = AccessLevelTables::query()->get();
            if(!$auth && $table->access_level_tables_id == TypeUnitEnum::private->value){
                return redirect()->route('system.private');
            }
            return view('client.table.show',compact(['table','auth','accessLevel']));
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        $table = $request->validated();
        try {
            $tableCreated = $this->tableRepository->update($id,$table);
            return redirect()->back();
        }catch (Exception $exception){
            DB::rollBack();
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tables $tables,User $user)
    {
        $spaces_user = TableUser::query()->where('tables_id', $tables->id)
            ->where('user_id', $user->id);
        if ($spaces_user->first() != null) {
            $spaces_user->delete();
            return redirect()->route('tables.show',$tables->code);
        } else {
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return redirect()->back();
        }
    }

    public function leave(Tables $tables)
    {
        $spaces_user = TableUser::query()->where('tables_id', $tables->id)
            ->where('user_id', Auth::user()->id);
        if ($spaces_user->first() != null) {
            $created = $spaces_user->first();
            $spaces_user->delete();
            if($created->is_created){
                $tables->delete();
                return redirect()->route('home');
            }
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return redirect()->back();
        }
    }

    public function accede(Tables $tables)
    {
        try {
            $this->tableUserRepository->create([
                'tables_id' => $tables->id,
                'user_id' => Auth::user()->id,
                'roles_id' => UserHasRole::member->value,
            ]);
            return redirect()->route('tables.show', $tables->code);
        }catch(\PHPUnit\Event\Exception $exception){
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return redirect()->back();
        }
    }
}
