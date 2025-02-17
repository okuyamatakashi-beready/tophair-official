<?php get_template_part('templates/header'); ?>

<main id="fullpage" class="">

    <div class="section">
        <div id="mv" class="w-full relative h-screen  ">
            <video autoplay muted loop playsinline class="main-video absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 min-w-[100vw] min-h-[100vh] object-cover">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/top/MV_PC.webm" type="video/mp4">
                <!-- 動画が再生されない場合の代替テキスト -->
                Your browser does not support the video tag.
            </video>

            <div class="mv_catch absolute top-[40rem] right-[13rem]">
                <strong class="text-[4rem] leading-normal mb-[3.7rem] text-white block font-normal">
                    健康でいて、美しく。<br>
                    理想へ導くウェルビーイングサロン
                </strong>
                <p class="text-white text-[1.5rem] leading-[2em]">
                    一過性の美しいではない、安全、安心のもとに成立する<br>
                    「健康」をベースにクリエイティブしていきます。
                </p>
            </div>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" alt="" class="absolute bottom-0 w-[70%] left-0 right-0 m-auto">
        </div>

        <section id="concept" class=" pt-[30rem] w-full">
            <div class="concept__container bg-white">
                <div class="flex justify-between">
                    <div class="concept__img--first w-[84rem] bg pt-[112.2rem]"></div>

                    <div class="concept__content pt-[10rem] pb-24">
                        <h2 class=" text-[3rem] font-normal mb-[11.7rem] mr-[11.7rem]">CONCEPT</h2>
                        <strong class="block text-[4rem] font-normal mb-24">
                            健康でいて、美しく。<br>
                            理想へ導くウェルビーイングサロン
                        </strong>
                        <p class="text-[1.5rem] leading-[2em] mb-10 block">
                            当たり前になってしまった特別、多くのサロンが立ち並ぶ現在、<br>
                            「どこで、誰に」その時間を託すのかが<br>
                            とても難しい選択になってしまっている気がします。<br>
                            その結果、特別が作業の様な時間になっていませんか？
                        </p>
                        <p class="text-[1.5rem] leading-[2em] mb-[11rem] block">
                            特別を無意識にならないでほしい。<br>
                            選択肢の中で、TOP HAIRに辿り着いたその時私たちはそう願います。
                        </p>

                        <a href="/concept" class="button__type--a">
                            <div>
                                <span>MORE</span>
                            </div>
                        </a>
                    </div>

                    <div class="concept__img--second w-[15rem] bg pt-[112.2rem]"></div>
                </div>
            </div>
        </section>

        <section id="features" class="pt-[44rem] mt-[-11rem]">
            <div class="features__ttl">
                <h2 class="sec__ttl--big">
                    FOUR FEATURES
                </h2>
                <p class="text-center text-[1.5rem] mt-7 leading-loose pb-10">
                    TOP HAIRが特に大切にしている4つの特徴。<br>
                    そのすべてがお客様を健康でいて美しい状態へ導く為に創業から今も変わらず大切にしていることです。
                </p>
            </div>

            <div class="flex features__content flex-wrap">
                <div class="features__content--items w-1/4 relative bg pt-[89rem]">
                    <div class="features__content--ttl vertical__center text-white  text-center">
                        <span class=" text-3 pb-3.5 block ">01</span>
                        <strong class="text-4 font-normal">SHAMPOO</strong>
                        <p class="text-1.3">シャンプー</p>
                    </div>
                </div>
                <div class="features__content--items w-1/4 relative bg pt-[89rem]">
                    <div class="features__content--ttl vertical__center text-white text-center">
                        <span class=" text-3 pb-3.5 block ">02</span>
                        <strong class="text-4 font-normal">COUNSELING</strong>
                        <p class="text-1.3">カウンセリング</p>
                    </div>
                </div>
                <div class="features__content--items w-1/4 relative bg pt-[89rem]">
                    <div class="features__content--ttl vertical__center text-white text-center">
                        <span class=" text-3 pb-3.5 block ">03</span>
                        <strong class="text-4 font-normal">SPACE</strong>
                        <p class="text-1.3">空間</p>
                    </div>
                </div>
                <div class="features__content--items w-1/4 relative bg pt-[89rem]">
                    <div class="features__content--ttl vertical__center text-white text-center">
                        <span class=" text-3 pb-3.5 block ">04</span>
                        <strong class="text-4 font-normal">STAFF</strong>
                        <p class="text-1.3">スタッフ</p>
                    </div>
                </div>

            </div>
        </section>


        <section id="salons" class=" pt-32">
            <h2 class="sec__ttl--big">SALONS</h2>
            <ul class="salon__list flex mt-5.1 mb-10 items-center justify-center text-2">
                <li class="px-3 text-center">ALL</li>
                <li class="px-3 text-center">知立</li>
                <li class="px-3 text-center">安城</li>
                <li class="px-3 text-center">刈谷</li>
                <li class="px-3 text-center">名古屋市緑区</li>
            </ul>



        </section>
    </div>
    <!-- フルページを使う準備 -->
    <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
        $args = array(
            'posts_per_page' => '12',
            'post_status' => 'publish',
            'paged' => $paged,
            'post_type' => 'tophair-salon',
        );
        ?>
        <?php $my_query = new WP_Query( $args ); ?><!-- クエリの指定 -->

    <?php if ( $my_query->have_posts() ) :

        while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <?php 
            $top_img = get_field('top_img');
            $city = get_field('city');
            $furigana = get_field('furigana');
            $salon_img = get_field('salon_img');
            $concept = get_field('concept');
            $salon_img02 = get_field('salon_img02');
            $salon_info = get_field('salon_info');
        ?>
    <div class="section w-full h-screen bg-slate-100 salon__content slide slide1">
        <div class="salons__thumb bg w-full mb-5.3" style="background-image: url(<?php echo $top_img;?>)"></div>
        <div class="flex justify-between">
            <div class="salon__ttl ml-17">
                <strong class="block font-normal text-3.9 mb-1.5">TOP HAIR <?php the_title(); ?></strong>
                <span class="block text-2 mb-6"><?php echo $furigana;?></span>
                <p class="text-2">in <?php echo $city;?></p>
            </div>

            <div class="salon__info mr-5">
            <?php if( have_rows('salon_info') ): ?>
                <?php while( have_rows('salon_info') ): the_row();
                    $address = get_sub_field('address');
                    $map = get_sub_field('map');
                    $tel = get_sub_field('tel');
                    $holiday = get_sub_field('holiday');
                ?>
                <dl class="flex">
                    <dt>住所</dt>
                    <dd class="flex">
                        <span>〒472-0005 <?php echo $address;?></span>
                        <a href="<?php echo $map;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/images/top/salon_map_icon.svg" alt=""></a>
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>TEL</dt>
                    <dd><?php echo $tel;?></dd>
                </dl>
                <dl class="flex">
                    <dt>定休日</dt>
                    <dd><?php echo $holiday;?></dd>
                </dl>
            <?php endwhile;?>
            <?php endif; ?>

            <ul class="flex flex-wrap mt-3.6 justify-start">
                <?php
                // 現在の投稿に関連付けられた `tophair-menu` のタームを取得
                $terms = get_the_terms(get_the_ID(), 'tophair_menu');
                if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                        ?>
                        <li class="mr-1">
                            <div class="salon__menu--list"><?php echo esc_html($term->name); ?></div>
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

            </div>
            <a href="<?php the_permalink(); ?>" class="more absolute text-1.2 text-center text-black block">MORE</a>
        </div>
    </div>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>	

    <div class="section fp-auto-height slide">
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

        <section id="news" class="pt-10 pb-10">
            <div class="news__container ">
                <h2 class="sec__ttl--big mb-5 text-left">
                    NEWS
                </h2> 
                <dl class=" py-5">
                    <dt class="flex ">
                        <span class="time text-1.5 mr-5">2024.09.01</span>
                        <span class="cat text-1.5">NEWS</span>
                    </dt>
                    <dd>
                        <p class="text-2 text-black">ニュースタイトル０１</p>
                    </dd>
                </dl>
                <dl class=" py-5">
                    <dt class="flex">
                        <span class="time text-1.5">2024.09.01</span>
                        <span class="cat text-1.5">NEWS</span>
                    </dt>
                    <dd>
                        <p class="text-2 text-black">ニュースタイトル０１</p>
                    </dd>
                </dl>
                <dl class=" py-5">
                    <dt class="flex">
                        <span class="time text-1.5">2024.09.01</span>
                        <span class="cat text-1.5">NEWS</span>
                    </dt>
                    <dd>
                        <p class="text-2 text-black">ニュースタイトル０１</p>
                    </dd>
                </dl>
                <a href="" class="button__type--a ml-auto mt-4.7">
                    <div>
                        <span>VIEW MORE</span>
                    </div>
                </a>
            </div>
        </section>

        <section id="gallery" class="w-full">
            <div class="gallery__bg w-full relative bg">
                <div class="gallery__bg--content absolute">
                    <div class="gallery__bg--content--ttl mb-6">
                        <h2 class="sec__ttl--big mb-5">
                            GALLERY
                        </h2>
                        <ul class="flex justify-center text-2">
                            <li class=" pr-2">
                                <p>HAIR</p>
                            </li>
                            <li class=" pl-2">
                                <p>NAIL</p>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="gallery__bg--slider swiper">
                        <div class="swiper-wrapper">
                            
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
                                if (!$tophair_img) {
                                    error_log('tophair_img が取得できませんでした。ポストID: ' . get_the_ID());
                                }
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
                        <a href="" class="button__type--a ml-auto mt-4.7 mr-25">
                            <div>
                                <span>VIEW MORE</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="studio" class="pt-20 mb-21">
            <a href="">
                <div class="studio__container bg mx-auto pt-41 relative">
                    <h2 class="sec__ttl--big text-white vertical__center">
                        STUDIO
                    </h2>
                </div>
            </a>
        </section>

        <section id="recruit" class="pt-16 pb-32">
            <div class="recruit__container mx-auto">
                <div class="recruit__content">
                    <h2 class="sec__ttl--big mb-4">
                        RECRUIT
                    </h2>
                    <div class="recruit__content--img bg pt-70 mb-7"></div>
                    <div class="recruit__content--text">
                        <strong class=" block text-5 mb-4.7 font-normal">
                            私より、私を<br>
                            信じてくれる人がいる。
                        </strong>
                        <p class=" text-1.5 leading-loose">
                            仕事には、人生が出る。<br>
                            たとえば、家族とのひとときも、パートナーとのボタンの掛け違いも<br>
                            職場での表情や振る舞いになってあらわれる。<br>
                            だとすれば、人生が良くなれば、仕事も良くなっていく。<br>
                            だからTOPHAIRは、人生の話をします。<br>
                            一人ひとりがより良い人生を生き、より良い仕事ができるように。
                        </p>
                        <a href="" class="button__type--a ml-auto mt-4.7">
                            <div>
                                <span>VIEW MORE</span>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </section>

        <section id="whats" class="pt-20 relative w-full pb-11">
            <div class="top w-full relative"></div>
            <div class="whats__container mx-auto">
                <h2 class="sec__ttl--big mb-4">
                    WHAT’S “TOP”?
                </h2>
                <a href="" class="block">
                    <div class="whats__img bg mb-12 pt-70 relative">
                        <div class="whats__img--text vertical__center">
                            <h2 class="sec__ttl--big text-white font-normal">
                                COMPANY
                            </h2>
                        </div>
                    </div>
                </a>

                <p class="text-3 whats__container--text text-center mb-6">CREATIVE & HEALTHY WELLBEING</p>

                <div class="whats__container--slider whats-swiper">
                    <div class="swiper-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/top/whats_logo.svg" alt="" class="swiper-slide">
                    </div>
                </div>
                <small class=" block mt-6 leading-loose">
                    The essence of TOP HAIR’s service is “people”.<br>
                    We are attractive as human beings, like people, and can sincerely appreciate them.<br>
                    We believe that we can provide the best hospitality because these feelings overflow from our words and behavior.<br>
                    We believe in the potential of each TOP HAIR staff member and each person, and are trying to nurture their human ability,<br>
                    not only to improve their technical skills, but also to improve their life itself.
                </small>
            </div>
        </section>
        <footer id="footer" class="w-full relative bg">
            <div id="contact" class="pt-35 bg relative">
                <a href="" class="block absolute vertical__center">
                    <h2 class="sec__ttl--big text-white pt-2 pb-1.6">
                        CONTACT
                    </h2>
                </a>
            </div>

            <div class="footer__content pt-10 pb-5">
                <div class="footer__wrapper mx-auto">
                    <h2 class="sec__ttl--big text-3 ml-13 mb-5">
                        CONTANTS
                    </h2>
                    <div class="footer__wrapper--link pt-7 pb-3">
                        <div class="sitemap justify-between flex">
                            <ul class="flex ml-12 flex-wrap">
                                <li>
                                    <a href="/concept"><span class="pr-1.5">ー</span>コンセプト</a>
                                </li>
                                <li>
                                    <a href="/gallery"><span class="pr-1.5">ー</span>ギャラリー</a>
                                </li>
                                <li>
                                    <a href=""><span class="pr-1.5">ー</span>トップヘアの特徴</a>
                                </li>
                                <li>
                                    <a href="/recruit"><span class="pr-1.5">ー</span>リクルート</a>
                                </li>
                                <li>
                                    <a href=""><span class="pr-1.5">ー</span>サロン</a>
                                </li>
                                <li>
                                    <a href="/about"><span class="pr-1.5">ー</span>会社概要</a>
                                </li>
                                <li>
                                    <a href="/menu"><span class="pr-1.5">ー</span>メニュー</a>
                                </li>
                                <li>
                                    <a href=""><span class="pr-1.5">ー</span>コンタクト</a>
                                </li>
                                <li>
                                    <a href="/news"><span class="pr-1.5">ー</span>ニュース</a>
                                </li>
                                <li>
                                    <a href="/faq"><span class="pr-1.5">ー</span>よくある質問</a>
                                </li>
                            </ul>

                            <div class="reserve">
                                <a href="" class="ft__reserve block mb-1">
                                    <span class="py-2.4 block text-center text-1.5">リクルート ｜ 採用情報</span>
                                </a>
                                <a href="" class="ft__reserve block">
                                    <span class="py-2.4 block text-center text-1.5">リザーブ ｜ サロン予約</span>
                                </a>
                            </div>
                        </div>

                        <div class="info__content text-1.5 ml-auto flex justify-between">
                            <div class="info__content--address"><p>株式会社トップヘアー　　〒472-0056　愛知県知立市宝3-5-1</p></div>
                            <div class="info__content--policy flex">
                                <a href="" class="block mr-3">プレスリリース</a>
                                <a href="" class="block">プライバシーポリシー</a>
                            </div>
                            <div class="info__content--sns flex">
                                <p>SNS</p>
                                <ul class="flex">
                                    <li class=" mr-2.5">
                                        <a href="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/common/footer_insta.svg" alt="" class="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/common/footer_tiktok.svg" alt="" class="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <small class="copy block text-center pt-3 text-1.5">©︎2024 TOP HAIR Co.,LTD. All Rights Reserved.</small>
                </div>
            </div>
        </footer>

    </div>

</main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.js" integrity="sha512-XOpdFagEEv9XMxN/2EdvFL/PfGtFDjX+AkRznsFHDtdC05YWdkMnz5JZUfrbnEabOQaMc7YNTl2xPbOu3J858Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.extensions.min.js" integrity="sha512-0xW5KFMtT462F65vVvIejNawM1U2Fp/yhItmQVFUwdYP+R9tQFCn4QtLEhkp6RoGovZ6YCvbxy+GVCtGv0+nvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/vendors/jquery.easings.min.js" integrity="sha512-rXZZDfRSa6rsBuT78nRTbh1ccwpXhTCspKUDqox3hUQNYdjB6KB6mSj6mXcB9/5F5wODAJnkztXPxzkTalp11w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/vendors/scrolloverflow.min.js" integrity="sha512-FzESM/E7XJBqcJyrXa08gRcpp5rDHO661C0L3vH4NsZfUWUsjN4+t6Lg8h+e8TMR2aYijIrcT+CPGq7tSugRzA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
<?php wp_footer();?>




</html>