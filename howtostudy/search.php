<?php get_header(); ?>

    <section class="cat-title">
        <div class="bg-black"></div>
        <div class="container-wrap">
            <div class="title-con container">
                <div class="cat-title-wrap">
                    <div class="cat-card-image cat-title-image-conf">
                        <div class="card-image-buff">
                            <div class="card-image-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="title">
                        <div class="display-2">検索</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-contents">
        <div class="main-con container">
            <div class="new-articles">
                <div class="title">
                    <h2>
                    <?php
                    if (get_search_query()):
                        the_search_query();
                    ?>
                    の検索結果:<?php echo $wp_query->found_posts; ?>件
                    <?php elseif (!get_search_query()): ?>
                    検索ワードが入力されていません
                    <?php else: ?>
                    該当する記事が見つかりませんでした
                    <?php endif; ?>
                    </h2>
                </div>
                <div class="cards">
                <?php
                $paged = get_query_var('paged', 1)?:1;
                if (have_posts() && get_search_query()):
                    while (have_posts()):
                        the_post();
                ?>
                    <div class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-image">
                                <?php the_post_thumbnail('post-thumbnails'); ?>
                                <div class="card-desc">
                                    <div class="desc-title">
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div class="desc-desc">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                    endwhile;
                else:
                ?>
                記事はありません
                <?php endif; ?>
                </div>

<?php
// ページネーション
    $pages = $wp_query->max_num_pages;
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
                <!-- <div class="pagination">
                    <div class="prev-page page-arrow-wrap page-item">
                        <div class="page-ellipse">
                            <a href="#">
                                <div class="page-arrow">
                                    <div class="page-arrow-inner">
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="pagenum page-item">
                        <div class="page-circle">
                            <a href="#">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        1
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="pagenum page-item current">
                        <div class="page-circle">
                            <a href="#">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        2
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="dots">
                        ...
                    </div>
                    <div class="pagenum page-item">
                        <div class="page-circle">
                            <a href="#">
                                <div class="page-number">
                                    <div class="page-number-inner">
                                        5
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="next-page page-arrow-wrap page-item">
                        <div class="page-ellipse">
                            <a href="#">
                                <div class="page-arrow">
                                    <div class="page-arrow-inner">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
            <?php get_template_part('sidebar'); ?>
        </div>
    </section>
  
<?php get_footer(); ?>