<?php
/*
Theme Name: Sesta
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function mk_scripts(){
	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bootstrap-css' );
	
	wp_register_style( 'bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	wp_enqueue_style( 'bootstrap-min-css' );
	
	wp_register_style( 'mmenu-css', get_template_directory_uri() . '/css/mmenu.css');
	wp_enqueue_style( 'mmenu-css' );

	wp_register_style( 'mburger-css', get_template_directory_uri() . '/css/mburger.css');
	wp_enqueue_style( 'mburger-css' );
	
	wp_register_style( 'carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style( 'carousel-css' );

	wp_register_style( 'fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', false, '3.5.7' );
	wp_enqueue_style( 'fancybox-css' );
	
	wp_register_style( 'custom-css', get_template_directory_uri() . '/css/custom.css'); 
	wp_enqueue_style( 'custom-css' );
	
	wp_register_style( 'media-css', get_template_directory_uri() . '/css/media.css'); 
	wp_enqueue_style( 'media-css' );

	if (!is_admin()) {
		wp_enqueue_script( 'jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', '', '', true );
		wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.js', '', '', true );
		wp_enqueue_script( 'fancybox-min', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', '', '', true );
		wp_enqueue_script( 'mmenu-min', get_template_directory_uri() . '/js/mmenu.js', '', '', true );
		wp_enqueue_script( 'carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true );
		wp_enqueue_script( 'parallax-min', get_template_directory_uri() . '/js/parallax.min.js', '', '', true );
		wp_enqueue_script( 'custom-min', get_template_directory_uri() . '/js/custom.js', '', '', true );
		wp_enqueue_script( 'maps-min', 'http://api-maps.yandex.ru/2.0/?apikey=86029023-52d4-407c-9bd8-83e3eb70ba61&load=package.full&lang=ru-RU', '', '', false );
	}
}
add_action( 'wp_enqueue_scripts', 'mk_scripts' );

//Регистрируем название сайта
function mkvadrat_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ug' ), max( $paged, $page ) );
	}

	if ( is_404() ) {
        $title = '404';
    }

	return $title;
}
add_filter( 'wp_title', 'mkvadrat_wp_title', 10, 2 );

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		  'header_a_menu'   => 'Главное меню (Блок 1)',
		  'header_b_menu'   => 'Главное меню (Блок 2)',
		  'footer_a_menu'   => 'Информация',
		  'footer_b_menu'   => 'Каталог продукции',
		  'mobile_a_menu'   => 'Меню для мобильных устройств',
		)
	);
}

//Изображение в шапке сайта
$args = array(
	'width'         => 250,
	'height'        => 45,
	'default-image' => get_template_directory_uri() . '/image/logo.svg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
}

//Отключить редактор
add_filter('use_block_editor_for_post', '__return_false');

//Отключить редактор
function wpse_hide_cat_descr() { ?>

    <style type="text/css">
       .term-description-wrap {
           display: none;
       }
    </style>

<?php } 
add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************РАБОТА С METAПОЛЯМИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод данных из произвольных полей для всех страниц сайта
function getMeta($meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1", $meta_key) );
	
	return $value;
}

//Вывод изображения для плагина nextgen-gallery
function getNextGallery($post_id, $meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta AS pm JOIN $wpdb->posts AS p ON (pm.post_id = p.ID) AND (pm.post_id = %s) AND meta_key = %s ORDER BY pm.post_id DESC LIMIT 1", $post_id, $meta_key) );
	
	$unserialize_value = unserialize($value);
	
	return $unserialize_value;	
}

//Вывод связанных данных для single.php
function getRelatedMeta($post_id, $meta_key){
	global $wpdb;
	
	$value = array();

	$serialized_object = $wpdb->get_results( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = %s AND meta_key = %s", $post_id, $meta_key) );
	
	$unserialized_object = unserialize($serialized_object[0]->meta_value);
	
	if($unserialized_object){
		foreach($unserialized_object as $post_id){
			$value[] = get_post( $post_id );
		}
	}
	
	return $value;
}

//Вывод id категории
function getCurrentCatID(){
	global $wp_query;
	if(is_category()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************МЕНЮ САЙТА*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
// Добавляем свой класс для пунктов меню:
class header_menu extends Walker_Nav_Menu {
	// Добавляем классы к вложенным ul
	function start_lvl( &$output, $depth = 0, $args = Array() ) {
		// Глубина вложенных ul
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			''
			);
		$class_names = implode( ' ', $classes );
		// build html
		if($depth == 0){
			$output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
		}else if($depth == 1){
			$output .= "\n" . $indent . '<ul class="subsubmenu">' . "\n";
		}else if($depth >= 2){
			$output .= "\n" . $indent . '<ul class="subsubsubmenu">' . "\n";
		}
	}

	// Добавляем классы к вложенным li
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wpdb;
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'has-sub' : '' ),
			( $depth >=2 ? '' : '' ),
			( $depth % 2 ? '' : '' ),
			'menu-item-depth-' . $depth
		);

		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$mycurrent = ( $item->current == 1 ) ? ' active' : '';

		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		
		if($depth == 0){
			$output .= $indent . '<li class="dropdown">';
		}else if($depth == 1){
			$output .= $indent . '<li>';
		}else{
			$output .= $indent . '<li>';
		}

		// Добавляем атрибуты и классы к элементу a (ссылки)
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$attributes .= ' class="menu-link ' . ( $depth == 0 ? 'parent' : '' ) . ( $depth == 1 ? 'child' : '' ) . ( $depth >= 2 ? 'sub-child' : '' ) . '"';

		if($depth == 0){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a class="link__parent" href="'. $link .'"><span>' . $title .'</span></a>';
			}else{
				$item_output = '<a class="link__parent" href="'. $link .'"><span>' . $title .'</span></a>';
			}
		}else if($depth == 1){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth >= 2){
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
		// build html

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// Добавляем свой класс для пунктов меню:
class mobile_menu extends Walker_Nav_Menu {
	// Добавляем классы к вложенным ul
	function start_lvl( &$output, $depth = 0, $args = Array() ) {
		// Глубина вложенных ul
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			''
			);
		$class_names = implode( ' ', $classes );
		// build html
		if($depth == 0){
			$output .= "\n" . $indent . '<ul>' . "\n";
		}else if($depth == 1){
			$output .= "\n" . $indent . '<ul class="subsubmenu">' . "\n";
		}else if($depth >= 2){
			$output .= "\n" . $indent . '<ul class="subsubsubmenu">' . "\n";
		}
	}

	// Добавляем классы к вложенным li
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wpdb;
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'has-sub' : '' ),
			( $depth >=2 ? '' : '' ),
			( $depth % 2 ? '' : '' ),
			'menu-item-depth-' . $depth
		);

		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$mycurrent = ( $item->current == 1 ) ? ' active' : '';

		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		
		if($depth == 0){
			$output .= $indent . '<li>';
		}else if($depth == 1){
			$output .= $indent . '<li>';
		}else{
			$output .= $indent . '<li>';
		}

		// Добавляем атрибуты и классы к элементу a (ссылки)
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$attributes .= ' class="menu-link ' . ( $depth == 0 ? 'parent' : '' ) . ( $depth == 1 ? 'child' : '' ) . ( $depth >= 2 ? 'sub-child' : '' ) . '"';

		if($depth == 0){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a class="link__parent" href="'. $link .'"><span>' . $title .'</span></a>';
			}else{
				$item_output = '<a class="link__parent" href="'. $link .'"><span>' . $title .'</span></a>';
			}
		}else if($depth == 1){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth >= 2){
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
		// build html

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**********************************************************ПЕРЕИМЕНОВАВАНИЕ ЗАПИСЕЙ В ПРОДУКЦИЮ*************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'Наша продукция';
    $submenu['edit.php'][5][0] = 'Наша продукция';
    $submenu['edit.php'][10][0] = 'Добавить статью';
    $submenu['edit.php'][16][0] = 'Метки';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Наша продукция';
    $labels->singular_name = 'Наша продукция';
    $labels->add_new = 'Добавить статью';
    $labels->add_new_item = 'Добавить статью';
    $labels->edit_item = 'Редактировать статью';
    $labels->new_item = 'Добавить статью';
    $labels->view_item = 'Посмотреть статью';
    $labels->search_items = 'Найти статью';
    $labels->not_found = 'Не найдено';
    $labels->not_found_in_trash = 'Корзина пуста';
}
add_action( 'init', 'change_post_object_label' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление category из url таксономии
function true_remove_slug_from_articles( $url, $term, $taxonomy ){

	$taxonomia_name = 'category';
	$taxonomia_slug = 'category';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_articles', 10, 3 );

//Перенаправление articles-list в случае удаления category
function parse_request_url_articles( $query ){

	$taxonomia_name = 'category';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_articles', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE POST_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление sluga из url таксономии 
function remove_slug_from_post( $post_link, $post, $leavename ) {
	if ( /*'rooms' != $post->post_type*/ /*&& 'workshop' != $post->post_type ||*/ 'publish' != $post->post_status ) {
		return $post_link;
	}
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_from_post', 10, 3 );

function parse_request_url_post( $query ) {
	if ( ! $query->is_main_query() )
		return;

	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request_url_post' );
