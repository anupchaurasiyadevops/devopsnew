<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
public function index()
	{
//	 $this->load->library("email");
// $config = array(
//'useragent'  => 'CodeIgniter',
//'protocol' =>'smtp',
//'smtp_crypto' =>'ssl',
//'smtp_host' =>'box2311.bluehost.com',
//'smtp_timeout'=>20,
//'smtp_port'=> 465,
//'smtp_user' =>'anup@pablastax.com',
//'smtp_pass' =>'anup321#@#',
//'charset'=>'utf-8',
//'mailtype' => 'html',
//'charset' => 'utf-8',
//'validate' => FALSE,
//'priority' => 3,
//'bcc_batch_mode' => FALSE,
//'bcc_batch_size' => 200,
//'newline'=>'\r\n'
//);
//$this->email->initialize($config);
//$this->email->from("anup@pablastax.com");
//$this->email->to("rprdgroup@gmail.com");
//$this->email->subject ("hello anup");
//$this->email->message ("testing mail anup");
//if ($this->email->send())
//{
//echo "Mail Send successfully";
//}
//else
//{
//echo "Sorry ! Unable to sent";
//print_r($this->email->print_debugger());
//}

	$data['school_profile']=$this->db->get('school_settings');
    $this->load->view('admin/login', $data);
	}


	public function logout()
		{
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		header("Location:".base_url()."index.php/admin/");
		}
	
	public function dashboard()
	  {
	  $data['response']=$this->admin_model->logindone();
		if($data['response']=="0")
		{
		$data['school_profile']=$this->db->get('school_settings');
		$data['msg']="Invalid Username or Password.";
		$this->load->view('admin/login',$data);
		}
		else
		{
		$this->session->set_userdata('username',$this->input->post('username'));
		$data['username']=$this->session->userdata('username');
		if($this->admin_model->checkadmin_auth())
		{
		$this->db->where('username',$this->session->userdata('username'));
		$data['user_detail']=$this->db->get('manage_admin');
		$data['school_profile']=$this->db->get('school_settings');
        $this->load->view('admin/header',$data);
		$this->load->view('admin/menu_sidebar',$data);
	    $this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer',$data);
       }
	   }
	   }
	   
	 public function dashboard1()
		{
    if($this->admin_model->checkadmin_auth())
		{
		$this->db->where('username',$this->session->userdata('username'));
		$data['user_detail']=$this->db->get('manage_admin');
		$data['school_profile']=$this->db->get('school_settings');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu_sidebar',$data);
	    $this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer');
       }
	}
	
	
}