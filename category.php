<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package godex
 */

get_header();
?>

<main class="block">
    <?php get_template_part( 'template-parts/custom/category/lastCategory' ); ?>
    <section class="section-block">
    <div class="section_title">
        <h2>Top 5 <?php single_cat_title('' , true )?></h2>
        <a href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">
            <span>More</span>
            <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.25L6.5 5.25L1 0.75" stroke="black"/>
            </svg>
        </a>
    </div>
    <?php
        $mainCat = get_the_category();
        if(single_cat_title("",false) == "Popular"){
            $posts = get_posts( array(
                'numberposts' => 5,
                'meta_key'    => 'wpb_post_views_count',
                'orderby'     => 'meta_value_num',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            wp_reset_postdata(); // сброс
        } else {
            $posts = get_posts( array(
                'numberposts' => 5,
                'category_name'    => $mainCat[0]->slug,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            wp_reset_postdata(); // сброс
        }
        
    ?>
    <div class="news-block crypto-tips_block">
        <div class="news_main_list crypto-tips_list">
            <div class="news_item crypto-tips_item">
                <div class="category_block">
                    <a href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <div class="block-time"><?php estimated_reading_time($posts[0]->ID);?></div>
                </div>
                <a href="<?php echo get_permalink($posts[0]->ID);?>" class="link_title"><?php echo get_the_title($posts[0]->ID);?></a>
                <p><?php echo get_the_excerpt($posts[0]->ID);?></p>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[0]->ID );?>
                </div>
            </div>
            <div class="news_item crypto-tips_minor_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[1]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <a href="<?php echo get_permalink($posts[1]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[1]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
                <div class="category_block">
                    <a href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <div class="block-time"><?php estimated_reading_time($posts[1]->ID);?></div>
                </div>
                <a href="<?php echo get_permalink($posts[1]->ID);?>" class="link_title"><?php echo get_the_title($posts[1]->ID);?></a>
                <p><?php echo get_the_excerpt($posts[1]->ID);?></p>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[1]->ID );?>
                </div>
            </div>
            <div class="news_item crypto-tips_minor_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[2]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <a href="<?php echo get_permalink($posts[2]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[2]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
                <div class="category_block">
                    <a href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <div class="block-time"><?php estimated_reading_time($posts[2]->ID);?></div>
                </div>
                <a href="<?php echo get_permalink($posts[2]->ID);?>" class="link_title"><?php echo get_the_title($posts[2]->ID);?></a>
                <p><?php echo get_the_excerpt($posts[2]->ID);?></p>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[2]->ID );?>
                </div>
            </div>
            <div class="sidebar_post">
            <div class="sidebar_post_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[3]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <a href="<?php echo get_permalink($posts[3]->ID);?>" class="link_title"><?php echo get_the_title($posts[3]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[3]->ID );?>
                    </div>
                </div>
                <div class="sidebar_post_image"><a href="<?php echo get_permalink($posts[3]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[3]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a></div>
            </div>
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <a href="<?php echo get_permalink($posts[4]->ID);?>" class="link_title"><?php echo get_the_title($posts[4]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[4]->ID );?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="sidebar_post">
            <div class="sidebar_post_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[3]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <a href="<?php echo get_permalink($posts[3]->ID);?>" class="link_title"><?php echo get_the_title($posts[3]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[3]->ID );?>
                    </div>
                </div>
                <div class="sidebar_post_image"><a href="<?php echo get_permalink($posts[3]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[3]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a></div>
            </div>
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/crypto-tips";?>">Crypto Tips</a>
                    <a href="<?php echo get_permalink($posts[4]->ID);?>" class="link_title"><?php echo get_the_title($posts[4]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[4]->ID );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php get_template_part( 'template-parts/custom/category/listOfPosts' ); ?>
</main>


<?php
get_footer();
