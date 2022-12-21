<?php get_header(); ?>

    <section class="slides">
        <div class="image-con carousel slide container" data-bs-ride="carousel" id="slides">
            <ol class="carousel-indicators">
                <li data-bs-target="#slides" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#slides" data-bs-slide-to="1"></li>
                <li data-bs-target="#slides" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="c-item carousel-item active">
                    <a href="#">
                        <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sky-building.jpg" alt=""> -->
                    </a>
                </div>
                <?php
                $args = array(
                    'post_type' => 'any',
                    'post__in' => array(28, 1),5
                );
                $query = new WP_Query($args);
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                ?>
                <div class="c-item carousel-item">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    </a>
                </div>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <a class="carousel-control-prev" href="#slides" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#slides" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
            <!-- <a href="#slides" class="carousel-control-prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" role="button" data-bs-slide="prev"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a href="#slides" class="carousel-control-next">
                <span class="carousel-control-next-icon" aria-hidden="true" role="button" data-bs-slide="next"></span>
                <span class="visually-hidden">Next</span>
            </a> -->
        </div>
    </section>

    <section class="three-cards">
        <div class="card-con container">
            <div class="cards-title">
                <div class="title-bg">
                    <h2>最近の投稿</h2>
                </div>
            </div>
            <div class="cards">
                    <div class="card">
                        <a href="<?php echo esc_url(home_url('category/physics')); ?>">
                            <div class="cat-card-image">
                                <div class="card-image-buff">
                                    <div class="card-image-inner">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sword.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-desc">
                                <div class="title">
                                    <h3>物理をする！</h3>
                                </div>
                                <div class="main-desc">
                                    数学を用いて基本的な物理問題を解いていきます。何事も基本が大事であり、基本が理解できているからこそ現代物理学などの高度な学問理解につながっていくものだと考えています。不正確な知識を更新し、より正しい知識に修正していく作業において、ぜひ役立ててください。
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="<?php echo esc_url(home_url('category/math')); ?>">
                            <div class="cat-card-image">
                                <div class="card-image-buff">
                                    <div class="card-image-inner">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/test2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-desc">
                                <div class="title">
                                    <h3>数学をする！</h3>
                                </div>
                                <div class="main-desc">
                                    現代科学は数学なくしては成り立ちません。しかし、その数学力は一朝一夕には身につく力ではなく、小さな積み重ねやトレーニングにより少しずつ身についていくものだと思っています。数学の知識構築に役立つ記事を作っています。
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card">
                        <a href="<?php echo esc_url(home_url('category/howtostudy')); ?>">
                            <div class="cat-card-image">
                                <div class="card-image-buff">
                                    <div class="card-image-inner">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-desc">
                                <div class="title">
                                    <h3>勉強法を知る！</h3>
                                </div>
                                <div class="main-desc">
                                    同じ環境で同じように教育を受けていても、学業の差は開いていくものです。その差は才能の影響もあるとは思いますが、多くはやり方でカバーできるものだと考えています。非効率な勉強法を改めることによってより良い勉強の成果が望めるでしょう。
                                </div>
                            </div>
                        </a>
                    </div>
                
            </div>
        </div>
    </section>

    <section class="main-contents">
        <div class="main-con container">
            <div class="new-articles">
                <div class="title">
                    <h2>最近の投稿</h2>
                </div>
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
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-image">
                                <?php the_post_thumbnail('main'); ?>
                                <div class="card-desc">
                                    <div class="badge-wrap">
                                        <object data="" type=""><a href="#">
                                            <div class="category badge bg-primary">
                                                <?php the_category(); ?>
                                            </div>
                                        </a></object>
                                    </div>
                                    <div class="card-desc-inner">
                                        <div class="desc-title">
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                        <div class="desc-desc">
                                            <?php echo get_the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
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

    <section class="profile">
        <div class="profile-con container">
            <div class="profile-image">
                <div class="profile-circle">
                  <div class="profile-image-outer">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/agura_kutsurogu2_man.png" alt="">
                  </div>
                </div>
            </div>
            <div class="profile-desc">
                <div class="profile-desc-title">
                    <h3>書いているひと</h3>
                </div>
                <div class="profile-desc-inner">
                    理系大学生です。中学、高校で「勉強の成果をどうしたら上げられるのか？」という問いに対して試行錯誤し（今でもずっと続いていますが）、その成果を発信しています。また、大学に入ってからより一層学問の面白さを知り、その学んだ知識のアウトプットとして、このサイトを自分の正確な知識構築に役立てるとともに、わからないことがある人の悩み解消に役立てればと思っています。
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>