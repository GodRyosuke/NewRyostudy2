<?php get_header(); ?>

    <section class="main-contents">
        <div class="main-con container">
            <div class="new-articles">
                <div class="main-article">
                    <div class="time"><?php the_time( 'Y/m/d' ); ?></div>
                    <div class="article-title"><?php the_title(); ?></div>
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
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                    <div class="tags">
                    <i class="fas fa-tag"></i>
<?php
    $tags = get_the_tags();
    if ( !empty( $tags ) ) {
        foreach ( $tags as $tag ) {
            printf(
                '<span class="tag"><a href="%s">%s</a></span>',
                get_tag_link( $tag->term_id ),
                $tag->name
            );
        }
    } else {
        echo "no tag";
    }
?>
                    </div>
                    <div class="cards">
<?php if (get_previous_post()): ?>
                        <div class="card prev">
                            <p><?php previous_post_link(); ?></p>
                        </div>
<?php endif; ?>

<?php if (get_next_post()): ?>
                        <div class="card next">
                           <p><?php next_post_link(); ?></p>
                        </div>
<?php endif; ?>
                    </div>
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
<div class="card">
                        <a class="card-link" href="<?php the_permalink(); ?>"></a>
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
                        <div class="time">
                        <?php the_time( 'Y/m/d' ); ?>
                        </div>
                        <div class="title">
                            <?php the_title(); ?>
                        </div>
                        <div class="tag-buf"></div>
                        <div class="tags">
                        <i class="fas fa-tag"></i>
<?php
    $tags = get_the_tags();
    if ( !empty( $tags ) ) {
        foreach ( $tags as $tag ) {
            printf(
                '<span class="tag"><a href="%s">%s</a></span>',
                get_tag_link( $tag->term_id ),
                $tag->name
            );
        }
    } else {
        echo "no tag";
    }
?>

                        </div>
                    </div>
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