<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    function verifyImg(){
        //显示验证码
        $cfg = array(
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    =>  100,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
            'fontSize'  =>  15,              // 验证码字体大小(px)
        );
        $very = new \Think\Verify($cfg);
        $very -> entry();
    }


    //ajax过来校验验证码
    function checkCode(){
        $code = I('get.code'); //获得用户输入的验证码
        $vry = new \Think\Verify();
        if($vry -> check($code)){
            echo json_encode(array('status'=>1));
        }else{
            echo json_encode(array('status'=>2));
        }
    }


    public function login(){
        $this->display();
    }

    public function regist(){
        //两个逻辑：展示、收集
        $user = new \Model\UserModel();
        if(IS_POST){

            $data = $user -> create(); //过滤非法字段
            if($user->add($data)){
                $this -> success('注册成功',U('showRegister'),1);
            }else{
                $this -> error('注册失败',U('regist'),1);
            }

        }else{
            $this -> display();
        }
    }

}