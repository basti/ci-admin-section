<?php
class Admin extends Controller {
  function Admin()
  {
    parent::Controller();   
    $this->load->database();
    $this->load->helper(array('url', 'form', 'date'));
    $this->load->library(array('form_validation', 'upload', 'Erkanaauth', 'session'));
  }

  function index()
  {
    // call authorize in any function you want to protect 
    $this->authorize();
    echo "Do something useful... For now just display logout link: ";
    echo anchor('admin/logout', "Logout");
  }

  function login()
  {
    $username = $this->input->post('username', true);
    $password = $this->input->post('password', true);
    if($username || $password)
    {
      if($this->erkanaauth->try_login(array('username' => $username, 'password' => $password)))
        redirect('admin');
    }
    
    $this->load->view('admin_login');
  }

  function logout()
  {
    $this->erkanaauth->logout();
    redirect('admin');
  }
  
  private
  function authorize()
  {
    if($this->erkanaauth->try_session_login())
        return true;
  
    redirect('admin/login');
  }
}
?>