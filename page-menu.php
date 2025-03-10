
<?php get_template_part('templates/header'); ?>
<div id="page__mv" class="pt-80 bg w-full"></div>

<div class="menu__ttl pt-12 mb-11">
    <h2 class="sec__ttl--big mb-2.6">
        MENU
    </h2>
    <ul class="menu__link flex justify-center mb-11">
        <li class=" px-3">
            <a href="" class="text-black text-2">ヘア</a>
        </li>
        <li class=" px-3">
            <a href="" class="text-black text-2">スパ</a>
        </li>
        <li class=" px-3">
            <a href="" class="text-black text-2">ネイル</a>
        </li>
        <li class=" px-3">
            <a href="" class="text-black text-2">エステ</a>
        </li>
        <li class=" px-3">
            <a href="" class="text-black text-2">アイラッシュ</a>
        </li>
        <li class=" px-3">
            <a href="" class="text-black text-2">頭顔リリース</a>
        </li>
        <li class=" px-3">
            <a href="" class="text-black text-2">成人式</a>
        </li>

    </ul>
    <strong class="block text-2 font-normal text-center mb-2.7">初回の方はホームページからのご予約で<br class="sp">特別料金にてご利用いただけます。</strong>

</div>

<?php
// クエリパラメータ取得
$menus_param = get_query_var("menus"); // 例: "esthe,hair,headspa"
$active_param = get_query_var("active"); // 例: "esthe"



// `,` で区切って配列に変換
$menus_array = $menus_param ? explode(",", $menus_param) : [];
$active_menu = $active_param ?: "";

// WordPress の `error_log` にも記録
error_log("取得したメニュー一覧: " . print_r($menus_array, true));
error_log("アクティブメニュー: " . $active_menu);
?>


<?php
// URLから `menus` パラメータ（サロンで提供されているメニュー）を取得
$valid_menus = isset($_GET['menus']) ? explode(',', $_GET['menus']) : [];

// URLから `active` パラメータ（クリックされたメニュー）を取得
$active_menu = isset($_GET['active']) ? $_GET['active'] : '';
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const validMenus = <?php echo json_encode($valid_menus); ?>;
    const activeMenu = "<?php echo esc_js($active_menu); ?>";

    document.querySelectorAll(".menu__list").forEach(function(menu) {
        const menuId = menu.getAttribute("id"); // dlのidがmenuのスラグ

        if (!validMenus.includes(menuId)) {
            menu.style.display = "none"; // 未登録のメニューを非表示
        } else if (menuId === activeMenu) {
            menu.classList.add("open"); // クリックされたメニューにopenクラスを付与
        }
    });
});
</script>



<div class="menu__wrapper">
    <?php
    // すべてのメニューリスト
    $all_menus = ["hair", "eyelash", "nail", "esthe", "headspa"];

    // 各メニューに対応した `dl` を手動で記述
    ?>


    <dl class="menu__list <?php echo ($active_menu == 'hair') ? 'open' : ''; ?>" id="hair"
        <?php echo in_array('hair', $menus_array) ? '' : 'style="display: none;"'; ?>>
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">HAIR</p>
            <span class="text-2 block">ヘア</span>
        </dt>

        <dd class="pt-5">
            <div class="menu__content">
            <?php

                $args = array(
                    'post_type'      => 'tophair_menu',
                    'name'           => 'hair', // スラッグ指定で1件取得
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                
                <?php if (have_rows('menu_content')) : ?>
                    <ul class="flex flex-wrap mb-8">
                        <?php while (have_rows('menu_content')) : the_row(); ?>
                            
                                    <li class=" mb-5.5 w-full justify-between items-baseline">
                                    <?php if (have_rows('menu_item')) : ?>
                                        <?php while (have_rows('menu_item')) : the_row(); ?>
                                        <div class="first flex item-center">
                                            <b class="block font-normal text-4 items-baseline">
                                                <?php the_sub_field('menu_item_name'); ?>
                                                <span><?php the_sub_field('menu_item_description'); ?></span>
                                            </b>
                                            <div class="menu__content--price flex justify-between items-baseline">
                                                <span class="text-2">通常料金</span>
                                                <span class="text-2">HP特別料金</span>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php if (have_rows('menu_detail')) : ?>
                                        <?php while (have_rows('menu_detail')) : the_row(); ?>
                                        <div class="second">
                                            <div class="second__list flex items-baseline">
                                                <p><?php the_sub_field('menu_name'); ?></p>
                                                <div class="menu__content--price flex justify-between items-baseline">
                                                    <span class="text-2">￥<?php the_sub_field('menu_price_regular'); ?></span>
                                                    <span class="text-2 big">￥<?php the_sub_field('menu_price_special'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>

                                        <p class="notes"><?php the_sub_field('menu_notes'); ?></p>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </ul>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>該当するメニューが見つかりません。</p>
            <?php endif; ?>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">ヘアメニューが利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'hair', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
            </div>
        </dd>
    </dl>
    
    <dl class="menu__list <?php echo ($active_menu == 'headspa') ? 'open' : ''; ?>" id="headspa"
        <?php echo in_array('hair', $menus_array) ? '' : 'style="display: none;"'; ?>>
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">HAIR</p>
            <span class="text-2 block">ヘア</span>
        </dt>

        <dd class="pt-5">
            <div class="menu__content">
            <?php

                $args = array(
                    'post_type'      => 'tophair_menu',
                    'name'           => 'headspa', // スラッグ指定で1件取得
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                
                <?php if (have_rows('menu_content')) : ?>
                    <ul class="flex flex-wrap mb-8">
                        <?php while (have_rows('menu_content')) : the_row(); ?>
                            
                                    <li class=" mb-5.5 w-full justify-between items-baseline">
                                    <?php if (have_rows('menu_item')) : ?>
                                        <?php while (have_rows('menu_item')) : the_row(); ?>
                                        <div class="first flex item-center">
                                            <b class="block font-normal text-4 items-baseline">
                                                <?php the_sub_field('menu_item_name'); ?>
                                                <span><?php the_sub_field('menu_item_description'); ?></span>
                                            </b>
                                            <div class="menu__content--price flex justify-between items-baseline">
                                                <span class="text-2">通常料金</span>
                                                <span class="text-2">HP特別料金</span>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php if (have_rows('menu_detail')) : ?>
                                        <?php while (have_rows('menu_detail')) : the_row(); ?>
                                        <div class="second">
                                            <div class="second__list flex items-baseline">
                                                <p><?php the_sub_field('menu_name'); ?></p>
                                                <div class="menu__content--price flex justify-between items-baseline">
                                                    <span class="text-2">￥<?php the_sub_field('menu_price_regular'); ?></span>
                                                    <span class="text-2 big">￥<?php the_sub_field('menu_price_special'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>

                                        <p class="notes"><?php the_sub_field('menu_notes'); ?></p>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </ul>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>該当するメニューが見つかりません。</p>
            <?php endif; ?>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">ヘアメニューが利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'headspa', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
            </div>
        </dd>
    </dl>

    <dl class="menu__list <?php echo ($active_menu == 'nail') ? 'open' : ''; ?>" id="nail"
        <?php echo in_array('hair', $menus_array) ? '' : 'style="display: none;"'; ?>>
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">HAIR</p>
            <span class="text-2 block">ヘア</span>
        </dt>

        <dd class="pt-5">
            <div class="menu__content">
            <?php

                $args = array(
                    'post_type'      => 'tophair_menu',
                    'name'           => 'nail', // スラッグ指定で1件取得
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                
                <?php if (have_rows('menu_content')) : ?>
                    <ul class="flex flex-wrap mb-8">
                        <?php while (have_rows('menu_content')) : the_row(); ?>
                            
                                    <li class=" mb-5.5 w-full justify-between items-baseline">
                                    <?php if (have_rows('menu_item')) : ?>
                                        <?php while (have_rows('menu_item')) : the_row(); ?>
                                        <div class="first flex item-center">
                                            <b class="block font-normal text-4 items-baseline">
                                                <?php the_sub_field('menu_item_name'); ?>
                                                <span><?php the_sub_field('menu_item_description'); ?></span>
                                            </b>
                                            <div class="menu__content--price flex justify-between items-baseline">
                                                <span class="text-2">通常料金</span>
                                                <span class="text-2">HP特別料金</span>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php if (have_rows('menu_detail')) : ?>
                                        <?php while (have_rows('menu_detail')) : the_row(); ?>
                                        <div class="second">
                                            <div class="second__list flex items-baseline">
                                                <p><?php the_sub_field('menu_name'); ?></p>
                                                <div class="menu__content--price flex justify-between items-baseline">
                                                    <span class="text-2">￥<?php the_sub_field('menu_price_regular'); ?></span>
                                                    <span class="text-2 big">￥<?php the_sub_field('menu_price_special'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>

                                        <p class="notes"><?php the_sub_field('menu_notes'); ?></p>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </ul>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>該当するメニューが見つかりません。</p>
            <?php endif; ?>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">ヘアメニューが利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'nail', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
            </div>
        </dd>
    </dl>
    
    <dl class="menu__list <?php echo ($active_menu == 'esthe') ? 'open' : ''; ?>" id="esthe"
        <?php echo in_array('hair', $menus_array) ? '' : 'style="display: none;"'; ?>>
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">HAIR</p>
            <span class="text-2 block">ヘア</span>
        </dt>

        <dd class="pt-5">
            <div class="menu__content">
            <?php

                $args = array(
                    'post_type'      => 'tophair_menu',
                    'name'           => 'esthe', // スラッグ指定で1件取得
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                
                <?php if (have_rows('menu_content')) : ?>
                    <ul class="flex flex-wrap mb-8">
                        <?php while (have_rows('menu_content')) : the_row(); ?>
                            
                                    <li class=" mb-5.5 w-full justify-between items-baseline">
                                    <?php if (have_rows('menu_item')) : ?>
                                        <?php while (have_rows('menu_item')) : the_row(); ?>
                                        <div class="first flex item-center">
                                            <b class="block font-normal text-4 items-baseline">
                                                <?php the_sub_field('menu_item_name'); ?>
                                                <span><?php the_sub_field('menu_item_description'); ?></span>
                                            </b>
                                            <div class="menu__content--price flex justify-between items-baseline">
                                                <span class="text-2">通常料金</span>
                                                <span class="text-2">HP特別料金</span>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php if (have_rows('menu_detail')) : ?>
                                        <?php while (have_rows('menu_detail')) : the_row(); ?>
                                        <div class="second">
                                            <div class="second__list flex items-baseline">
                                                <p><?php the_sub_field('menu_name'); ?></p>
                                                <div class="menu__content--price flex justify-between items-baseline">
                                                    <span class="text-2">￥<?php the_sub_field('menu_price_regular'); ?></span>
                                                    <span class="text-2 big">￥<?php the_sub_field('menu_price_special'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>

                                        <p class="notes"><?php the_sub_field('menu_notes'); ?></p>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </ul>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>該当するメニューが見つかりません。</p>
            <?php endif; ?>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">ヘアメニューが利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'esthe', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
            </div>
        </dd>
    </dl>
    <dl class="menu__list <?php echo ($active_menu == 'eyelash') ? 'open' : ''; ?>" id="eyelash"
        <?php echo in_array('hair', $menus_array) ? '' : 'style="display: none;"'; ?>>
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">HAIR</p>
            <span class="text-2 block">ヘア</span>
        </dt>

        <dd class="pt-5">
            <div class="menu__content">
            <?php

                $args = array(
                    'post_type'      => 'tophair_menu',
                    'name'           => 'eyelash', // スラッグ指定で1件取得
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                
                <?php if (have_rows('menu_content')) : ?>
                    <ul class="flex flex-wrap mb-8">
                        <?php while (have_rows('menu_content')) : the_row(); ?>
                            
                                    <li class=" mb-5.5 w-full justify-between items-baseline">
                                    <?php if (have_rows('menu_item')) : ?>
                                        <?php while (have_rows('menu_item')) : the_row(); ?>
                                        <div class="first flex item-center">
                                            <b class="block font-normal text-4 items-baseline">
                                                <?php the_sub_field('menu_item_name'); ?>
                                                <span><?php the_sub_field('menu_item_description'); ?></span>
                                            </b>
                                            <div class="menu__content--price flex justify-between items-baseline">
                                                <span class="text-2">通常料金</span>
                                                <span class="text-2">HP特別料金</span>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php if (have_rows('menu_detail')) : ?>
                                        <?php while (have_rows('menu_detail')) : the_row(); ?>
                                        <div class="second">
                                            <div class="second__list flex items-baseline">
                                                <p><?php the_sub_field('menu_name'); ?></p>
                                                <div class="menu__content--price flex justify-between items-baseline">
                                                    <span class="text-2">￥<?php the_sub_field('menu_price_regular'); ?></span>
                                                    <span class="text-2 big">￥<?php the_sub_field('menu_price_special'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>

                                        <p class="notes"><?php the_sub_field('menu_notes'); ?></p>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </ul>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>該当するメニューが見つかりません。</p>
            <?php endif; ?>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">ヘアメニューが利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'eyelash', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
            </div>
        </dd>
    </dl>
    <dl class="menu__list <?php echo $is_open; ?>" id="">
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">頭顔リリース</p>
        </dt>
        <dd class="pt-5">
            <div class="menu__content">
                
                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">CUT</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>
                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">COLOR</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>

                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">PERM</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>

                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">STRAIGHT</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>

                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">OTHERS</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">頭皮リリースが利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'touhi', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
        </dd>
    </dl>
    <dl class="menu__list <?php echo $is_open; ?>" id="">
        <dt class="flex mx-auto items-center relative pt-11 pb-9">
            <p class="text-4">成人式</p>
        </dt>
        <dd class="pt-5">
            <div class="menu__content">
                
                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">CUT</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>
                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">COLOR</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>

                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">PERM</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>

                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">STRAIGHT</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>

                <ul class="flex flex-wrap mb-8">
                    <li class="flex mb-5.5 w-full justify-between items-baseline">
                        <b class=" block font-normal text-4 ">OTHERS</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">通常料金</span>
                            <span class="text-2">特別料金</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">クリエイティブディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥7,150</span>
                            <span class="text-2">￥6,600</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">ディレクター</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,600</span>
                            <span class="text-2">￥6,050</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">トップスタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥6,050</span>
                            <span class="text-2">￥5,500</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥5,500</span>
                            <span class="text-2">￥4,950</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">Jr.スタイリスト</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">￥4,950</span>
                            <span class="text-2">￥4,400</span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 ">スクール割引</b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">中高校生 ￥550OFF<br></span>
                        </div>
                    </li>
                    <li class="flex mb-2.5 w-full justify-between">
                        <p class="font-normal text-2 "></b>
                        <div class="menu__content--price flex justify-between">
                            <span class="text-2">ジュニア(小学生以下) ￥1,100OFF<br></span>
                        </div>
                    </li>
                </ul>


            </div>
            <!-- //menu__content -->

            <div class="menu__salon mx-auto pt-14 pb-24">
                <div class="menu__salon--ttl mb-10">
                    <h3 class="sec__ttl--big mb-5">
                        SALONS
                    </h3>
                    <p class="text-center text-2">成人式が利用可能な店舗</p>
                </div>

                <ul class="menu__list flex justify-between w-full flex-wrap">

                <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'tophair-salon', // カスタム投稿タイプ
                        'posts_per_page' => -1, // 1ページに表示する記事数
                        'post_status'    => 'publish',
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'tophair_menu', // タクソノミー名
                                'field'    => 'slug', // タームの指定方法（'slug' or 'term_id'）
                                'terms'    => 'seijin', // 出力したいタクソノミーのスラッグ
                            ),
                        ),
                    );

                    $my_query = new WP_Query($args); // クエリの実行

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post();
                            // 投稿の内容を出力
                            ?>
                    <li class="menu__list--items mb-5.5">
                        <a href="<?php the_permalink();?>" class="">
                            <div class="thumb bg mb-2" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                            <p class="text-center text-2"><?php the_title();?></p>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    else :
                        echo '<p>該当する店舗が見つかりません。</p>';
                    endif;
                    wp_reset_postdata(); // クエリのリセット
                ?>

                </ul>
        </dd>
    </dl>
</div>

<?php get_template_part('templates/footer'); ?>