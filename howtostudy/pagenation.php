<?php
    $pages = $pagenation_query->max_num_pages;
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
                                        7
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