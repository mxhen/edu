<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gregwar\Captcha\CaptchaBuilder;

use Session;
class CodeController extends Controller
{
    public function captcha(Request $request)
    {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        $phrase = $builder->getPhrase();
        $request->session()->flash('code',$phrase);
        //Session::flash('milkcaptcha',$phrase);
        ob_clean();
        return response($builder->output())->header('Content-type','image/jpeg');
    }
}
