<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
class TestController extends Controller
{
    //
    public function addadmin()
    {
        $name = 'admin';
        $password = '12345678';
        $user = User::where('name','admin')->get()->first();
        if($user == null)
        {
            User::create(['role'=>3,'name'=>$name,'email'=>'admin','password'=>bcrypt($password)]);
        }  
        else
        {
            $user->password = bcyrpt($password);
            $user->save();
        }
    }
}

