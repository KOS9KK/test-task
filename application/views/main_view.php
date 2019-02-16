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

        <tr>
            <td>1</td>
            <td><input type="checkbox" /></td>
            <td>Ivan</td>
            <td>hm2@gmail.com</td>
            <td>kkdsngk ksdngs kn ksng ksdng kksng ksngks ngks ksn gksg ksdgksn ks skdgn skdgn skgn </td>
        </tr>
        <tr>
            <td>2</td>
            <td><input type="checkbox" /></td>
            <td>Vova</td>
            <td>hm3@gmail.com</td>
            <td>hutky4utki 34khy34ut  yhtj4uytku3lit4 k,jyrki3iyt  litfkuerytf kefhtek mk</td>
        </tr>

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