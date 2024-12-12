<?php get_template_part('templates/header'); ?>

<main id="main" class="">
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
        <div class="concept__container">
            <div class="flex justify-between">
                <div class="concept__img--first w-[84rem] bg pt-[112.2rem]"></div>

                <div class="concept__content pt-[10rem]">
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

                    <a href="" class="button__type--a">
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
        </div>
    </section>
</main>

<?php get_template_part('templates/footer'); ?>