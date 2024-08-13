<?php

namespace App\Http\Controllers\Client;

use App\Events\CommentTaskEvent\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\CommentTaskRepository;
use App\Http\Requests\CommentTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class CommentTaskController extends Controller
{

    public $taskCommentRepository;
    public function __construct(CommentTaskRepository $taskCommentRepository)
    {
          $this->taskCommentRepository = $taskCommentRepository;
    }

    public function sendMessage(CommentTaskRequest $request,Task $task)
    {
        try {
          $newComment = $this->taskCommentRepository->create([
                'user_id' => Auth::user()->id,
                'task_id' => $task->id,
                'content' => $request->input('content'),
          ]);

        broadcast(new MessageSent($newComment,Auth::user()));

        return response()->json(true,200);
        }catch (Exception $exception){
            return response()->json($exception,400);
        }
    }

}
