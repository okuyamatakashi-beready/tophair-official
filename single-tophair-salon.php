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

    <div class="salon__solo--img mx-auto pb-38">
        <div class="bg solo__img" style="background-image: url(<?php echo $salon_img02;?>)"></div>
    </div>
</div>


<?php get_template_part('templates/footer'); ?>