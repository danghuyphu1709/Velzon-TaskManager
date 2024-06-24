<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Models\AccessLevelSpace;
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
         return view('client.home',compact(['accessLevel','spaces']));
    }
}
