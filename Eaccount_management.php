<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eaccount_management extends CI_Controller {

	
	// public function add_services()
	// {
    // if($this->lemployee_model->checkemployee_auth())
		// {
		// $this->db->where('employee_id',$this->session->userdata('employee_id'));
		// $data['user_detail']=$this->db->get('manage_employee');
		// $data['school_profile']=$this->db->get('school_settings');
		// $this->load->view('lemployee/header',$data);
		// $this->load->view('lemployee/menu_sidebar');
		// $this->load->view('lemployee/account_management/add_services');
		// $this->load->view('lemployee/footer');
	// }
	// }
	
	public function submit_sevices()
		{
    if($this->lemployee_model->checkemployee_auth())
		{
		$this->Eaccountmanagement_model->submit_sevices();
		echo "0";
		}
		}
			public function manage_staff()
			{
			if($this->lemployee_model->checkemployee_auth())
				{
				$this->db->where('employee_id',$this->session->userdata('employee_id'));
				$data['user_detail']=$this->db->get('manage_employee');
				$data['school_profile']=$this->db->get('school_settings');
				$data['manage_employee']=$this->db->get('manage_employee');
				$this->load->view('lemployee/header',$data);
				$this->load->view('lemployee/menu_sidebar');
				$this->load->view('lemployee/account_management/manage_staff',$data);
				$this->load->view('lemployee/footer');
			}
			}
	
	
			public function add_staff()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$data['master_employee_role']=$this->db->get('master_employee_role');

			$this->load->view('lemployee/account_management/add_staff',$data);
			}
			}
			
			public function submit_add_staff()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_add_staff();
				echo "0";
			}
			}
			
			public function load_staff()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['manage_employee']=$this->db->get('manage_employee');
			$this->load->view('lemployee/account_management/load_staff',$data);
			}
			}
			
			
			public function active_staff()
			{
			$status=$this->uri->segment(3);	
			$id=$this->uri->segment(4);	
			if($status==1)
			{
			$is_active=0;
			}
			else if($status==0)
			{
			$is_active=1;
			}
			 $list=array(
				"is_active"=>$is_active
				);
			$this->db->where('id',$id);
			$this->db->update('manage_employee',$list);
			$this->db->where('id',$id);
			$data['is_active']=$this->db->get('manage_employee');
			$this->load->view('lemployee/account_management/active_staff',$data);
			}
			
			public function delete_employee()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$employee_id=$this->uri->segment(4);
			$this->db->where('id', $id);
			$this->db->where('employee_id', $employee_id);
			$this->db->delete('manage_employee');
			$data['manage_employee']=$this->db->get('manage_employee');
			$this->load->view('lemployee/account_management/load_staff',$data);
			}
			}
			public function load_employee()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['manage_employee']=$this->db->get('manage_employee');
			$this->load->view('lemployee/account_management/load_employee',$data);
			}
			}
			
			
			public function submit_employee_edit()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_employee_edit();
				echo "0";
			}
			}
			
			public function edit_employee()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$employee_id=$this->uri->segment(4);	
			$this->db->where('id',$id);
			$this->db->where('employee_id',$employee_id);
			$data['manage_employee']=$this->db->get('manage_employee');
			$data['master_employee_role']=$this->db->get('master_employee_role');
			$this->load->view('lemployee/account_management/edit_employee',$data);
			}
			}
			
	
			public function fees()
			{
			if($this->lemployee_model->checkemployee_auth())
				{
				$this->db->where('employee_id',$this->session->userdata('employee_id'));
				$data['user_detail']=$this->db->get('manage_employee');
				$data['school_profile']=$this->db->get('school_settings');
				$data['master_fee']=$this->db->get('master_fee');
				$this->load->view('lemployee/header',$data);
				$this->load->view('lemployee/menu_sidebar');
				$this->load->view('lemployee/account_management/fees');
				$this->load->view('lemployee/footer');
			}
			}
			
			public function submit_fees()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_fees();
				echo "0";
			}
			}
			
			
			public function submit_edit_fees()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_edit_fees();
				echo "0";
			}
			}
			
			public function load_fees()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['master_fee']=$this->db->get('master_fee');
			$this->load->view('lemployee/account_management/load_fees',$data);
			}
			}
			public function active_fees()
			{
			$status=$this->uri->segment(3);	
			$id=$this->uri->segment(4);	
			if($status==1)
			{
			$is_active=0;
			}
			else if($status==0)
			{
			$is_active=1;
			}
			 $list=array(
				"is_active"=>$is_active
				);
			$this->db->where('id',$id);
			$this->db->update('master_fee',$list);
			$this->db->where('id',$id);
			$data['is_active']=$this->db->get('master_fee');
			$this->load->view('lemployee/account_management/active_fees',$data);
			}
			
			
			
			public function add_fees()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->load->view('lemployee/account_management/add_fees');
			}
			}
			
			public function delete_fees()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$this->db->where('id',$id);
			$this->db->delete('master_fee');
			$data['master_fee']=$this->db->get('master_fee');
			$this->load->view('lemployee/account_management/load_fees',$data);
			}
			}
			
			public function edit_fees()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$this->db->where('id',$id);
			$data['master_fee']=$this->db->get('master_fee');
			
			$this->load->view('lemployee/account_management/edit_fees',$data);
			}
			}
			
			
			public function manage_location()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$this->db->where('employee_id',$this->session->userdata('employee_id'));
			$data['user_detail']=$this->db->get('manage_employee');
			$data['school_profile']=$this->db->get('school_settings');
			$data['master_location']=$this->db->get('master_location');
			$this->load->view('lemployee/header',$data);
			$this->load->view('lemployee/menu_sidebar');
			$this->load->view('lemployee/account_management/manage_location');
			$this->load->view('lemployee/footer');
			}
			}
			
			public function add_location()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->load->view('lemployee/account_management/add_location');
			}
			}
			
			public function submit_add_location()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_add_location();
				echo "0";
			}
			}
			
			public function load_location()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['master_location']=$this->db->get('master_location');
			$this->load->view('lemployee/account_management/load_location',$data);
			}
			}
	
			public function edit_location()
{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$this->db->where('id',$id);
			$data['master_location']=$this->db->get('master_location');
			
			$this->load->view('lemployee/account_management/edit_location',$data);
			}
			}
			
			public function submit_location_edit()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_location_edit();
				echo "0";
			}
			}
			
			public function delete_location()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$this->db->where('id',$id);
			$this->db->delete('master_location');
			$data['master_location']=$this->db->get('master_location');
			$this->load->view('lemployee/account_management/load_location',$data);
			}
			}
			
			
				public function active_location()
				{
				$status=$this->uri->segment(3);	
				$id=$this->uri->segment(4);	
				if($status==1)
				{
				$is_active=0;
				}
				else if($status==0)
				{
				$is_active=1;
				}
				$list=array(
				"is_active"=>$is_active
				);
				$this->db->where('id',$id);
				$this->db->update('master_location',$list);
				$this->db->where('id',$id);
				$data['is_active']=$this->db->get('master_location');
				$this->load->view('lemployee/account_management/load_location',$data);
				}
			
			public function manage_high_school()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$this->db->where('employee_id',$this->session->userdata('employee_id'));
			$data['user_detail']=$this->db->get('manage_employee');
			$data['school_profile']=$this->db->get('school_settings');
			$data['master_high_school']=$this->db->get('master_high_school');
			$this->load->view('lemployee/header',$data);
			$this->load->view('lemployee/menu_sidebar');
			$this->load->view('lemployee/account_management/manage_high_school',$data);
			$this->load->view('lemployee/footer');
			}
			}
			
			
			public function add_school()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->load->view('lemployee/account_management/add_school');
			}
			}
			
			public function submit_add_school()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_add_school();
				echo "0";
			}
			}
			
			
			
			
			
			public function edit_school()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$this->db->where('id',$id);
			$data['master_high_school']=$this->db->get('master_high_school');
			$this->load->view('lemployee/account_management/edit_school',$data);
			}
			}
			
			
			public function submit_school_edit()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_school_edit();
				echo "0";
			}
			}
			
			
			
			public function load_high_school()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['master_high_school']=$this->db->get('master_high_school');
			$this->load->view('lemployee/account_management/load_high_school',$data);
			}
			}
			
			public function delete_high_school()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$this->db->where('id',$id);
			$this->db->delete('master_high_school');
			$data['master_high_school']=$this->db->get('master_high_school');
			$this->load->view('lemployee/account_management/load_high_school',$data);
			}
			}
			
			public function active_high_school()
			{
			$status=$this->uri->segment(3);	
			$id=$this->uri->segment(4);	
			if($status==1)
			{
			$is_active=0;
			}
			else if($status==0)
			{
			$is_active=1;
			}
			 $list=array(
				"is_active"=>$is_active
				);
			$this->db->where('id',$id);
			$this->db->update('master_high_school',$list);
			$this->db->where('id',$id);
			$data['is_active']=$this->db->get('master_high_school');
			$this->load->view('lemployee/account_management/active_high_school',$data);
			}
			
			
			
			
			public function manage_hear_vehicles()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$this->db->where('employee_id',$this->session->userdata('employee_id'));
			$data['user_detail']=$this->db->get('manage_employee');
			$data['school_profile']=$this->db->get('school_settings');
			$data['master_lead']=$this->db->get('master_lead');
			$this->load->view('lemployee/header',$data);
			$this->load->view('lemployee/menu_sidebar');
			$this->load->view('lemployee/account_management/manage_hear_vehicles',$data);
			$this->load->view('lemployee/footer');
			}
			}
			
			public function add_hear()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->load->view('lemployee/account_management/add_hear');
			}
			}
			
			public function submit_add_hear()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_add_hear();
				echo "0";
			}
			}
			
			
			public function edit_hear()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$this->db->where('id',$id);
			$data['master_lead']=$this->db->get('master_lead');
			$this->load->view('lemployee/account_management/edit_hear',$data);
			}
			}
			
			
			public function submit_edit_hear()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_edit_hear();
				echo "0";
			}
			}
			
			
			
			public function load_hear()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['master_lead']=$this->db->get('master_lead');
			$this->load->view('lemployee/account_management/load_hear',$data);
			}
			}
			
			public function delete_hear()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$this->db->where('id',$id);
			$this->db->delete('master_lead');
			$data['master_lead']=$this->db->get('master_lead');
			$this->load->view('lemployee/account_management/load_hear',$data);
			}
			}
			
			public function active_hear()
			{
			$status=$this->uri->segment(3);	
			$id=$this->uri->segment(4);	
			if($status==1)
			{
			$is_active=0;
			}
			else if($status==0)
			{
			$is_active=1;
			}
			 $list=array(
				"is_active"=>$is_active
				);
			$this->db->where('id',$id);
			$this->db->update('master_lead',$list);
			$this->db->where('id',$id);
			$data['is_active']=$this->db->get('master_lead');
			$this->load->view('lemployee/account_management/active_hear',$data);
			

			}
			
			
			
			public function manage_vehicle_list()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$this->db->where('employee_id',$this->session->userdata('employee_id'));
			$data['user_detail']=$this->db->get('manage_employee');
			$data['school_profile']=$this->db->get('school_settings');
			$data['master_vehicle']=$this->db->get('master_vehicle');
			$this->load->view('lemployee/header',$data);
			$this->load->view('lemployee/menu_sidebar');
			$this->load->view('lemployee/account_management/manage_vehicle_list',$data);
			$this->load->view('lemployee/footer');
			}
			}
			
			public function add_vehicle()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->load->view('lemployee/account_management/add_vehicle');
			}
			}
			
			
			public function submit_vehicle_list()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_vehicle_list();
				echo "0";
			}
			}
			
			
			public function edit_vehicle_list()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$this->db->where('id',$id);
			$data['master_vehicle']=$this->db->get('master_vehicle');
			$this->load->view('lemployee/account_management/edit_vehicle_list',$data);
			}
			}
			
			
			public function submit_edit_vehicle_list()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_edit_vehicle_list();
				echo "0";
			}
			}
			
			
			
			public function load_vehicle_list()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['master_vehicle']=$this->db->get('master_vehicle');
			$this->load->view('lemployee/account_management/load_vehicle_list',$data);
			}
			}
			
			
			
			public function delete_vehicle_list()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$this->db->where('id',$id);
			$this->db->delete('master_vehicle');
			$data['master_vehicle']=$this->db->get('master_vehicle');
			$this->load->view('lemployee/account_management/load_vehicle_list',$data);
			}
			}
			
			
			
			public function manage_services()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$this->db->where('employee_id',$this->session->userdata('employee_id'));
			$data['user_detail']=$this->db->get('manage_employee');
			$data['school_profile']=$this->db->get('school_settings');
			$data['manage_service_package']=$this->db->get('manage_service_package');
			$this->load->view('lemployee/header',$data);
			$this->load->view('lemployee/menu_sidebar');
			$this->load->view('lemployee/account_management/manage_services',$data);
			$this->load->view('lemployee/footer');
			}
			}
			
				public function add_services1()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$data['master_location']=$this->db->get('master_location');
				$count=$this->db->count_all_results('manage_service_package');
				$ncount=$count+1;
				$data['package_id']="ONSP".str_pad($ncount, 3, '0', STR_PAD_LEFT);

			$this->load->view('lemployee/account_management/add_services1',$data);
			}
			}
			
			
			public function submit_add_services1()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_add_services1();
				echo "0";
			}
			}
			
			public function load_services1()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$data['manage_service_package']=$this->db->get('manage_service_package');
			$this->load->view('lemployee/account_management/load_services1',$data);
			}
			}
			
			
			public function delete_services()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);
			$this->db->where('id',$id);
			$this->db->delete('manage_service_package');
			$data['manage_service_package']=$this->db->get('manage_service_package');
			$this->load->view('lemployee/account_management/load_services1',$data);
			}
			}
			
			public function active_services()
			{
			$status=$this->uri->segment(3);	
			$id=$this->uri->segment(4);	
			if($status==1)
			{
			$is_active=0;
			}
			else if($status==0)
			{
			$is_active=1;
			}
			 $list=array(
				"is_active"=>$is_active
				);
			$this->db->where('id',$id);
			$this->db->update('manage_service_package',$list);
			$this->db->where('id',$id);
			$data['is_active']=$this->db->get('manage_service_package');
			$this->load->view('lemployee/account_management/active_services',$data);
			}
			
			
			public function edit_services()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
			$id=$this->uri->segment(3);	
			$this->db->where('id',$id);
			$data['manage_service_package']=$this->db->get('manage_service_package');
			$data['master_location']=$this->db->get('master_location');
			$this->load->view('lemployee/account_management/edit_services',$data);
			}
			}
			
			public function submit_edit_services()
			{
			if($this->lemployee_model->checkemployee_auth())
			{
				$this->Eaccountmanagement_model->submit_edit_services();
				echo "0";
			}
			}
		public function manage_component()
			{
			if($this->lemployee_model->checkemployee_auth())
				{
				$this->db->where('employee_id',$this->session->userdata('employee_id'));
				$data['user_detail']=$this->db->get('manage_employee');
				$data['school_profile']=$this->db->get('school_settings');
				$data['manage_employee']=$this->db->get('manage_employee');
				$this->load->view('lemployee/header',$data);
				$this->load->view('lemployee/menu_sidebar');
				$this->load->view('lemployee/account_management/manage_component',$data);
				$this->load->view('lemployee/footer');
			}
			}public function manage_discount()
			{
			if($this->lemployee_model->checkemployee_auth())
				{
				$this->db->where('employee_id',$this->session->userdata('employee_id'));
				$data['user_detail']=$this->db->get('manage_employee');
				$data['school_profile']=$this->db->get('school_settings');
				$data['manage_employee']=$this->db->get('manage_employee');
				$this->load->view('lemployee/header',$data);
				$this->load->view('lemployee/menu_sidebar');
				$this->load->view('lemployee/account_management/manage_discount',$data);
				$this->load->view('lemployee/footer');
			}
			}
	       public function manage_miscellaneous()
			{
			if($this->lemployee_model->checkemployee_auth())
				{
				$this->db->where('employee_id',$this->session->userdata('employee_id'));
				$data['user_detail']=$this->db->get('manage_employee');
				$data['school_profile']=$this->db->get('school_settings');
				$data['manage_employee']=$this->db->get('manage_employee');
				$this->load->view('lemployee/header',$data);
				$this->load->view('lemployee/menu_sidebar');
				$this->load->view('lemployee/account_management/manage_miscellaneous',$data);
				$this->load->view('lemployee/footer');
			}
			}
           public function manage_filemanagement()
			{
			if($this->lemployee_model->checkemployee_auth())
				{
				$this->db->where('employee_id',$this->session->userdata('employee_id'));
				$data['user_detail']=$this->db->get('manage_employee');
				$data['school_profile']=$this->db->get('school_settings');
				$data['manage_employee']=$this->db->get('manage_employee');
				$this->load->view('lemployee/header',$data);
				$this->load->view('lemployee/menu_sidebar');
				$this->load->view('lemployee/account_management/manage_filemanagement',$data);
				$this->load->view('lemployee/footer');
			}
			}
	
}








