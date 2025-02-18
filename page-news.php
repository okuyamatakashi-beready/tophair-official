<?php get_template_part('templates/header-news'); ?>

<div id="page-news" class="w-full pt-17">
    <div class="news__container mx-auto">
        <div id="news-list" class="flex">
            <div class="sidebar">
                <h2 class="sec__ttl--big mb-6 text-left">
                    NEWS
                </h2>
                <div class="sidebar__content mb-9">
                    <b class="text-2.5 font-normal block mb-2.5">CATEGORIES</b>
                    <ul>
                        <li class="mb-2.6">
                            <a href="">ALL</a>
                        </li>
                        <li class="mb-2.6">
                            <a href="">BLOG</a>
                        </li>
                        <li class="mb-2.6">
                            <a href="">RECRUIT</a>
                        </li>
                        <li class="mb-2.6">
                            <a href="">NEWS</a>
                        </li>
                        <li>
                            <a href="">EVENT</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar__content">
                    <b class="text-2.5 font-normal block mb-2.5">ARCHIVE</b>
                    <ul>
                        <li class="mb-2.6">
                            <a href="">2024</a>
                        </li>
                        <li class="mb-2.6">
                            <a href="">2023</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="news__content mb-24">
                <div class="content">
                    <dl class="news-item py-5 w-full">
                        <dt class="flex mb-2 justify-start">
                            <span class="time mr-2.6 text-1.5">2024.09.01</span>
                            <span class="cat text-1.5">NEWS</span>
                        </dt>
                        <dd>
                            <a href="">
                                <h3 class="text-2 text-black font-normal">記事タイトル</h3>
                            </a>
                        </dd>
                    </dl>
                    
                </div>
                <div id="pagination" class="pagination">
                        <button id="prev-page" disabled>前へ</button>
                        <button id="next-page">次へ</button>
                    </div>

            </div>
            
        </div>
    </div>
    

    <main class="news-container">
        
        <!-- 記事詳細（Ajaxで読み込む） -->
        <aside id="news-detail" class="news-detail">
            <div class="news-content">
                <button class="close-btn"><img src="<?php echo get_template_directory_uri();?>/assets/images/gallery/modal-close.svg" alt="" class=""></button>
                <div id="news-content-area">
                    <div class="ttl">
                        <span class="time">2024.09.01</span>
                        <h4>記事のタイトル</h4>
                    </div>
                    <div class="detail__content">
                        
                    </div>
                </div>
            </div>
        </aside>
    </main>

<script>
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

</div>

<?php get_template_part('templates/footer'); ?>