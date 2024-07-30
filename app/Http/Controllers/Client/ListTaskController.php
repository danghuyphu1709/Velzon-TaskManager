<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskListRequest;
use App\Models\ListTask;
use App\Models\Tables;
use Illuminate\Http\Request;

class ListTaskController extends Controller
{

    public function store(TaskListRequest $request,Tables $tables)
    {
        ListTask::create([
            'tables_id' => $tables->id,
            'title' => $request->title,
        ]);
        return redirect()->route('tables.index',$tables->code);
    }


    public function update(TaskListRequest $request,ListTask $listTask)
    {
        $listTask->update($request->validated());
        return redirect()->back();
    }


    public function destroy(ListTask $listTask)
    {
        $listTask->delete();
        return redirect()->back();
    }
}
