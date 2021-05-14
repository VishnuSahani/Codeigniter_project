<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeModal');
		session_start();

	}
	
	public function index()
	{
		$this->load->view('header');
//		$this->load->view('home');
		$this->load->view('login');

		$this->load->view('footer');
	}
	
	public function login_query()
	{
		$email = $this->input->post('email');
		 $password = $this->input->post('password');
		$result = $this->HomeModal->login_check($email,$password);
		//print_r($result);
		if(isset($result['0'])){
			$arr=array('result'=>'success');
			$_SESSION['IS_LOGIN']='YES';

		}else{
			$arr=array('result'=>'Error','msg'=>'Please enter valid login detail');
		}
		echo json_encode($arr);

	}
	public function signup()
	{
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
	}
	public function signup_query()
	{
		 $data['name'] = $this->input->post('name');
		 $data['email'] = $this->input->post('email');
		 $data['password'] = $this->input->post('password');
         
          //$msg = array();
         //$data['error']='';

		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['upload_path'] = './pic_upload';
		$config['max_size']     = '500';

        
     	$config['encrypt_name'] = true;

		 $this->load->library('upload',$config);

		 if($this->upload->do_upload('image')){

		 	$uploaddata= $this->upload->data();
		 	$data['image']=$uploaddata['file_name'];
		 	$this->HomeModal->signup_query($data);

		 	   $data['success'] = 'Successfully Registered';
		       $this->load->view('header');
		       $this->load->view('signup',$data);
		      $this->load->view('footer');

		 	//header('location:signup',$data);
		 	//echo '<br><a href="index"><small><span class="text-dark">Exiting User?</span> Log in</small></a>';





		 }else{

		 	if(isset($_FILES['image'])){

		 	$data['error'] = $this->upload->display_errors();
		 	//print_r($data['error']);
		 			$this->load->view('header');
		       $this->load->view('signup',$data);
		      $this->load->view('footer');

		 	//header('location:signup',$data);

		 	}
	
		 }

		
		 
		
	}
	public function valid_session()
	{
		if(isset($_SESSION['IS_LOGIN']) && $_SESSION['IS_LOGIN'] !='')
		{

		}else{
			header('location:login');
		}

	}

	public function logout(){
		unset($_SESSION['IS_LOGIN']);
		header('location:index');
	}

	public function admin_index()
	{
		$this->valid_session();
		$this->load->view('admin-header');

		//echo $_SESSION['IS_LOGIN'];

		$this->load->view('admin-dashboard');


     	$this->load->view('admin-footer');

		
	}// 

	

}
