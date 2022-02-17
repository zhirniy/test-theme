<?php get_header(); ?>
<main class="main" id="main">
	<?php
    $currentNews = null;
    if ( have_posts()) :
    while (have_posts()) : the_post();
    get_template_part('template-parts/breadcrumbs');
    get_template_part('template-parts/title', null, array(
        'classes' => 'page-title-sm page-title-bottom-md',
        'title' => get_the_title()
    ));
    $currentNews = get_the_ID();
	?>
            <section class="section blog-section margin-top-negative-md">
                <div class="wrap">
                    <div class="main-image news-main-image">
                        <picture>
                            <source media="(max-width:575px)" srcset="<?= get_the_post_thumbnail_url(get_the_ID(),'mobile-size'); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="cover-img">
                        </picture>
                    </div>
                    <div class="row-w content blog-content">
                        <div class="col-10-w col-md-w">
                             <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part('template-parts/last', 'news', array('current-news'=>$currentNews)); ?>
</main>

<?php get_footer(); ?>