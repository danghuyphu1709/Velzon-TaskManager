<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AccessLevelSpace;
use App\Models\Spaces;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
         $accessLevel = AccessLevelSpace::query()->get();
         $spaces  = Spaces::query()->get();
         return view('client.home',compact(['accessLevel','spaces']));
    }
}
