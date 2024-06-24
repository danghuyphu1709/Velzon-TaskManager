<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Http\Repositories\Repository\SpaceUserRepository;
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
    public function __construct(SpaceRepository $spaceRepository ,SpaceUserRepository $spaceUserRepository)
    {
        $this->spaceRepository = $spaceRepository;
        $this->spaceUserRepository = $spaceUserRepository;
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
}
