<footer>
        <div class="footer-con container">
            <div class="items">
                <div class="item">
                    <div class="page-title"><a href="<?php echo esc_url(home_url()); ?>">CODE $\Sigma$</a></div>
                    <div class="tyfw">
                        Thank you for watching!
                    </div>
                    <div class="title">
                        <h3>MENU</h3>
                    </div>
                    <div class="desc">
<?php
wp_nav_menu(
    array (
        'theme_location' => 'place_footer',
        'container' => false,
    )
);
?>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <h3>CATEGORY</h3>
                    </div>
                    <div class="desc">
<?php
    $cats = get_categories();
    if ( !empty( $cats ) ) {
        foreach ($cats as $cat) {
            printf("<div class='cat-btn2'><a href='%s'>%s</a></div>", get_category_link($cat->term_id), $cat->name);
        }    
    }
?>

                        <!-- <ul>
                            <li><a href="#">数学</a></li>
                            <li><a href="#">物理</a></li>
                            <li><a href="#">勉強法</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <h3>おすすめ記事</h3>
                    </div>
                    <div class="desc">
                        <div class="cards">
<?php
setPostViews(get_the_ID());
$args = array(
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 5
);
$query = new WP_Query($args);
if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();
?>
            <div class="card">
                <a class="card-link" href="<?php the_permalink(); ?>"></a>
                <div class="time">
                    <?php the_time( 'Y/m/d' ); ?>
                </div>
                <div class="p-title">
                    <?php the_title(); ?>
                </div> 
                <div class="category">
<?php
$cats = get_the_category();
if (!empty($cats)) {
    foreach ($cats as $cat) {
        printf("<a href='%s'><span class='cat-btn btn-category'>%s</span></a>", get_category_link($cat->term_id), $cat->name);
    }
} else {
    printf("no category");
}
?>
                                </div>

                            </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="desc">
                &copy; ryostudy.com All rights reserved.
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>