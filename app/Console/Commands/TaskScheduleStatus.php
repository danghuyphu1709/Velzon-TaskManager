<?php

namespace App\Console\Commands;

use App\Enums\StatusSystem;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TaskScheduleStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:task-schedule-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update status task end time only-days';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $tasks = Task::where('status',StatusSystem::ACTIVATE->value)
            ->where('due_date', '<=', Carbon::now())
            ->get();
        if($tasks){
            foreach ($tasks as $task) {
                $task->status = StatusSystem::COMPLETE->value;
                $task->due_date = null;
                $task->save();
            }
        }
    }
}
