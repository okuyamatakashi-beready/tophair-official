jQuery(function () {
    jQuery('#fullpage').fullpage({
        scrollOverflow:true,
    });
});

/*
	ギャラリーのスライダー
*/
const swiper = new Swiper(".swiper", {
    loop: true, // ループさせる
    allowTouchMove: false, // マウスでのスワイプを禁止
    speed:1500, // 少しゆっくり(デフォルトは300)
    slidesPerView: 4.2,
    autoplay: { // 自動再生
      delay: 5000, // 2秒後に次のスライド
      disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
    },
    });


/*
	whats topのスライダー
*/
const whats_swiper = new Swiper(".whats-swiper", {
    loop: true, // ループさせる
    allowTouchMove: false, // マウスでのスワイプを禁止
    speed:10000, // 少しゆっくり(デフォルトは300)
    slidesPerView: 2,
    loopAdditionalSlides: 1,
    allowTouchMove: false, // スワイプ無効
    autoplay: {
        delay: 0, // 途切れなくループ
    },
});
/*
	salon_swiperのスライダー
*/
const salon_swiper = new Swiper(".salon__swiper", {
    loop: true, // ループさせる
    speed:1000, // 少しゆっくり(デフォルトは300)
    slidesPerView: 2.1,
    centeredSlides : true,
    initialSlide: 1,
    autoplay: {
        delay: 1500,
    },
});


/*
	コンセプトページ追従
*/
$(window).on('scroll', function() {
    var scrollPos = $(document).scrollTop();
    $('#global-menu a').each(function() {
        var currLink = $(this);
        var refElement = $(currLink.attr('href'));
      if (refElement.length) { // idが存在するか確認
        var offsetTop = refElement.position().top + -100; // オフセットを追加
        if (offsetTop <= scrollPos && offsetTop + refElement.height() > scrollPos) {
            $('#global-menu li').removeClass('active');
            currLink.parent().addClass('active');
        }
        else {
            currLink.parent().removeClass('active');
        }
    }
    });
});


/*
	menu スライドトグル
*/

$(document).ready(function(){
    $(".menu__wrapper dl.menu__list").click(function(){
        $(this).find("dd").slideToggle();
        $(this).find("dt").toggleClass("open");
    });
});

/*
	FAQ スライドトグル
*/

$(document).ready(function(){
    $(".faq__content--item").click(function(){
        $(this).find("dd").slideToggle();
        $(this).find("dt").toggleClass("open");
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const newsContainer = document.querySelector(".news__content");
    const newsDetail = document.querySelector("#news-detail");
    const newsContentArea = document.querySelector("#news-content-area");
    const closeBtn = document.querySelector(".close-btn");

    let currentPage = 1;
    let maxPages = 1;

    // ✅ 初回ロード
    loadNews(currentPage);

    function loadNews(page) {
        fetch(ajaxurl, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `action=load_news&paged=${page}`,
        })
        .then(response => response.json())
        .then(data => {
            console.log("News Data Received:", data);

            // ✅ 記事一覧を `.news__content` に更新
            newsContainer.innerHTML = data.news_html;

            // ✅ ページネーションを `.news__content` の後に配置
            newsContainer.insertAdjacentHTML("beforeend", data.pagination_html);

            currentPage = data.current_page;
            maxPages = data.max_pages;

            addClickEvents();
            addPaginationEvents();
        })
        .catch(error => console.error("Error loading news:", error));
    }

    function addClickEvents() {
        document.querySelectorAll(".news__content .content dl").forEach(item => {
            item.addEventListener("click", function () {
                const postId = this.getAttribute("data-id");
                console.log("Clicked Post ID:", postId);
                loadArticle(postId);
            });
        });
    }

    function addPaginationEvents() {
        document.querySelectorAll("#pagination .pagination-btn").forEach(button => {
            button.addEventListener("click", function () {
                const page = this.getAttribute("data-page");
                if (page) {
                    loadNews(parseInt(page));
                }
            });
        });
    }

    function loadArticle(postId) {
        fetch(ajaxurl, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `action=load_news_detail&post_id=${postId}`,
        })
        .then(response => response.json())
        .then(data => {
            console.log("Received Post Data:", data);

            if (data.success) {
                newsContentArea.innerHTML = data.content;
                newsDetail.classList.add("active");

                document.querySelectorAll(".prev-article, .next-article").forEach(button => {
                    button.addEventListener("click", function () {
                        const newPostId = this.getAttribute("data-id");
                        console.log("Navigating to Post ID:", newPostId);
                        loadArticle(newPostId);
                    });
                });
            } else {
                newsContentArea.innerHTML = `<p>記事が見つかりません。</p>`;
                console.error("Error:", data.message || "Invalid data received");
            }
        })
        .catch(error => console.error("Error loading post:", error));
    }

    closeBtn.addEventListener("click", function () {
        newsDetail.classList.remove("active");
    });
});
