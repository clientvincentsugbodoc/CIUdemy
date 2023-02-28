<?php

    class Tasks extends CI_Controller
    {
        public function display($task_id)
        {
            $data['task'] = $this->task_model->get_task($task_id);

            $data['project'] = [
                'id' => $this->task_model->get_task_project_id($task_id),
                'name' => $this->task_model->get_project_name($data['task']->project_id)
            ];

            $data['main_view'] = 'tasks/display';

            $this->load->view('layouts/main', $data);
        }

        public function create($project_id)
        {
            $this->form_validation->set_rules('task_name', 'task name', 'trim|required');
            $this->form_validation->set_rules('task_body', 'task body', 'trim|required');
            $this->form_validation->set_rules('task_due', 'task due date', 'trim|required');
            
            if(!$this->form_validation->run())
            {
                $data['main_view'] = 'tasks/create';
                $this->load->view('layouts/main', $data);
            }
            else
            {
                $data = array(
                    'project_id' => $project_id,
                    'name' => $this->input->post('task_name'),
                    'body' => $this->input->post('task_body'),
                    'due_date' => $this->input->post('task_due')
                );

                if($this->task_model->create_task($data))
                {
                    $this->session->set_flashdata('task_created', 'Your task has been created.');

                    redirect('/projects/display/' . $project_id);
                }
            }
        }

        public function edit($task_id)
        {
            $this->form_validation->set_rules('task_name', 'task name', 'trim|required');
            $this->form_validation->set_rules('task_body', 'task body', 'trim|required');
            $this->form_validation->set_rules('task_due', 'task due date', 'trim|required');
            
            if(!$this->form_validation->run())
            {
                $data['project_id'] = $this->task_model->get_task_project_id($task_id);
                $data['project_name'] = $this->task_model->get_project_name($data['project_id']);
                $data['task'] = $this->task_model->get_task($task_id);

                $data['main_view'] = 'tasks/edit';
                $this->load->view('layouts/main', $data);
            }
            else
            {
                $project_id = $this->input->post('project_id');

                $data = array(
                    'project_id' => $project_id,
                    'name' => $this->input->post('task_name'),
                    'body' => $this->input->post('task_body'),
                    'due_date' => $this->input->post('task_due')
                );

                if($this->task_model->update_task($task_id, $data))
                {
                    $this->session->set_flashdata('task_updated', 'Your task has been updated.');

                    redirect('/projects/display/' . $project_id);
                }
            }
        }

        public function delete($task_id)
        {
            $project_id = $this->task_model->get_task_project_id($task_id);
            
            if($this->task_model->delete_task($task_id))
            {

                $this->session->set_flashdata('task_deleted', 'Your task has been deleted.');

                redirect('/projects/display/' . $project_id);
            }
        }

        public function complete($task_id)
        {
            $project_id = $this->task_model->get_task_project_id($task_id);
            
            if($this->task_model->complete($task_id))
            {
                $this->session->set_flashdata('task_completed', 'This task has been completed.');

                redirect('projects/display/' . $project_id);
            }
        }

        public function incomplete($task_id)
        {
            $project_id = $this->task_model->get_task_project_id($task_id);
            
            if($this->task_model->incomplete($task_id))
            {
                $this->session->set_flashdata('task_incomplete', 'This task has not been completed.');

                redirect('projects/display/' . $project_id);
            }
        }
    }

?>