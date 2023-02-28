<?php
    
    class User_model extends CI_Model
    {
        public function login_user($username, $password)
        {
            $this->db->where('username', $username);
            $result = $this->db->get('users');

            $db_password = $result->row(0)->password;

            if(password_verify($password, $db_password))
            {
                return $result->row(0)->id;
            }
            else
            {
                return false;
            }
        }

        public function create_user()
        {
            $options = ['cost' => 12];
            $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $encrypted_pass
            );

            $result = $this->db->insert('users', $data);

            return $result;
        }
    }

?>