<?php
function add_theme_scripts() {
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i');
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
    wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
    wp_enqueue_style('pikaday', 'https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'app_js', get_template_directory_uri() . '/js/app.js' , array('jquery') , null , true );
    wp_enqueue_script('youtube_player_api', 'https://www.youtube.com/player_api', null , null , true);
    //Localize ajax
    wp_localize_script('app_js', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));
}
//Add styles and scripts
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function test_theme_setup(){
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array(
        'search_form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'gallery',
    ) );

    add_theme_support('custom-logo', array(
        'height' => 210,
        'width' => 50,
        'flex-height' => true,
        'flex-width'  => true
    ));

    add_theme_support( 'post-thumbnails' );

    //Default size
    set_post_thumbnail_size( 700, 700 );

    register_nav_menus(
        array(
            'main-menu'  => __( 'main-menu', 'test-wp-eduhub-html' ),
            'main-menu-blr'  => __( 'main-menu-blr', 'test-wp-eduhub-html' ),
            'footer-menu'  => __( 'footer-menu', 'test-wp-eduhub-html' )
        )
    );

    load_theme_textdomain( 'test-wp-eduhub-html', get_template_directory() . '/languages' );

}

require 'inc/customizer.php';

/*Add image size*/
add_image_size( 'tablet-size', 700, 700 );
add_image_size( 'mobile-size', 400, 400 );

//After setup theme seted support title tag, support tag, post formats etc.
add_action( 'after_setup_theme', 'test_theme_setup' );

function change_logo_class( $html ) {
   $html = str_replace( 'custom-logo-link', 'logo', $html );
   return $html;
}
//Add class to logo
add_filter( 'get_custom_logo', 'change_logo_class' );

function registerCustomType(){
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'Mews' )
            ),
            'show_in_rest' => true,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'public' => true,
            'has_archive'   => true,
            'menu_icon' => 'dashicons-format-aside',
            'menu_position' => 4
        )
    );

    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
            'public' => true,
            'has_archive'   => false,
            'publicly_queryable'  => false,
            'menu_icon' => 'dashicons-clipboard',
            'menu_position' => 5,
            'show_in_rest' => true,
        )
    );

    register_post_type( 'inquiries',
        array(
            'labels' => array(
                'name' => __( 'Заявки' ),
                'singular_name' => __( 'Заявка' )
            ),
            'supports'            => array( 'title', 'custom-fields' ),
            'public' => true,
            'has_archive'   => false,
            'publicly_queryable'  => false,
            'menu_icon' => 'dashicons-clipboard',
            'menu_position' => 6,
            'show_in_rest' => false,
        )
    );

    register_taxonomy(
        'typeevents',
        'events',
        array(
            'label'  => __('Type Events'),
            'hierarchical'          => true,
            'show_admin_column'          => true,
            'show_in_rest' => true,
        )
    );

}
//Register custom post type and taxonomy
add_action('init', 'registerCustomType');

/**
 * load custom post type events by parameter.
 *  @uses $_POST['postPerPage']
 *  @uses $_POST['pageNumber']
 *  @uses $_POST['showedPost']
 */
function load_more_events(){
    // Check for nonce security
    if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
        die ( 'Error ajax');
    }

    $out = '';

    $postPerPage = (isset($_POST["postPerPage"])) ? $_POST["postPerPage"] : '';
    $postPerPage = trim($postPerPage);

    $pageNumber = (isset($_POST["pageNumber"])) ? $_POST["pageNumber"] : '';
    $pageNumber = trim($pageNumber);

    $showedPosts = (isset($_POST["showedPost"])) ? $_POST["showedPost"] : '';
    $showedPosts = trim($showedPosts);
    $showedPosts = explode( ',', $showedPosts ) ;

    $argsEvents = array(
        'post_type' => 'events',
        'posts_per_page' => $postPerPage,
        'paged'    => $pageNumber,
        'post_status' => 'publish',
        'post__not_in'   => $showedPosts,
        'order' => 'DESC'
    );

    $the_query_events = new WP_Query( $argsEvents );

    if ($the_query_events -> have_posts()) :
        while ($the_query_events -> have_posts()) : $the_query_events -> the_post();
            $terms = get_the_terms(get_the_ID(), 'typeevents');
            $termsOut = '';
            if( $terms ):
                foreach ($terms as $category) :
                    $termsOut .= '#'.$category->name;
                endforeach;
            endif;
            $dateMonthOut = '';
            if(has_filter('translate_date_month')):
                $dateMonthOut .= apply_filters('translate_date_month', get_the_date('m'));
            endif;
            $out .= '<div class="col-6 col-md">
                    <div class="card-square">
                        <div class="card-square-inner">
                            <div class="card-square-date">
                                    <span class="day">'
                                       . get_the_date('d').'
                                    </span>
                                <span class="month">'
                                   . $dateMonthOut  . get_the_date(' Y') .
            					'</span>
                            </div>
                            <div class="card-square-title">
                                <span>'.$termsOut.'</span>
                                <h2>
                                    <a href="#" class="like-h3">'
                                        .get_the_title().
                                    '</a>
                                </h2>
                                <span>
                                    ' . get_the_author_meta( 'first_name' ) . '
                                    ' . get_the_author_meta( 'last_name' ) . '
                                </span>
                            </div>
                        </div>
                    </div>
                </div>';
        endwhile;
    endif;
    wp_reset_postdata();
    die($out);

}


add_action('wp_ajax_nopriv_load_more_events', 'load_more_events');
add_action('wp_ajax_load_more_events', 'load_more_events');

/**
 * Custom filter for month name
 * var $month
 * @return void
 */
function custom_format_month($month){
    switch ($month) {
        case '01':
            $month = "Січня";
            break;
        case '02':
            $month = "Лютого";
            break;
        case '03':
            $month = "Березня";
            break;
        case '04':
            $month = "Квітня";
            break;
        case '05':
            $month = "Травня";
            break;
        case '06':
            $month = "Червня";
            break;
        case '07':
            $month = "Липень";
            break;
        case '08':
            $month = "Серпеня";
            break;
        case '09':
            $month = "Вересеня";
            break;
        case '10':
            $month = "Жовтеня";
            break;
        case '11':
            $month = "Листопада";
            break;
        case '12':
            $month = "Грудня";
            break;
    }
    return $month;
}
//Custom filter for month
add_filter('translate_date_month', 'custom_format_month');

//Filter main loop wp
add_action( 'pre_get_posts', 'filter_args');
function filter_args($query) {
    if (is_post_type_archive('news') && is_main_query()) {
        $query->set( 'posts_per_page', '4' );
    }
}

//Add custom class to pagination
function custom_pagination($args){
    $template = get_the_posts_pagination($args);
    $search_class = 'page-numbers';
    $replace_class = 'page-number';
    $search_class_wrap = 'nav-links';
    $replace_class_wrap = 'pagination';
    $template  = str_replace( $search_class, $replace_class, $template);
    $template  = str_replace( $search_class_wrap, $replace_class_wrap, $template);
    echo $template;
}

/**
 * sent email and save custom post type.
 *  @uses $_POST['name']
 *  @uses $_POST['lastname']
 *  @uses $_POST['position']
 *  @uses $_POST[web']
 *  @uses $_POST[comment']
 */
function sent_email(){
    // Check for nonce security
    if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
        die ( 'error');
    }else{
        $name = $_POST['name'] ?? null;
        $lastName = $_POST['lastname'] ?? null;
        $position = $_POST['position'] ?? null;
        $web = $_POST['web'] ?? null;
        $comment = $_POST['comment'] ?? null;
        $cookie = $_POST['cookie'] ?? null;
        $emailHome ='';
        $emailUa = get_theme_mod('email_ua') ? get_theme_mod('email_ua') : '';
        $emailBlr = get_theme_mod('email_blr') ? get_theme_mod('email_blr') : '';

        if($cookie == 'blr'){
            $emailHome = $emailBlr;
        }else{
            $emailHome = $emailUa;
        }
        $headers = array(
            'From: New message from site <'.$emailHome.'>',
            'content-type: text/html',
       );
        $content = "Name: " . $name ."\n". "Last Name: " . $lastName ."\n". "position" . $position ."\n"."web: " . $web ."\n"."Comment: " . $comment;

        if(!$lastName && !$comment){
            die ( 'error');
        }

        $inquiryID = wp_insert_post([
            'post_title' => $lastName,
            'post_status' => 'publish',
            'post_type' => 'inquiries',
        ]);

        if($inquiryID){
            update_field('name', $name, $inquiryID);
            update_field('lastname', $lastName, $inquiryID);
            update_field('position', $position, $inquiryID);
            update_field('web', $web, $inquiryID);
            update_field('comment', $comment, $inquiryID);
            wp_mail($emailHome, 'New message from web-site', $content, $headers);
            /* for prod site
            if(wp_mail($emailHome, 'New message from web-site wrm.swiss', $content, $headers)){
                die ( 'success');
            }else{
                die ( 'error');
            }
            */
            die ( 'success');
        }else{
            die ( 'error');
        }
    }

}


add_action('wp_ajax_nopriv_sent_email', 'sent_email');
add_action('wp_ajax_sent_email', 'sent_email');

function add_query_vars_filter( $vars ){
    $vars[] = "country";
    return $vars;
}

//Add custom query vars
add_filter( 'query_vars', 'add_query_vars_filter' );

function my_setcookie_country() {
        if (!isset($_COOKIE['country'])) {
            $country = $_GET['country'] ?? '';
            if ($country):
                setcookie('country', $country, strtotime('+1 year'), COOKIEPATH, COOKIE_DOMAIN);
            endif;
        }
}
add_action( 'init', 'my_setcookie_country');


function my_cookie_redirect() {
    if ((isset($_COOKIE['country']) && $_COOKIE['country'] == 'ru' && !is_page('error'))
        || (get_query_var('country') == 'ru' && !is_page('error'))
    ) {
        wp_redirect(home_url() . '/error');
        exit;
    }
}
add_action('template_redirect', 'my_cookie_redirect', 1);