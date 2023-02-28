<p class="bg-success">
    <?php if($this->session->flashdata('logged_in')): ?>
        <?php echo $this->session->flashdata('logged_in'); ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo $this->session->flashdata('user_registered'); ?>
    <?php endif; ?>
</p>
<p class="bg-danger">
    <?php if($this->session->flashdata('no_access')): ?>
        <?php echo $this->session->flashdata('no_access'); ?>
    <?php endif; ?>
</p>

<?php if($this->session->userdata('logged_in')): ?>
    <div class="bg-secondary border border-light border-2 text-center rounded p-5">
        <h2> Welcome to the CI </h2>
    </div>
<?php endif; ?>

<?php if(isset($projects)): ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <h2> Projects </h2>
            </div>
        </div>
        <div class="row row-cols-2">
            <?php foreach($projects as $project): ?>
                <div class="col">
                    <div class="card bg-transparent border border-light" style="width: 18rem;">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title"><?php echo $project->name; ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $project->body; ?></p>
                            <a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>" class="card-link float-end">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php if(isset($tasks)): ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <h3> Tasks </h3>
                <div class="accordion" id="accordionFlushExample">
                    <?php foreach($tasks as $task): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <?php echo $task->name; ?>
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php echo $task->body; ?>
                                    <a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id; ?>">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>