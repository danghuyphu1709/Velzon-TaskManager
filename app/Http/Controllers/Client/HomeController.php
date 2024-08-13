<?php

namespace App\Http\Controllers\Client;

use App\Enums\StatusSystem;
use App\Enums\TypeUnitEnum;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\TableUserRepository;
use App\Models\AccessLevelTables;
use App\Models\Tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $tableRepository;
    public function __construct(TableUserRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    public function index()
    {
         $user = Auth::user()->load('tables','tables.users','tables.ListTask');
         $accessLevel = AccessLevelTables::query()->get();
         return view('client.home',compact(['user','accessLevel']));
    }

    public function important(Request $request)
    {
        $tables = Tables::query()->find($request->input('id'));
        if ($request->input('type')){
            $tables->update([
                'important' => StatusSystem::ACTIVATE->value
            ]);
        }else{
            $tables->update([
                'important' => StatusSystem::DEACTIVATE->value
            ]);
        }
        return response()->json('success',200);
    }
}
