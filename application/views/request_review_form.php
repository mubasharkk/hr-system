<?php print form_open(NULL, array(), $hidden); ?>
<div class="container theme-showcase" role="main">

    <div class="row">

        <h2>
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            Review Request for ID (# <?php print $req->req_id;?>)
        </h2>

        <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <div class="col-md-6">
            <?php echo form_fieldset('Employee Information'); ?>
            <div class="form-group">
                <?php print form_label('Fullname'); ?>
                <?php print form_input('display_name', $req->display_name, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. Muhmmad Amin Khan')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('CNIC Number'); ?>
                <?php print form_input('cnic_number', $req->cnic_number, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Date of Birth'); ?>
                <?php print form_input('dob', $req->dob, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Office Location'); ?>
                <?php print form_dropdown('office_loc', Requests::$officeLoc, array($req->office_id), array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Employee Type'); ?>
                <?php print form_dropdown('employee_type', Requests::$empType, array($req->user_type), array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Manager Name'); ?>
                <?php print form_input('manager_name', $req->manager_name, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. Dr. M. Amin Khan')); ?>
            </div>

            <?php echo form_fieldset_close(); ?>

        </div>
        <div class="col-md-6">

            <?php echo form_fieldset('Contact Information'); ?>

            <div class="form-group">
                <?php print form_label('Phone (Landline)'); ?>
                <?php print form_input('phone', $req->landline, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 02134014743(9876)')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Phone (Mobile) (Optional)'); ?>
                <?php print form_input('phone_mobile', $req->mobile_phone, array('class' => 'form-control', 'placeholder' => 'e.g. 03002294117')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Email (optional)'); ?>
                <?php print form_input('mail', $req->mail, array('class' => 'form-control', 'placeholder' => 'e.g. demo@demo.com')); ?>
            </div>

            <?php echo form_fieldset_close(); ?>
        </div>

        <div class="form-group">
            <?php print form_submit('submit', 'Send Request', 'class="btn-success btn-lg btn pull-right"'); ?>
        </div>

    </div> <!-- /container -->

</div>
<?php print form_close(); ?>
