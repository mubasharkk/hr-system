
<div class="container theme-showcase" role="main">

    <div class="row">
        
        <h2>Requests List</h2>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $req): ?>
                        <tr>
                            <td><?php print $req->uid; ?></td>
                            <td><?php print $req->display_name; ?></td>
                            <td><?php print $req->username; ?></td>
                            <td><?php print $req->mail; ?></td>
                            <td><?php print $req->password; ?></td>
                            <td><?php print $req->created_at; ?></td>
                            <td>                               
                                <?php print anchor("user/edit/{$req->uid}",'Edit User', array('class' => 'btn btn-success btn-xs'));?>
                                &nbsp;
                                |
                                &nbsp;
                                <?php print anchor("user/delete/{$req->uid}",'Delete User', array('class' => 'btn btn-danger btn-xs'));?>                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

