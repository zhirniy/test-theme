<?php get_header(); ?>

<?php
$argsPagination = array(
    'prev_text'    => __('Назад'),
    'next_text'    => __('Далі'),
    'screen_reader_text' => __( ' ' )
);
?>

<main class="main" id="main">
	<?php
    get_template_part('template-parts/breadcrumbs');

    get_template_part('template-parts/title', null, array(
        'classes' => 'page-title-bottom-md',
        'title' => 'НОВИНИ'
    ));
    ?>
	<section class="section margin-top-negative">
		<div class="wrap">
           <?php if ( have_posts()) : ?>
                <div class="row news-amount">
                    <?php while (have_posts()) : the_post(); ?>
                            <?php $postId = get_the_ID(); ?>
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
           <?php endif; ?>
            <?php custom_pagination($argsPagination); ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>