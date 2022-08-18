<section class="section-block">
    <div class="section_title">
        <h2>Guides</h2>
        <a href="<?php echo get_home_url(null, "/category")."/guides";?>">
            <span>More</span>
            <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.25L6.5 5.25L1 0.75" stroke="black"/>
            </svg>
        </a>
    </div>
    <?php 
        $posts = get_posts( array(
            'numberposts' => 3,
            'category_name'    => "guides",
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
        wp_reset_postdata(); // сброс
    ?>
    <div class="newsBanner-block">
        <div class="newsBanner_main">
            <?php
                $image_id = get_post_thumbnail_id($posts[0]->ID);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
            ?>
            <a href="<?php echo get_permalink($posts[0]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[0]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
            <div class="category_block">
                <a href="<?php echo get_home_url(null, "/category")."/guides";?>">Guides</a>
                <div class="block-time"><?php estimated_reading_time($posts[0]->ID);?></div>
            </div>
            <a href="<?php echo get_permalink($posts[0]->ID);?>" class="linke_banner"><?php echo get_the_title($posts[0]->ID);?></a>
            <div class="post_date">
                <?php echo get_the_date( null, $posts[0]->ID );?>
            </div>
        </div>
        <div class="newsBanner_side">
            <div class="newsBanner_side_item">
                <div class="newsBanner_side_item_text">
                    <?php
                        $image_id = get_post_thumbnail_id($posts[1]->ID);
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                    ?>
                    <div class="category_block">
                        <a href="<?php echo get_home_url(null, "/category")."/guides";?>">Guides</a>
                        <div class="block-time"><?php estimated_reading_time($posts[1]->ID);?></div>
                    </div>
                    <a href="<?php echo get_permalink($posts[1]->ID);?>" class="side_link-banner"><?php echo get_the_title($posts[1]->ID);?></a>
                    <p><?php echo substr(get_the_excerpt($posts[1]->ID), 0, 210);?>...</p>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[1]->ID );?>
                    </div>
                </div>
                <a href="<?php echo get_permalink($posts[1]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[1]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
            </div>
            <div class="newsBanner_side_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[2]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <div class="newsBanner_side_item_text">
                    <div class="category_block">
                        <a href="<?php echo get_home_url(null, "/category")."/guides";?>">Guides</a>
                        <div class="block-time"><?php estimated_reading_time($posts[2]->ID);?></div>
                    </div>
                    <a href="<?php echo get_permalink($posts[2]->ID);?>" class="side_link-banner"><?php echo get_the_title($posts[2]->ID);?></a>
                    <p><?php echo substr(get_the_excerpt($posts[2]->ID), 0, 210);?>...</p>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[2]->ID );?>
                    </div>
                </div>
                <a href="<?php echo get_permalink($posts[2]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[2]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
            </div>
        </div>
    </div>
</section>