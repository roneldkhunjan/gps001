<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class change_password extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		session_start();
		$un = $this->session->userdata('username');

		  if($un==NULL)
         {
              redirect('adminlogin');

         }
	}
	public function index()
	{
	$email=$this->session->userdata('username');
	$uq=mysql_query("select * from admin_data where email_id='$email'");
	$ruq=mysql_fetch_array($uq);
	$data['pwd']=$ruq['password'];
		$this->load->view('admin/change_password',$data);
	}
	
	public function changed()
	{
		$email=$this->session->userdata('username');
	$pwdd=(isset($_POST['pwd']))?$_POST['pwd']:'';
	$uq=mysql_query("update admin_data set password='$pwdd' where email_id='$email'");
	if($uq!=FALSE)
		{
		$data['msg1']="Password Changed Successfully";
		}
		else
		{
		$data['msg2']="Couldnot Change the Password";
		}
		$data['pwd']=$pwdd;
		$this->load->view('admin/change_password',$data);
	}
	
}