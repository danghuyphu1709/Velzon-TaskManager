<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Spaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'access_level_space_id' => 'required|integer',
            'space_name' => 'required|string|max:255',
            'space_description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        $create = Spaces::create($request->toArray());
        return response()->json([
            'status' => true,
            'data' => $create,
        ], 200);
    }
}
