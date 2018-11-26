<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
       echo"你好啊：".cookie('user_name').',<a href="'.url('login/loginout').'">退出</a>';
    }
  
  public function register_success()
    {
    echo "恭喜你注册成功！".'<a href="'.url('login/index').'">点击登录</a>';
    }
  
  
}