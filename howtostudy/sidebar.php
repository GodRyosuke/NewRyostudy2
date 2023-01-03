<div class="sidebar">
    <div class="searching">
        <form action="<?php echo esc_url(home_url()); ?>" method="get" role="search">
            <input type="search" class="form-control" placeholder="記事を検索" value="<?php the_search_query(); ?>" name="s">
            <button class="btn btn-outline-primary" type="submit">検索</button>
        </form>
    </div>
    <section class="profile">
        <div class="profile-image">
            <div class="profile-circle">
              <div class="profile-image-outer">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/programer.png" alt="">
              </div>
            </div>
        </div>
        <div class="profile-desc">
            <div class="profile-desc-title">
                <h3>Ryosuke</h3>
            </div>
            <div class="sub-profile">- ロボットエンジニア -</div>
            <div class="profile-desc-inner">
                大学院生<br>
                専攻：ロボティクス&メカトロニクス<br>
                興味: ロボット工学、物理数学、ゲーム開発<br>
                <br>
                日頃の創作活動の成果などを発信していきます。
            </div>
        </div>
    </section>
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
    <section class="all-tags">
        <div class="title">
            <h2>Tags</h2>
        </div>
        <div class="content">
<?php
$tags = get_tags();
foreach( $tags as $tag) { 
echo '<span class="tag"><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a></span>';
}
?>
        </div>
    </section>
</div>