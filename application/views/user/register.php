<div class="container">
    <div class="row">        
        <fieldset>
            <legend>Register Here</legend>           
            <form class="form-horizontal" role="form" action='' method="post">
                <div class="form-group">
                    <label for="firstName" class="col-lg-3 control-label">First Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="<?= set_value('firstName') ?>">
                    <?php echo form_error('firstName'); ?>
                    </div>
                    
                </div> 
                <div class="form-group">
                    <label for="lastName" class="col-lg-3 control-label">Last Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" value="<?= set_value('lastName') ?>">
                    <?php echo form_error('lastName'); ?>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                    <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-3 control-label">Confirm Password</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confrm Password">
                    <?php echo form_error('confirm_password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" class="btn btn-success">Save</button> <a href="<?= site_url('welcome/index'); ?>" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>