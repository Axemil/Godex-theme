<section class="section-block list-section">
    <div class="section_title">
        <h2><?php single_cat_title('' , true );?></h2>
        <!-- <a href="">
            <span>More</span>
            <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.25L6.5 5.25L1 0.75" stroke="black"/>
            </svg>
        </a> -->
    </div>
    <div class="postList">
        <div>
        <div class="mainList">
            <?php
            $mainCat = get_the_category();
            if(single_cat_title("",false) == "Popular"){
                $posts = get_posts( array(
                    'numberposts' => 8,
                    'meta_key'    => 'wpb_post_views_count',
                    'orderby'     => 'meta_value_num',
                    'order'       => 'DESC',
                    'paged'       => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );  
            } else {
                $posts = get_posts( array(
                    'numberposts' => 8,
                    'category_name' => $mainCat[0]->slug,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'paged'       => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );
            }
            wp_reset_postdata(); // сброс
            
            foreach($posts as $item){
                $image_id = get_post_thumbnail_id($item->ID);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                echo '<div class="itemPostList">
                        <div class="itemDatePost">'.get_the_date( null, $item->ID ).'</div>
                        <div class="infoPostSubList">
                            <div class="infoTextPost">
                                <div class="infoCategory">
                                    <a href="'.get_home_url( null, 'category/', null ).get_the_category($item->ID)[0]->slug.'">'.get_the_category($item->ID)[0]->name.'</a>
                                    <div class="infoCategoryTime">'.estimated_reading_time_alt($item->ID).'</div>
                                </div>
                                <a href="'.get_permalink($item->ID).'" class="linkPost">
                                    '.get_the_title($item->ID).'
                                </a>
                                <p>'.wp_trim_words( get_the_excerpt($item->ID), 25, '' ).'</p>
                                <a href="'.get_author_posts_url($item->post_author).'" class="linkAuthor">'.get_the_author_meta( 'first_name' , $item->post_author ).'</a>
                            </div>
                            <a href="'.get_permalink($item->ID).'"><img src="'.get_the_post_thumbnail_url($item->ID,"full").'" alt="'.$image_alt.'" class="imagePostList"></a>
                            </div>
                        </div>';
            }
            ?>
        </div>
        <?php
            $args = array(
                'show_all'     => false, 
                'end_size'     => 0,     
                'mid_size'     => 1,    
                'prev_next'    => true,
                'add_args'     => false, 
                'screen_reader_text' => '',
            );
            the_posts_pagination($args); 
        ?>
        <div class="postNavigation">
        </div>
        </div>
        <div class="sidebarList">
            <div class="sidebarTable">
                <h4>Courses</h4>
                <div class="sidebarTableBlock">
                    <div class="sidebarTableTop">
                        <span>Name</span>
                        <span>Last price</span>
                        <span>%Change</span>
                    </div>
                </div>
            </div>
            <div class="sidebarPosts">
                <h4>Market Analytics</h4>
                <div class="sidebarPostsList">
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="">Godex News</a>
                        <div class="block-time">3 minute read</div>
                    </div>
                    <a href="" class="linkToPost">What Is txid and how to find a transaction in blockchain</a>
                    <div class="post_date">
                        07.01.2017
                    </div>
                </div>
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="">Godex News</a>
                        <div class="block-time">3 minute read</div>
                    </div>
                    <a href="" class="linkToPost">What Is txid and how to find a transaction in blockchain</a>
                    <div class="post_date">
                        07.01.2017
                    </div>
                </div>
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="">Godex News</a>
                        <div class="block-time">3 minute read</div>
                    </div>
                    <a href="" class="linkToPost">What Is txid and how to find a transaction in blockchain</a>
                    <div class="post_date">
                        07.01.2017
                    </div>
                </div>
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="">Godex News</a>
                        <div class="block-time">3 minute read</div>
                    </div>
                    <a href="" class="linkToPost">What Is txid and how to find a transaction in blockchain</a>
                    <div class="post_date">
                        07.01.2017
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>