<div class="container">
    <div class="row">
        <div class="col">
            <h1> <?php echo $task->name; ?> </h1>
            <p> Project: <?php echo $project['name']; ?> </p>
            <p> Date Created: <?php echo $task->date_created; ?> </p>
            <p> Due on: <?php echo $task->due_date; ?> </p>
            <h4> Description </h4>
            <p class="border border-3 border-secondary bg-light text-dark p-3 rounded"> <?php echo $task->body; ?> </p>
        </div>
        <div class="col-2 mt-3">
            <h5> Task Actions </h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>">
                        Edit
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>">
                        Delete
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>tasks/complete/<?php echo $task->id; ?>">
                        Mark Complete
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>tasks/incomplete/<?php echo $task->id; ?>">
                        Mark Incomplete
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>