<footer>
        <div class="footer-con container">
            <div class="items">
                <div class="item">
                    <div class="title">
                        <h3>ABOUT</h3>
                    </div>
                    <div class="desc">
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('ryosuke')); ?>">管理人情報</a></li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <h3>CATEGORY</h3>
                    </div>
                    <div class="desc">
                        <!-- <ul>
                            <li><a href="#">数学</a></li>
                            <li><a href="#">物理</a></li>
                            <li><a href="#">勉強法</a></li>
                        </ul> -->
<?php
wp_nav_menu(
    array (
        'theme_location' => 'place_footer',
        'container' => false,
    )
);
?>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <h3>SNS</h3>
                    </div>
                    <div class="desc">
                       twitter はりつけ
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="desc">
                &copy; ryostudy.com All rights reserved.
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>