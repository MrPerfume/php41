<?php
namespace Back\Controller;
use Common\Tools\BackController;

class GoodsController extends BackController {
    function showlist(){
        $goods = new \Model\GoodsModel();
        $nowinfo = $goods -> fetchData();

        $info = $nowinfo['pageinfo']; //当前页数据信息
        $pagelist = $nowinfo['pagelist'];//页码列表信息
      //为单独页面设置面包屑
        $bread = array(
            'first' => '商品管理',
            'second' => '商品列表',
            'linkTo' => array(
                '【添加商品】',U('Goods/tianjia')
            ),
        );
        $this -> assign('bread',$bread);

        $this -> assign('info',$info);
        $this -> assign('pagelist',$pagelist);
        $this -> display();
    }
    public function tianjia(){
        $goods = new \Model\GoodsModel();  //实例化GoodsModel对象
        //两个逻辑：展示、收集
        if(IS_POST){ //收集表单
            //$_POST['add_time'] = time();
            //$_POST['upd_time'] = time();
            //if($goods -> add($_POST)){
            //为单独页面设置面包屑

            $data = $goods -> create();

            //对富文本编辑器原生内容进行过滤，方式xss攻击
            //htmlpurifier过滤
            $data['goods_introduce'] = \fanXSS($_POST['goods_introduce']);

            if($goods -> add($data)){
                $this ->success('添加商品成功', U('showlist'), 1);
            }else{
                $this ->error('添加商品失败', U('tianjia'), 2);
            }
        }else{//展示表单
            //顺便添加面包屑
            $bread = array(
                'first' => '商品管理',
                'second' => '添加商品',
                'linkTo' => array(
                    '【展示商品】',U('Goods/showlist')
                ),
            );
            $this -> assign('bread',$bread);
            $this -> display();
        }
    }
    
    public function upd(){
        //两个逻辑：展示、收集
        $goods = new \Model\GoodsModel();
        if(IS_POST){
            $data = $goods -> create();
            if($goods -> save($data))
                $this -> success('修改商品成功', U('showlist'), 2);
            else
                $this -> error('修改商品失败', U('upd',array('goods_id'=>$data['goods_id'])), 2);
        }else{
            $goods_id = I('get.goods_id'); //接收被修改商品的goods_id
            $info = $goods->find($goods_id);//查询被修改商品的信息

            /*************获得相册信息*************/
            $picsinfo = D('GoodsPics')->where(array('goods_id'=>$goods_id))->select();
            if(!empty($picsinfo))
                $this -> assign('picsinfo',$picsinfo);
            /*************获得相册信息*************/


            $this -> assign('info',$info);
            $this -> display();
        }
    }

    //删除单个相册图片
    function delPics(){
        $pics_id = I('get.pics_id');
        //查询图片并
        $info = D('GoodsPics')->find($pics_id);
        //①删除相册图片[物理删除]
        unlink($info['pics_big']);
        unlink($info['pics_small']);

        //②删除数据记录信息
        $z = D('GoodsPics')->delete($pics_id); //返回删除记录条数,1条
        if($z){
            echo "删除成功！";
        }
    }

    //删除商品
    function delGoods(){
        $goods_id = I('get.goods_id');  //获得被删除商品的id信息
        $goods = D('Goods');
        $z = $goods -> setField(array('goods_id'=>$goods_id,'is_del'=>'删除'));
        //setField()内部有调用save()方法，
        if($z){
            echo json_encode(array('status'=>1)); //ok  99%
        }else{
            echo json_encode(array('status'=>2)); //fail 1%
        }
    }

}
