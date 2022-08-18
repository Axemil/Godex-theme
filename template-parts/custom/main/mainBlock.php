<section class="section-block">
    <div class="section_title">
        <h2>Latest News</h2>
        <!-- <a href="">
            <span>More</span>
            <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.25L6.5 5.25L1 0.75" stroke="black"/>
            </svg>
        </a> -->
    </div>
    <?php
        $posts = get_posts( array(
            'numberposts' => 4,
            'category_name'    => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
        $categoryFirst = get_the_category($posts[0]->ID);
        $categorySecond = get_the_category($posts[1]->ID);
        $categoryThird = get_the_category($posts[2]->ID);
        $categoryFourth = get_the_category($posts[3]->ID);
        wp_reset_postdata(); // сброс
    ?>
    
    <div class="mainBlock">
        <div class="mainPost">
            <?php
                $image_id = get_post_thumbnail_id($posts[0]->ID);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
            ?>
            <a href="<?php echo get_permalink($posts[0]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[0]->ID, 'full' ); ?>" alt="<?php echo $image_alt?>"></a>
            <div class="category_block">
                <a href="<?php echo get_home_url( null, 'category/', null ).$categoryFirst[0]->slug; ?>"><?php echo $categoryFirst[0]->name; ?></a>
                <div class="block-time"><?php estimated_reading_time($posts[0]->ID);?></div>
            </div>
            <a class="mainPost_title" href="<?php echo get_permalink($posts[0]->ID);?>"><?php echo get_the_title($posts[0]->ID);?></a>
            <div class="post_date">
                <!-- 07.01.2017 -->
                <?php echo get_the_date( null, $posts[0]->ID );?>
            </div>
        </div>
        <div class="sidebar_post">
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url( null, 'category/', null ).$categorySecond[0]->slug; ?>"><?php echo $categorySecond[0]->name; ?></a>
                    <a class="link_title" href="<?php echo get_permalink($posts[1]->ID);?>"><?php echo get_the_title($posts[1]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[1]->ID );?>
                    </div>
                </div>
                <?php
                    $image_id = get_post_thumbnail_id($posts[1]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <div class="sidebar_post_image"><a href="<?php echo get_permalink($posts[1]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[1]->ID, 'full' ); ?>" alt="<?php echo $image_alt?>"></a></div>
            </div>
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url( null, 'category/', null ).$categoryThird[0]->slug; ?>"><?php echo $categoryThird[0]->name; ?></a>
                    <a class="link_title" href="<?php echo get_permalink($posts[2]->ID);?>"><?php echo get_the_title($posts[2]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[2]->ID );?>
                    </div>
                </div>
                <?php
                    $image_id = get_post_thumbnail_id($posts[2]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <div class="sidebar_post_image"><a href="<?php echo get_permalink($posts[2]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[2]->ID, 'full' ); ?>" alt="<?php echo $image_alt?>"></a></div>
            </div>
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url( null, 'category/', null ).$categoryFourth[0]->slug; ?>"><?php echo $categoryFourth[0]->name; ?></a>
                    <a class="link_title" href="<?php echo get_permalink($posts[3]->ID);?>"><?php echo get_the_title($posts[3]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[3]->ID );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>