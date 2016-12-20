<?php
namespace Back\Controller;
use Think\Controller;

class GoodsController extends Controller {
    public function showlist(){
       // $goods=D('Goods');
       // dump($goods);
        $this -> display();
    }
    public function tianjia(){
        $this -> display();
    }
    public function upd(){
        $this -> display();
    }

}
