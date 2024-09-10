<?php

namespace App\Http\Middleware;

use App\Enums\TypeUnitEnum;
use App\Models\Tables;
use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class JoinedTableMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $taskCode = $request->route('code');
        $tableCode = $request->route('tables');
        if (isset($tableCode)){
            $table = Tables::query()->with('users')->where('code',$tableCode)->first();
        if ($table && $table->users->contains(Auth::user())){
            return $next($request);
        } else {
            if($table->access_level_tables_id == TypeUnitEnum::public->value){
                return redirect()->route('tables.show',$tableCode);
            }else{
                return redirect()->route('system.private');
            }
        }
        }elseif (isset($taskCode)){
            $task = Task::query()->with('table.users')->where('code',$taskCode)->first();
            if ($task && $task->table->users->contains(Auth::user())){
                return $next($request);
            } else {
                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}
