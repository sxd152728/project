<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Avdert;

class AvdertController extends Controller
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
        $avdert = Avdert::where('url','like','%'.$search.'%')->paginate(1);
        // 加载列表页面
        return view('admin.avdert.index',['title'=>'广告列表','avdert'=>$avdert,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加模板
        return view('admin.avdert.create',['title'=>'广告添加']);
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
        $avdert = new Avdert;
        $avdert -> url = $request -> input('url');
        if($request -> hasFile('pic')){
            $pic = $request -> file('pic');
            $ext = $pic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/pic/avdert'.date('Ymd',time());
            $res = $pic -> move($dir_name,$file_name);
            $pic_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $avdert -> pic = $pic_path;
        $res = $avdert->save();
        if($res == true){
            return redirect('admin/avdert')->with('success','添加成功');
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
        $avdert = Avdert::find($id);
        return view('admin.avdert.edit',['title'=>'广告修改','avdert'=>$avdert]);
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
        $avdert = Avdert::find($id);
        $avdert -> url = $request -> input('url');
        if($request -> hasFile('pic')){
            $pic = $request -> file('pic');
            $ext = $pic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/pic/avdert'.date('Ymd',time());
            $res = $pic -> move($dir_name,$file_name);
            $pic_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $avdert -> pic = $pic_path;
        $res = $avdert->save();
        if($res){
            return redirect('admin/avdert')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        };
        // 将修改之后的数据返回广告列表页面
        return view('admin/avdert',['avdert'=>$avdert]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 获取广告id进行删除
        $res = Avdert::destroy($id);
        if($res == true){
            return redirect('admin/avdert')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
