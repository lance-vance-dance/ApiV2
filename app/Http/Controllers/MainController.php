<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCabinetRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Cabinet;
use App\Models\Group;
use App\Models\Subject;

class MainController extends Controller
{
    public function updateSubject(UpdateSubjectRequest $request)
    {
        $parmas = $request->only('name');
        Subject::where('id', $request->id)
            ->update($parmas);
        
        return response()->json(['success' => true]);
    }

    public function updateGroup(UpdateGroupRequest $request)
    {
        $parmas = $request->only('name', 'course');
        Group::where('id', $request->id)
            ->update($parmas);
        
        return response()->json(['success' => true]);
    }

    public function updateCabinet(UpdateCabinetRequest $request)
    {
        $params = $request->only('id', 'number');
        $result = Cabinet::where('id', $request->id)
            ->update($params);
        
        return response()->json(['success' => $result]);
    }
}
