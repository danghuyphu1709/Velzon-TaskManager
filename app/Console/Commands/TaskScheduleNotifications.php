<?php

namespace App\Console\Commands;

use App\Enums\StatusSystem;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use \Illuminate\Support\Facades\Notification;

class TaskScheduleNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:task-schedule-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notifications status task end time only-days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('status',StatusSystem::ACTIVATE->value)
             ->where('due_date', '<=', Carbon::now()->subDay())
             ->get();


        if($tasks){
            foreach ($tasks as $task) {
                $user = $task->user;
                Notification::send(Roles::admins(),new SystemNotification($order));
            }
        }
    }
}
