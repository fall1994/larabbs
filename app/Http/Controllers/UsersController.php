<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function show(User $user)
    {
        // dd(compact('user'));
        return view('users.show', compact('user'));
    }
    /**
     * @Author   fall
     * @DateTime 2018-06-28T11:21:09+0800
     * @param    User
     * @return   [type]
     * 访问用户编辑页面
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * @Author   fall
     * @DateTime 2018-06-28T11:21:28+0800
     * @param    string
     * @return   [type]
     * 更新用户信息
     */
    public function update(UserRequest $request, User $user)
    {
       $user->update($request->all());
       return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
