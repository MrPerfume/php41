<?php
header("Content-Type:text/html; charset=utf8")
//发送邮件
function sendMail($to, $title, $content){
    require_once('./phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML(TRUE);
    $mail->CharSet='UTF-8';
    // 是否需要身份验证
    $mail->SMTPAuth=TRUE;
    /*  邮件服务器上的账号是什么 -> 到163注册一个账号即可 */
    $mail->From="huang2lan@163.com";
    $mail->FromName="MrHuang";
    $mail->Host="smtp.163.com";  //发送邮件的服务协议地址
    $mail->Username="huang2lan";
    $mail->Password="doufu2maomao";
    // 发邮件端口号默认25
    $mail->Port = 25;
    // 收件人
    $mail->AddAddress($to);
    // 邮件标题
    $mail->Subject=$title;
    // 邮件内容
    $mail->Body=$content;
    return($mail->Send());
}
var_dump(sendMail('835710875@qq.com','测试','能看到就是成功'));