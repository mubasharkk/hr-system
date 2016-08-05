
<div class="container theme-showcase" role="main">

    <div class="row">
        
        <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Requests List</h2>
        <hr/>        
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>CNIC Number</th>
                        <th>Office Loc.</th>
                        <th>Emp. Type</th>
                        <th>Manager</th>
                        <th>Contact</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $req): ?>
                        <tr>
                            <td><?php print $req->req_id; ?></td>
                            <td><?php print $req->display_name; ?></td>
                            <td><?php print $req->cnic_number; ?></td>
                            <td><?php print $req->office_id; ?></td>
                            <td><?php print $req->user_type; ?></td>
                            <td><?php print $req->manager_name; ?></td>
                            <td>
                                <?php print $req->landline; ?><br/>
                                <?php print $req->mobile_phone; ?><br/>
                                <?php print $req->mail; ?>
                            </td>
                            <td><?php print $req->created_at; ?></td>
                            <td>                               
                                <?php print anchor("request/review/{$req->req_id}",'Review', array('class' => 'btn btn-success btn-xs'));?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

