<!DOCTYPE html>
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		
		
		<title>リフォームワン株式会社</title>


		<!-- CSS -->
		<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/scss/main.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/scss/slick-theme.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/scss/slick.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="/images/common/favicon.ico" id="favicon">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

		
			<?php wp_head();?>
	</head>
<body>
<header id="header">
	<div class="header__container">
		<div class="flex">
			<a href="/" class="header__logo">
				<img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" alt="">
			</a>

			<div class="header__right">
				<div class="flex">
					<a href="/contact" class="header__contact">
						<span>contact</span>
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
					<a href="/pre">
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
	

