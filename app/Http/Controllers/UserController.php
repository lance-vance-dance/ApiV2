<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\MergeGroupsRequest;
use App\Models\Group;
use App\Models\Scheduler;
use App\Models\User;

class UserController extends Controller
{
    public function getUser()
    {
        $auth_user = auth('api')->user();
        $user = User::query();

        if ($auth_user->hasRole('parent')) {
            $user->with('children', 'children.user');
        }

        return response()->json([
            'user' => $user->whereId($auth_user->id)->first()
        ]);
    }

    public function getGroups()
    {
        return response()->json([
            'groups' => Group::get()
        ]);
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'login' => $request->login,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'group_id' => $request->group_id
        ]);

        return response()->json(['success' => $user != null, 'user' => $user]);
    }

    public function editUser(EditUserRequest $request)
    {
        $params =  $request->only('login', 'name', 'password');
        $user = User::find($request->user_id);
        $user->update($params);

        return response()->json(['success' => true]);
    }

    public function mergeGroup(MergeGroupsRequest $request)
    {
        // В ТЗ не описан алгоритм объединения классов. Поэтому берем букву и число с первого класса
        $group = Group::find($request->first_group_id);
        $old_group = Group::find($request->second_group_id);

        if ($group->course != $old_group->course) {
            return response()->json(['success' => false, 'error' => 'Не совпадают номера классов']);
        }

        User::where('group_id', $old_group)->update([
            'group_id' => $group->id
        ]);

        Scheduler::where('group_id', $old_group)->update([
            'group_id' => $group->id
        ]);

        $old_group->delete();
        return response()->json(['success' => true]);
    }
}
