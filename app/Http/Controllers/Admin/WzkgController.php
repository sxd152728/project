<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Wzkgs;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class WzkgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       return view('admin.wzkg.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      
     public function store(Request $request)
    {
        $wzkgs = Wzkgs::find(1);
        $wzkgs -> kg = $request->kg;
        if($wzkgs -> save()){
            return redirect('/admin/wzkg/create')->with('success', '修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
