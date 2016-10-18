<div class="container">
    <div class="row">
        <br/><br/>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success" role="alert">
                <strong>success!</strong> <?= $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <a href="<?= site_url('/post/create') ?>"><button type="button" class="btn btn-lg btn-info">Add Post</button></a>
        <br/><br/>
        <?php if (count($posts) > 0) { ?>        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Excerpt</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <td><?= $post->id ?></td>
                            <td><?= htmlentities($post->title) ?></td>
                            <td><?= htmlentities(substr($post->content, 0, 100)) ?></td>
                            <td><?= date("F j, Y, g:i a", strtotime($post->insert_ts)); ?></td>
                            <td><?= date("F j, Y, g:i a", strtotime($post->update_ts)); ?></td>
                            <td><a href="<?= site_url('/post/view/' . $post->id) ?>">View</a> | <a href="<?= site_url('/post/edit/' . $post->id) ?>">Update</a> |  <a href="<?= site_url('/post/delete/' . $post->id) ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a></td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>
        <?php } ?>
    </div>