<?php 
$_post = $this->input->post();
?>
<div class="container">
    <div class="row">        
        <fieldset>
            <legend>View Post Here</legend>           
            <form class="form-horizontal" role="form" action='' method="post">
                <div class="form-group">
                    <label for="firstName" class="col-lg-3 control-label">Post Tile</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="title" id="firstName" placeholder="Post Title" value="<?= set_value('title', isset($_post['title']) ? $_post['title'] : $post->title) ?>" disabled="disabled">
                        <?php echo form_error('title'); ?>
                    </div>

                </div> 

                <div class="form-group">
                    <label for="email" class="col-lg-3 control-label">Post Content</label>
                    <div class="col-lg-6">
                        <textarea name="content" disabled="disabled" style="width: 100%;height: 200px;"><?= set_value('content', isset($_post['content']) ? $_post['content'] : $post->content) ?></textarea>
                        <?php echo form_error('content'); ?>
                    </div>
                </div>                
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                         <a href="<?= site_url('post/index'); ?>" class="btn btn-primary">Go Back</a>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

    <script type="text/javascript">
        $('.textarea').wysihtml5();
    </script>