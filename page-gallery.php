<?php get_template_part('templates/header'); ?>
<div id="page__mv" class="pt-80 bg w-full"></div>
    <div class="gallery__content pt-12">
        <h2 class="sec__ttl--big mb-2.6">
            GALLERY
        </h2>
        <ul class="gallery__cat flex pb-13.5 justify-center">
            <li class="pr-3 text-2">
                <a href="">ALL</a>
            </li>
            <li class="px-3 text-2">
                <a href="">HAIR</a>
            </li>
            <li class="pl-3 text-2">
                <a href="">NAIL</a>
            </li>
        </ul>

        <div class="gallery__list pt-13.5">
            <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
                $args = array(
                    'posts_per_page' => '6',
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'post_type' => 'tophair-gallery',
                );
                ?>
                <?php $my_query = new WP_Query( $args ); ?><!-- クエリの指定 -->

                <?php if ( $my_query->have_posts() ) :

                while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

                <?php 
                    $tophair_img = get_field('tophair_img');
                ?>
                
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>
                    <div class="swiper-slide bg "style="background-image: url(<?php echo $tophair_img;?>);"></div>


                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>


<?php get_template_part('templates/footer'); ?>