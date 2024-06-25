<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AccessLevelSpace;
use App\Models\AccessLevelTable;
use App\Models\RoleSpace;
use App\Models\Spaces;
use App\Models\Tables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends Controller
{
    const DEFAUTL = 'client.space.';
    /**
     * Display a listing of the resource.
     */
    public function detail(string $code)
    {
        $accessLevel = AccessLevelSpace::query()->get();
        $spaces = User::find(Auth::user()->id)->Spaces()->get();
        $tables = User::find(Auth::user()->id)->spaces()->with('tables')->get();
        $spaceDetail = Spaces::where('code','=',$code)->with('AccessLevelSpace')->first();
        $tableSpace = Tables::where('spaces_id','=',$spaceDetail->id)->get();
        $accessLevelTable = AccessLevelTable::query()->get();
        $spaceUser  = Spaces::OrderBy('created_at','asc')->where('code','=',$code)->with('users')->get();

        $members = [];
        foreach ($spaceUser as $space) {
            foreach ($space->users as $user) {
                $roleSpace = RoleSpace::find($user->pivot->role_space_id);
                if ($roleSpace) {
                    $members[] = [
                        'user' => $user,
                        'role_name' => $roleSpace->role_name,
                        'role_space_id' => $user->pivot->role_space_id
                    ];
                }
            }
        }
        return view(self::DEFAUTL.'detail',compact(['spaceDetail','tableSpace','tables','accessLevel','spaces','accessLevelTable','members']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
