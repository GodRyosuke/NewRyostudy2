<?php get_header(); ?>



    <section class="main-contents">
        <div class="main-con container">
            <div class="new-articles">
                <div class="cards">
<?php
    $paged = get_query_var('paged', 1)?:1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $paged,
    );
    $my_posts = new WP_Query($args);
    if ($my_posts->have_posts()):
        while ($my_posts->have_posts()):
            $my_posts->the_post();
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
?>
                </div>
<?php
    $pages = $my_posts->max_num_pages;
    if ($pages > 1): // ページが2つ以上ならページネーション
    $range = ($pages > 3) ? 3 : $pages;
?>
                <div class="pagination">
                    <?php
                    if ($paged > 1): // <-表示
                    ?>
                    <div class="prev-page page-arrow-wrap page-item">
                        <div class="page-ellipse">
                            <a href="<?php echo get_pagenum_link($paged - 1); ?>">
                                <div class="page-arrow">
                                    <div class="page-arrow-inner">
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                    if ($range + 1 <= $paged): // 1ページ目表示
                    ?>
                    <div class="pagenum page-item">
                        <div class="page-circle">
                            <a href="<?php echo esc_url(get_pagenum_link(1)); ?>">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        1
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    ...
                    <?php
                    endif;
                    if ($paged <= floor($range / 2)): // 最初のrange
                        for ($i = 1; $i <= $range; $i++):
                    ?>
                     <div class="pagenum page-item <?php if ($i == $paged){ echo "current"; } ?>">
                        <div class="page-circle">
                            <a href="<?php echo esc_url(get_pagenum_link($i)); ?>">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        <?php echo $i; ?> 
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                        endfor;
                    elseif ($paged + floor($range / 2) <= $pages):
                    for ($i = 0; $i < $range; $i++): // 中間のrange
                        $pagenum = $paged - floor($range / 2) + $i; // ページ番号
                    ?>
                    <div class="pagenum page-item <?php if ($pagenum == $paged){ echo "current"; } ?>">
                        <div class="page-circle">
                            <a href="<?php echo esc_url(get_pagenum_link($pagenum)); ?>">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        <?php echo $pagenum; ?> 
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    endfor; 
                    else:
                    for ($i = $pages - $range + 1;  $i <= $pages; $i++): // ラストのrange
                    ?>
                    <div class="pagenum page-item <?php if ($i == $paged){ echo "current"; } ?>">
                        <div class="page-circle">
                            <a href="<?php echo esc_url(get_pagenum_link($i)); ?>">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        <?php echo $i; ?> 
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    endfor;
                    endif;
                    if ($paged <= $pages - $range): // ラストページを表示
                    ?>
                    ...
                    <div class="pagenum page-item">
                        <div class="page-circle">
                            <a href="<?php echo esc_url(get_pagenum_link(7)); ?>">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        <?php echo $pages; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php
                    if ($paged < $pages): // ->表示
                    ?>
                    <div class="next-page page-arrow-wrap page-item">
                        <div class="page-ellipse">
                            <a href="<?php echo get_pagenum_link($paged + 1); ?>">
                                <div class="page-arrow">
                                    <div class="page-arrow-inner">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
<?php endif; ?> 
<?php 
wp_reset_postdata();
?>
            </div>
            <?php get_template_part('sidebar'); ?>
        </div>
    </section>



<?php get_footer(); ?>