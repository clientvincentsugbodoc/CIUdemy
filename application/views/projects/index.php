<p class="bg-success">
    <?php if($this->session->flashdata('project_created')): ?>
        <?php echo $this->session->flashdata('project_created'); ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('project_deleted')): ?>
        <?php echo $this->session->flashdata('project_deleted'); ?>
    <?php endif; ?>
</p>


<div class="container">
    <div class="row">
        <div class="col">
            <h1> Projects </h2>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary" href="<?php echo base_url();?>projects/create/">
                    Create Project
            </a>
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