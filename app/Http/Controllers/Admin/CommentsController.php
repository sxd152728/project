<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Articles;
use App\User;
use DB;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles = Articles::all();
        $user = User::all();
          // 评论搜索
        $search = $request->input('search','');
        // dump($request->all());
        // 分页
        $comments = Comments::where('id','like','%'.$search.'%')->paginate(5);
        // $comments = Comments::all();
      return view('admin.comments.index',['title'=>'评论列表','comments'=>$comments,'request'=>$request->all(),'articles'=>$articles,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $articles = Articles::all();
        $user = User::all();
        //$articles = new Articles; 
        // dd($articles);
        return view('admin.comments.create',['title'=>'评论添加','articles'=>$articles,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dump($request->all());
        $comments = new Comments;
        $articles = new Articles;
        $user = new User;
         // 验证修改后的数据
        $this->validate($request, [
            'content' => 'required',
        ],[
            'content.required' => '内容必填',
        ]);
        $comments->uid = $request->input('uid');
        $comments->pid = $request->input('pid');
        $comments->content = $request->input('content');
       $res = $comments->save();
         if ($res) {
            return redirect('/admin/comments')->with('success','添加成功');
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
        $comments = Comments::find($id);
       return view('admin.comments.show',['comments'=>$comments,'title'=>'文章内容']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comments::find($id);
        return view('admin.comments.edit',['comments'=>$comments,'title'=>'评论修改','comments'=>$comments]);
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
         $comments = Comments::find($id);
         $comments->content = $request->input('content');
         $res = $comments->save();
         if ($res) {
            return redirect('/admin/comments')->with('success','修改成功');
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
            $res1 = Comments::destroy($id);
          if($res1 ){
            return redirect('admin/comments')->with('success','删除成功');
        }else{
            return back()->with('success','删除失败');
        }
    }
}
    
