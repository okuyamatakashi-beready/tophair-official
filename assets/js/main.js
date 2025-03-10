// jQuery('#fullpage').fullpage({
//     autoScrolling: true,  // ✅ fullPage.js のエリアだけ自動スクロール
//     fitToSection: true,   // ✅ セクションごとに自動スクロール
//     scrollOverflow: false,
//     normalScrollElements: "#concept, #features, #salons, #news, #gallery, #studio, #recruit, #whats, footer"
// });





$(function () {
    $(window).scroll(function () {
        // 画面スクロールの位置を取得
        var scroll = $(window).scrollTop();

        // スクロール位置が200pxを超えると scrolled クラスを付与
        if (scroll > 200) {
            $('#header').addClass('scrolled');
            $('.header_logo .white').hide();
            $('.header_logo .black').show();
            $('#header.scrolled svg path').attr("fill", "#000"); // 🔥 SVG の色を黒に変更
            $('body').addClass('scrolled');
        } else {
            $('#header').removeClass('scrolled');
            $('.header_logo .white').show();
            $('.header_logo .black').hide();
            $('#header svg path').attr("fill", "#fff"); // 🔥 元の白色に戻す
            $('body').removeClass('scrolled');
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector("#header");
    const body = document.body;
    const headerTrigger = document.querySelector("#mv");

    if (!headerTrigger) {
        console.error("❌ ERROR: `#mv` が見つかりません！");
        return;
    }

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            console.log("🔥 `#mv` の表示状態:", entry.isIntersecting);

            if (!entry.isIntersecting) {
                console.log("✅ `scrolled` クラスを追加");
                header.classList.add("scrolled");
                body.classList.add("scrolled");
                document.querySelector(".header_logo .white").style.display = "none";
                document.querySelector(".header_logo .black").style.display = "block";
                document.querySelector("#header svg path").setAttribute("fill", "#000");
            } else {
                console.log("❌ `scrolled` クラスを削除");
                header.classList.remove("scrolled");
                body.classList.remove("scrolled");
                document.querySelector(".header_logo .white").style.display = "block";
                document.querySelector(".header_logo .black").style.display = "none";
                document.querySelector("#header svg path").setAttribute("fill", "#fff");
            }
        });
    }, { threshold: 0.01 });

    observer.observe(headerTrigger);
});


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".text-split").forEach(el => {
        const text = el.innerText;
        el.innerHTML = text.split("").map((char, i) => 
            `<span style="transition-delay: ${i * 50}ms">${char}</span>`
        ).join("");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                }
            });
        }, { threshold: 0.3 });

        observer.observe(el);
    });
});



/*
	ギャラリーのスライダー
*/
const swiper = new Swiper(".swiper", {
    loop: true, // ループさせる
    allowTouchMove: false, // マウスでのスワイプを禁止
    speed: 1500, // 少しゆっくり(デフォルトは300)
    slidesPerView: 2.1, // デフォルト（PC）
    autoplay: { // 自動再生
      delay: 5000, // 5秒後に次のスライド
      disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
    },
    breakpoints: {
        768: { // 🔥 画面幅が768px以下の時
            slidesPerView: 4.2, // スライド枚数を2.1に変更
        }
    }
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
    slidesPerView: 1.2,
    centeredSlides : true,
    initialSlide: 1,
    autoplay: {
        delay: 1500,
    },
    breakpoints: {
        768: { // 🔥 画面幅が768px以下の時
            slidesPerView: 2.1, // スライド枚数を2.1に変更
        }
    }
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
    // ✅ 最初から open クラスがついている dt の ::after を非表示にする
    $(".menu__wrapper dl.menu__list.open dt").each(function(){
        $(this).addClass("open"); // クラスを再適用（CSSを確実に適用させる）
    });

    // ✅ 最初から open クラスがついている dl の dd は表示する
    $(".menu__wrapper dl.menu__list.open").find("dd").show();

    // ✅ クリック時のトグル動作
    $(".menu__wrapper dl.menu__list dt").click(function(){
        $(this).toggleClass("open").next("dd").slideToggle();
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu__list");

    menuItems.forEach((menu) => {
        const dt = menu.querySelector("dt");

        dt.addEventListener("click", function () {
            menu.classList.toggle("open");
        });
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
    // closeButton.addEventListener("click", function () {
    //     reserveFixed.classList.remove("active");
    //     reserveButton.style.display = "block";
    //     closeButtonFloat.style.display = "none";
    // });

    // モーダル外をクリックしたら閉じる
    document.addEventListener("click", function (event) {
        if (!reserveFixed.contains(event.target) && !reserveButton.contains(event.target) && !closeButtonFloat.contains(event.target)) {
            reserveFixed.classList.remove("active");
            reserveButton.style.display = "block";
            closeButtonFloat.style.display = "none";
        }
    });
});





/*
	スムーススクロール
*/

let lenis = new Lenis();

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);


// document.addEventListener("DOMContentLoaded", function () {
//     const items = document.querySelectorAll(".features__content--items");
//     const container = document.querySelector(".features__content"); // 親要素

//     if (!container) {
//         console.error("⚠️ `.features__content` が見つかりません！");
//         return;
//     }

//     // 親要素に `display: flex;` を適用
//     container.style.display = "flex";

//     function applyHoverEffect() {
//         // スマホでは無効化
//         if (window.innerWidth <= 768) {
//             items.forEach(i => {
//                 i.style.width = "25%"; // 全て均等に戻す
//                 i.style.flexGrow = "1";
//             });
//             return;
//         }

//         items.forEach(item => {
//             item.addEventListener("mouseenter", function () {
//                 if (window.innerWidth > 768) { // PCのみ適用
//                     items.forEach(i => {
//                         if (i !== item) {
//                             i.style.width = "10%"; // ✅ 小さくするが消えないように
//                             i.style.filter = "brightness(0.6)"; // ✅ ホバー時のみ暗くする
//                         }
//                     });
//                     item.style.width = "70%"; // ✅ 拡大
//                     item.style.flexGrow = "1";
//                     item.style.filter = "brightness(1)"; // ✅ ホバー時は元の明るさに戻す
//                 }
//             });

//             item.addEventListener("mouseleave", function () {
//                 if (window.innerWidth > 768) { // PCのみ適用
//                     items.forEach(i => {
//                         i.style.width = "25%"; // ✅ もとの4分割に戻す
//                         i.style.filter = "brightness(1)"; // ✅ 元の明るさに戻す
//                         i.style.flexGrow = "1";
//                     });
//                 }
//             });
//         });
//     }

//     applyHoverEffect(); // 初回実行

//     // ウィンドウリサイズ時にスマホかどうかを再チェック
//     window.addEventListener("resize", applyHoverEffect);
// });



// 動きのきっかけの起点となるアニメーションの名前を定義
function fadeAnime(){
    $('.fadeUpTrigger').each(function(){
        console.log("要素を検出:", this); // 🔍 どの要素が対象になっているか確認

        var elemPos = $(this).offset().top - 50;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();

        console.log("スクロール位置:", scroll, "要素位置:", elemPos, "ウィンドウ高さ:", windowHeight);

        if (scroll >= elemPos - windowHeight){
            console.log("✅ fadeUp クラス追加:", this);
            $(this).addClass('fadeUp');
        }
    });
}




document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("fadeUp");
            }
        });
    }, { threshold: 0.3 }); // 30% 表示されたら適用

    document.querySelectorAll(".fadeUpTrigger").forEach(el => observer.observe(el));
});




document.addEventListener("DOMContentLoaded", function () {
    function checkElementsInView() {
        const elements = document.querySelectorAll(".mask-animate");
        const windowHeight = window.innerHeight;

        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            if (elementTop < windowHeight * 0.9) { // 🔥 90% 画面内に入ったら発火
                element.classList.add("active");
            }
        });
    }

    // 初回チェック
    checkElementsInView();

    // スクロールイベントでチェック
    window.addEventListener("scroll", checkElementsInView);
});





document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".features__list > div"); // 各 `features__list` のセクション
    const menuItems = document.querySelectorAll("#global-menu .nav__item"); // `global-menu` のメニュー

    function updateActiveMenu() {
        let currentSection = null;
        const scrollPosition = window.scrollY + window.innerHeight * 0.3; // 画面の30%に入ったら有効

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = section;
            }
        });

        if (currentSection) {
            const currentId = currentSection.getAttribute("id");
            menuItems.forEach(item => {
                item.classList.remove("active"); // 🔥 `active` をリセット
                if (item.querySelector(`a[href="#${currentId}"]`)) {
                    item.classList.add("active"); // 🔥 対応する `li` に `active` を追加
                }
            });
        }
    }

    // スクロール時に `active` を更新
    window.addEventListener("scroll", updateActiveMenu);

    // 初回ロード時にも適用
    updateActiveMenu();
});



/*
	サロンページのスタッフのポプアップ
*/


document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("staff-modal");
    const modalContent = document.getElementById("staff-details");
    const closeModal = document.querySelector(".modal-close");

    // 🔥 スタッフをクリックしたらモーダル表示
    document.querySelectorAll(".staff__content--item").forEach(item => {
        item.addEventListener("click", function () {
            const staffId = this.getAttribute("data-id");

            // Ajaxでスタッフ詳細を取得
            fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=get_staff_details&staff_id=${staffId}`)
                .then(response => response.text())
                .then(data => {
                    modalContent.innerHTML = data;
                    modal.style.display = "flex"; // 🔥 モーダルを表示
                });
        });
    });

    // 🔥 モーダルを閉じる
    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // 🔥 背景クリックでモーダルを閉じる
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});



$(document).ready(function() {
    $(".second").first().addClass("first-second");
});