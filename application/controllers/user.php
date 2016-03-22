<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function index()
	{
		$data['title'] = 'HomePage';
		$this->load->view('templates/Header', $data);
		$this->load->view('main_nav');
		$this->load->view('userlogin/login');
		$this->load->view('templates/Footer');
	}
	public function login(){
		$data['title'] = 'HomePage';
		$this->load->view('templates/Header', $data);
		$this->load->view('main_nav');
		$this->load->view('userlogin/login');
		$this->load->view('templates/Footer');
	}
	public function register(){
		$data['title'] = 'Register';
		$this->load->view('templates/Header', $data);
		$this->load->view('userlogin/registro');
		$this->load->view('templates/Footer');

	}

	//first method to insert user
	public function insert(){


			$pas = $this->input->post('npassword'); 
			$email = $this->input->post('ncorreo');
			
			$encrip = md5($pas);
			$randcode = rand(1000,9000);
   			$data  = array(

   				'name' => $this->input->post('nname') , 
				'user' => $this->input->post('nusername') , 
				'password' =>  $encrip,
				'estado' => 0 , 
				'code' => $randcode,
				'email' => $email,
				);
   		
			$this->load->model('model_user','user');
			$check_user = $this->user->insersion($data);

			if (!empty($check_user)){
					
					$data = array('is_logued_in' => TRUE,
						'user_id' => $check_user->id,
						'username' => $check_user->name,
						'email' => $check_user->email,
						'code' => $check_user->code
						);
					$this->session->set_userdata($data);
					
			}else{
				redirect(base_url()."user/register");
			}
			
		$urln = base_url()."user/sendemail/?code=$randcode";
		
		redirect($urln);
		
	}

	public function authenticate(){

		$this->load->model('model_user', 'user');
		$user =$this->input->post('nusername');
    	$pass = $this->input->post('npassword'); 
		$encrip = md5($pass);
		$data['user'] = $this->user->getUser($user,$encrip);
		$user = $data['user'];
		
		
	
		if (!empty($user)){
			if ($user->estado == 1) {
				
				$data['id']=$user->id;
				$data['title'] = "Main Page";
				$this->load->model('model_email','email');
				$pendiente = "Pendiente";
				$id = $user->id;
				$emails= $this->email->getAllBySalida($id,$pendiente);
				$data['emails'] = $emails;
				$enviado ="Enviado";
				$emaile = $this->email->getAllByEnviado($id,$enviado);
				$data['emaile'] = $emaile;
				
				$check_user = $this->user->getSession($id);

			if (!empty($check_user)){
					
					$session_data = array('is_loged' => TRUE,
						'user_id' => $check_user->id,
						'username' => $check_user->name,
						'email' => $check_user->email,
						);
					$this->session->set_userdata('logged_in', $session_data);
					
					
			}
				
				$this->load->view('templates/Header', $data);
				$this->load->view('correo_nav');
         		$this->load->view('vcorreos', $data);
         		$this->load->view('templates/Footer');


				
         	}else{
         		$urln = base_url()."user/login";
			redirect($urln);
         	}
		}else{
				$urln = base_url()."user/login";
			redirect($urln);
		 		
		}
		
		
		}
	public function verify(){
		$code = $_REQUEST['code'];
		$id = $_REQUEST['id'];
		$this->load->model('model_user','user');
		$this->user->checking($code,$id);
		$urln = base_url()."user/login";
		redirect($urln);
	}
	
	public function sendemail(){
		//method to send the email to verify the new user's register

		include("class.phpmailer.php");
		include("class.smtp.php"); 
		$mail = new PHPMailer();

//Then you have to Start Validation SMTP :
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl"; 
		$mail->Host = "smtp.hotmail.com"; // SMTP to use, be specific: smtp.elserver.com
		$mail->Username = "illidankj@hotmail.com"; 
		$mail->Password = "illidan123"; 
		$mail->Port = 465; 


		$email = $this->session->userdata('email');
		

		$mail->From = $email; 
		$mail->FromName = "Name";
		$mail->Subject = "Notification";
		$mail->AltBody = "Hello";  
		

		$code = $this->session->userdata('code');
		$id = $this->session->userdata('user_id');
		$link = base_url()."user/verify/?code=$code&id=$id";
		
		$mail->MsgHTML("<p>Click to check your account</p><a href=$link>Check Account</a>"); 
		
		$mail->AddAddress($email); 
		$mail->IsHTML(true); 
		
		
		$exito = $mail->Send(); // send email

		$this->session->unset_userdata('data');

		if($exito){
			
			$urln = base_url()."user/login";
			
			redirect($urln);
		}else{
			echo "There was a drawback . Contact an administrator";
		}
		$urln = base_url()."user/vcorreos";
		redirect($urln);	
	}
	public  function logout()
	{
		$this->session->unset_userdata('data');
		$this->session->sess_destroy();
		return redirect('user/login');

	}
	
}

