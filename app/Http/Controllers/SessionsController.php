<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class SessionsController extends Controller
{
    //登录页
    public function create()
    {
        return view('sessions/create');
    }

    //处理登录
    public function store(Request $request)
    {
        //校验输入格式
        $this->validate($request,[
            'email' =>  'required|email|max:255',
            'password'  =>  'required'
        ]);

        //验证输入是否正确
        $email = $request->email;
        $password = $request->password;

        //邮箱和密码存在于数据库，且正确
        $credentials = ['email'=>$email,'password'=>$password];
        if(Auth::attempt($credentials,$request->has('remember')))
        {
            session()->flash('success','欢迎回来');
            return redirect()->route('users.show',[Auth::user()]);
        }
        else
        {
            session()->flash('danger','邮箱或密码错误！');
            return redirect()->back();
        }

    }

    //退出登录
    public function destory()
    {
        Auth::logout();
        session()->flash('success','您已成功退出！');
        return redirect('login');

    }
}
