<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Cates;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\User;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $cates = Cates::all();
        $user = User::all();

        //dump($cates);
        // 文章搜索
        $search = $request->input('search','');
        // dump($request->all());
        // 分页
        $articles = Articles::where('id','like','%'.$search.'%')->paginate(5);
        //加载列表页面
        return view('admin.article.index',['articles'=>$articles,'title'=>'文章列表','request'=>$request->all(),'cates'=>$cates,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 文章添加加载模板
         //$cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
         //$cates = Cates::all();
        $articles = new Articles;
                //获取类别
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        $user = User::all();
     
        // 统计逗号出现的次数
        foreach ($cates as $k => $v) {
            $n = substr_count($v->path,',');
            $cates[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('admin.article.create',['title'=>'文章添加','cates'=>$cates,'articles'=>$articles,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $articles = new Articles;
       $cates = new Cates;
       $user = new User;
               // 验证修改后的数据
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
        ],[
            'title.required' => '标题必填',
            'author.required' => '作者必填',
            'content.required' => '内容必填',
        ]);
       $articles->uid = $request->input('uid');
       $articles->title = $request->input('title');
       $articles->author = $request->input('author');
       $articles->content = $request->input('content');
        $articles->cid = $request->input('cid');
      
       $res2 = $articles->save();
         if ($res2) {
            return redirect('/admin/article')->with('success','添加成功');
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
        DB::beginTransaction();
        $articles = Articles::find($id);
        $cates = Cates::all();
       return view('admin.article.show',['articles'=>$articles,'title'=>'文章内容','cates'=>$cates]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::find($id);
         //获取类别
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // 统计逗号出现的次数
        foreach ($cates as $k => $v) {
            $n = substr_count($v->path,',');
            $cates[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        
        return view('admin.article.edit',['title'=>'文章修改','articles'=>$articles,'cates'=>$cates]);
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
        //将所有提交的数据存在闪存当中
        // dd($request->all());
         $articles = Articles::find($id);
         $articles->uid = $request ->uid;
         $cates = Cates::all();
         $articles->title = $request->input('title');
          // $articles->cname = $request->input('cname');
         $articles->content = $request->input('content');
         $res = $articles->save();
         if ($res) {
            return redirect('/admin/article')->with('success','修改成功');
         }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       
        $res1 = Articles::destroy($id);
          if($res1 ){
            return redirect('admin/article')->with('success','删除成功');
           }else{
            return back()->with('success','删除失败');
        }
    }
}
