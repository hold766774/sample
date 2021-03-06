<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($credentials,$request->has('remember')))
        {            //login success

            if(Auth::user()->activated)
            {
                session()->flash('success','欢迎回来');
                return redirect()->route('users.show',[Auth::user()]);
            }
           else{
                Auth::logout();
                session()->flash('warning','你的账号未激活，请检查邮箱中的注册邮件进行激活');
                return redirect('/');
           }
        }else
        {
            //login error
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();

        }
        return;
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已经成功退出');
        return redirect('login');
    }
}
