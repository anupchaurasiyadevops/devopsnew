<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eclassroom extends CI_Controller {

	
	public function view_classlist()
	{
    if($this->lemployee_model->checkemployee_auth())
		{
		$this->db->where('employee_id',$this->session->userdata('employee_id'));
		$data['user_detail']=$this->db->get('manage_employee');
		$data['school_profile']=$this->db->get('school_settings');
		$data['manage_student_enrollment']=$this->db->get('manage_student_enrollment');
		$this->load->view('lemployee/header',$data);
		$this->load->view('lemployee/menu_sidebar',$data);
		$this->load->view('lemployee/classroom/view_classlist',$data);
		$this->load->view('lemployee/footer');
	}
	}
	public function load_classroom_form()
	{
    if($this->lemployee_model->checkemployee_auth())
		{
		$id=$this->uri->segment(3);	
		$data['id']=$id;
		$this->load->view('lemployee/classroom/load_classroom_form',$data);
	}
	}
	public function attendence()
	{
    if($this->lemployee_model->checkemployee_auth())
		{
		$this->db->where('employee_id',$this->session->userdata('employee_id'));
		$data['user_detail']=$this->db->get('manage_employee');
		$data['school_profile']=$this->db->get('school_settings');
		$data['manage_student_enrollment']=$this->db->get('manage_student_enrollment');
		$this->load->view('lemployee/header',$data);
		$this->load->view('lemployee/menu_sidebar',$data);
		$this->load->view('lemployee/classroom/attendence',$data);
		$this->load->view('lemployee/footer');
	}
	}public function new_classes()
	{
    if($this->lemployee_model->checkemployee_auth())
		{
		$this->db->where('employee_id',$this->session->userdata('employee_id'));
		$data['user_detail']=$this->db->get('manage_employee');
		$data['school_profile']=$this->db->get('school_settings');
		$data['manage_student_enrollment']=$this->db->get('manage_student_enrollment');
		$this->load->view('lemployee/header',$data);
		$this->load->view('lemployee/menu_sidebar',$data);
		$this->load->view('lemployee/classroom/new_classes',$data);
		$this->load->view('lemployee/footer');
	}
	}
	
}








