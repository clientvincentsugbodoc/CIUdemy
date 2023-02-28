<p class="bg-success">
    <?php if($this->session->flashdata('project_updated')): ?>
        <?php echo $this->session->flashdata('project_updated'); ?>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('task_created')): ?>
        <?php echo $this->session->flashdata('task_created'); ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('task_updated')): ?>
        <?php echo $this->session->flashdata('task_updated'); ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('task_deleted')): ?>
        <?php echo $this->session->flashdata('task_deleted'); ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('task_completed')): ?>
        <?php echo $this->session->flashdata('task_completed'); ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('task_incomplete')): ?>
        <?php echo $this->session->flashdata('task_incomplete'); ?>
    <?php endif; ?>
</p>

<div class="row d-flex justify-content-between">
    <div class="col">
        <h1> <?php echo $project_data->name; ?> </h1>
        <p> Date Created: <?php echo $project_data->date_created; ?> </p>

        <h3> Description </h3>
        <p> <?php echo $project_data->body; ?> </p>
    </div>
    <div class="col-2 float-right">
        <ul class="list-group">
            <h5> Project Actions </h5>
            <li class="list-group-item">
                <a href="<?php echo base_url(); ?>tasks/create/<?php echo $project_data->id; ?>">
                    Create Task
                </a>
            </li>
            <li class="list-group-item">
                <a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id; ?>">
                    Edit Project
                </a>
            </li>
            <li class="list-group-item">
                <a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id; ?>">
                    Delete Project
                </a>
            </li>
        </ul>
    </div>
</div>

<h4> Active Tasks </h4>

<?php if($active_tasks): ?>
<div class="row">
    <div class="col">
        <ul class="list-group">    
            <?php foreach($active_tasks as $task): ?>
            <li class="list-group-item">
                <strong> 
                    <a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id; ?>">
                        <?php echo $task->name; ?>
                    </a> 
                </strong>
                <p>
                    <?php echo $task->body; ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php else: ?>
    <p> No pending tasks. </p>
<?php endif; ?>

<h4> Completed Tasks </h4>

<?php if($completed_tasks): ?>
<div class="row">
    <div class="col">
        <ul class="list-group">    
            <?php foreach($completed_tasks as $task): ?>
            <li class="list-group-item">
                <strong> 
                    <a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id; ?>">
                        <?php echo $task->name; ?>
                    </a> 
                </strong>
                <p>
                    <?php echo $task->body; ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php else: ?>
    <p> No pending tasks. </p>
<?php endif; ?>