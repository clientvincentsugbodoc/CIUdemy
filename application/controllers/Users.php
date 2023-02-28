<?php

    class Users extends CI_Controller
    {
        public function login()
        {
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|min_length[2]|matches[password]',
                array('matches' => 'The password does not match.')
            );

            if(!$this->form_validation->run())
            {
                $data = array(
                    'errors' => validation_errors() 
                );
                
                $this->session->set_flashdata($data);
                
                redirect('home/');
            }
            else
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $id = $this->user_model->login_user($username, $password);
            
                if($id)
                {
                    $user_data = array(
                        'user_id' => $id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('logged_in', 'You are now logged in.');

                    redirect('home/');
                }
                else
                {
                    $this->session->set_flashdata('login_failed', 'Sorry, you are not logged in.');

                    redirect('home/index/');
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();

            redirect('home/index/');
        }

        public function register()
        {
            $this->form_validation->set_rules('fname', 'first name', 'trim|required');
            $this->form_validation->set_rules('lname', 'last name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|min_length[2]|matches[password]',
                array('matches' => 'The password does not match.')
            );

            if(!$this->form_validation->run())
            {
                $data['main_view'] = 'users/register_view';

                $this->load->view('layouts/main', $data);
            }
            else
            {
                if($this->user_model->create_user())
                {
                    $this->session->set_flashdata('user_registered', 'User has been registered.');

                    redirect('home/index');
                }
            }
        }
    }

?>