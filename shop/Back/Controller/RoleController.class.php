<?php
namespace Back\Controller;
use Think\Controller;

class RoleController extends Controller {
    function showlist()
    {
        //获得全部角色的信息
        $info=D('Role')->select();

        //顺便添加面包屑
        $bread = array(
            'first' => '角色管理',
            'second' => '角色列表',
            'linkTo' => array(
                '【添加角色】',U('Role/tianjia')
            ),
        );
        $this -> assign('bread',$bread);

        $this -> assign('info',$info);
        $this -> display();



    }
}
