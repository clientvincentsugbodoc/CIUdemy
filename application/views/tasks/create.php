<h2> Create Task </h2>

<?php 
    $attributes = array(
        'id' => 'create_project_form',
        'class' => 'form_horizontal'
    ); 
?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('tasks/create/' . $this->uri->segment(3), $attributes);?>

<div class="form-group">
    <?php echo form_label('Name'); ?>

    <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'task_name',
            'placeholder' => 'Task Name'
        );
    ?>

    <?php echo form_input($data); ?>
</div>

<div class="form-group">
    <?php echo form_label('Body'); ?>

    <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'task_body',
            'placeholder' => 'Task Body'
        );
    ?>

    <?php echo form_textarea($data); ?>
</div>

<div class="form-group">
    <?php
        $data = array(
            'type' => 'date',
            'class' => 'form-control',
            'name' => 'task_due',
            'placeholder' => 'Task Due Date'
        );
    ?>

    <?php echo form_input($data); ?>
</div>

<div class="form-group">
    <?php
        $data = array(
            'class' => 'btn btn-primary',
            'type' => 'submit',
            'value' => 'Create'
        );
    ?>

    <?php echo form_submit($data); ?>
</div>

<?php echo form_close();?>