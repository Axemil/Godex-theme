<section class="section-block">
    <script type="application/ld+json">
    {
     "@context": "https://schema.org",
     "@type": "BreadcrumbList",
     "itemListElement":
     [
      {
       "@type": "ListItem",
       "position": 1,
       "item":
       {
        "@id": "<?php echo get_home_url();?>",
        "name": "Blog"
        }
      },
      {
       "@type": "ListItem",
      "position": 2,
      "item":
       {
         "@id": "<?php echo get_permalink();?>",
         "name": "<?php echo single_cat_title('' , true )?>"
       }
	  }
     ]
    }
    </script>
    <div class="breadcrumbs">
        <a href="<?php echo get_home_url();?>">Godex Blog / </a>
        <a><?php single_cat_title('' , true );?></a>
    </div>
    <div class="section_title">
        <h2><?php single_cat_title('' , true )?></h2>
    </div>
    <?php
        $mainCat = get_the_category();
        if(single_cat_title("",false) == "Popular"){
            $posts = get_posts( array(
                'numberposts' => 4,
                'meta_key'    => 'wpb_post_views_count',
                'orderby'     => 'meta_value_num',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
        } else {
            $posts = get_posts( array(
                'numberposts' => 4,
                'category_name'    => $mainCat[0]->slug,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
        }
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
            <a href="<?php echo get_permalink($posts[0]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[0]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
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
        <div class="sidebar_post sidebar_alt_posts">
            <div class="sidebar_alt_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[1]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <a href="<?php echo get_permalink($posts[1]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[1]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
                <div class="category_block">
                    <a href="<?php echo get_home_url( null, 'category/', null ).$categorySecond[0]->slug; ?>"><?php echo $categorySecond[0]->name; ?></a>
                    <div class="block-time"><?php estimated_reading_time($posts[1]->ID);?></div>
                </div>
                <a class="link_title" href="<?php echo get_permalink($posts[1]->ID);?>"><?php echo get_the_title($posts[1]->ID);?></a>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[1]->ID );?>
                </div>
            </div>
            <div class="sidebar_alt_item">
                <?php
                    $image_id = get_post_thumbnail_id($posts[2]->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <a href="<?php echo get_permalink($posts[2]->ID);?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[2]->ID, 'full' ); ?>" alt="<?php echo $image_alt;?>"></a>
                <div class="category_block">
                    <a href="<?php echo get_home_url( null, 'category/', null ).$categoryThird[0]->slug; ?>"><?php echo $categoryThird[0]->name; ?></a>
                    <div class="block-time"><?php estimated_reading_time($posts[2]->ID);?></div>
                </div>
                <a class="link_title" href="<?php echo get_permalink($posts[2]->ID);?>"><?php echo get_the_title($posts[2]->ID);?></a>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[2]->ID );?>
                </div>
            </div>
        </div>
    </div>
</section>