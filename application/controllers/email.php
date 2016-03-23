<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	public function new() 
	{
		$data['title'] = 'New Message Page';
		$this->load->view('templates/Header', $data);
		$this->load->view('email_nav');
		$this->load->view('new');
		$this->load->view('templates/Footer');
	}

	public function insert()
	{
		$this->load->model('model_email','email');
		$email = $this->input->post('nemail'); 
		$subject = $this->input->post('nsubject');
		$message = $this->input->post('nmessage');

		$session =  $this->session->userdata['logged_in'];

		
		if($session["is_loged"] == true){

			$id = $session['user_id'];

			$data  = array(
				'addressee' =>  $email,
				'iduser' => $id , 
				'message' => $message,
				'subject' => $subject,
				'estado' => 'pending',
				);
			
			$this->email->insert($data);
			$urln = base_url()."email/view/";
			redirect($urln);
		}
		
		else{
			$urln = base_url()."user/login";
			redirect($urln);

		}
	}

	public function edit(){
		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){
			$id = $session['user_id'];
			$cid = $_REQUEST['cid'];
			$this->load->model('model_email','email');
			$emails = $this->email->getEmailId($cid,$id);
			$data['email'] = $emails;
			
			if (!empty($data['email'])) {
				$data['title'] = 'Edit Message Page';
				$this->load->view('templates/Header', $data);
				$this->load->view('email_nav');
				$this->load->view('edit',$data);
				$this->load->view('templates/Footer');
			}else{
				$urln = base_url()."email/view";
				redirect($urln);
			}
			
		}else{

			$urln = base_url()."user/login";
			redirect($urln);
		}
	} 

	public function update(){
		$email = $this->input->post('nemail'); 
		$subject = $this->input->post('nsubject');
		$message = $this->input->post('nmessage');
		$session =  $this->session->userdata['logged_in'];


		if($session["is_loged"] == true){
			$id = $session['user_id'];	

			$data  = array(
				
				'addressee' =>  $email, 
				'message' => $message,
				'subject' => $subject,
				);

			$idc = $_REQUEST['cid'];
			
			
			$this->load->model('model_email','email');
			$this->email->update($idc,$data);
			
			$urln = base_url()."email/view";
			redirect($urln);
		}
		else{

			$urln = base_url()."user/login";
			redirect($urln);
		}
	}

	public function delete(){
		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){
			$id = $session['user_id'];
			$cid = $_REQUEST['cid'];

			$this->load->model('model_email','email');
			$v = $this->email->delete($cid,$id);
			if ($v == 1) {
				$urln = base_url()."email/view/";
				redirect($urln);
			}else{
				$urln = base_url()."email/view/";
				redirect($urln);
			}
			
			
		}else{
			$urln = base_url()."user/login";
			redirect($urln);
		}
	}

	public function view(){
		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){

			$this->load->model('model_email','email');
			$id = $session['user_id'];	
			$data['title'] = "Main Page";
			$pending = "pending";
			
			$emails= $this->email->getAllByOutput($id,$pending);
			$data['emails'] = $emails;
			$sent ="sent";
			$emaile = $this->email->getAllBySent($id,$sent);
			$data['emaile'] = $emaile;
			
			
			$this->load->view('templates/Header', $data);
			$this->load->view('email_nav');
			$this->load->view('vemail', $data);
			$this->load->view('templates/Footer');
		}else{
			$urln = base_url()."user/login";
			redirect($urln);
		}

	}
}

