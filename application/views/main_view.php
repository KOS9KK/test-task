<h1>Task list</h1>

<table class="tasks">

    <thead>
        <tr>
            <td>ID</td>
            <td>Complete</td>
            <td>Name</td>
            <td>Email</td>
            <td>Text</td>
        </tr>
    </thead>

    <tbody>

        <?php if( count( $data['tasks'] ) > 0 ) : ?>
            <?php foreach( $data['tasks'] as $task ) : ?>

                <?php $checked = ( $task->status == 1 ) ? 'checked' : ''; ?>

                <tr>
                    <td><?php echo $task->id ?></td>
                    <td><input type="checkbox" <?php echo $checked; ?> /></td>
                    <td><?php echo $task->name ?></td>
                    <td><?php echo $task->email ?></td>
                    <td><?php echo $task->text ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </tbody>

</table>

<div class="container add_task_block">

    <h1>Add new task:</h1>

    <form action="/task/add_task" method="POST">

        <input type="text" name="name"  value="<?php echo get_value( $_POST, 'name' ); ?>"  placeholder="User Name" />
        <input type="text" name="email" value="<?php echo get_value( $_POST, 'email' ); ?>" placeholder="User Email" />
        <input type="text" name="text"  value="<?php echo get_value( $_POST, 'text' ); ?>"  placeholder="Task Text" />

        <input type="submit"   value="Add Task" />

        <?php echo show_error( $data, 'error_task' ); ?>

    </form>

</div>