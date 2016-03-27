<?php
 class sent extends CI_Controller {

   public function __construct(){
       parent::__construct();
       $this->load->model('model_email');
        $this->load->library('session');
   }
   

 function send()
 {

   $data = $this->model_email->getEmails();
   
     include("class.phpmailer.php");
    include("class.smtp.php"); 
foreach ($data as $valor) {

    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.mandrillapp.com',
  'smtp_port' => 587,
  'smtp_user' => 'freivin12@gmail.com', // change it to yours
  'smtp_pass' => 'NlXJVAqPJPDrEYj-e-jgjQ', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('kstryper@gmail.com'); // change it to yours
      $this->email->to($valor['addressee']);
      //$mail->AddAddress($row['email'], $row['name']);// change it to yours
      $this->email->subject($valor['subject']);
      $this->email->message($valor['message']);
      if($this->email->send())
     {
      $this->model_email->update_emailStatus($valor['id']);
    
     }
     else
    {
     show_error($this->email->print_debugger());
    }


        $urln = base_url()."email/view";
      redirect($urln);
        $this->email->insert($data);
      
        
 }
    
}

}

