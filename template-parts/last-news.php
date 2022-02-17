<?php
$currentNews = '';
if(isset($args['current-news'])){
    $currentNews = $args['current-news'];
}

$showedNews = array();
array_push($showedNews, $currentNews);


$argsLastNews = array(
    'post_type' => 'news',
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'post__not_in'   => $showedNews,
    'orderby'   => 'rand',
    'order' => 'DESC'
);

$the_last_news = new WP_Query( $argsLastNews );
 ?>

<?php if ($the_last_news -> have_posts()) : ?>
<section class="section blog-latest">
    <div class="wrap">
        <h2 class="t-center">
            <?php _e('ОСТАННІ НОВИНИ'); ?>
        </h2>
        <div class="row news-amount">
          <?php while ($the_last_news -> have_posts()) : $the_last_news -> the_post(); ?>
              <div class="col-6 col-sm">
                  <div class="card-news">
                      <a href="<?php echo get_permalink(); ?>" class="card-img">
                          <picture>
                              <source media="(max-width:575px)" srcset="<?= get_the_post_thumbnail_url(get_the_ID(),'mobile-size'); ?>">
                              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="cover-img">
                          </picture>
                      </a>
                      <h2 class="card-title">
                          <a href="<?php echo get_permalink(); ?>">
                              <?= get_the_title(); ?>
                          </a>
                      </h2>
                      <span class="card-date">
                            <?php echo wp_date('d.m.Y'); ?>
                      </span>
                  </div>
              </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>