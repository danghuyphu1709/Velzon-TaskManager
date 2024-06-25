<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Models\AccessLevelSpace;
use App\Models\AccessLevelTable;
use App\Models\Spaces;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $spaceRepository;
    public function __construct(SpaceRepository $spaceRepository)
    {
      $this->spaceRepository = $spaceRepository;
    }
    public function index()
    {
         $accessLevel = AccessLevelSpace::query()->get();
         $spaces = User::find(Auth::user()->id)->Spaces()->get();
         $tables = User::find(Auth::user()->id)->spaces()->with('tables')->get();
         $accessLevelTable = AccessLevelTable::query()->get();
         return view('client.home',compact(['tables','accessLevel','spaces','accessLevelTable']));
    }
}
