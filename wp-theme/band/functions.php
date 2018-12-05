<?php
/**
 * band functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package band
 */

// if ( !is_admin() ) 
// wp_deregister_script('jquery'); 


$commentcount = "0"; 

add_theme_support( 'custom-logo' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

add_filter('show_admin_bar', '__return_false');

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );



//https://businessbloomer.com/woocommerce-visual-hook-guide-archiveshopcat-page/
add_action( 'woocommerce_before_shop_loop_item', 'before_item_action', 15 );
function before_item_action() {
	echo '<div class="box-default">';
}


add_action( 'woocommerce_before_shop_loop_item_title', 'before_title_action', 15 );
 
function before_title_action() {
	echo '</div>' ; //box_default
}


add_action( 'woocommerce_after_shop_loop_item', 'band_custom_action', 6 );
function band_custom_action() {
	//echo '<div class="product__bottom fpb">';
}

add_action( 'woocommerce_after_shop_loop_item', 'band_custom_close_bottom', 250 );
function band_custom_close_bottom() {
	//echo '</div>';
}



if( ! function_exists('kama_thumb_src') ){
	add_action( 'admin_notices', function(){
		echo '<div class="error"><p>'. __( 'This theme requires plugin Kama Thumbnail. Install it please.', 'dom' ) .'</p></div>';
	} );
	function kama_thumb_src(){}
	function kama_thumb_img(){}
	function kama_thumb_a_img(){}
	function kama_thumb(){}
}


/**
 * Enqueue scripts and styles.
 */
function band_scripts() {
	// style.css, modernizr, libs, slick, engine
    wp_enqueue_style( 'band-style', get_stylesheet_uri() );
    wp_enqueue_script( 'band-modernizr', get_template_directory_uri() . '/js/modernizr.js');
    wp_enqueue_script( 'band-libs', get_template_directory_uri() . '/js/libs.min.js');
    wp_enqueue_script( 'band-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '', true );
    wp_enqueue_script( 'band-engine', get_template_directory_uri() . '/js/engine.js', array(), '', true );

    // outdatebrowser
    wp_enqueue_script( 'outdatedbrowser', '/outdatedbrowser/outdatedbrowser.min.js');
    wp_enqueue_script( 'outdatedbrowser-detect', '/outdatedbrowser/detect.js');
    wp_enqueue_style( 'outdatedbrowser-style', '/outdatedbrowser/outdatedbrowser.min.css');

        // wp_enqueue_script( 'band-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
        // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        //         wp_enqueue_script( 'comment-reply' );
        // }
}
add_action( 'wp_enqueue_scripts', 'band_scripts' );



/**
 * Enqueue favicon
 */
function band_favicon() {
	echo '
	<link rel="icon" href="'.get_bloginfo('wpurl').'/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="'.get_bloginfo('wpurl').'/favicon.ico" type="image/x-icon"/>
	<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo('wpurl').'/the_favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="'.get_bloginfo('wpurl').'/the_favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="'.get_bloginfo('wpurl').'/the_favicon/favicon-16x16.png">
	<link rel="manifest" href="'.get_bloginfo('wpurl').'/the_favicon/site.webmanifest">
	<link rel="mask-icon" href="'.get_bloginfo('wpurl').'/the_favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="'.get_bloginfo('wpurl').'/the_favicon/mstile-144x144.png">
	<meta name="msapplication-config" content="'.get_bloginfo('wpurl').'/the_favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">';
}
add_action('wp_head', 'band_favicon');



// Contacts
/**
 * Добавляет блок для ввода контактных данных
 */
function band_customize_register( $wp_customize ) {
	/*
	Добавляем секцию в настройки темы
	*/
	$wp_customize->add_section(
	    // ID
	    'data_site_section',
	    // Массив аргументов
	    array(
			'title' => 'Контактные данные',
	        'capability' => 'edit_theme_options',
	        'description' => "")
	);

	/*
	Добавляем поле телефона site_telephone 1
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_telephone1',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telephone1_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Телефон 1",
	        'section' => 'data_site_section',
	        'settings' => 'site_telephone1'
	    )
	);


	$wp_customize->add_setting(
	    // ID
	    'site_telephone1_split',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telephone_split1_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Телефон 1 (полный и слитно)",
	        'section' => 'data_site_section',
	        'settings' => 'site_telephone1_split'
	    )
	);

	/*
	Добавляем поле телефона site_telephone 2
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_telephone2',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telephone2_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Телефон 2",
	        'section' => 'data_site_section',
	        'settings' => 'site_telephone2'
	    )
	);


	$wp_customize->add_setting(
	    // ID
	    'site_telephone2_split',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telephone_split2_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Телефон 2 (полный и слитно)",
	        'section' => 'data_site_section',
	        'settings' => 'site_telephone2_split'
	    )
	);

	/*
	Добавляем поле телефона site_telephone 3
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_telephone3',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telephone3_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Телефон 3",
	        'section' => 'data_site_section',
	        'settings' => 'site_telephone3'
	    )
	);


	$wp_customize->add_setting(
	    // ID
	    'site_telephone3_split',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telephone_split3_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Телефон 3 (полный и слитно)",
	        'section' => 'data_site_section',
	        'settings' => 'site_telephone3_split'
	    )
	);



	/*
	Добавляем поле скайпа
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_skype',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_skype_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Skype",
	        'section' => 'data_site_section',
	        'settings' => 'site_skype'
	    )
	);


	/*
	Добавляем поле Почты
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_email',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_email_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Email",
	        'section' => 'data_site_section',
	        'settings' => 'site_email'
	    )
	);


	/*
	Добавляем поле Viber
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_viber',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_viber_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Viber",
	        'section' => 'data_site_section',
	        'settings' => 'site_viber'
	    )
	);

	$wp_customize->add_setting(
	    // ID
	    'site_viber_split',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_viber_split_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Viber (полный и слитно)",
	        'section' => 'data_site_section',
	        'settings' => 'site_viber_split'
	    )
	);


	/*
	Добавляем поле Instagram
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_instagram',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_instagram_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Instagram",
	        'section' => 'data_site_section',
	        'settings' => 'site_instagram'
	    )
	);


	/*
	Добавляем поле Telegram
	*/
	$wp_customize->add_setting(
	    // ID
	    'site_telegram',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'site_telegram_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Telegram",
	        'section' => 'data_site_section',
	        'settings' => 'site_telegram'
	    )
	);
}

function band_customize_register_social( $wp_customize ) {
	/*
	Добавляем секцию в настройки темы
	*/
	$wp_customize->add_section(
	    // ID
	    'data_social_site_section',
	    // Массив аргументов
	    array(
			'title' => 'Социальные сети',
	        'capability' => 'edit_theme_options',
	        'description' => "")
	);

	/*
	Добавляем поле телефона site_telephone 1
	*/
	$wp_customize->add_setting(
	    // ID
	    'pinterest',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'pinterest_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Pinterest",
	        'section' => 'data_social_site_section',
	        'settings' => 'pinterest'
	    )
	);


	/*
	Добавляем поле телефона site_telephone 2
	*/
	$wp_customize->add_setting(
	    // ID
	    'facebook',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'facebook_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Facebook",
	        'section' => 'data_social_site_section',
	        'settings' => 'facebook'
	    )
	);


	/*
	Добавляем поле скайпа
	*/
	$wp_customize->add_setting(
	    // ID
	    'twitter',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'twitter_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Twitter",
	        'section' => 'data_social_site_section',
	        'settings' => 'twitter'
	    )
	);


	/*
	Добавляем поле телефона site_telephone 1
	*/
	$wp_customize->add_setting(
	    // ID
	    'instagram',
	    // Массив аргументов
	    array(
	        'default' => '',
	        'type' => 'option'
	    )
	);
	$wp_customize->add_control(
	    // ID
	    'instagram_control',
	    // Массив аргументов
	    array(
	        'type' => 'text',
	        'label' => "Instagram",
	        'section' => 'data_social_site_section',
	        'settings' => 'instagram'
	    )
	);
}


add_action( 'customize_register', 'band_customize_register' );
add_action( 'customize_register', 'band_customize_register_social' );
add_action( 'widgets_init', 'band_widgets_init' );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function band_widgets_init() {
	// register_sidebar( array(
	// 	'name'          => 'SEO links',
	// 	'id'            => 'sidebar-2',
	// 	'description'   => '',
	// 	'before_widget' => '<div class="about">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<h1 class="widget-title">',
	// 	'after_title'   => '</h1>',
	// ));

	register_sidebar( array(
		'name'          => 'SEO текст для ИНТЕРЕСНО',
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section class="about">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h1 class="text-center">',
		'after_title'   => '</header></h1>',
	));

	register_sidebar( array(
		'name'          => 'SEO текст для ГЛАВНОЙ',
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section class="about">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h1 class="text-center">',
		'after_title'   => '</header></h1>',
	));



}



// This theme uses wp_nav_menu() in two locations.
add_action( 'after_setup_theme', 'band_register_nav_menu' );
function band_register_nav_menu() {
	register_nav_menus( array(
		'top' => 'Верхнее меню',
		'catmenu' => 'Меню в середине страниц'
	));
}


// добавляем data аттрибут title к ссылкам меню
add_filter( 'nav_menu_link_attributes', 'band_top_menu_atts', 10, 3 );
function band_top_menu_atts( $atts, $item, $args )
{
	$atts['data-hover'] = $item->title;
	return $atts;
}



class Band_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='submenu'><ul>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}



/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2018.10.05
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs"><ul itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</ul></div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = ''; // разделитель между "крошками"
  $before = '<li class="current">'; // тег перед текущей "крошкой"
  $after = '</li>'; // тег после текущей "крошки"

  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
  $link .= '<meta itemprop="position" content="%3$s" />';
  $link .= '</li>';
  $parent_id = ( $post ) ? $post->post_parent : '';
  $home_link = sprintf( $link, $home_url, $text['home'], 1 );

  if ( is_home() || is_front_page() ) {

    if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

  } else {

    $position = 0;

    echo $wrap_before;

    if ( $show_home_link ) {
      $position += 1;
      echo $home_link;
    }

    if ( is_category() ) {
      $parents = get_ancestors( get_query_var('cat'), 'category' );
      foreach ( array_reverse( $parents ) as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $cat = get_query_var('cat');
        echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo $sep;
          echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
        } elseif ( $show_last_sep ) echo $sep;
      }

    } elseif ( is_search() ) {
      if ( $show_home_link && $show_current || ! $show_current && $show_last_sep ) echo $sep;
      if ( $show_current ) echo $before . sprintf( $text['search'], get_search_query() ) . $after;

    } elseif ( is_year() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_time('Y') . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_month() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_day() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
      $position += 1;
      echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_single() && ! is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $position += 1;
        $post_type = get_post_type_object( get_post_type() );
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
        elseif ( $show_last_sep ) echo $sep;
      } else {
        $cat = get_the_category(); $catID = $cat[0]->cat_ID;
        $parents = get_ancestors( $catID, 'category' );
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ( $parents as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        if ( get_query_var( 'cpage' ) ) {
          $position += 1;
          echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
          echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
        } else {
          if ( $show_current ) echo $sep . $before . get_the_title() . $after;
          elseif ( $show_last_sep ) echo $sep;
        }
      }

    } elseif ( is_post_type_archive() ) {
      $post_type = get_post_type_object( get_post_type() );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . $post_type->label . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_attachment() ) {
      $parent = get_post( $parent_id );
      $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
      $parents = get_ancestors( $catID, 'category' );
      $parents = array_reverse( $parents );
      $parents[] = $catID;
      foreach ( $parents as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      $position += 1;
      echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_page() && ! $parent_id ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_title() . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_page() && $parent_id ) {
      $parents = get_post_ancestors( get_the_ID() );
      foreach ( array_reverse( $parents ) as $pageID ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
      }
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_tag() ) {
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $tagID = get_query_var( 'tag_id' );
        echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_author() ) {
      $author = get_userdata( get_query_var( 'author' ) );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_404() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . $text['404'] . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( has_post_format() && ! is_singular() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()



## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});



// меняем вид пагинации
add_filter('navigation_markup_template', 'band_navigation_template', 10, 2 );
function band_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<div class="%1$s">
		<div class="nav-links">%3$s</div>
	</div>    
	';
}


// secondary thumbnails
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            // Replace [YOUR THEME TEXT DOMAIN] below with the text domain of your theme (found in the theme's `style.css`).
            'label' => 'Изображение при наведении в каталоге',
            'id' => 'secondary-image',
            'post_type' => 'product'
        )
    );
}


// for sorting slider for POPULAR slide
/* Storing views of different time periods as meta keys */
add_action( 'wpp_post_update_views', 'custom_wpp_update_postviews' );

function custom_wpp_update_postviews($postid) {
	// Accuracy:
	//   10  = 1 in 10 visits will update view count. (Recommended for high traffic sites.)
	//   30 = 30% of visits. (Medium traffic websites)
	//   100 = Every visit. Creates many db write operations every request.

	$accuracy = 100;

	if ( function_exists('wpp_get_views') && (mt_rand(0,100) < $accuracy) ) {
		// Remove or comment out lines that you won't be using!!
		update_post_meta( $postid, 'views_total',   wpp_get_views( $postid )            );
		update_post_meta( $postid, 'views_daily',   wpp_get_views( $postid, 'daily' )   );
		update_post_meta( $postid, 'views_weekly',  wpp_get_views( $postid, 'weekly' )  );
		update_post_meta( $postid, 'views_monthly', wpp_get_views( $postid, 'monthly' ) );
	}
}


// add to cart
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');
function header_add_to_cart_fragment( $fragments ) {
	    global $woocommerce;
    	ob_start();
    ?>
    <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
    <?php
	    $fragments['.basket-btn__counter'] = ob_get_clean();
	    return $fragments;
}




if ( class_exists( 'WooCommerce' ) ) {
	//require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	// require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';
}

?>