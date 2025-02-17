<?php

require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/theme-setup.php';


// アイキャッチ画像の設定
add_theme_support('post-thumbnails');
the_post_thumbnail('thumbnail');
the_post_thumbnail('medium');
the_post_thumbnail('large');

function my_styles()  {
    // page-sample用のCSS

    if ( is_page('works') ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      }
    if ( is_tax() ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      }
    if ( is_page('news') ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'news_css', get_template_directory_uri() . '/scss/news/index.css');
      }
    if ( is_category() ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'news_css', get_template_directory_uri() . '/scss/news/index.css');
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      }
    if ( is_archive() ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'news_css', get_template_directory_uri() . '/scss/news/index.css');
      }
    if ( is_page('voice') ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'news_css', get_template_directory_uri() . '/scss/news/index.css');
      }
    if ( is_page('blog') ) {
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'news_css', get_template_directory_uri() . '/scss/news/index.css');
      }

    if ( is_page('reform') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'reform_css', get_template_directory_uri() . '/scss/reform/index.css');
      }
    if ( is_page('contact') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('book') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('visit') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('book-confirm') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('event-confirm') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('confirm') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('works-confirm') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('visit-confirm') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_page('thanks') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/scss/contact/index.css');
      }
    if ( is_404() ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( '404_css', get_template_directory_uri() . '/scss/404/index.css');
      }
    if ( is_page('pre') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( '404_css', get_template_directory_uri() . '/scss/404/index.css');
      }
    if ( is_page('renovation') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'renovation_css', get_template_directory_uri() . '/scss/renovation/index.css');
      }
    if ( is_page('estate') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'estate_css', get_template_directory_uri() . '/scss/estate/index.css');
      }
    if ( is_page('staff') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'staff_css', get_template_directory_uri() . '/scss/staff/index.css');
      }
    if ( is_page('company') ) {
      wp_enqueue_style( 'page_css', get_template_directory_uri() . '/scss/page/index.css');
      wp_enqueue_style( 'works_css', get_template_directory_uri() . '/scss/works/index.css');
      wp_enqueue_style( 'company_css', get_template_directory_uri() . '/scss/company/index.css');
      }
    if ( is_single('') ) {
      wp_enqueue_style( 'single_css', get_template_directory_uri() . '/scss/single/index.css');
      
      }


    }
  add_action( 'wp_enqueue_scripts', 'my_styles' );
  


  add_filter('wpcf7_form_elements', function($form) {
    $form = do_shortcode($form);
    return $form;
});


function set_post_title_to_cf7_tag( $tag ){
  if ( ! is_array( $tag ) ){
      return $tag;    
  }

  $name = $tag['name'];
  if( $name == 'post_title' ){
      $res_get_the_title = get_the_title();
      $tag['values'] = (array)$res_get_the_title;
  }
  return $tag;
}
add_filter( 'wpcf7_form_tag', 'set_post_title_to_cf7_tag', 11 );




  /*------------------------------------*\
    pagenation
\*------------------------------------*/
/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 1, $show_only = false ) {

  $pages = ( int ) $pages;

  //表示テキスト
  $text_before  = "back";
  $text_next    = "next";

  if ( $show_only && $pages === 1 ) {
      echo '<div class="pagination flex flex_start"><span class="current pager">1</span></div>';
      return;
  }

  if ( $pages === 1 ) return;

  if ( 1 !== $pages ) {
      echo '<div class="pagination flex">';
      if ( $paged > 1 ) {
          echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
      }
      for ( $i = 1; $i <= $pages; $i++ ) {

          if ($paged <= $range) { //最初のページの場合
            if ( $i <= ($range * 2 + 1)) {
              if ( $paged === $i || $paged === 0 && $i === 1) { //ここが修正されました
                  echo '<a class="current pager">', $i ,'</a>';
              } else {
                  echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
              }
            }
          } elseif ($paged > ($pages - $range)) { //最後のページの場合
            if ( $i > ($pages - $range * 2)) {
              if ( $paged === $i ) {
                  echo '<a class="current pager">', $i ,'</a>';
              } else {
                  echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
              }
            }
          } else { //中間のページの場合
            if ( $i <= $paged + $range && $i >= $paged - $range ) {
              if ( $paged === $i ) {
                  echo '<a class="current pager">', $i ,'</a>';
              } else {
                  echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
              }
            }
          }

      }
      if ( $paged < $pages ) {
          echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
      }
      echo '</div>';
  }
}





function custom_excerpt_length( $length ) {
  return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



function cptui_register_my_taxes_tophair_menu() {

	/**
	 * Taxonomy: メニュー.
	 */

	$labels = [
		"name" => __( "メニュー", "custom-post-type-ui" ),
		"singular_name" => __( "メニュー", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "メニュー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tophair_menu', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "tophair_menu",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "tophair_menu", [ "tophair-salon" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_tophair_menu' );



function cptui_register_my_taxes_tophair_staff_salon() {

	/**
	 * Taxonomy: サロン名.
	 */

	$labels = [
		"name" => __( "サロン名", "custom-post-type-ui" ),
		"singular_name" => __( "サロン名", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "サロン名", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tophair_staff_salon', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "tophair_staff_salon",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "tophair_staff_salon", [ "tophair_staff" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_tophair_staff_salon' );


// ニュース一覧を取得（ページネーション対応）
function load_news_posts() {
  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

  $query = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 5,
      'paged'          => $paged,
      'orderby'        => 'date',
      'order'          => 'DESC',
  ]);

  if ($query->have_posts()) {
      ob_start();
      ?>
      <div class="content">
          <?php while ($query->have_posts()) : $query->the_post(); 
              $post_id = get_the_ID();
              $post_date = get_the_date('Y.m.d');
              $post_title = get_the_title();
              $post_category = get_the_category();
              $category_name = !empty($post_category) ? esc_html($post_category[0]->name) : '未分類';
          ?>
          <dl class="py-5 w-full news-item" data-id="<?php echo $post_id; ?>">
              <dt class="flex mb-2 justify-start">
                  <span class="time mr-2.6 text-1.5"><?php echo esc_html($post_date); ?></span>
                  <span class="cat text-1.5"><?php echo esc_html($category_name); ?></span>
              </dt>
              <dd>
                  <a href="javascript:void(0);">
                      <h3 class="text-2 text-black font-normal"><?php echo esc_html($post_title); ?></h3>
                  </a>
              </dd>
          </dl>
          <?php endwhile; ?>
      </div>
      <?php
      $news_html = ob_get_clean();

      // 🔥 ページネーションのHTMLを生成 (`＜ 1 2 3 4 … 10 ＞` 形式)
      ob_start();
      $total_pages = $query->max_num_pages;
      ?>
      <div id="pagination" class="pagination">
          <?php if ($paged > 1): ?>
              <button class="pagination-btn prev" data-page="<?php echo $paged - 1; ?>">＜</button>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
              <?php if ($i == $paged): ?>
                  <span class="current"><?php echo $i; ?></span>
              <?php elseif ($i <= 3 || $i >= $total_pages - 2 || abs($i - $paged) <= 1): ?>
                  <button class="pagination-btn" data-page="<?php echo $i; ?>"><?php echo $i; ?></button>
              <?php elseif ($i == 4 || $i == $total_pages - 3): ?>
                  <span class="dots">…</span>
              <?php endif; ?>
          <?php endfor; ?>

          <?php if ($paged < $total_pages): ?>
              <button class="pagination-btn next" data-page="<?php echo $paged + 1; ?>">＞</button>
          <?php endif; ?>
      </div>
      <?php
      $pagination_html = ob_get_clean();

      wp_send_json([
          'news_html'   => $news_html,
          'pagination_html' => $pagination_html,
          'max_pages'   => $total_pages,
          'current_page' => $paged,
      ]);
  } else {
      wp_send_json([
          'news_html' => '<div class="content"><p>記事がありません。</p></div>',
          'pagination_html' => '',
          'max_pages' => 1,
          'current_page' => $paged,
      ]);
  }

  wp_die();
}
add_action('wp_ajax_load_news', 'load_news_posts');
add_action('wp_ajax_nopriv_load_news', 'load_news_posts');



// 記事詳細を取得
function load_news_detail() {
  if (!isset($_POST['post_id']) || empty($_POST['post_id'])) {
      wp_send_json_error(['message' => 'Post ID is missing']);
      exit;
  }

  $post_id = intval($_POST['post_id']);
  $post = get_post($post_id);

  if (!$post) {
      wp_send_json_error(['message' => 'Post not found']);
      exit;
  }

  // 🔥 グローバル `$post` をセットして `setup_postdata()` を適用
  global $post;
  $post = get_post($post_id);
  setup_postdata($post);

  // 🔥 記事情報を取得
  $post_date = get_the_date('Y.m.d', $post);
  $post_title = get_the_title($post);
  $post_content = apply_filters('the_content', $post->post_content);

  // 🔥 次・前の記事の取得 (`get_adjacent_post()` を使用)
  $next_post = get_adjacent_post(false, '', false);
  $prev_post = get_adjacent_post(false, '', true);
  $next_id = $next_post ? $next_post->ID : null;
  $prev_id = $prev_post ? $prev_post->ID : null;

  ob_start();
  ?>

              <div class="ttl">
                  <span class="time"><?php echo esc_html($post_date); ?></span>
                  <h4><?php echo esc_html($post_title); ?></h4>
              </div>
              <div class="detail__content">
                  <?php echo $post_content; ?>
              </div>

              <!-- 🔥 次/前の記事ナビゲーション -->
              <div class="news-navigation">
                  <?php if ($prev_id): ?>
                      <button class="prev-article" data-id="<?php echo $prev_id; ?>">前の記事</button>
                  <?php endif; ?>
                  <?php if ($next_id): ?>
                      <button class="next-article" data-id="<?php echo $next_id; ?>">次の記事</button>
                  <?php endif; ?>
              </div>

  <?php
  $content = ob_get_clean();

  // `setup_postdata()` の後は `wp_reset_postdata()` を実行
  wp_reset_postdata();

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode([
      'success' => true,
      'content' => $content,
      'next_id' => $next_id,
      'prev_id' => $prev_id
  ]);
  exit;
}
add_action('wp_ajax_load_news_detail', 'load_news_detail');
add_action('wp_ajax_nopriv_load_news_detail', 'load_news_detail');
