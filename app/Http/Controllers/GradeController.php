<?php

namespace App\Http\Controllers;

use App\Models\Grade;

class GradeController extends Controller
{
    public function getStudentGrades($user_id)
    {
        $grade = Grade::where('user_id', $user_id)
            ->select(['scheduler_id', 'grade'])
            ->with(['scheduler', 'scheduler.subject']);
        return response()->json(['success' => true, 'grades' => $grade->paginate(config('app.max_items_per_page'))]);
    }
}
