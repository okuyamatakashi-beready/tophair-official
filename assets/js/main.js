
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
	予約のスライダー
*/
const reserve__slider = new Swiper(".reserve__slider", {
    loop: true, // ループさせる
    speed: 1500, // 少しゆっくり(デフォルトは300)
    slidesPerView: "auto", // スライドの幅を自動調整
    centeredSlides: false, // スライドを中央寄せにしない
    autoplay: false, // 自動再生なし

    // 矢印ナビゲーション
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
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


/*
	ニュース記事のajax
*/
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


/*
	ニュースのオーバーレイ
*/

document.addEventListener("DOMContentLoaded", function () {
    const newsDetail = document.querySelector("#news-detail");
    const overlay = document.querySelector(".overlay");
    const closeBtn = document.querySelector(".close-btn");

    console.log("✅ Overlay element:", overlay);

    if (!overlay) {
        console.error("❌ ERROR: `.overlay` が見つかりません！HTMLを確認してください！");
        return;
    }

    function showNewsDetail() {
        console.log("🔥 showNewsDetail() called");
        newsDetail.classList.add("active");

        // 🔥 `setTimeout()` でブラウザレンダリングを確実に適用
        setTimeout(() => {
            overlay.classList.add("active");
            console.log("✅ overlay classes:", overlay.classList);
        }, 10);
    }

    function hideNewsDetail() {
        console.log("🔥 hideNewsDetail() called");
        newsDetail.classList.remove("active");
        overlay.classList.remove("active");
        console.log("✅ overlay classes after hide:", overlay.classList);
    }

    // 🔥 `.news-item` に `click` イベントを適用
    document.addEventListener("click", function (event) {
        const item = event.target.closest(".news-item"); // 🔥 クリックされた要素の親を確認
        if (item) {
            console.log("🔥 Article clicked: Showing overlay");
            showNewsDetail();
        }
    });

    closeBtn.addEventListener("click", hideNewsDetail);
    overlay.addEventListener("click", hideNewsDetail);
});


/*
	ギャラリーページのモーダルウィンドウ
*/
document.addEventListener("DOMContentLoaded", function () {
    const galleryItems = document.querySelectorAll(".gallery-item");

    galleryItems.forEach(item => {
        item.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal-id");
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add("active");
            }
        });
    });

    // すべてのモーダルを取得
    const modals = document.querySelectorAll(".modal");

    modals.forEach(modal => {
        const closeButton = modal.querySelector(".modal-close");
        closeButton.addEventListener("click", function () {
            modal.classList.remove("active");
        });

        // モーダル外をクリックしたら閉じる
        modal.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.classList.remove("active");
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.querySelector(".overlay");
    console.log("Overlay element:", overlay); // 🔥 これが `null` ならHTML側の `.overlay` が存在しない！

    if (!overlay) {
        console.error("❌ ERROR: .overlay が見つかりません！");
        return;
    }
});

/*
	スムーススクロール
*/

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".smooth-scroll").forEach(function(anchor) {
        anchor.addEventListener("click", function(e) {
            const targetId = this.getAttribute("href").split("#")[1];
            const targetElement = document.getElementById(targetId);

            // スクロール先の要素が存在し、トップページにいる場合のみスムーススクロール
            if (targetElement && (window.location.pathname === "/" || window.location.pathname === "<?php echo parse_url(home_url(), PHP_URL_PATH); ?>")) {
                e.preventDefault(); // デフォルトの動作をキャンセル
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // ヘッダー固定時は適宜調整
                    behavior: "smooth"
                });
            }
        });
    });
});

/*
	toggleボタンを押したとき
*/
document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("toggle");
    const closeButton = document.querySelector(".close");
    const navigation = document.querySelector(".navigation");

    // ナビゲーションを開く
    toggle.addEventListener("click", function () {
        navigation.classList.add("active");
    });

    // ナビゲーションを閉じる
    closeButton.addEventListener("click", function () {
        navigation.classList.remove("active");
    });

    // ナビゲーション外をクリックしたら閉じる
    document.addEventListener("click", function (event) {
        if (!navigation.contains(event.target) && !toggle.contains(event.target) && !event.target.classList.contains("close")) {
            navigation.classList.remove("active");
        }
    });
});


/*
	スクロール後headerの色変更
*/


/*
	予約ボタンを押した時の挙動
*/
document.addEventListener("DOMContentLoaded", function () {
    const reserveButton = document.querySelector(".float__reserve");
    const closeButtonFloat = document.querySelector(".float__close");
    const reserveFixed = document.querySelector(".reserve_fixed");
    const closeButton = document.querySelector(".close_reserve");

    // .float__reserve をクリック → .reserve_fixed を表示 & .float__reserve を非表示にして .float__close を表示
    reserveButton.addEventListener("click", function () {
        reserveFixed.classList.add("active");
        reserveButton.style.display = "none";
        closeButtonFloat.style.display = "block";
    });

    // .float__close をクリック → .reserve_fixed を閉じて .float__reserve を再表示
    closeButtonFloat.addEventListener("click", function () {
        reserveFixed.classList.remove("active");
        reserveButton.style.display = "block";
        closeButtonFloat.style.display = "none";
    });

    // 閉じるボタンをクリック → .reserve_fixed を閉じる
    closeButton.addEventListener("click", function () {
        reserveFixed.classList.remove("active");
        reserveButton.style.display = "block";
        closeButtonFloat.style.display = "none";
    });

    // モーダル外をクリックしたら閉じる
    document.addEventListener("click", function (event) {
        if (!reserveFixed.contains(event.target) && !reserveButton.contains(event.target) && !closeButtonFloat.contains(event.target)) {
            reserveFixed.classList.remove("active");
            reserveButton.style.display = "block";
            closeButtonFloat.style.display = "none";
        }
    });
});





// jQuery(function () {
//     if (typeof jQuery.fn.fullpage !== "undefined" && !jQuery('#fullpage').hasClass('fp-enabled')) {
//         jQuery('#fullpage').fullpage({
//             scrollOverflow: true,    // スクロール可能にする
//             autoScrolling: false,    // 🔥 通常スクロールを有効にする
//             fitToSection: false,     // 🔥 自動でセクションにフィットしない
//             normalScrollElements: "#concept, #features, #salons, #news, #gallery, #studio, #recruit, #whats, footer",
//             afterLoad: function (origin, destination, direction) {
//                 console.log("🌍 セクションが変更されました:", destination.anchor);
//                 fadeAnime(); // fullPage.js の切り替え時にアニメーション適用
//                 handleScroll(); // fullPage.js の動作時も `header.scrolled` を適用
//             }
//         });

//         console.log("✅ `fullPage.js` が初期化されました。（通常スクロールと共存）");
//     } else {
//         console.warn("⚠️ `fullPage.js` はすでに初期化されています。");
//     }

//     // ✅ 通常スクロールで `fadeAnime()` を実行
//     jQuery(window).on("scroll", function () {
//         fadeAnime();
//     });

//     // ✅ ページ読み込み時にも `fadeAnime()` を実行
//     jQuery(window).on("load", function () {
//         fadeAnime();
//     });

//     // ✅ IntersectionObserver を利用して要素が画面内に入ったら `fadeUp` クラスを追加
//     const observer = new IntersectionObserver(entries => {
//         entries.forEach(entry => {
//             if (entry.isIntersecting) {
//                 entry.target.classList.add("fadeUp");
//             }
//         });
//     }, { threshold: 0.3 }); // 30% 以上表示されたら適用

//     // `.fadeUpTrigger` クラスの要素を監視
//     document.querySelectorAll(".fadeUpTrigger").forEach(el => {
//         observer.observe(el);
//     });
// });


/*
	スムーススクロール
*/

let lenis = new Lenis();

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);



document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".features__content--items");

    items.forEach(item => {
        item.addEventListener("mouseenter", function () {
            items.forEach(i => {
                if (i !== item) {
                    i.style.width = "0";
                    i.style.opacity = "0.6";
                }
            });
            item.style.width = "100vw"; // ✅ 画面いっぱいに広げる
            item.style.flexGrow = "3";
        });

        item.addEventListener("mouseleave", function () {
            items.forEach(i => {
                i.style.width = "25%";
                i.style.opacity = "1";
                i.style.flexGrow = "1";
            });
        });
    });
});
