<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php echo wp_get_document_title(); ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/29d47546b5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="container">
            <div class="inner-header">
                <h3 class="title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h3>
                  <!-- <ul>
                    <li><a href="#">物理</a></li>
                    <li><a href="#">数学</a></li>
                    <li><a href="#">勉強法</a></li>
                </ul>  -->
<?php
wp_nav_menu(
    array (
        'theme_location' => 'place_global',
        'container' => false,
    )
);
?>
                <div class="tb-btn" data-bs-toggle="collapse" aria-expanded="false" href="#header-menu" role="button" aria-controls="header-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div class="nav-menu collapse" id="header-menu">
                <!-- <ul>
                    <li><a href="#">物理</a></li>
                    <li><a href="#">数学</a></li>
                    <li><a href="#">勉強法</a></li>
                </ul>  -->
<?php
wp_nav_menu(
    array (
        'theme_location' => 'place_global',
        'container' => false,
    )
);
?>
            </div>
        </div>
    </header>