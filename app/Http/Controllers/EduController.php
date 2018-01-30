<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\news;
use App\userinfo;

use App\course;
use App\classes;
use App\homework;
class EduController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $result=array();
        if(!$request->has('course'))
        {
            $courseid=-1;
        }
        else
        {
            $courseid=$request->input('course');
        }
        $result['code']=0;
        $result['course']=0;
        if(Auth::check())
        {
            $userid=Auth::id();
            $userinfo = userinfo::where('owner',$userid)->get()->first();
            if($userinfo == null)
            {
                $result['code']=1;
            }else if($userinfo->course != null)
            {
                $courses = explode(';',$userinfo->course);
                if($courseid != -1)
                {
                    if(in_array($courseid,$courses))
                    {
                        $result['course']=1;
                    } 
                }
            }
            $result['status']=0;
            $result['user']=Auth::user();
            return json_encode($result);
        }
        $result['status']=1;
        return json_encode($result);
    }
    public function prelogin(Request $request)
    {
        //dd($request->path()); 
        $result = array();
        if(Auth::check())
        {
            $result['status']=1;
            $result['message']='用户已经登陆，请刷新';
            return json_encode($result);
        }
        if(!$request->has('url'))
        {
            $request->session()->put('turn','/');
        }
        else
        {
            $request->session()->put('turn',$request->input('url'));
        }
        return redirect('/login');
    }
    public function login(Request $request)
    {
        $result=array();
        if(!$request->has('username') || !$request->has('passwd') || !$request->has('code'))
        {
            $result['status']=1;
            $result['message']='No enough params!';
            return json_encode($result);
        }  
        $username = $request->input('username');
        $passwd = $request->input('passwd');
        $code = $request->input('code');
        if($code == '' || $username == '' || $passwd =='')
        {
            $result['status']=1;
            $result['message']="字段不能为空";
            return json_encode($result);
        }
        if($request->session()->get('code')!=$code)
        {
            $result['status']=1;
            $result['message']='验证码错误';
            return json_encode($result);
        }
        if(!Auth::attempt(['email'=>$username,'password'=>$passwd]))
        {
            $result['status']=1;
            $result['message']='用户名或密码错误';
            return json_encode($result);
        }
        $result['status'] = 0;
        if(Auth::user()->name == 'admin')
        {
            $result['url'] = 'admin';
           // return redirect()->intended('admin');
        }
        else
        {
            $temp = $request->session()->get('turn');
            if($temp == null)
            {
                $temp = '';
            }
            $result['url']=$temp;
        }
        $request->session()->put('turn','/');
        return json_encode($result);

    }
    public function logout(Request $request)
    {
        $result=array();
        if(!Auth::check())
        {
            $result['status']=1;
            $result['message']='Auth status error';
            return json_encode($result);
        }
        Auth::logout();
        $request->session()->put('turn','/');
        $result['status']=0;
        return json_encode($result);
    }
    public function admin(Request $request)
    {
        $result = array();
        if(Auth::guest())
        {
            return view('login');
        }
        if(Auth::user()->name == 'admin')
        {
            return view('adminindex');
        }
        if(Auth::user()->name != 'admin')
        {
            Auth::logout();
            return view('login');
        }
        if(!$request->has('username') || !$request->has('password') || !$request->has('valicode'))
        {
            $result['status']=2;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $username = $request->input('username');
        $password = $request->input('password');
        $valicode = $request->input('valicode');
        if($valicode != $request->session()->get('code'))
        {
            $result['status']=3;
            $result['message']='验证码错误'; 
            return json_encode($result);
        }
        if($username != 'admin')
        {
            $result['status']=1;
            return json_encode($result);
        }
        if(!Auth::attempt(['name'=>$username,'password'=>$password],false))
        {
            $result['status']=1;
            $result['message']="登陆失败";
            return json_encode($result);
        }
        $result['status']=0;
        return json_encode($result);
    }
    //注册
    public function register(Request $request)
    {
        $result=array();
        if(!$request->has('username') || !$request->has('passwd') || !$request->has('email') || !$request->has('type') || !$request->has('code'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $username = $request->input('username');
        $passwd = $request->input('passwd');
        $email = $request->input('email');
        $type = $request->input('type');
        $code = $request->input('code');
        if($request->session()->get('code')!=$code)
        {
            $result['status']=1;
            $result['status2']=3;
            return json_encode($result);
        }
        $user = User::where('name',$username)->get()->first();
        if($user != null)
        {
            $result['status']=1;
            $result['status2']=1;
            return json_encode($result);
        }
        $user = User::where('email',$email)->get()->first();
        if($user != null)
        {
            $result['status']=1;
            $result['status2']=2;
            return json_encode($result);
        }
        User::create(['name'=>$username,'email'=>$email,'role'=>$type,'password'=>bcrypt($passwd)]);
        Auth::attempt(['name'=>$username,'password'=>$passwd],false);
        $result['status']=0;
        $result['url']='';
        return json_encode($result);
    }
    //获取主页新闻
    public function newsgroup()
    {
        $result=array();
        for($i=0;$i<4;$i++)
        {
            $temp=array();
            $news = news::where('type',$i)->get();
            $j=0;
            foreach($news as $value)
            {
                $item=array();
                $item['id']=$value->id;
                $item['title']=$value->title;
                $item['time']=explode(' ',$value->created_at)[0];
                $temp[]=$item;
                $j++;
                if($j == 6)
                    break;
            }
            $result['news'.$i]=$temp;
        }
        $result['status']=0;
        return json_encode($result);
    }
    //获取单个新闻或者新闻主页
    private $title=array('科技创新','前沿技术','竞赛培训','成果转化','企业招聘','技术转让');
    public function getnewsinfo(Request $request)
    {
        
        $result=array();
        if(!$request->has('type') || !$request->has('page'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $type = $request->input('type');
        $page = $request->input('page');
        $temp = array();
        if($type == -1)
        {
            $page = news::find($page);
            $temp['title']=$page->title;
            $temp['content']=$page->content;
            $temp['time']=explode(' ',$page->created_at)[0];
            $temp['count']=$page->count;
            $page->count = $page->count+1;
            $page->save();
            $result['type']=$page->type;
            $result['type1']=$page->type;
        }
        if($page == '-1')
        {
            $news = news::where('type',$type)->get();
            foreach($news as $value)
            {
                $temp2=array();
                $temp2['id']=$value->id;
                $temp2['title']=$value->title;
                $temp2['time']=explode(' ',$value->created_at)[0];
                $temp[]=$temp2;
            }
            $result['type']=$this->title[$type]; 
            $result['type1']=$type;
        }
        $result['status']=0;
        $result['item']=$temp;
        return json_encode($result);
    }

    //用户信息录入
    public function userinfo(Request $request)
    {
        $result=array();
        if(!$request->has('name') || !$request->has('phone') || !$request->has('email') )
        {
            $result['status']=1;
            $result['message']='缺少字段';
            return json_encode($result);
        }
        $name=$request->input('name');
        $phone=$request->input('phone');
        $qq=$request->input('qq');
        $email=$request->input('email');
        $wechat=$request->input('wechat');
        $userid = Auth::user()->id;
        $user = userinfo::where('owner',$userid)->get()->first();
        if($user==null)
        {
            userinfo::create(['owner'=>$userid,'phone'=>$phone,'qq'=>$qq,'wechat'=>$wechat,'email'=>$email,'name'=>$name]);
        }
        else
        {
            $user->name=$name;
            $user->email=$email;
            $user->wechat=$wechat;
            $user->phone=$phone;
            $user->qq=$qq;
        }
        $result['status']=0;
        return json_encode($result);
    }
    //获取用户信息
    public function getuserinfos(Request $request)
    {
        $result=array();
        $userid=Auth::user()->id;
        $user=userinfo::where('owner',$userid)->get()->first();
        if($user == null)
        {
            $result['status']=1;
            return json_encode($result);
        }
        $result['status']=0;
        $result['name']=$user->name;
        $result['phone']=$user->phone;
        $result['qq']=$user->qq;
        $result['wechat']=$user->wechat;
        $result['email']=$user->email;
        return json_encode($result);
    }
    //获取用户类型
    public function getuserrole(Request $request)
    {
        $result=array();
        $result['status']=0;
        $result['role']=Auth::user()->role;
        return json_encode($result);
    }

    //上传视频
    public function uploadvideo(Request $request)
    {
        $result=array();
        if(!$request->hasFile('file'))
        {
            $result['status']=1;
            $result['message']='没有上传文件';
            return json_encode($result);
        }
        $path = $request->file('file')->store('public/video');
        $result['status']=0;
        $result['picurl']=$path;
        return json_encode($result);
    }

    //管理员
    public function uploadimg(Request $request)
    {
        $result=array();
        if(!$request->hasFile('file'))
        {
            $result['status']=1;
            $result['message']='没有上传文件';
            return json_encode($result);
        }
        $path = $request->file('file')->store('public/images');
        $result['status']=0;
        $result['picurl']=$path;
        return json_encode($result);
    }
    //提交新闻
    public function submitnews(Request $request)
    {
        $result = array();
        if(!$request->has('title') || !$request->has('content') || !$request->has('type'))
        {
            $result['status']=1;
            $resutl['message']='缺少参数';
            return json_encode($result);
        }
        $title = $request->input('title');
        $content = $request->input('content');
        $type = $request->input('type');
        news::create(['title'=>$title,'content'=>$content,'type'=>$type]);
        $result['status']=0;
        return json_encode($result);
    }
    //删除新闻
    public function deletenews(Request $request)
    {
        $result=array();
        if(!$request->has('newsid'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $newsid=$request->input('newsid');
        $news = news::find($newsid);
        if($news == null)
        {
            $result['status']=1;
            $result['message']='新闻不存在';
            return json_encode($result);
        }
        $news->delete();
        $result['status']=0;
        return json_encode($result);
    }

    //添加课程
    public function submitcourse(Request $request)
    {
        $result=array();
        if(!$request->has('title')||!$request->has('abstrate')||!$request->has('imgurl'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $title = $request->input('title');
        $abstrate = $request->input('abstrate');
        $imgurl = $request->input('imgurl');
        $type = $request->input('type');
        $userid = Auth::user()->id;
        $user = userinfo::where('owner',$userid)->get()->first();
        $owner = '';
        if($user != null)
        {
            $owner = $user->name;
        }
        if(course::where('title',$title)->get()->first()!=null)
        {
            $result['status']=1;
            $result['message']='课程已存在';
            return json_encode($result);
        }
        course::create(['type'=>$type,'title'=>$title,'owner'=>$userid,'abstrate'=>$abstrate,'imgurl'=>$imgurl,'teacher'=>$owner]);
        $result['status']=0;
        return json_encode($result);
    }
    //获取教师课程
    public function getlistteacher()
    {
        $result=array();
        $userid=Auth::user()->id;
        $item=array();
        if(Auth::user()->role==1)
        {
            $courses=course::where('owner',$userid)->get();
            foreach($courses as $course)
            {
                $temp=array();
                $temp['title']=$course->title;
                $temp['imgurl']=$course->imgurl;
                $temp['id']=$course->id;
                $temp['teacher']=$course->teacher;
                $item[]=$temp;
            }
        }
        if(Auth::user()->role==0)
        {
            $coursesid=userinfo::where('owner',$userid)->get()->first();
            if($coursesid ==null)
            {
                $result['status']=1;
                $result['message']='请填写个人信息';
                return json_encode($result);
            }
            $coursesid=explode(';',$coursesid->course);
            foreach($coursesid as $value)
            {
                $course=course::find($value);
                if($course == null)
                    continue;
                $temp=array();
                $temp['title']=$course->title;
                $temp['imgurl']=$course->imgurl;
                $temp['id']=$course->id;
                $temp['teacher']=$course->teacher;
                $item[]=$temp;
            } 
        }
        $result['status']=0;
        $result['item']=$item;
        $result['role']=Auth::user()->role;
        return json_encode($result);
    }
    //添加课时
    public function addclass(Request $request)
    {
        $result=array();
        if(!$request->has('id') || !$request->has('video') || !$request->has('homework'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $id=$request->input('id');
        $videourl = $request->input('video');
        $homework = $request->input('homework');
        classes::create(['owner'=>$id,'videourl'=>$videourl,'homework'=>$homework]);
        $result['status']=0;
        return json_encode($result);
    }
    //获取课程所有列表
    public function classlist(Request $request)
    {
        $result=array();
        if(!$request->has('course'))
        {
            $result['status']=1;
            $result['message']='没有参数';
            return json_encode($result);
        }
        $course = $request->input('course');
        $result['course']=$course;
        $result['role']=Auth::user()->role;
        $courses = classes::where('owner',$course)->get();
        $item=array();
        foreach($courses as $value)
        {
            $temp=array();
            $temp['id']=$value->id;
            $temp['owner']=$value->owner;
            $temp['videourl']=$value->videourl;
            $temp['homework']=$value->homework;
            $item[]=$temp;
        }
        $course = course::find($course);
        $result['status']=0;
        $result['item']=$item;
        $result['title']=$course->title;
        $result['teacher']=$course->teacher;
        return json_encode($result);
    }
    //普通用户获取课程列表
    public function getclasslist(Request $request)
    {
        $result = array();
        if(!$request->has('type'))
        {
            $result['status']=1;
            $result['message']='没有类型参数';
            return json_encode($result);
        }
        $type = $request->input('type');
        if($type == '' || $type == null)
        {
            $result['status']=1;
            $result['message']='没有类型参数';
            return json_encode($result);
        }
        $classes = course::where('type',$type)->get();
        $item=array();
        foreach($classes as $value)
        {
            $temp=array();
            $temp['id']=$value->id;
            $temp['title']=$value->title;
            $temp['imgurl']=$value->imgurl;
            $item[]=$temp;
        }
        $result['status']=0;
        $result['item']=$item;
        $result['type']=$type;
        return json_encode($result);
    }
    //普通用户获取课程详情
    public function getclassdetail(Request $request)
    {
        $result=array();
        if(!$request->has('course'))
        {
            $result['status']=1;
            $result['message']='没有参数';
            return json_encode($result);
        }
        $course = $request->input('course');
        if($course == '-1')
        {
            $result['status']=1;
            $result['message']='biubiubiu~';
            return json_encode($result);
        }
        $courses = classes::where('owner',$course)->get();
        $status = course::find($course);
        if($status == null)
        {
            $result['status']=1;
            $result['message']='课程已被删除或不存在';
            return json_encode($result);
        }
        $item=array();
        foreach($courses as $value)
        {
            $temp=array();
            $temp['id']=$value->id;
            $temp['owner']=$value->owner;
            $temp['videourl']=$value->videourl;
            $temp['homework']=$value->homework;
            $item[]=$temp;
        }
        $course = course::find($course);
        $result['status']=0;
        $result['item']=$item;
        $result['teacher']=$course->teacher;
        $result['title']=$course->title;
        return json_encode($result);
    }
    //下载文件
    public function download($file = null)
    {
        if($file == null)
            return;
        return response()->download(storage_path().'/app/aetherupload/'.base64_decode($file));
    }


    //购买课程
    public function buycourse(Request $request)
    {
        $result=array();
        if(!$request->has('course'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $course = $request->input('course');
        $userinfoid = Auth::user()->id;
        $userinfo = userinfo::where('owner',$userinfoid)->get()->first();
        if($userinfo == null)
        {
            $result['status']=1;
            $result['message']='无用户信息,请先填写个人信息';
            return json_encode($result);
        }
        $usercourse = $userinfo->course;
        if($usercourse == null || $usercourse == '')
        {
            $userinfo->course = $course;
            $userinfo->save();
        }
        else
        {
            $userinfo->course=$userinfo->course.';'.$course;
            $userinfo->save();
        }
        $result['status']=0;
        return json_encode($result);

    }
    //管理员获取课程列表
    public function getcourselist(Request $request)
    {
        $result=array();
        if(!$request->has('type'))
        {
            $result['status']=1;
            $result['message']='没有参数';
            return json_encode($result);
        }
        $type=$request->input('type');
        $courses = course::where('type',$type)->get();
        $result['status']=0;
        $item = array();
        foreach($courses as $value)
        {
            $temp=array();
            $temp['id']=$value->id;
            $temp['title']=$value->title;
            $temp['teacher']=$value->teacher;
            $item[]=$temp;
        }
        $result['item']=$item;
        return json_encode($result);
    }
    //删除课程
    public function deletecourse(Request $request)
    {
        $result=array();
        if(!$request->has('courseid'))
        {
            $result['status']=1;
            $result['message']='没有参数';
            return json_encode($result);
        }
        $courseid=$request->input('courseid');
        $course = course::find($courseid);
        if($course == null)
        {
            $result['status']=1;
            $result['message']='没有课程';
            return json_encode($result);
        }
        $owner=$course->id;
        $classes=classes::where('owner',$owner)->get();
        foreach($classes as $value)
        {
            $value->delete();
        }
        $course->delete();
        $result['status']=0;
        return json_encode($result);
    }
    //删除课程
    public function deleteclass(Request $request)
    {
        $result=array();
        if(!$request->has('classid'))
        {
            $result['status']=1;
            $result['message']='没有参数';
            return json_encode($result);
        }
        $classid=$request->input('classid');
        $class = classes::find($classid);
        if($class == null)
        {
            $result['status']=1;
            $result['message']='没有课程';
            return json_encode($result);
        }
        $class->delete();
        $result['status']=0;
        return json_encode($result);
    }
    //学生上传作业
    public function uploadhomework(Request $request)
    {
        $result=array();
        if(!$request->has('homework') || !$request->has('course'))
        {
            $result['status']=1;
            $result['message']='缺少参数';
            return json_encode($result);
        }
        $homework=$request->input('homework');
        $course=$request->input('course');
        $id=Auth::user()->id;
        $record=homework::where(['owner'=>$id,'course'=>$course])->get()->first();
        if($record == null)
        {
            homework::create(['owner'=>$id,'course'=>$course,'homework'=>$homework]);
        }
        if($record != null)
        {
            $record->homework=$homework;
            $record->save();
        }
        $result['status']=0;
        return json_encode($result);
    }
}

