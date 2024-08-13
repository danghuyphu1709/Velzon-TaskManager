<?php

namespace App\Http\Controllers\Client;

use App\Enums\StatusSystem;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\HistoryTaskRepository;
use App\Http\Repositories\Repository\StepTaskRepository;
use App\Http\Requests\StepTaskRequest;
use App\Http\Requests\UpdateStatusStepTaskRequest;
use App\Models\Task;
use App\Notifications\TaskNotifications\StepTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class StepTaskController extends Controller
{
    protected  $stepTaskRepository;

    protected $historyTaskRepository;

    public function __construct(StepTaskRepository $stepTaskRepository,HistoryTaskRepository $historyTaskRepository)
    {
       $this->stepTaskRepository = $stepTaskRepository;
       $this->historyTaskRepository = $historyTaskRepository;
    }


    public function store(StepTaskRequest $request,Task $task)
    {
        $stepTask = $request->validated();
        $stepTask['task_id'] = $task->id;
        $stepTaskContent = $this->stepTaskRepository->create($stepTask);
        $this->historyTaskRepository->createHistory($stepTaskContent->content,Auth::user(),$task);
        return redirect()->back();
    }
    public function updateStatus(UpdateStatusStepTaskRequest $request,Task $task)
    {

        $selectedStepIds = $request->has('steps') ? $request->input('steps') : [];

        $step = $task->StepTask()->whereIn('id',$selectedStepIds);

        if($request->has('update')){

            $task->StepTask()->whereIn('id', $selectedStepIds)
                ->update(['status' => StatusSystem::COMPLETE->value]);

            $task->StepTask()->whereNotIn('id', $selectedStepIds)
                ->update(['status' => StatusSystem::ACTIVATE->value]);

            $step->update(['status' => StatusSystem::COMPLETE->value]);

        }elseif($request->has('delete')){
            $task->StepTask()->whereIn('id', $selectedStepIds)
                ->delete();


        }

         return redirect()->back();
    }
}
