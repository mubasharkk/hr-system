
<div class="container theme-showcase" role="main">

    <div class="row">
        
        <h2><span class="glyphicon glyphicon-list" aria-hidden="true"></span> All Users List</h2>
        <hr/>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?php print $u->uid; ?></td>
                            <td><?php print $u->display_name; ?></td>
                            <td><?php print $u->username; ?></td>
                            <td><?php print $u->mail; ?></td>
                            <td><?php print implode('<br/>',Users::displayRoles($u->user_roles)); ?></td>
                            <td><?php print $u->created_at; ?></td>
                            <td>                               
                                <?php print anchor("user/edit/{$u->uid}",'Edit User', array('class' => 'btn btn-success btn-xs'));?>
                                &nbsp;
                                |
                                &nbsp;
                                <?php print anchor("user/delete/{$u->uid}",'Delete User', array('class' => 'btn btn-danger btn-xs'));?>                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

</div>