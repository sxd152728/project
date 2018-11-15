<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\User;
use Hash;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取数据 搜索分页
        $search = $request -> input('search','');
        $user = User::where('uname','like','%'.$search.'%')->paginate(5);
        // 加载列表页面
        return view('admin.users.index',['title'=>'用户列表','user'=>$user,'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加模板
        return view('admin.users.create',['title'=>'用户添加']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // 获取数据 进行添加
        $user = new User;
        $user -> uname = $request -> input('uname');
        $user -> password = Hash::make($request -> input('password'));
        $user -> phone = $request -> input('phone');
        $user -> email = $request -> input('email');
        if($request -> hasFile('pic')){
            $pic = $request -> file('pic');
            $ext = $pic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/pic/user'.date('Ymd',time());
            $res = $pic -> move($dir_name,$file_name);
            $pic_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $user -> pic = $pic_path;
        $res = $user->save();
        if($res == true){
            session(['pic'=>$user->pic]);
            return redirect('admin/users')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 加载修改模板
        $user = User::find($id);
        return view('admin.users.edit',['title'=>'用户修改','user'=>$user]);
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
        // 获取原始数据 进行修改
        $user = User::find($id);
        // 验证修改后的数据
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'required|email',
        ],[
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式错误',
            'email.required' => '邮箱必填',
            'email.regex' => '邮箱格式错误',
        ]);
        $user -> uname = $request -> input('uname');
        $user -> phone = $request -> input('phone');
        $user -> email = $request -> input('email');
        $user -> power = $request -> input('power');
        if($request -> hasFile('pic')){
            $pic = $request -> file('pic');
            $ext = $pic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/pic/user'.date('Ymd',time());
            $res = $pic -> move($dir_name,$file_name);
            $pic_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $user -> pic = $pic_path;
        $res = $user->save();
        if($res){
            return redirect('admin/users')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        };
        // 将修改之后的数据返回用户列表页面
        return view('admin/users',['users'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 获取用户id进行删除
        $res = User::destroy($id);
        if($res == true){
            return redirect('admin/users')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
