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
    <div class="section w-full h-screen bg-slate-100 salon__content slide slide1">
        <div class="salons__thumb bg w-full mb-5.3 tophairterrace"></div>
        <div class="flex justify-between">
            <div class="salon__ttl ml-17">
                <strong class="block font-normal text-3.9 mb-1.5">TOP HAIR TERRACE</strong>
                <span class="block text-2 mb-6">トップヘア テラス</span>
                <p class="text-2">in 知立</p>
            </div>

            <div class="salon__info mr-5">
                <dl class="flex">
                    <dt>住所</dt>
                    <dd class="flex">
                        <span>〒472-0005 愛知県知立市新池3-102</span>
                        <a href="" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/images/top/salon_map_icon.svg" alt=""></a>
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>TEL</dt>
                    <dd>0566-55-2647</dd>
                </dl>
                <dl class="flex">
                    <dt>定休日</dt>
                    <dd>毎週月曜日</dd>
                </dl>

                <ul class="flex flex-wrap mt-3.6 justify-start">
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">HAIR</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">SPA</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">NAIL</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">ESTHE</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">EYELASH</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">頭顔リリース</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">成人式</a>
                    </li>
                </ul>
            </div>
            <a href="" class="more absolute text-1.2 text-center text-black block">MORE</a>
        </div>
    </div>

    <div class="section w-full h-screen bg-slate-100 salon__content slide slide1">
        <div class="salons__thumb bg w-full mb-5.3 tophairlounge"></div>
        <div class="flex justify-between">
            <div class="salon__ttl ml-17">
                <strong class="block font-normal text-3.9 mb-1.5">TOP HAIR Lounge </strong>
                <span class="block text-2 mb-6">トップヘア ラウンジ</span>
                <p class="text-2">in 知立</p>
            </div>

            <div class="salon__info mr-5">
                <dl class="flex">
                    <dt>住所</dt>
                    <dd class="flex">
                        <span>〒472-0058 愛知県知立市上重原2-31</span>
                        <a href="" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/images/top/salon_map_icon.svg" alt=""></a>
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>TEL</dt>
                    <dd>0566-91-4511</dd>
                </dl>
                <dl class="flex">
                    <dt>定休日</dt>
                    <dd>毎週月曜日</dd>
                </dl>

                <ul class="flex flex-wrap mt-3.6 justify-start">
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">HAIR</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">SPA</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">NAIL</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">ESTHE</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">EYELASH</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">頭顔リリース</a>
                    </li>
                    <li class=" mr-1">
                        <a href="" class="salon__menu--list">成人式</a>
                    </li>
                </ul>
            </div>
            <a href="" class="more absolute text-1.2 text-center text-black block">MORE</a>
        </div>
    </div>


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

        <section id="news"></section>
    </div>

</main>

<?php get_template_part('templates/footer'); ?>