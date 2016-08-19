<?php

namespace Addons\Controller;
use Addons\Traits\AjaxReturn;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-18
 * Time: 11:59
 */
class User
{
    use AjaxReturn;
    //必须通过verifyToken后才能调用以下方法，因为方法内部调用了bus()流
    public function doUserinfosubmitPost()
    {
        //model('Gate')->verifyToken(req('Post')['token']);
        $req = req('Post');
        $user = model('User');
        $msg = $user->paramsConfig()['returnNews'];
        $code = $user->validateUserReq($req);
        if($code==200){
            $check = $user->updateUserByUserId($req);
            if($check){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg' => $msg[$code],
                ]);
            }else{
                $this->AjaxReturn([
                    'code' => -200,
                    'msg' => $msg[-200],
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg[$code],
            ]);
        }
    }

    public function doUserinfoPost()
    {
        model('Gate')->verifyToken(req('Post')['token']);
        if($userInfo=model('User')->getUserInfoByToken()){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'Succeed',
                'data'=>$userInfo
            ]);
        }else{
            $this->AjaxReturn([
                'code' => -200,
            ]);
        }
    }

    public function doUpuserimagePost()
    {
        //model('Gate')->verifyToken(req('Post')['token']);
        $file = $_FILES['tfile'];
        $msg = model('Upload')->returnMsg();
        $code = model('User')->uploadHeadImage($file);
        $this->AjaxReturn([
            'code'=>$code,
            'msg'=>$msg[$code],
        ]);
    }

    public function doRegisterPost()
    {
        $req = req('Post');
        $register = model('Register');
        $code = $register->validateRegisterReq($req);
        $msg  = $register->registerConfig()['returnNews'];
        if($code==200){
            $code=model('Register')->register();
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg[$code],
            ]);
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg[$code],
            ]);
        }
    }

    public function doResetpasswordPost()
    {
        model('Gate')->verifyToken(req('Post')['token']);
        $req = req('Post');
        $code = model('Password')->resetPassword($req);
        $msg = model('Password')->returnNews();
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg[$code],
        ]);
    }

    public function doIndex()
    {
        $verify = md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff1501471276800');
        view('',[
            'verify'=> $verify
        ]);
    }

}