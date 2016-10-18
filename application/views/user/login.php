<div class="container">
    <div class="row">        
        <fieldset>
            <legend>Login Here</legend>           
            <form class="form-horizontal" role="form" action='' method="post">                
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
                    <?php if (isset($error)) {
                    ?>
                    <div class="text-danger">
                        <?= $error ?>
                    </div>
                <?php } ?>
                </div>                
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" class="btn btn-success">Login</button> <a href="<?= site_url('welcome/index'); ?>" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
                
            </form>
        </fieldset>
    </div>