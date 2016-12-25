<?php
namespace Back\Controller;
use Think\Controller;

class IndexController extends Controller {
    function __construct(){
        parent::__construct();//先执行父类构造方法
        layout(false); // 临时关闭当前模板的布局功能
    }

    public function head(){
        $this -> display();
    }
    public function left(){
        $this -> display();
    }
    public function right(){
        $this -> display();
    }
    public function index(){
        $this -> display();
    }
}
