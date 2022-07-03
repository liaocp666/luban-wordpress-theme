<?php include("inc/head.php"); ?>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="container" id="header" style="max-width: 1172px">
        <div class="header-wrap">
            <div class="row" id="nav-placeholder">
                <div class="col" style="height: 50px"></div>
            </div>
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid" style="padding-left: 0; padding-right: 0;">
                            <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                                <div class="site-wrap">
                                    <div class="site-logo">
                                        <img src="<?php echo get_template_directory_uri().'/static/images/logo.webp'; ?>"
                                             alt="<?php bloginfo('name'); ?>" width="24"
                                             height="24" class="d-inline-block align-text-top">
                                    </div>
                                    <div class="site-title d-none" id="site-title">
                                        <h1><?php bloginfo('name'); ?></h1>
                                    </div>
                                    <div class="site-desc d-none" id="site-desc">
                                        &nbsp;&nbsp;<?php bloginfo('description'); ?>
                                    </div>
                                </div>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="justify-content-end collapse navbar-collapse" id="navbarNavDropdown">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'menu-wrapper',
                                        'container_class' => 'primary-menu-container',
                                        'items_wrap' => '<ul id="primary-menu-list" class="navbar-nav %2$s">%3$s</ul>',
                                        'fallback_cb' => false,
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>