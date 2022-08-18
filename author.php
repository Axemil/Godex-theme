<?php
/**<br />
 * The template for displaying Author Archive pages.<br />
 *<br />
 * @package WordPress<br />
 * @subpackage Twenty_Eleven<br />
 * @since Twenty Eleven 1.0<br />
 */
get_header(); 
$author_id=get_the_author_meta('ID');
$author_badge = get_field('a_img', 'user_'. $author_id );
?>

<main class="block">
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
      }
     ]
    }
    </script>
    <div class="breadcrumbs">
       <a href="<?php echo get_home_url();?>">Godex Blog /</a>
       <a><?php the_author_meta( 'first_name' , $author_id ); ?></a>
    </div>
    <div class="author_top">
        <div class="author_block">
            <img src="<?php echo $author_badge; ?>" alt="">
            <div class="author_text">
                <span><?php the_author_meta( 'first_name' , $author_id ); ?> </span>
                <!-- <div class="soc_list">
                    <?php if (get_the_author_meta('facebook')): ?>
                    <a rel="nofollow, noopener" target="_blank" href="<?php the_author_meta('facebook'); ?>">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.83356C20 2.082 18.4187 0.5 16.6667 0.5H3.33333C1.58133 0.5 0 2.082 0 3.83356V17.1664C0 18.918 1.58133 20.5 3.33356 20.5H10V12.9444H7.55556V9.61111H10V8.31244C10 6.07267 11.6818 4.05556 13.75 4.05556H16.4444V7.38889H13.75C13.4551 7.38889 13.1111 7.74689 13.1111 8.28311V9.61111H16.4444V12.9444H13.1111V20.5H16.6667C18.4187 20.5 20 18.918 20 17.1664V3.83356Z" fill="#0D7DFD"/>
                        </svg>
                    </a>
                    <?php endif ?>
                    <?php if (get_the_author_meta('twitter')): ?>
                    <a rel="nofollow, noopener" target="_blank" href="<?php the_author_meta('twitter'); ?>">
                        <svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.8546 2.03147C20.088 2.3723 19.2629 2.6022 18.3972 2.70508C19.2811 2.17585 19.9589 1.33753 20.2785 0.337486C19.4517 0.828195 18.5365 1.18427 17.5615 1.37649C16.7813 0.544947 15.6692 0.0250244 14.4386 0.0250244C12.076 0.0250244 10.1604 1.94086 10.1604 4.30423C10.1604 4.63913 10.1981 4.96556 10.2713 5.2793C6.71533 5.10063 3.56234 3.39733 1.45203 0.808296C1.08373 1.43999 0.872912 2.175 0.872912 2.95996C0.872912 4.44437 1.62814 5.75434 2.77622 6.52152C2.07518 6.49908 1.4152 6.30644 0.838199 5.98593C0.837775 6.00372 0.837775 6.02192 0.837775 6.04013C0.837775 8.11305 2.31267 9.84217 4.27016 10.2359C3.91117 10.3333 3.53313 10.3858 3.14282 10.3858C2.86681 10.3858 2.59884 10.3591 2.33764 10.3087C2.88247 12.0087 4.46235 13.2462 6.33433 13.2805C4.87002 14.4283 3.02556 15.1125 1.02066 15.1125C0.675639 15.1125 0.334856 15.0922 0 15.0524C1.89399 16.2671 4.14273 16.975 6.55869 16.975C14.4289 16.975 18.732 10.4548 18.732 4.80002C18.732 4.61457 18.7282 4.42955 18.7202 4.2458C19.5559 3.64374 20.2814 2.88968 20.8546 2.03147Z" fill="#0D7DFD"/>
                        </svg>
                    </a>
                    <?php endif ?>
                    <?php if (get_the_author_meta('instagramm')): ?>
                    <a rel="nofollow, noopener" target="_blank" href="<?php the_author_meta('instagramm'); ?>">
                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.7867 0.5H4.91142C2.67495 0.5 0.855469 2.23354 0.855469 4.36485V8.44756V16.6351C0.855469 18.7665 2.67495 20.5 4.91142 20.5H17.7871C20.0236 20.5 21.8426 18.7665 21.8426 16.6351V8.44715V4.36445C21.8422 2.23313 20.0231 0.5 17.7867 0.5ZM18.95 2.80479L19.414 2.80318V3.24332V6.19319L15.8685 6.20409L15.8563 2.81447L18.95 2.80479ZM8.35354 8.44715C9.02579 7.56082 10.1163 6.97948 11.349 6.97948C12.5818 6.97948 13.6723 7.56082 14.3437 8.44715C14.781 9.02567 15.043 9.73328 15.043 10.4998C15.043 12.4407 13.3844 14.0197 11.3486 14.0197C9.31154 14.0197 7.65461 12.4407 7.65461 10.4998C7.65504 9.73328 7.91623 9.02567 8.35354 8.44715ZM19.7975 16.6347C19.7975 17.6921 18.8954 18.551 17.7867 18.551H4.91142C3.80229 18.551 2.90017 17.6921 2.90017 16.6347V8.44715H6.03283C5.76232 9.08134 5.61034 9.77403 5.61034 10.4998C5.61034 13.5146 8.18421 15.9691 11.349 15.9691C14.5135 15.9691 17.0873 13.5146 17.0873 10.4998C17.0873 9.77403 16.9345 9.08134 16.664 8.44715H19.7975V16.6347Z" fill="#0D7DFD"/>
                        </svg>
                    </a>
                    <?php endif ?>
                </div> -->
            </div>
        </div>
        <p>
            <?php the_author_meta( 'user_description' , $author_id ); ?>
            <!-- It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point ontent of a page when looking  -->
        </p>
    </div>
    <section class="section-block">
    <?php 
        $posts = get_posts( array(
            'numberposts' => 5,
            'author'      =>  $author_id,
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
    <div class="news-block">
        <div class="news_main_list">
            <div class="news_item">
                <img src="<?php echo get_the_post_thumbnail_url( $posts[0]->ID, 'full' ); ?>" alt="">
                <div class="category_block">
                    <a href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
                    <div class="block-time"><?php estimated_reading_time($posts[0]->ID);?></div>
                </div>
                <a href="<?php echo get_permalink($posts[0]->ID);?>" class="link_title"><?php echo get_the_title($posts[0]->ID);?></a>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[0]->ID );?>
                </div>
            </div>
            <div class="news_item">
                <img src="<?php echo get_the_post_thumbnail_url( $posts[1]->ID, 'full' ); ?>" alt="">
                <div class="category_block">
                    <a href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
                    <div class="block-time"><?php estimated_reading_time($posts[1]->ID);?></div>
                </div>
                <a href="<?php echo get_permalink($posts[1]->ID);?>" class="link_title"><?php echo get_the_title($posts[1]->ID);?></a>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[1]->ID );?>
                </div>
            </div>
            <div class="news_item">
                <img src="<?php echo get_the_post_thumbnail_url( $posts[2]->ID, 'full' ); ?>" alt="">
                <div class="category_block">
                    <a href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
                    <div class="block-time"><?php estimated_reading_time($posts[2]->ID);?></div>
                </div>
                <a href="<?php echo get_permalink($posts[2]->ID);?>" class="link_title"><?php echo get_the_title($posts[2]->ID);?></a>
                <div class="post_date">
                    <?php echo get_the_date( null, $posts[2]->ID );?>
                </div>
            </div>
            <div class="sidebar_post">
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
                    <a href="<?php echo get_permalink($posts[3]->ID);?>" class="link_title"><?php echo get_the_title($posts[3]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[3]->ID );?>
                    </div>
                </div>
                <div class="sidebar_post_image"><img src="<?php echo get_the_post_thumbnail_url( $posts[3]->ID, 'full' ); ?>" alt=""></div>
            </div>
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
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
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
                    <a href="<?php echo get_permalink($posts[3]->ID);?>" class="link_title"><?php echo get_the_title($posts[3]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[3]->ID );?>
                    </div>
                </div>
                <div class="sidebar_post_image"><img src="<?php echo get_the_post_thumbnail_url( $posts[3]->ID, 'full' ); ?>" alt=""></div>
            </div>
            <div class="sidebar_post_item">
                <div class="sidebar_post_text">
                    <a class="sidebar_author" href="<?php echo get_home_url(null, "/category")."/godex-news";?>">Godex News</a>
                    <a href="<?php echo get_permalink($posts[4]->ID);?>" class="link_title"><?php echo get_the_title($posts[4]->ID);?></a>
                    <div class="post_date">
                        <?php echo get_the_date( null, $posts[4]->ID );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-block list-section">
    <div class="section_title section-title_author">
        
    </div>
    <div class="postList">
        <div>
        <div class="mainList">
            <?php
            $mainCat = get_the_category();
            $posts = get_posts( array(
                'numberposts' => 8,
                'author'      =>  $author_id,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'paged'       => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );    
            wp_reset_postdata(); // сброс
            
            foreach($posts as $item){
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
                            <img src="'.get_the_post_thumbnail_url($item->ID,"full").'" alt="" class="imagePostList">
                            </div>
                        </div>';
            }
            ?>
        </div>
        <?php the_posts_pagination(); ?>
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
</main>

<?php get_footer(); ?>