<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Laravel\Prompts\table;

class TableController extends Controller
{
   public function index(string $code)
   {
      dd($code);
   }
}
