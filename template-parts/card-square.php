<?php
$argsEvents = array(
    'post_type'		=> 'events',
    'post_status' => 'publish',
    'posts_per_page'=> 3,
    'order' => 'DESC'
);

$the_query_events = new WP_Query( $argsEvents );
$showedPosts = array();
?>
<div class="row card-square-amount">
    <div class="col-6 col-md">
        <div class="card-square special-card">
            <div class="card-square-sp">
							<span class="text">
								Окрім тестування, навчання топовим навичкам та побудови успішної кар’єри Ти отримуєш можливість відвідувати наші FAN-активності:
							</span>
                <ul>
                    <li>Презентації українських та міжнародних компаній</li>
                    <li>Чемпіонати з інтелектуальних ігор</li>
                    <li>Історії успіху</li>
                    <li>Кіно Клуб</li>
                    <li>Lingva SHOW</li>
                    <li>Школа HR</li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($the_query_events -> have_posts()) :
        while ($the_query_events -> have_posts()) : $the_query_events -> the_post(); ?>
                <?php array_push($showedPosts, get_the_ID()); ?>
                <?php $terms = get_the_terms(get_the_ID(), 'typeevents');  ?>
                <div class="col-6 col-md">
                    <div class="card-square">
                        <div class="card-square-inner">
                            <div class="card-square-date">
                                    <span class="day">
                                        <?=  get_the_date('d'); ?>
                                    </span>
                                <span class="month">
            						<?php
                                         if(has_filter('translate_date_month')):
                                             echo apply_filters('translate_date_month', get_the_date('m'));
                                         endif;
                                     ?>
                                     <?= get_the_date(' Y'); ?>
            					</span>
                            </div>
                            <div class="card-square-title">
                                <span>
                                    <?php
                                        if( $terms ):
                                            foreach ($terms as $category) :
                                                echo '#'.$category->name;
                                            endforeach;
                                        endif;
                                    ?>
                                </span>
                                <h2>
                                    <a href="#" class="like-h3">
                                        <?= get_the_title(); ?>
                                    </a>
                                </h2>
                                <span>
                                    <?= get_the_author_meta( 'first_name' ); ?>
                                    <?= get_the_author_meta( 'last_name' ); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    <?php  endwhile;
    endif;
    ?>
</div>
<?php  wp_reset_postdata(); ?>
<?php
    $argsEventsAfterFirstLoop = array(
        'post_type'		=> 'events',
        'post_status' => 'publish',
        'posts_per_page'=> 2,
        'post__not_in'   => $showedPosts,
        'order' => 'DESC'
    );
?>
<!-- other loop load by 2 post -->
<?php $the_query_events_other_loop = new WP_Query(  $argsEventsAfterFirstLoop); ?>
<?php $maxLoopPage = $the_query_events_other_loop->max_num_pages; ?>
<?php if($maxLoopPage > 1) :  ?>
    <?php if($showedPosts):
        $showedPosts = implode(",", $showedPosts);
        endif;
    ?>
    <a href="#load-more-events" data-max-page="<?= $maxLoopPage; ?>" data-showed-posts="<?= $showedPosts; ?>" class="btn btn-event-ajax">
        Ще заходи
    </a>
<?php endif; ?>

<?php  wp_reset_postdata(); ?>