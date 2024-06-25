<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Http\Repositories\Repository\SpaceUserRepository;
use App\Http\Repositories\Repository\TableRepository;
use App\Http\Repositories\Repository\UserHasRoleTableRepository;
use App\Models\Spaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    public $spaceRepository;
    public $spaceUserRepository;
    public $tableUserRepository;
    public $userHasRoleTableRepository;
    public function __construct(TableRepository $tableUserRepository ,UserHasRoleTableRepository $userHasRoleTableRepository,SpaceRepository $spaceRepository ,SpaceUserRepository $spaceUserRepository)
    {
        $this->spaceRepository = $spaceRepository;
        $this->spaceUserRepository = $spaceUserRepository;
        $this->tableUserRepository = $tableUserRepository;
        $this->userHasRoleTableRepository = $userHasRoleTableRepository;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'access_level_space_id' => 'required|integer',
            'space_name' => 'required|string|max:255',
            'space_description' => 'nullable|string',
            'user_id'=>'required'
        ]);
        $request->merge(['code' => $this->spaceRepository->code()]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
             DB::beginTransaction();
            $space = $this->spaceRepository->create($request->toArray());
            $this->spaceUserRepository->create([
                'user_id' => $request->input('user_id'),
                'spaces_id' => $space->id,
                'role_space_id' => env('LEVEL_ACCESS_DEFAULT_CREATE')
            ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'data' => $space,
            ], 200);
        } catch ( \Mockery\Exception $exception){
            DB::rollBack();
            return back();
        }
    }

    public function storeTable(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'access_level_table_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'spaces_id' => 'required',
            'user_id' => 'required'
        ]);
        $request->merge(['code' => $this->tableUserRepository->code()]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            DB::beginTransaction();
            $table = $this->tableUserRepository->create($request->toArray());
            $this->userHasRoleTableRepository->create([
                'user_id' => $request->input('user_id'),
                'tables_id' => $table->id,
                'role_table_id' => env('LEVEL_ACCESS_DEFAULT_CREATE')
            ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'data' => $table,
            ], 200);
        } catch ( \Mockery\Exception $exception){
            DB::rollBack();
            return back();
        }
    }
}
