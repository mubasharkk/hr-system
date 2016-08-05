<div class="container theme-showcase" role="main">

    <div class="row">
        
        <h2 class="text-center">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <?php print !empty($user->display_name) ? "Edit {$user->display_name}" : 'Add new user';?>
        </h2>
        <hr/>
        <div class="col-md-6 col-md-offset-3">
            <?php print form_open(NULL, array(), $hidden);?>
            
            <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
            
            <div class="form-group">
                <?php print form_label('Display Name');?>
                <?php print form_input('display_name', $user->display_name, array('class' => 'form-control', 'required' => 1));?>
            </div>
            
            <div class="form-group">
                <?php print form_label('Username');?>
                <?php print form_input('username', $user->username, array('class' => 'form-control', 'required' => 1));?>
            </div>
            
            <div class="form-group">
                <?php print form_label('Email');?>
                <?php print form_input('mail', $user->mail, array('class' => 'form-control', 'required' => 1));?>
            </div>
            
            <div class="form-group">
                <?php print form_label('Password');?>
                <?php print form_password('password', NULL, array('class' => 'form-control', 'required' => 1));?>
            </div>
            
            <div class="form-group">
                <?php print form_label('Confirm Password');?>
                <?php print form_password('passconf', NULL, array('class' => 'form-control', 'required' => 1));?>
            </div>
            
            <div class="form-group">
                <?php print form_label('User Role');?>
                <?php print form_multiselect('user_roles[]', Users::$roles,  $user->user_roles, array('class' => 'form-control', 'required' => 1));?>
            </div>
            
            <div class="form-group">
                <?php print form_submit('submit','Save', 'class="btn-success btn btn-block"');?>
            </div>
            
            <?php print form_close();?>
        </div>
    </div> <!-- /container -->

