<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	public function new() 
	{
		$data['title'] = 'New Message Page';
		$this->load->view('templates/Header', $data);
		$this->load->view('correo_nav');
		$this->load->view('new');
		$this->load->view('templates/Footer');
	}

	public function insert()
	{
		$this->load->model('model_email','email');
		$email = $this->input->post('nemail'); 
		$asunto = $this->input->post('nasunto');
		$mensaje = $this->input->post('nmensaje');

		$session =  $this->session->userdata['logged_in'];

			
		if($session["is_loged"] == true){

			$id = $session['user_id'];

			$data  = array(
				'destinatario' =>  $email,
				'iduser' => $id , 
				'mensaje' => $mensaje,
				'asunto' => $asunto,
				'estado' => 'Pendiente',
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

	public function editar(){
		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){
		$id = $session['user_id'];
		$cid = $_REQUEST['cid'];
		$this->load->model('model_email','email');
		$correos = $this->email->getEmailId($cid,$id);
		$data['email'] = $correos;
		
			if (!empty($data['email'])) {
				$data['title'] = 'Edit Message Page';
				$this->load->view('templates/Header', $data);
				$this->load->view('correo_nav');
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
		$asunto = $this->input->post('nasunto');
		$mensaje = $this->input->post('nmensaje');
		$session =  $this->session->userdata['logged_in'];


		if($session["is_loged"] == true){
		$id = $session['user_id'];	

   			$data  = array(
				
				'destinatario' =>  $email, 
				'mensaje' => $mensaje,
				'asunto' => $asunto,
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

	public function eliminar(){
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
				$pendiente = "Pendiente";
				
				$emails= $this->email->getAllBySalida($id,$pendiente);
				$data['emails'] = $emails;
				$enviado ="Enviado";
				$emaile = $this->email->getAllByEnviado($id,$enviado);
				$data['emaile'] = $emaile;
				
				
				$this->load->view('templates/Header', $data);
				$this->load->view('correo_nav');
         		$this->load->view('vcorreos', $data);
         		$this->load->view('templates/Footer');
         	}else{
         		$urln = base_url()."user/login";
			redirect($urln);
         	}

	}
}


