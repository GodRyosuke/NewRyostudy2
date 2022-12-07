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
            </div>
            <?php get_template_part('sidebar'); ?>
        </div>
    </section>

<?php get_footer(); ?>