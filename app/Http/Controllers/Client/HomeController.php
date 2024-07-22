<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Http\Repositories\Repository\TableUserRepository;
use App\Models\AccessLevelTables;
use App\Models\Tables;
use App\Models\User;
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
         $user = Auth::user()->load('tables','tables.users');
         $accessLevel = AccessLevelTables::query()->get();
         return view('client.home',compact(['user','accessLevel']));
    }
}
