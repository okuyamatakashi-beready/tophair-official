<?php get_template_part('templates/header-news'); ?>

<div class="faq">
    <div class="faq__container mx-auto pt-20 pb-15">
        <h2 class="sec__ttl--big mb-8 text-center">
            FAQ
        </h2>

        <div class="faq__content">
            <?php
            // `tophair_qa` カスタム投稿の最新の1件を取得
            $args = array(
                'post_type'      => 'tophair_qa',
                'posts_per_page' => 1,
                'post_status'    => 'publish',
            );

            $faq_query = new WP_Query($args);

            if ($faq_query->have_posts()) :
                while ($faq_query->have_posts()) : $faq_query->the_post();

                    // ACFの `faq_list` リピーターフィールドをループ
                    if (have_rows('qa')) :
                        while (have_rows('qa')) : the_row();
                            $question = get_sub_field('question'); // 質問
                            $answer = get_sub_field('answer'); // 回答
                            ?>
                            <dl class="faq__content--item">
                                <dt class="flex items-center relative pt-11 pb-9 pl-5">
                                    <p class="text-3">Q.</p>
                                    <span class="text-2 block"><?php echo esc_html($question); ?></span>
                                </dt>
                                <dd class="pl-10 py-8 leading-loose">
                                    <p class="text-2">
                                        <?php echo wp_kses_post(nl2br($answer)); ?>
                                    </p>
                                </dd>
                            </dl>
                            <?php
                        endwhile;
                    else :
                        echo '<p class="text-center">FAQ はまだ登録されていません。</p>';
                    endif;

                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">FAQ のデータが見つかりません。</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_template_part('templates/footer'); ?>
