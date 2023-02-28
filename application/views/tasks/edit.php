<h2> <?php echo $project_name; ?> Edit Task </h2>

<?php 
    $attributes = array(
        'id' => 'create_project_form',
        'class' => 'form_horizontal'
    ); 
?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('tasks/edit/' . $task->id, $attributes);?>

<?php
    $data = array(
        'type' => 'hidden',
        'name' => 'project_id',
        'value' => $task->project_id
    );
?>
<?php echo form_input($data); ?>
<div class="form-group">
    <?php echo form_label('Name'); ?>

    <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'task_name',
            'placeholder' => 'Task Name',
            'value' => $task->name
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
            'placeholder' => 'Task Body',
            'value' => $task->body
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
            'placeholder' => 'Task Due Date',
            'value' => $task->due_date
        );
    ?>

    <?php echo form_input($data); ?>
</div>

<div class="form-group">
    <?php
        $data = array(
            'class' => 'btn btn-primary',
            'type' => 'submit',
            'value' => 'Update'
        );
    ?>

    <?php echo form_submit($data); ?>
</div>

<?php echo form_close();?>