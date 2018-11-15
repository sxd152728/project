<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据 进行分页搜索
        $search = $request -> input('search','');
        $notice = Notice::where('notice','like','%'.$search.'%')->paginate(1);
        //加载列表页面
        return view('admin.notice.index',['title'=>'公告列表','notice'=>$notice,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view('admin.notice.create',['title'=>'公告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取数据 进行添加
        $notice = new Notice;
        $notice -> notice = $request -> input('notice');
        $notice -> name = $request -> input('name');
        $notice -> phone = $request -> input('phone');
        $notice -> email = $request -> input('email');
        $res = $notice->save();
        if($res == true){
            return redirect('admin/notice')->with('success','添加成功');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        // 加载修改模板
        $notice = Notice::find($id);
        return view('admin.notice.edit',['title'=>'公告修改','notice'=>$notice]);
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
        // 获取数据 进行修改
        $notice = Notice::find($id);
        $notice -> notice = $request -> input('notice');
        $notice -> name = $request -> input('name');
        $notice -> phone = $request -> input('phone');
        $notice -> email = $request -> input('email');
        $res = $notice->save();
        if($res == true){
            return redirect('admin/notice')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
        return view('admin/notice',['notice'=>$notice]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 获取公告id进行删除
        $res = Notice::destroy($id);
        if($res == true){
            return redirect('admin/notice')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
