<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusSystem;
use App\Http\Controllers\Controller;
use App\Models\Tables;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $tables = Tables::query()->with(['tasks','users','AccessLevelTables'])->get();


        $tasks = Task::query()->get();

        $users  = User::query()->get();

        $taskCompleted = 0;

        $taskActive = 0;

        $deactivate = 0;

        foreach ($tasks as $task){
            if ($task->status == StatusSystem::COMPLETE->value){
                 ++$taskCompleted;
            }else if($task->status == StatusSystem::ACTIVATE->value){
                 ++$taskActive;
            }else{
                 ++$deactivate;
            }
        }

        return view('admin.dashboard.index',compact(['tables','tasks','taskCompleted','taskActive','deactivate','users']));
    }
}
