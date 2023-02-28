<h2> Create Project </h2>

<?php 
    $attributes = array(
        'id' => 'create_project_form',
        'class' => 'form_horizontal'
    ); 
?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('projects/create/', $attributes);?>

<div class="form-group">
    <?php echo form_label('Name'); ?>

    <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'project_name',
            'placeholder' => 'Project Name'
        );
    ?>

    <?php echo form_input($data); ?>
</div>

<div class="form-group">
    <?php echo form_label('Body'); ?>

    <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'project_body',
            'placeholder' => 'Project Body'
        );
    ?>

    <?php echo form_textarea($data); ?>
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