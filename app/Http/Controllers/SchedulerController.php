<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchedulerRequest;
use App\Http\Requests\DeleteSchedulerRequest;
use App\Http\Requests\EditSchedulerRequest;
use App\Models\Scheduler;

class SchedulerController extends Controller
{
    public function getScheduler()
    {
        $scheduler = Scheduler::query();
        return response()->json(['success' => true, 'scheduler' => $scheduler]);
    }

    public function getStudentScheduler($user_id)
    {
        $scheduler = Scheduler::where('group_id', $user_id);

        return response()->json(['success' => true, 'scheduler' => $scheduler->with(['cabinet', 'subject'])->paginate(15)]);
    }

    public function createScheduler(CreateSchedulerRequest $request)
    {
        $scheduler = Scheduler::make([
            'group_id' => $request->group_id,
            'subject_id' => $request->subject_id,
            'cabinet_id' => $request->cabinet_id,
            'date' => $request->date
        ]);

        return response(['success' => true, 'scheduler' => $scheduler]);
    }

    public function deleteScheduler(DeleteSchedulerRequest $request)
    {
        Scheduler::find($request->scheduler_id)->delete();
        return response(['success' => true]);
    }

    public function editScheduler(EditSchedulerRequest $request)
    {
        $scheduler = Scheduler::find($request->scheduler_id);
        $scheduler->update($request->all());

        return response(['success' => true]);
    }
}
