<?php
namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;

use App\Models\HistoryTask;


class HistoryTaskRepository extends BaseRepository
{
    public function getModel()
    {
        return HistoryTask::class;
    }
    public function createHistory($content,$user,$task)
    {
        return $this->create([
            'type' => 'created',
            'task_id' => $task->id,
            'data' => json_encode([
                'message' => 'đã thêm nội dung nhiệm vụ mới',
                'title' => 'Thêm mới',
                'user_name' => $user->name,
                'content' => $content,
            ]),
        ]);
    }

    public function createHistoryUser($content,$user,$task)
    {
        return $this->create([
            'type' => 'created_user',
            'task_id' => $task->id,
            'data' => json_encode([
                'message' => 'đã thêm nội dung nhiệm vụ mới',
                'title' => 'Thêm mới',
                'user_name' => $user->name,
                'content' => $content,
            ]),
        ]);
    }

    public function createHistoryDueTimeStart($content,$user,$task)
    {
        return $this->create([
            'type' => 'created_dueTime',
            'task_id' => $task->id,
            'data' => json_encode([
                'message' => 'đã chuyển đổi thời hạn nhiệm vụ bắt đầu vào ',
                'title' => 'Bắt đầu nhiệm vụ',
                'user_name' => $user->name,
                'content' => $content,
            ]),
        ]);
    }

    public function createHistoryDueTimeEnd($content,$user,$task)
    {
        return $this->create([
            'type' => 'created_dueTime',
            'task_id' => $task->id,
            'data' => json_encode([
                'message' => 'đã chuyển đổi thời hạn nhiệm vụ kết thúc vào',
                'title' => 'Kết thúc nhiệm vụ',
                'user_name' => $user->name,
                'content' => $content,
            ]),
        ]);
    }
}
