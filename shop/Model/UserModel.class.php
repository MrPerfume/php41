<?php

//模型

namespace Model;
use Think\Model;

class UserModel extends Model{
    // 字段映射定义
    // 把form表单中自定义字段，变为数据表合法字段
    protected $_map             =   array(
        'name' => 'user_name',
        'password' => 'user_pwd',
        'email' => 'user_email',
    );

}
