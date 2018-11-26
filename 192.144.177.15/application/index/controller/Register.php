<?
namespace app\index\controller;

use think\Controller;

class Register extends Controller
{
  public function index()
  {
    return $this->fetch();
  }
  
  
  
    // 处理注册逻辑

    public function doRegister()

     // $g=M("users");
      
    {

    	$param = input('post.');

    	if(empty($param['user_name'])){
    		$this->error('用户名不能为空');
    	}

    	

    	if(empty($param['user_pwd'])){

    		$this->error('密码不能为空');

    	}
      
      	if(empty($param['user_pwd2'])){

    		$this->error('密码不能为空');

    	}
      
      	if($param['user_pwd']!=$param['user_pwd2']){

    		$this->error('两次输入的密码不一致，请重新输入');

    	}

    	

    	// 验证用户名是否存在

    	$has = db('users')->where('user_name', $param['user_name'])->find();

    	if(!empty($has)){
    		$this->error('该用户名已被注册');

    	}

    	
      
		$data=[

         
		'user_name'=>$param['user_name'],
         
		'user_pwd'=>md5($param['user_pwd']),
         
		];
         

		         
		db('users')->insert($data);
      
      

    	// 记录用户登录信息

    	cookie('user_id', $has['id'], 3600);  // 一个小时有效期

    	cookie('user_name', $has['user_name'], 3600);

    	

    	$this->redirect(url('index/register_success'));

    }

  
  
  
    // 退出登录

    public function RegisterOut()

    {

    	cookie('user_id', null);

    	cookie('user_name', null);

    	

    	$this->redirect(url('register/index'));

    }

  
  
  
  
  
  
  
  
}