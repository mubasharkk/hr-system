<?php print form_open(); ?>
<div class="container theme-showcase" role="main">

    <div class="row">

        <h2 class="text-center">
            HR System Login
        </h2>
        <hr/>
        <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <div class="col-md-4 col-md-offset-4">
            <div class="form-group">
                <?php print form_label('Userame'); ?>
                <?php print form_input('username', NULL, array('class' => 'form-control', 'required' => 1)); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Password'); ?>
                <?php print form_password('password', NULL, array('class' => 'form-control', 'required' => 1)); ?>
            </div>
            <div class="form-group">
                <?php print form_submit('submit', 'Login', 'class="btn-success btn-lg btn btn-block"'); ?>
            </div>
            
        </div>

    </div> <!-- /container -->

</div>
<?php print form_close(); ?>
