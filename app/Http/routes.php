<?php
use App\Models\wzkgs;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//后台路由
//路由组管理
Route::group(['middleware'=>'login'],function(){
	//后台首页路由
	Route::get('/admin','Admin\IndexController@index');
	//后台用户的路由
	Route::resource('/admin/users','Admin\UsersController');
	//后台广告的路由
	Route::resource('/admin/avdert','Admin\AvdertController');
	//后台友情链接的路由
	Route::resource('admin/friend','Admin\FriendController');
	//后台公告管理的路由
	Route::resource('admin/notice','Admin\NoticeController');
	//后台首页的路由
	Route::get('/admin','Admin\IndexController@index');
	//后台文章管理路由
	Route::resource('/admin/article','Admin\ArticleController');
	//后台分类管理路由
	Route::resource('/admin/cates','Admin\CatesController');
	//后台评论管理路由
	Route::resource('/admin/comments','Admin\CommentsController');
	//后台网站管理路由
	Route::resource('admin/wzkg','Admin\WzkgController');
	//后台回收站路由
	Route::resource('/admin/recovery','Admin\RecoveryController');
	Route:get('/admin/recovery/delete/{id}','Admin\RecoveryController@delete');

	Route::get('/admin/recovery/huifu/{id}','Admin\RecoveryController@huifu');
});
//后台登录路由
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login/verification','Admin\LoginController@verification');

//前台路由
Route::get('/','Home\IndexController@index');
Route::get('/home/list/{id}','Home\ListController@index');
Route::get('/home/xiangqing/{id}','Home\XiangqingController@index');

//前台首页
$wzkgs = Wzkgs::find(1);
if($wzkgs['kg'] == 1){
	Route::get('/','home\IndexController@index');
}else{
	Route::get('/','home\IndexController@modify');
}