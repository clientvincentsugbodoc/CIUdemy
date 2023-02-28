<?php
    $active = array('home' => '', 'project' => '', 'register' => '');

    if(empty($this->uri->segment(1)) || $this->uri->segment(1) == 'home')
        $active['home'] = 'active';
    else if($this->uri->segment(1) == 'projects')
        $active['project'] = 'active';
    else if($this->uri->segment(1) == 'users' && $this->uri->segment(2) == 'register')
        $active['register'] = 'active';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Main </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">CI Udemy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active['home']; ?>" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <?php if($this->session->userdata('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active['project']; ?>" aria-current="page" href="<?php echo base_url(); ?>projects/">Projects</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active['register']; ?>" aria-current="page" href="<?php echo base_url(); ?>users/register">Register</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php if($this->session->userdata('logged_in')): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item text-light fw-bold me-3">
                            <?php echo $this->session->userdata('username'); ?>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>users/logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <?php $this->load->view('users/login_view'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col text-light" <?php if($this->session->userdata('logged_in')): ?> style="background-image: url('https://images.pexels.com/photos/1567069/pexels-photo-1567069.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" <?php endif; ?>>
                    <?php $this->load->view($main_view); ?>
                </div>
            </div>
        </div>
    </body>
</html>