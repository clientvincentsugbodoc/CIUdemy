<div class="text-dark text-center">
    <h2> Register </h2>

    <?php 
        $attributes = array(
            'id' => 'register_form',
            'class' => 'form_horizontal'
        ); 
    ?>

    <?php echo validation_errors("<p class='bg-danger'>"); ?>

    <?php echo form_open('users/register', $attributes);?>

    <div class="form-group">
        <?php echo form_label('First Name'); ?>

        <?php
            $data = array(
                'class' => 'form-control',
                'name' => 'fname',
                'placeholder' => 'First Name',
                'value' => set_value('fname')
            );
        ?>

        <?php echo form_input($data); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Last Name'); ?>

        <?php
            $data = array(
                'class' => 'form-control',
                'name' => 'lname',
                'placeholder' => 'Last Name',
                'value' => set_value('lname')
            );
        ?>

        <?php echo form_input($data); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Email'); ?>

        <?php
            $data = array(
                'class' => 'form-control',
                'name' => 'email',
                'placeholder' => 'Email',
                'value' => set_value('email')
            );
        ?>

        <?php echo form_input($data); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Username'); ?>

        <?php
            $data = array(
                'class' => 'form-control',
                'name' => 'username',
                'placeholder' => 'Username',
                'value' => set_value('username')
            );
        ?>

        <?php echo form_input($data); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Password'); ?>

        <?php
            $data = array(
                'class' => 'form-control',
                'name' => 'password',
                'placeholder' => 'Password'
            );
        ?>

        <?php echo form_password($data); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Confirm Password'); ?>

        <?php
            $data = array(
                'class' => 'form-control',
                'name' => 'confirm_password',
                'placeholder' => 'Confirm Password'
            );
        ?>

        <?php echo form_password($data); ?>
    </div>

    <div class="form-group">
        <?php
            $data = array(
                'class' => 'btn btn-primary',
                'type' => 'submit',
                'value' => 'Register'
            );
        ?>

        <?php echo form_submit($data); ?>
    </div>

    <?php echo form_close();?>
</div>