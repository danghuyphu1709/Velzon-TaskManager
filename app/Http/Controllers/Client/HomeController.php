<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\SpaceRepository;
use App\Models\AccessLevelSpace;
use App\Models\User;
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
         $tables = User::find(Auth::user()->id)->spaces()->with('tables')->get();
         return view('client.home',compact(['tables']));
    }
}
