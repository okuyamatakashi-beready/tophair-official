<?php get_template_part('templates/header'); ?>
<div id="page__mv" class="pt-80 bg w-full" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>

<?php 
    $top_img = get_field('top_img');
    $city = get_field('city');
    $furigana = get_field('furigana');
    $salon_img = get_field('salon_img');
    $concept = get_field('concept');
    $salon_img02 = get_field('salon_img02');
    $salon_info = get_field('salon_info');
?>

<div class="salon__wrapper pt-13">
    <p class="text-center text-2 mb-5"><?php echo $city;?></p>
    <h1 class="text-7 text-center mb-8">
        <?php the_title(); ?>
        <span class="block text-center text-2"><?php echo $furigana;?></span>
    </h1>

    <ul class="flex flex-wrap justify-center mb-23 cat__list mx-auto">
        <?php
        // 現在の投稿に関連付けられた `tophair-menu` のタームを取得
        $terms = get_the_terms(get_the_ID(), 'tophair_menu');
        if ($terms && !is_wp_error($terms)) :
            foreach ($terms as $term) :
                ?>
                <li class="mr-1">
                    <div class="salon__menu--list text-[10px]"><?php echo esc_html($term->name); ?></div>
                </li>
            <?php
            endforeach;
        else :
            ?>
            <li class="mr-1">
                <span class="salon__menu--list">メニュー情報がありません</span>
            </li>
        <?php endif; ?>
    </ul>

    <div class="salon__slider salon__swiper w-full">
        <div class="swiper-wrapper">
            <?php if( have_rows('salon_img') ): ?>
                <?php while( have_rows('salon_img') ): the_row();
                    $salon_img_item = get_sub_field('salon_img_item');
                ?>
                    <div class="swiper-slide pt-69 bg" style="background-image: url(<?php echo $salon_img_item;?>);"></div>
                <?php endwhile;?>
            <?php endif; ?>
            <?php if( have_rows('salon_img') ): ?>
                <?php while( have_rows('salon_img') ): the_row();
                    $salon_img_item = get_sub_field('salon_img_item');
                ?>
                    <div class="swiper-slide pt-69 bg" style="background-image: url(<?php echo $salon_img_item;?>);"></div>
                <?php endwhile;?>
            <?php endif; ?>

        </div>
    </div>

    <div class="salon__concept pt-27 w-full pb-21 relative">
        <div class="concept__wrapper">
            <?php if( have_rows('concept') ): ?>
                <?php while( have_rows('concept') ): the_row();
                    $concept_catch = get_sub_field('concept_catch');
                    $concept_text = get_sub_field('concept_text');
                ?>
                    <div class="concept__ttl">
                        <span class="text-center block text-2 mb-5">SALON CONCEPT</span>
                        <strong class="block text-center text-5 mb-7 font-normal"><?php echo $concept_catch;?></strong>
                        <p class="text-center leading-loose text-2 block "><?php echo $concept_text;?></p>
                    </div>
                <?php endwhile;?>
            <?php endif; ?>
        </div>
    </div>

    <div class="salon__solo--img mx-auto pb-38 relative">
        <div class="bg solo__img" style="background-image: url(<?php echo $salon_img02;?>)"></div>
    </div>

    <div id="salon__staff" >
        <div class="staff__container">
            <h2 class="sec__ttl--big mb-7">
                STAFF
            </h2>

            <div class="staff__content mx-auto flex justify-between items-start">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            // 現在の投稿のスラッグを取得
            $current_post_slug = get_post_field('post_name', get_the_ID());

            $args = array(
                'posts_per_page' => '6',
                'post_status' => 'publish',
                'paged' => $paged,
                'post_type' => 'tophair_staff',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tophair_staff_salon', // タクソノミー名
                        'field' => 'slug',                 // スラッグで一致させる
                        'terms' => $current_post_slug,     // 現在の投稿スラッグ
                    ),
                ),
            );

            $my_query = new WP_Query($args); // クエリの実行

            if ($my_query->have_posts()) :
                while ($my_query->have_posts()) : $my_query->the_post();
                    // 投稿の内容を出力
                    ?>
                    <?php 
                        $staff_job = get_field('staff_job');
                        $name = get_field('name');
                        $roma = get_field('roma');
                        $staff_img = get_field('staff_img');
                    ?>
                <div class="staff__content--item mb-10">
                    <div class="thumb bg mb-2.4" style="background-image: url(<?php echo $staff_img;?>);"></div>
                    <div class="flex info items-end justify-between">
                        <p class="text-2.5">
                            <span class="block text-1.4 mb-1.8"><?php echo $staff_job;?></span>
                            <?php echo $name;?>
                        </p>
                        <small class="block"><?php echo $roma;?></small>
                    </div>
                </div>

                <?php
                endwhile;

            else :
                echo '<p>該当するスタッフ情報が見つかりません。</p>';
            endif;

            wp_reset_postdata(); // クエリのリセット
            ?>
            </div>
        </div>
    </div>

    <div id="menu" class="pt-12 w-4/5 mx-auto pb-24">
        <div class="menu__wrap pt-66 bg relative">
            <h2 class="menu__wrap--ttl text-5 font-normal text-white vertical__center">MENU</h2>
            <div class="menu__wrap--list absolute top-36 right-0">
                <ul>
                    <li class="">
                        <a href="" class="flex text-black">
                            <div class="flex">
                                <p>HAIR</p>
                                <span>ヘア</span>
                            </div>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="flex text-black">
                            <div class="flex">
                                <p>SPA</p>
                                <span>スパ</span>
                            </div>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="flex text-black">
                            <div class="flex">
                                <p>NAIL</p>
                                <span>ネイル</span>
                            </div>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="flex text-black">
                            <div class="flex">
                                <p>ESTHE</p>
                                <span>エステ</span>
                            </div>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="flex text-black">
                            <div class="flex">
                                <p>EYELASH</p>
                                <span>アイ</span>
                            </div>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="flex text-black">
                            <p>頭顔リリース</p>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="flex text-black">
                            <p>成人式</p>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/top/menu_arrow.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="infomation" class="mx-auto pt-15 w-4\/5 mb-10 relative">
        <h2 class="sec__ttl--big mb-8">
            INFOMATION
        </h2>
        <div class="info__container flex items-start">
            <?php if( have_rows('salon_info') ): ?>
                <?php while( have_rows('salon_info') ): the_row();
                    $address = get_sub_field('address');
                    $map = get_sub_field('map');
                    $iframe = get_sub_field('iframe');
                    $tel = get_sub_field('tel');
                    $business_time1 = get_sub_field('business_time1');
                    $holiday = get_sub_field('holiday');
                    $parking = get_sub_field('parking');
                    $tel_time = get_sub_field('tel_time');
                    $reserved_link = get_sub_field('reserved_link');
                ?>
            <div class="info__content pt-4">

                <dl class="flex mb-6">
                
                    <dt>住所</dt>
                    <dd>
                        <a href="<?php echo $map;?>" class="flex">
                            <span><?php echo $address;?></span>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/salon/map-icon.svg" alt="">
                        </a>
                    </dd>
                </dl>
                <dl class="flex mb-6">
                    <dt>TEL</dt>
                    <dd><?php echo $tel;?></dd>
                </dl>
                <dl class="flex mb-6">
                    <dt>営業時間</dt>
                    
                    <dd>
                        <?php if( have_rows('business_time1') ): ?>
                            <?php while( have_rows('business_time1') ): the_row();
                            ?>
                            <?php if( have_rows('business_sub_time') ): ?>
                                <?php while( have_rows('business_sub_time') ): the_row();
                                    $business1 = get_sub_field('business1');
                                    $time = get_sub_field('time');
                                ?>
                        <dl class="flex">
                            <dt><?php echo $business1;?></dt>
                            <dd><?php echo $time;?></dd>
                        </dl>
                        <?php endwhile;?>
                        <?php endif; ?>
                        <?php endwhile;?>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl class="flex mb-6">
                    <dt>定休日</dt>
                    <dd>
                        <p><?php echo $holiday;?></p>
                    </dd>
                </dl>
                <dl class="flex mb-6">
                    <dt>駐車場</dt>
                    <dd><?php echo $parking;?></dd>
                </dl>

            </div>

            <?php echo $iframe;?>
            <?php endwhile;?>
            <?php endif; ?>
            
        </div>
    </div>

    <div id="reserve" class="pt-9 pb-15">
        <h2 class="sec__ttl--big mb-6">
            RESERVE
        </h2>
        <p class="text-center text-2 mb-6">お電話または、WEB予約（24時間受付）よりご予約を承っております。</p>
        <?php if( have_rows('salon_info') ): ?>
                <?php while( have_rows('salon_info') ): the_row();
                    $tel = get_sub_field('tel');
                    $tel_time = get_sub_field('tel_time');
                    $reserved_link = get_sub_field('reserved_link');
                ?>
            <a href="tel:<?php echo $tel;?>" class="button mb-1.6 mx-auto block text-2.5"><?php echo $tel;?></a>
            <p class="text-center text-2 mb-3">受付時間<?php echo $tel_time;?></p>
            <a href="<?php echo $reserved_link;?>" target="_blank" class="button mb-1.6 mx-auto block text-2.5">WEB</a>
            <p class="text-center text-2">24時間受付</p>
            <?php endwhile;?>
            <?php endif; ?>
    </div>

</div>


<?php get_template_part('templates/footer'); ?>