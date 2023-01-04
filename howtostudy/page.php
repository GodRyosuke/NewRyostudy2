<?php get_header(); ?>


    <section class="main-contents">
        <div class="main-con container">
            <div class="new-articles">
                <div class="main-article">
                    <div class="time"><?php the_time( 'Y/m/d' ); ?></div>
                    <div class="article-title"><?php the_title(); ?></div>
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <?php get_template_part('sidebar'); ?>
        </div>
    </section>

<?php get_footer(); ?>