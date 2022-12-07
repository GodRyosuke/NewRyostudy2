<?php
// アイキャッチ画像
add_theme_support('post-thumbnails');
// メインの画像サイズ
add_image_size('main', 600, 400, true);

// 抜粋文
function cms_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');

function cms_excerpt_length() {
    return 52;
}
add_filter('excerpt_length', 'cms_excerpt_length', 999);

add_post_type_support('page', 'excerpt');


// ナビメニュー
register_nav_menus(
    array(
        'place_global' => 'グローバル',
        'place_footer' => 'フッターナビ'
    )
);

// カテゴリごとの写真切り替え
function show_cat_picture_title() {
    $ThisTitle = get_the_archive_title();
    $PictureName = "document.png";
    switch ($ThisTitle) {
        case "カテゴリー: <span>物理</span>": $PictureName = "sword.png"; break;
        case "カテゴリー: <span>数学</span>": $PictureName = "shield.png";break;
        case "カテゴリー: <span>勉強法</span>": $PictureName = "gold.png"; break;
    }
    return $PictureName;
}

remove_action('wp_head', 'adjacent_post_rel_link_wp_head', 10, 0);

function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true); // ページの閲覧数を取得
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count."Views";
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') { // 閲覧数が0なら
        $count = 0;
        delete_post_meta($countID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



