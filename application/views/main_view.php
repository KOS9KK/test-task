<h1>Task list</h1>

<select>
    <option value=""></option>
    <option value="name"></option>
    <option value="email"></option>
    <option value=""></option>
</select>

<table class="tasks">

    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Text</td>
            <td>Status</td>
        </tr>
    </thead>

    <tbody>

        <?php if( count( $data['tasks'] ) > 0 ) : ?>
            <?php foreach( $data['tasks'] as $task ) : ?>

                <?php $checked = ( $task->status == 1 ) ? 'checked' : ''; ?>

                <tr>

                    <td><?php echo $task->id ?></td>
                    <td><?php echo $task->name ?></td>
                    <td><?php echo $task->email ?></td>

                    <?php if( get_value( $_SESSION, 'user_id', 0 ) > 0 ) : ?>
                        <td>
                            <input class="task_text" type="text" data-id="<?php echo $task->id ?>"
                                   value="<?php echo $task->text ?>" />
                        </td>
                    <?php else : ?>
                        <td><?php echo $task->text ?></td>
                    <?php endif; ?>

                    <?php if( get_value( $_SESSION, 'user_id', 0 ) > 0 ) : ?>
                        <td>
                            <input class="task_status" type="checkbox"
                                   data-id="<?php echo $task->id ?>" <?php echo $checked; ?> />
                        </td>
                    <?php else : ?>
                        <td>
                            <?php echo ( $task->status == 1) ? '+' : '-'; ?>
                        </td>
                    <?php endif; ?>

                </tr>

            <?php endforeach; ?>
        <?php endif; ?>

    </tbody>

</table>

<div class="pagination">

    <?php $page = get_value( $_GET, 'page', 0 ); ?>

    <?php for( $i = 0; $i < ( $data['count'] / 10 ); $i++ ) : ?>

        <?php $active = ( $page == $i ) ? 'active' : ''; ?>

        <a href="<?php echo url(); ?>?page=<?php echo $i; ?>" class="<?php echo $active; ?>"><?php echo $i + 1; ?></a>

    <?php endfor; ?>

</div>

<div class="container add_task_block">

    <h1>Add new task:</h1>

    <form action="<?php echo url(); ?>/task/add_task" method="POST">

        <input type="text" name="name"  value="<?php echo get_value( $_POST, 'name' ); ?>"  placeholder="User Name" />
        <input type="text" name="email" value="<?php echo get_value( $_POST, 'email' ); ?>" placeholder="User Email" />
        <input type="text" name="text"  value="<?php echo get_value( $_POST, 'text' ); ?>"  placeholder="Task Text" />

        <input type="submit"   value="Add Task" />

        <?php echo show_error( $data, 'error_task' ); ?>

    </form>

</div>