<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => '请输入用户名',
            'password.required' => '请输入密码',
        ]);
        if ($validator->fails()) {
           return $this->error($validator->errors()->first());
        }
        $user = User::where(['username' => $request->username, 'status' => 1])->select(['id', 'password', 'name', 'last_login_time'])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error("帐号或密码错误，请重新输入");
        }
        // 发行令牌
        $token = $user->createToken('console-token')->plainTextToken;
        $userArr = $user->toArray();
        $userArr['avatar'] = 'https://hbimg.huaban.com/9bfa0fad3b1284d652d370fa0a8155e1222c62c0bf9d-YjG0Vt_fw658';
        $data = [
            'user' => $userArr,
            'token' => $token
        ];
        $user->last_login_time = date('Y-m-d H:i:s');
        $user->timestamps = false;
        $user->save();
        return $this->success($data);
    }
}
