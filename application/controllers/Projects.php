<?php

    class Projects extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            if(!$this->session->userdata('logged_in'))
            {
                $this->session->set_flashdata('no_access', 'Sorry, you are not allowed or logged in.');

                redirect('home/index');
            }
        }

        public function index()
        {
            $data['projects'] = $this->project_model->get_projects();

            $data['main_view'] = 'projects/index';

            $this->load->view('layouts/main', $data);
        }

        public function display($project_id)
        {
            $data['project_data'] = $this->project_model->get_project($project_id);
            $data['active_tasks'] = $this->project_model->get_tasks($project_id, true);
            $data['completed_tasks'] = $this->project_model->get_tasks($project_id, false);

            $data['main_view'] = 'projects/display';

            $this->load->view('layouts/main', $data);
        }

        public function create()
        {
            $this->form_validation->set_rules('project_name', 'project name', 'trim|required');
            $this->form_validation->set_rules('project_body', 'project body', 'trim|required');
            
            if(!$this->form_validation->run())
            {
                $data['main_view'] = 'projects/create';
                $this->load->view('layouts/main', $data);
            }
            else
            {
                $data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'name' => $this->input->post('project_name'),
                    'body' => $this->input->post('project_body')
                );

                if($this->project_model->create_project($data))
                {
                    $this->session->set_flashdata('project_created', 'Your project has been created.');

                    redirect('/projects/index');
                }
            }
        }

        public function edit($project_id)
        {
            $this->form_validation->set_rules('project_name', 'project name', 'trim|required');
            $this->form_validation->set_rules('project_body', 'project body', 'trim|required');
            
            if(!$this->form_validation->run())
            {
                $data['project_data'] = $this->project_model->get_project($project_id);

                $data['main_view'] = 'projects/edit';
                $this->load->view('layouts/main', $data);
            }
            else
            {
                $data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'name' => $this->input->post('project_name'),
                    'body' => $this->input->post('project_body')
                );

                if($this->project_model->update_project($project_id, $data))
                {
                    $this->session->set_flashdata('project_updated', 'Your project has been updated.');

                    redirect('/projects/display/' . $project_id);
                }
            }
        }

        public function delete($project_id)
        {
            if($this->project_model->delete_project($project_id) && $this->project_model->delete_tasks($project_id))
            {
                $this->session->set_flashdata('project_deleted', 'Your project has been deleted.');

                redirect('/projects/index');
            }
        }
    }

?>