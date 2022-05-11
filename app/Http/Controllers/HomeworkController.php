<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Scheduler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class HomeworkController extends Controller
{
    public function getStudentHomework(Request $request, int $user_id)
    {
        $user = User::find($user_id);
        $schedulers = Scheduler::where([
            'group_id' => $user->group_id,
        ])->whereDate('date', '=', $request->input('date', Carbon::now()->format('Y-m-d')))->get();

        if (sizeof($schedulers) == 0) {
            return response()->json(['success' => false, 'error' => 'Неверно переданные данные']);
        }

        return response()->json(['success' => true, 'homeworks' => Homework::with('scheduler.subject')->whereIn('scheduler_id', $schedulers->pluck('id'))->get()]);
    }
}
