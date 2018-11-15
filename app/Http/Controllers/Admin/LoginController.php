<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\UsersStoreRequest;
use App\User;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 加载登录模板
        return view('admin.login',['title'=>'管理员登录']);
        
    }

    public function verification(Request $request)
    {
        DB::beginTransaction();
        $uname = $request->input('uname');
        $password = $request->input('password');
        $users = User::where('uname' ,'=',$uname)->first();
        // dd($users);
        // dump($uname);


        if(strpos($users->uname, $uname)!==false && Hash::check($password,$users->password) && $users->power == 0){
            // session(['admin_user'=>$users]);
            DB::commit();
            session(['admin'=>true]);
            session(['user' => $users->uname]);
            session(['pic' => $users->pic]);
            return redirect('/admin')->with('success','登录成功');
        }else if(strpos($users->uname, $uname)!==false && Hash::check($password,$users->password) && $users->power == 1){
            DB::rollback();
            return back()->with('error','权限不足');
        }else {
            DB::rollback();
            return back()->with('error','密码错误');
        } 
    }
}
