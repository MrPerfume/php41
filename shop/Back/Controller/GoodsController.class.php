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
        $goods = new \Model\GoodsModel();  //实例化GoodsModel对象
        //两个逻辑：展示、收集
        if(IS_POST){ //收集表单
            //$_POST['add_time'] = time();
            //$_POST['upd_time'] = time();
            //if($goods -> add($_POST)){
            $data = $goods -> create();

            //对富文本编辑器原生内容进行过滤，方式xss攻击
            //htmlpurifier过滤
            //$data['goods_introduce'] = \fanXSS($_POST['goods_introduce']);

            if($goods -> add($data)){
                $this ->success('添加商品成功', U('showlist'), 2);
            }else{
                $this ->error('添加商品失败', U('tianjia'), 2);
            }
        }else{//展示表单
            $this -> display();
        }
    }
    
    public function upd(){
        $this -> display();
    }

}
