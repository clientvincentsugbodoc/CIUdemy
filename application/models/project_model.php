<?php

    class Project_model extends CI_Model
    {
        public function get_all_projects($user_id)
        {
            $this->db->where('user_id', $user_id);
            $result = $this->db->get('projects');

            return $result->result();
        }

        public function get_project($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('projects');

            return $query->row();
        }

        public function get_projects()
        {
            $query = $this->db->get('projects');

            return $query->result();
        }

        public function create_project($data)
        {
            $result = $this->db->insert('projects', $data);

            return $result;
        }

        public function update_project($id, $data)
        {
            $this->db->where('id', $id);
            $result = $this->db->update('projects', $data);

            return $result;
        }

        public function delete_project($id)
        {
            $this->db->where('id', $id);
            $result = $this->db->delete('projects');

            return $result;
        }

        public function get_tasks($id, $active = true)
        {
            $this->db->select('
                tasks.id,
                tasks.name,
                tasks.body
            ');
            $this->db->from('projects');
            $this->db->join('tasks', 'tasks.project_id = projects.id');
            $this->db->where('projects.id', $id);

            if($active)
                $this->db->where('tasks.status', 0);
            else
                $this->db->where('tasks.status', 1);

            $result = $this->db->get();

            if($result->num_rows() < 1)
                return false;

            return $result->result();
        }

        public function delete_tasks($id)
        {
            $this->db->where('project_id', $id);
            $result =   $this->db->delete('tasks');

            return $result;
        }
    }

?>