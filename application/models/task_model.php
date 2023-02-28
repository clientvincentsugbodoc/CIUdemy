<?php

    class Task_model extends CI_Model
    {
        public function get_task($id)
        {
            $this->db->where('id', $id);
            $result = $this->db->get('tasks');
            
            return $result->row();
        }

        public function create_task($data)
        {
            $result = $this->db->insert('tasks', $data);

            return $result;
        }
        
        public function get_task_project_id($id)
        {
            $this->db->where('id', $id);
            $result = $this->db->get('tasks');

            return $result->row()->project_id;
        }

        public function get_project_name($project_id)
        {
            $this->db->where('id', $project_id);
            $result = $this->db->get('projects');

            return $result->row()->name;
        }

        public function update_task($id, $data)
        {
            $this->db->where('id', $id);
            $result = $this->db->update('tasks', $data);

            return $result;
        }

        public function delete_task($id)
        {
            $this->db->where('id', $id);
            $result = $this->db->delete('tasks');

            return $result;
        }

        public function complete($id)
        {
            $this->db->set('status', 1);
            $this->db->where('id', $id);
            $result = $this->db->update('tasks');

            return $result;
        }

        public function incomplete($id)
        {
            $this->db->set('status', 0);
            $this->db->where('id', $id);
            $result = $this->db->update('tasks');

            return $result;
        }

        public function get_all_tasks($user_id)
        {
            $this->db->select('
                tasks.id,
                tasks.name,
                tasks.body
            ');
            $this->db->from('tasks');
            $this->db->join('projects', 'projects.id = tasks.project_id');
            $this->db->where('user_id', $user_id);
            $result = $this->db->get();

            return $result->result();
        }
    }

?>