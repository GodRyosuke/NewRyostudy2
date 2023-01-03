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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/29d47546b5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js" defer></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/tomorrow-night.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    TeX: { equationNumbers: { autoNumber: "AMS" }},
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      processEscapes: true
    },
    "HTML-CSS": { matchFontHeight: false },
    displayAlign: "left",
    displayIndent: "2em"
  });
</script>
<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="container">
            <h3 class="title"><a href="<?php echo esc_url(home_url()); ?>">CODE $\Sigma$</a></h3>
            <!-- <div class="inner-header">
            </div> -->

                  <!-- <ul>
                    <li><a href="#">物理</a></li>
                    <li><a href="#">数学</a></li>
                    <li><a href="#">勉強法</a></li>
                </ul>  -->
            <div class="dark-display" id="DarkDisplay"></div>
            <div class="list-con" id="ListCon">
                <div class="times">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/times.png" alt="">
                </div>
                <div class="title"><h2>MENU</h2></div>
<?php
wp_nav_menu(
    array (
        'theme_location' => 'place_global',
        'container' => false,
    )
);
?>
            </div>

            <div class="tb-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>