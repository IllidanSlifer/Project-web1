<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to start session in order to access it through CI

Class user extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('appemail');
}

// Show login page
public function index() {
$this->load->database();
$this->load->view('login');
}

// Show registration page
public function user_registration_show() {
$this->load->view('register');
}

// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');	
$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
$this->form_validation->set_rules('estado', 'estado', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
$this->load->view('register');
} else {
$data = array(
'username' => $this->input->post('username'),
'name' => $this->input->post('name'),
'estado' => $this->input->post('estado'),
'email' => $this->input->post('email'),
'password' => $this->input->post('password')
);
$result = $this->appemail->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('register', $data);
}
}
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('main');
}else{
$this->load->view('login');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->appemail->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->appemail->read_user_information($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->username,
'email' => $result[0]->email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('main');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login', $data);
}

}

?>