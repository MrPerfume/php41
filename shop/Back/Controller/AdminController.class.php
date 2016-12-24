<?php
namespace Back\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
        $this->display();
    }


    public function verifyImg(){
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

}