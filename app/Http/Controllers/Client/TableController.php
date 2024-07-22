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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $table = Tables::query()->with(['users','AccessLevelTables'])->where('code',$code)->first();

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

    public function leave()
    {

    }

    public function accede(Request $request)
    {
        dd($request);

//        try {
//            $this->tableUserRepository->create([
//                'tables_id' => $tables->id,
//                'user_id' => $request->user_id,
//            ]);
//            return redirect()->route('bang.show', $tables->code);
//        }catch(\PHPUnit\Event\Exception $exception){
//            Log::debug($exception);
//            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
//            return redirect()->back();
//        }
    }
}
