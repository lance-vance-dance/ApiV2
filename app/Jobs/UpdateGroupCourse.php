<?php

namespace App\Jobs;

use App\Models\Group;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateGroupCourse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $max_course;

    public function __construct()
    {
        $this->max_course = 11;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $groups = Group::where('course', '<', $this->max_course)->get();
        foreach ($groups as $group)
        {
            $group->course = ++$group->course;
            $group->save();
        }
    }
}
