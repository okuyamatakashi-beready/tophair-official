<!DOCTYPE html>
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		
		
		<title>リフォームワン株式会社</title>


		<!-- CSS -->
		<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/dist/main.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/scss/slick-theme.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/scss/slick.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="/images/common/favicon.ico" id="favicon">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

		
			<?php wp_head();?>
	</head>
<body>
<header id="header" class="top__header">
	<div class="header__container text-2xl">
		<div class="flex">
			<a href="/" class="header__logo">
				<img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" alt="">
			</a>

			<div class="header__right">
				<div class="flex">
					<a href="/contact" class="header__contact">
						<span class="text-blue-400">contact</span>
					</a>
					<div id="toggle">
						<div>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</header>

<div id="gnav">
	<div class="gnav__container">
		<div class="nav__content">
			<ul class="flex">
				<li>
					<a href="/concept">
						<p>コンセプト</p>
						<span>concept</span>
					</a>
				</li>
				<li>
					<a href="/works">
						<p>施工事例</p>
						<span>works</span>
					</a>
				</li>
				<li>
					<a href="/reform">
						<p>リフォーム</p>
						<span>reform</span>
					</a>
				</li>
				<li>
					<a href="/renovation">
						<p>リノベーション</p>
						<span>renovation</span>
					</a>
				</li>
				<li>
					<a href="/estate">
						<p>新築&不動産</p>
						<span>new construction & real estate</span>
					</a>
				</li>
			</ul>

			<ul class="flex">
				<li>
					<a href="/staff">
						<p>スタッフ</p>
						<span>staff</span>
					</a>
				</li>
				<li>
					<a href="/voice">
						<p>お客様の声</p>
						<span>voice</span>
					</a>
				</li>
				<li>
					<a href="/news">
						<p>お知らせ</p>
						<span>news</span>
					</a>
				</li>
				<li>
					<a href="/blog">
						<p>ブログ</p>
						<span>blog</span>
					</a>
				</li>
				<li>
					<a href="/company">
						<p>会社概要</p>
						<span>company</span>
					</a>
				</li>
			</ul>

			<div class="nav__wrap--btn">
				<a href="/contact" class="nav__btn--contact">
					<span>お問い合わせ</span>
				</a>

				<div class="flex">
					<a href="/visit" class="nav__btn--contact nav__btn--small">
						<span>来場予約</span>
					</a>
					<a href="/book" class="nav__btn--contact nav__btn--small">
						<span>資料請求</span>
					</a>
				</div>
			</div>

		</div>
		
	</div>
</div>


<div class="fixed__btn">
	<a href="/visit" class="btn reserve">来場予約</a>
	<a href="/book" class="btn material">資料請求</a>
</div>


	


<script>
    window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    const header = document.getElementById('header');
    const fixedBtn = document.querySelector('.fixed__btn');

    if (scrollPosition > 500) { 
        header.classList.add('show-header');
        fixedBtn.classList.add('show-fixed-btn');
    } else {
        header.classList.remove('show-header');
        fixedBtn.classList.remove('show-fixed-btn');
    }
});
</script>
    <main>
        <div id="mv">
			<div class="mv__wrapper">
				<video id="videoTop" autoplay muted playsinline loop width="1920px" height="1080px">
					<source src="<?php echo get_template_directory_uri(); ?>/images/top/mv.webm">
				</video>
                <div class="mv__catch">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/mv-logo.svg" alt="">
                    <p class="catch">
                        豊かなしあわせを運ぶために<br>
                        つくる・つくりかえる・生まれ変わる
                    </p>
                </div>
				
			</div>
            <div class="scroll">
                <p>scroll</p>
                <div>
                    <span></span>
                    <span></span>
                </div>
            </div>
		</div>
		<!-- //mv -->

        <div class="concept__bg">
            <section id="concept">
                <div class="concept__container">
                    <div class="flex">
                        <h2>
                            はじめまして<br>
                            リフォームワン株式会社です。
                        </h2>
                        <p class="concept__text">
                            上田市にて塗装業<span>60</span>余年、建設業も<span>25</span>年以上営んできた<br>
                            総合建築・不動産会社です。<br>
                            「住まいを通じて好循環型社会を創る」の経営理念のもと<br>
                            ヒト・モノ・おカネをスパイラルアップしながら循環させ、<br>
                            豊かな暮らしを共につくることをビジョンに掲げています。<br><br>

                            ただキレイにするだけなら誰でもできる…<br>
                            それに加えて「意味のあるリノベーション」を大切にしており、<br>
                            お客様の日常に寄り添いながらも<br>
                            ユニークさやこだわりを内包させる<br>
                            そんなリノベーションを手掛けていきます。
                        </p>
                    </div>
                    <a href="/concept" class="common__btn">
                        <div class="flex">
                            <p>view more</p>
                            <div class="common__btn--line">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div id="megureno">
                    <div class="megu__container">
                        <div class="flex">
                            <div class="megureno__img"></div>
                            <div class="megureno__content">
                                <strong>Megu/Reno〈メグリノ〉</strong>
                                <p class="megureno__text">
                                    リノベーションブランド〈メグリノ〉<br>
                                    建物もリユースで生まれ変わる。<br>
                                    空き家の有効活用や築古物件の再生、<br>
                                    価値を終えたモノたちにも再び意味を持たせ<br>
                                    価値のあるものへ生まれ変わらせる<br>
                                    そんなことが大好きな集団。<br><br>

                                    不要を必要に変え、無価値を高価値へ導く。<br>
                                    巡りのリノベは、豊かなしあわせを運ぶ。<br>
                                    巡り巡って、あなたの理想を叶えるために。
                                </p>

                                <a href="/concept#megureno" class="common__btn">
                                    <div class="flex">
                                        <p>view more</p>
                                        <div class="common__btn--line">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/megureno_bg.png" alt="" class="megureno__bg">
                </div>


            </section>


            
        </div>

        <section id="news">
            <div class="news__container flex">
                <div class="news__content news__wrap">
                    <h2><p>
                        news<span>お知らせ</span>
                        </p>
                    </h2>

                    <ul>
                    <?php
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
                        $args = array(
                            'posts_per_page' => '3',
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'category_name' => 'news',
                        );
                        ?>
                        <?php $my_query = new WP_Query( $args ); ?><!-- クエリの指定 -->

                            <?php if ( $my_query->have_posts() ) :

                                while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                        <li>
                            <div class="flex">
                                <span class="new">new</span>
                                <span class="time"><?php the_date(); ?></span>
                            </div>
                            <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    <a href="/news" class="common__btn common__btn--white">
                        <div class="flex">
                            <p>view more</p>
                            <div class="common__btn--line">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="news__content blog__wrap">
                    <h2><p>
                        blog<span>ブログ</span>
                        </p>
                    </h2>

                    <ul>
                    <?php
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
                        $args = array(
                            'posts_per_page' => '3',
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'category_name' => 'blogs, president',
                        );
                        ?>
                        <?php $my_query = new WP_Query( $args ); ?><!-- クエリの指定 -->

                            <?php if ( $my_query->have_posts() ) :

                                while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                        <li>
                            <div class="blog__content flex">
                                <div class="blog__thumb" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                                <div class="blog__info">
                                    <div class="flex">
                                        <span class="new">new</span>
                                        <span class="time"><?php the_date(); ?></span>
                                    </div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    <a href="/blog" class="common__btn common__btn--white">
                        <div class="flex">
                            <p>view more</p>
                            <div class="common__btn--line">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <div id="gallery">
            <div class="">
                <div class="colum01 flex">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery01.jpg" alt="" class="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery02.jpg" alt="" class="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery03.jpg" alt="" class="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery04.jpg" alt="" class="">
                </div>
                <div class="colum02 flex">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery05.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery06.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery07.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery08.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery09.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery05-sp.png" alt="" class="sp">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery06-sp.png" alt="" class="sp">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery07-sp.png" alt="" class="sp">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery08-sp.png" alt="" class="sp">
                </div>
                <div class="colum03 flex">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery10.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery11.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery12.jpg" alt="" class="pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top/gallery13.jpg" alt="" class="pc">
                </div>


            </div>
        </div>

        <section id="staff">
            <div class="staff__container">
                <h2 class="sec__ttl flex">
                    staff<span>oneのスタッフ紹介</span>
                </h2>
                <div class="staff__slide">
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff01.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff01-02.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff02.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff02-02.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff03.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff03-02.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff04.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff04-02.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff05.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff05-02.png" alt="">
                    </div>
                    <!-- <div class="slide">
                        <img src="</?php echo get_template_directory_uri(); ?>/images/staff/staff06.png" alt="">
                        <img src="</?php echo get_template_directory_uri(); ?>/images/staff/staff06-02.png" alt="">
                    </div> -->
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff07.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff07-02.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff08.png" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff/staff08-02.png" alt="">
                    </div>
                </div>
                <a href="/staff" class="common__btn">
                    <div class="flex">
                        <p>view more</p>
                        <div class="common__btn--line">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <section id="contact">
            <div class="contact__container">
                <div class="flex">
                    <div class="contact__thumb"></div>
                    <div class="contact__content">
                        <div class="contact__content__wrap">
                            <h2 class="sec__ttl flex">
                                contact<span>お問い合わせ</span>
                            </h2>
                            <p>
                            リフォームワンでリノベーションや家づくりをお考えの方は、<br class="pc">
                            お気軽にご相談ください。
                            </p>
                            <div class="nav__wrap--btn">
                                <a href="/contact" class="nav__btn--contact">
                                    <span>お問い合わせ</span>
                                </a>

                                <div class="flex">
                                    <a href="/visit" class="nav__btn--contact nav__btn--small">
                                        <span>来場予約</span>
                                    </a>
                                    <a href="/book" class="nav__btn--contact nav__btn--small">
                                        <span>資料請求</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


<?php get_footer();?>