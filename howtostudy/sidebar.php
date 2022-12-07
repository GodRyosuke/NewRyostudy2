<div class="sidebar">
    <div class="searching">
        <form action="<?php echo esc_url(home_url()); ?>" method="get" role="search">
            <input type="search" class="form-control" placeholder="記事を検索" value="<?php the_search_query(); ?>" name="s">
            <button class="btn btn-outline-primary" type="submit">送信</button>
        </form>
    </div>
    <div class="popular-article">
        <div class="title">
            <h2>人気記事</h2>
        </div>
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
                <a href="<?php the_permalink(); ?>">
                    <div class="card-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="card-desc-title">
                        <div class="card-desc-inner">
                            <?php the_title(); ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        </div>
    </div>
</div>