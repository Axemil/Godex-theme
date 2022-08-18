<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

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
      },
      {
       "@type": "ListItem",
      "position": 2,
      "item":
       {
         "@id": "<?php echo get_permalink();?>",
         "name": "<?php echo single_tag_title('' , true );?>"
       }
	  }
     ]
    }
    </script>
<section class="section-block list-section">
    <div class="breadcrumbs">
	    <a href="<?php echo get_home_url();?>">Godex Blog /</a>
        <a><?php single_tag_title('' , true )?></a>
    </div>
    <div class="section_title">
        <h1><?php single_tag_title('' , true )?> News</h1>
    </div>
    <div class="postList">
        <div>
        <div class="mainList">
            <?php
            $tag = get_queried_object();
            $posts = get_posts( array(
                'numberposts' => 8,
                'tag' => $tag->slug,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'paged'       => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );    
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
        <?php the_posts_pagination(); ?>
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

<?php get_footer();?>