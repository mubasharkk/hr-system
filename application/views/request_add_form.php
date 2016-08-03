<div class="container theme-showcase" role="main">

    <div class="row">

        <h2>
            Create new request for ID
        </h2>
        <?php print form_open(NULL, array(), $hidden); ?>

        <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <div class="col-md-6">
            <?php echo form_fieldset('Employee Information'); ?>
            <div class="form-group">
                <?php print form_label('Fullname'); ?>
                <?php print form_input('display_name', NULL, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. Muhmmad Amin Khan')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('CNIC Number'); ?>
                <?php print form_input('cnic_number', NULL, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Office Location'); ?>
                <?php print form_dropdown('office_loc', Requests::$officeLoc , array() ,array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Employee Type'); ?>
                <?php print form_dropdown('employee_type', Requests::$empType , array() ,array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('CNIC Number'); ?>
                <?php print form_input('display_name', NULL, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('CNIC Number'); ?>
                <?php print form_input('display_name', NULL, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 42201-5657973-3')); ?>
            </div>
            <?php echo form_fieldset_close(); ?>

        </div>
        <div class="col-md-6">

            <?php echo form_fieldset('Contact Information'); ?>

            <div class="form-group">
                <?php print form_label('Phone (Landline)'); ?>
                <?php print form_input('display_name', NULL, array('class' => 'form-control', 'required' => 1, 'placeholder' => 'e.g. 02134014743(9876)')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Phone (Mobile) (Optional)'); ?>
                <?php print form_input('display_name', NULL, array('class' => 'form-control', 'placeholder' => 'e.g. 03002294117')); ?>
            </div>

            <div class="form-group">
                <?php print form_label('Email (optional)'); ?>
                <?php print form_input('display_name', NULL, array('class' => 'form-control', 'placeholder' => 'e.g. demo@demo.com')); ?>
            </div>

            <?php echo form_fieldset_close(); ?>



            <?php print form_close(); ?>
        </div>
        
        <div class="form-group">
            <?php print form_submit('submit', 'Send Request', 'class="btn-success btn-lg btn pull-right"'); ?>
        </div>

    </div> <!-- /container -->

</div>