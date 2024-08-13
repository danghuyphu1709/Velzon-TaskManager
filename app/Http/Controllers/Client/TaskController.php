<?php

namespace App\Http\Controllers\Client;

use App\Enums\StatusSystem;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\HistoryTaskRepository;
use App\Http\Repositories\Repository\TaskRepository;
use App\Http\Repositories\Repository\TaskUserRepository;
use App\Http\Requests\DueTimeRequest;
use App\Http\Requests\TaskRequest;
use App\Models\ListTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use \Carbon\Carbon;

class TaskController extends Controller
{

    public  $taskRepository;
    public  $taskUserRepository;

    public $historyTaskRepository;

    public function __construct(TaskRepository $taskRepository,TaskUserRepository $taskUserRepository,HistoryTaskRepository $historyTaskRepository)
    {
          $this->taskRepository = $taskRepository;
          $this->taskUserRepository = $taskUserRepository;
          $this->historyTaskRepository = $historyTaskRepository;
    }

    public function index($code,Request $request)
    {

        $task = Task::query()->with(['user','ListTask.Tables.users','StepTask','CommentTask.user','historyTask'])->where('code', $code)->first();

        $userTable = $task->ListTask->Tables->users;

        $userTask = $task->user->pluck('id')->toArray();

        $usersInTable = $userTable->map(function($user) use ($userTask) {
            $user->checked = in_array($user->id, $userTask);
            return $user;
        });

        return view('client.task.index',compact(['task','usersInTable']));
    }

    public function store(TaskRequest $request,ListTask $listTask)
    {
        $task =  $request->except('users');

        $users = $request->input('users');

        if( $request->hasFile('task_image')){
            $image = $request->file('task_image');
            $fileName = $image->getClientOriginalName();
            $path = $request->file('task_image')->storeAs('public/',$fileName);
            // luu ten file vao doi tuong
            $task['task_image'] = $fileName;
        };
        try {
            DB::beginTransaction();
            $task['list_task_id'] = $listTask->id;
            $task['code'] = $this->taskRepository->code();

            $taskCreated = $this->taskRepository->create($task);
            if(!empty($users)){
             foreach ($users as $userId) {
                $this->taskUserRepository->create([
                    'task_id' => $taskCreated->id,
                    'user_id' => +$userId,
                ]);
             }
            }
            DB::commit();
            return redirect()->back();
        }catch (Exception $exception){
            DB::rollBack();
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }

    public function update(TaskRequest $request,Task $task)
    {
        $taskRequest =  $request->except('users');

        $users = $request->input('users');

        $nameImage = '';
        if($request->hasFile($request->input('task_image'))){
            $fileImage = $request->file('task_image');
            $nameImage = $fileImage->getClientOriginalName();
            $path = $fileImage->storeAs('public/'.$nameImage);
            if($request->input('task_image_old')){
                Storage::delete('public/'.$request->input('task_image_old'));
            }
        }else{
            $nameImage = $request->input('task_image_old');
        }
           $taskRequest['task_image'] = $nameImage;
        try {
            DB::beginTransaction();
            $this->taskRepository->update($task->id,$taskRequest);
            $task->user()->sync($users);
            DB::commit();
            return redirect()->back();
        }catch (Exception $exception){
            DB::rollBack();
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }

    public function destroy()
    {

    }

    public function inviteMembers(Request $request,Task $task)
    {
        $user = $request->input('users') ? $request->input('users') : [];
        $task->user()->sync($user);
        return redirect()->back();
    }
    public function startDueTime(DueTimeRequest $request,Task $task)
    {
        if ($task->status != StatusSystem::ACTIVATE->value){
            $task->update([
                'status' => StatusSystem::ACTIVATE->value
            ]);
            $date_now = Carbon::now()->translatedFormat('H:i:s, d F Y');
            $this->historyTaskRepository->createHistoryDueTimeStart($date_now,Auth::user(),$task);
        }
        return redirect()->back();
    }

    public function endDueTime(Task $task)
    {
        if ($task->status != StatusSystem::COMPLETE->value) {
            $task->update([
                'status' => StatusSystem::COMPLETE->value,
                'due_date' => null,
            ]);
            $date_now = Carbon::parse($task->due_date)->translatedFormat('H:i:s, d F Y');
            $this->historyTaskRepository->createHistoryDueTimeEnd($date_now,Auth::user(),$task);
        }
        return redirect()->back();
    }
}
