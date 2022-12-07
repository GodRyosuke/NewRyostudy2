<?php get_header(); ?>

    <section class="main-contents">
        <div class="main-con container">
            <div class="new-articles">
                <div class="main-article">
                    <div class="article-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="article-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                    <!-- <div class="main-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores necessitatibus nam sed exercitationem nemo culpa voluptates, harum porro? Commodi perferendis ipsum dolorum similique beatae. Quas praesentium nostrum consequuntur ipsa dolore!
                    </div>
                    <div class="index">
                        目次
                       <ul>
                           <li><a href="#">abcdefg</a></li>
                           <li><a href="#">abcdefg</a></li>
                           <li><a href="#">abcdefg</a></li>
                           <li><a href="#">abcdefg</a></li>
                       </ul>
                    </div>
                    <div class="desc-title">
                        <h2>これはタイトルです</h2>
                        <div class="title-line">
                            <div class="under-line"></div>
                            <div class="main-line"></div>
                        </div>
                    </div>
                    <div class="main-desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel earum sed aliquid voluptas laudantium fuga, libero consectetur dolore ducimus nostrum vitae ratione, atque molestiae quis nihil veritatis sequi. Veritatis, laudantium?
                    </div>
                    <div class="desc-title">
                        <h2>これはタイトルです</h2>
                        <div class="title-line">
                            <div class="under-line"></div>
                            <div class="main-line"></div>
                        </div>
                    </div>
                    <div class="main-desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel earum sed aliquid voluptas laudantium fuga, libero consectetur dolore ducimus nostrum vitae ratione, atque molestiae quis nihil veritatis sequi. Veritatis, laudantium?
                    </div>
                    <div class="desc-title">
                        <h2>これはタイトルです</h2>
                        <div class="title-line">
                            <div class="under-line"></div>
                            <div class="main-line"></div>
                        </div>
                    </div>
                    <div class="main-desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel earum sed aliquid voluptas laudantium fuga, libero consectetur dolore ducimus nostrum vitae ratione, atque molestiae quis nihil veritatis sequi. Veritatis, laudantium?
                    </div> -->
                </div>
                <div class="related-articles">
                    <div class="title">
                        <h2>関連記事</h2>
                    </div>
                    <div class="cards">
<?php
$categ = get_the_category($post->ID);
$catIDs = array();
foreach ($categ as $cat) {
    array_push($catIDs, $cat->cat_ID);
}
$args = array(
    'post__not_in' => array($post->ID),
    // 'category__in' => $catIDs,
    'posts_per_page' => 4,
    'orderby' => 'rand'
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()):
    while ($the_query->have_posts()):
        $the_query->the_post();
?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="card">
                                <div class="card-image">
                                    <?php the_post_thumbnail('post-thumbnails'); ?>
                                </div>
                                <div class="card-desc"><?php the_title(); ?></div>
                            </div>
                        </a>
<?php
    endwhile;
endif;
wp_reset_postdata();
?>
                       
                    </div>
                </div>
            </div>
            <?php get_template_part('sidebar'); ?>
        </div>
    </section>

<?php get_footer(); ?>