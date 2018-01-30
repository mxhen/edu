<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use Auth;

//use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});
//课程页面
Route::get('/course', function () {
    return view('course');
});
//课程主页
Route::get('/page9', function () {
    return view('page9');
});
//学生个人中心
Route::get('/student',function(){
    return view('student');
});
//竞赛
Route::get('/competition',function(){
    return view('competition');
});
//注册页面
Route::get('/register',function(){
    return view('register');
})->middleware('hasLogin');
Route::post('/register','EduController@register');
Route::get('/userstatus','EduController@getUserInfo');
Route::get('/logout','EduController@logout');
Route::get('/login',function(){
    if(Auth::check())
        return redirect('/course');
    else
        return view('login');
});
Route::get('/prelogin','EduController@prelogin');
Route::post('login','EduController@login');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//验证码
Route::get('captcha','CodeController@captcha');

//新闻页
Route::get('/news',function(){
    return view('news');
});
//获取主页新闻
Route::get('newsgroup','EduController@newsgroup');
//获取单个新闻和列表
Route::post('getnewsinfo','EduController@getnewsinfo');
//获取课程列表
Route::get('getclasslist','EduController@getclasslist');
//获取课程内容
Route::get('getclassdetail','EduController@getclassdetail');
//下载文件
Route::get('download/{file?}','EduController@download');

//ajaxauth
Route::group([],function(){
    Route::post('buycourse','EduController@buycourse');
    Route::post('uploadhomework','EduController@uploadhomework');
});
//个人中心
Route::group(['middleware'=>['auth']],function(){
    Route::get('center',function(){
        return view('personalcenter'); 
    });
    Route::post('userinfo','EduController@userinfo');
    Route::get('getuserinfo','EduController@getuserinfos');
    Route::post('submitcourse','EduController@submitcourse');
    Route::get('teachercourselist','EduController@getlistteacher');
    Route::post('addclass','EduController@addclass');
    Route::get('classlist','EduController@classlist');
    //获取用户role
    Route::get('getuserrole','EduController@getuserrole');
    //teacher删除class
    Route::get('deleteclass','EduController@deleteclass');
});


//管理员页面
Route::get('/admin','EduController@admin');
Route::group(['middleware' => ['admin']], function () {
    Route::get('hello',function(){
        return view('course'); 
    });
    //上传照片
    Route::post('uploadpic','EduController@uploadimg');
    //提交新闻
    Route::post('submitnews','EduController@submitnews');
    //删除新闻
    Route::get('deletenews','EduController@deletenews');
    //上传
    Route::post('uploadvideo','EduController@uploadvideo');
    //获取课程列表
    Route::post('getcourselist','EduController@getcourselist');
    //删除课程
    Route::get('deletecourse','EduController@deletecourse');
});



//测试页面
Route::get('addadmin','TestController@addadmin');
