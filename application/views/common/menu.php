<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= site_url() ?>">My Demo App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">          
            <ul class="nav navbar-nav navbar-right">
                <?php
                $menus = createMenu();
                $page_name = $this->router->fetch_method();
                foreach ($menus as $menu) {
                    ?>
                    <li class="<?= addActiveClass($menu['link']); ?>"><a href="<?= site_url($menu['link']) ?>"><?= ucfirst($menu['label']) ?></a></li>
                <?php } ?>
                ?>                     
            </ul>          
        </div><!--/.navbar-collapse -->
    </div>
</nav>