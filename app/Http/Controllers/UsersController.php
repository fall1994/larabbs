<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

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
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * @Author   fall
     * @DateTime 2018-06-28T11:21:28+0800
     * @param    string
     * @return   [type]
     * 更新用户信息
     */
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();

        if($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
