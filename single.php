<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package godex
 */

get_header();
$author_id=get_the_author_meta('ID');
$author_badge = get_field('a_img', 'user_'. $author_id );
$mainCat = get_the_category();
?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "publisher": {
        "@type": "Organization",
        "name": "Godex Blog",
        "url": "https://godex.io/blog/",
        "logo": {
            "@type": "ImageObject",
            "url": "https://godex.io/blog/wp-content/themes/godex_2.10/assets/img/logo.jpg ",
            "width": 213,
            "height": 32
        }
    },
	"author": {
        "@type": "Person",
        "name": "<?php the_author_meta( 'first_name' , $author_id ); ?>",
		"description": "<?php the_author_meta( 'user_description' , $author_id ); ?>",
        "url": "<?php echo get_author_posts_url($author_id);?>",
		"image": {
            "@type": "ImageObject",
            "url": "<?php echo $author_badge;?>",
            "width": 400,
            "height": 400
		}
    },
    "headline": "<?php echo the_title();?>",
    "url": "<?php echo get_permalink();?>",
    "datePublished": "<?php echo the_date();?>",
    "dateModified": "<?php echo get_the_modified_date();?>",
    "image": {
        "@type": "ImageObject",
        "url": "<?php echo get_the_post_thumbnail_url();?>",
        "width": 1400,
        "height": 701
    },
    "keywords": "Tag name",
    "description": "<?php the_excerpt();?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://godex.io/blog/"
    }
}
	</script>
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
         "@id": "<?php echo get_home_url(null, "/category")."/".$mainCat[0]->slug;?>",
         "name": "<?php echo $mainCat[0]->name?>"
       }
	  }
     ]
    }
    </script>
<main class="block">
<div class="breadcrumbs_wrapper">
<div class="breadcrumbs">
	<a href="<?php echo get_home_url();?>">Godex Blog /</a>
	<a href="<?php echo get_home_url(null, "/category")."/".$mainCat[0]->slug;?>"><?php echo $mainCat[0]->name?> /</a>
    <a><?php echo the_title();?></a>
</div>
</div>
<div class="post_block">
<h1 class="title_post"><?php echo the_title();?></h1>
<div class="post_info">
	<a href="<?php echo get_author_posts_url($author_id);?>" class="post_avatar">
		<!-- <img src="<?php echo $author_badge;?>" alt="Author image">
		<?php the_author_meta( 'first_name' , $author_id ); ?>  -->
	</a>
	<div class="info_block">
		<div class="date"><?php echo get_the_date(); ?></div>
		<div class="time"><?php estimated_reading_time();?></div>
		<div class="share">
		<?php echo do_shortcode( '[addtoany]' );?>
		<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0)">
				<circle cx="9" cy="9.5" r="9" fill="#2C7FF6"/>
			</g>
			<g clip-path="url(#clip1)">
				<path d="M15 8.50753L10.013 3.02838V6.29734H8.95276C5.6651 6.29734 3 8.96765 3 12.2617V13.9941L3.47095 13.477C5.07211 11.7192 7.33768 10.7177 9.71292 10.7177H10.013V13.9867L15 8.50753Z" fill="white"/>
			</g>
			<defs>
				<clipPath id="clip0">
					<rect width="18" height="18" fill="white" transform="translate(0 0.5)"/>
				</clipPath>
				<clipPath id="clip1">
					<rect width="12" height="12" fill="white" transform="translate(3 2.5)"/>
				</clipPath>
			</defs>
		</svg>
		Share
		</div>
	</div>
</div>
<!-- <?php echo wpb_get_post_views(get_the_ID());?> -->
<?php echo get_the_post_thumbnail( null, null, array('class' => 'bannerImage') )?>
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
<div class="post_text">
	<div class="post_side_bar">
		<h5>Contents</h4>
		<?php echo do_shortcode( '[ez-toc]' );?>
		<div class="sidebarPosts">
        <h4>Last news</h4>
            <div class="sidebarPostsList">
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="<?php echo get_home_url( null, 'category/', null ).$categoryFirst[0]->slug; ?>"><?php echo $categoryFirst[0]->name; ?></a>
                        <div class="block-time"><?php estimated_reading_time($posts[0]->ID);?></div>
                    </div>
                    <a href="<?php echo get_permalink($posts[0]->ID);?>" class="linkToPost"><?php echo get_the_title($posts[0]->ID);?></a>
                    <div class="post_date">
						<?php echo get_the_date( null, $posts[0]->ID );?>
                    </div>
                </div>
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="<?php echo get_home_url( null, 'category/', null ).$categorySecond[0]->slug; ?>"><?php echo $categorySecond[0]->name; ?></a>
                        <div class="block-time"><?php estimated_reading_time($posts[1]->ID);?></div>
                    </div>
                    <a href="<?php echo get_permalink($posts[1]->ID);?>" class="linkToPost"><?php echo get_the_title($posts[1]->ID);?></a>
                    <div class="post_date">
					<?php echo get_the_date( null, $posts[1]->ID );?>
                    </div>
                </div>
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="<?php echo get_home_url( null, 'category/', null ).$categoryThird[0]->slug; ?>"><?php echo $categoryThird[0]->name; ?></a>
                        <div class="block-time"><?php estimated_reading_time($posts[2]->ID);?></div>
                    </div>
                    <a href="<?php echo get_permalink($posts[2]->ID);?>" class="linkToPost"><?php echo get_the_title($posts[2]->ID);?></a>
                    <div class="post_date">
					<?php echo get_the_date( null, $posts[2]->ID );?>
                    </div>
                </div>
                <div class="sidebarPostsItem">
                    <div class="category_block">
                        <a href="<?php echo get_home_url( null, 'category/', null ).$categoryFourth[0]->slug; ?>"><?php echo $categoryFourth[0]->name; ?></a>
                        <div class="block-time"><?php estimated_reading_time($posts[3]->ID);?></div>
                    </div>
                    <a href="" class="linkToPost"><?php echo get_the_title($posts[3]->ID);?></a>
                    <div class="post_date">
						<?php echo get_the_date( null, $posts[3]->ID );?>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="post_content">
		<?php the_content(); ?>
		<div class="exchange_block">
			<p>Start a Cryptocurrency exchange<br>Try our crypto exchange platform"</p>
			<a target="_blanck" href="https://godex.io/exchange">
				Exchange
				<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.974698 1.31361L0.974866 1.31379L5.00686 5.60463L0.974699 9.90407C0.753226 10.1402 0.753225 10.5174 0.974699 10.7535C1.20474 10.9988 1.58525 10.9988 1.81529 10.7535L6.23773 6.03795C6.3491 5.91919 6.40383 5.76958 6.40383 5.61321C6.40383 5.46871 6.35109 5.30936 6.23773 5.18848L1.81755 0.475307C1.58765 0.21837 1.20503 0.218545 0.974699 0.464149C0.753226 0.700302 0.753226 1.07746 0.974698 1.31361Z" fill="white" stroke="white" stroke-width="0.5"/>
				</svg>
			</a>
		</div>
		<p class="disclaimer_text">Disclaimer: Please keep in mind that the content of this article is not financial or investing advice. The information provided is the author’s opinion only and should not be considered as direct recommendations for trading or investment. Any article reader or website visitor should consider multiple viewpoints and become familiar with all local regulations before cryptocurrency investment. We do not make any warranties about reliability and accuracy of this information.</p>
	</div>
</div>
<div class="comment_section">
	<div class="comment_top">
		<div class="share share_2">
		<?php echo do_shortcode( '[addtoany]' );?>
		<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0)">
				<circle cx="9" cy="9.5" r="9" fill="#2C7FF6"/>
			</g>
			<g clip-path="url(#clip1)">
				<path d="M15 8.50753L10.013 3.02838V6.29734H8.95276C5.6651 6.29734 3 8.96765 3 12.2617V13.9941L3.47095 13.477C5.07211 11.7192 7.33768 10.7177 9.71292 10.7177H10.013V13.9867L15 8.50753Z" fill="white"/>
			</g>
			<defs>
				<clipPath id="clip0">
					<rect width="18" height="18" fill="white" transform="translate(0 0.5)"/>
				</clipPath>
				<clipPath id="clip1">
					<rect width="12" height="12" fill="white" transform="translate(3 2.5)"/>
				</clipPath>
			</defs>
		</svg>
		Share
		</div>
		<div class="buttonComment">
			Leave a comment
		</div>
	</div>
	<div class="comment_form_wrapper">
		<?php
			$args = array(
				'fields' => array(
					'author' => '<p class="comment-form-author">
						<label for="author">Your name</label>
						<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
					</p>',
					'email'  => '<p class="comment-form-email">
						<label for="email">Your e-mail</label>
						<input id="email" placeholder="E-mail" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
					</p>',
				),
				'comment_notes_before' => '',
				'title_reply' => 'Leave your comment',
				'title_reply_to' => '',
				'class_container' => 'comment_form_block',
				'label_submit' => 'Your comment',
				'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" placeholder="Your text" aria-required="true"></textarea></p>'
				);
				// comment_form_block
			comment_form($args);
		
		?>
	</div>
	<?php if ( get_comments_number() ) :?>
	<div class="comment_block">
  			<?php comments_template(); ?>
	</div>
	<?php endif; ?>
	<?php
        $posts = get_posts( array(
            'numberposts' => 4,
            'category_name'    => the_category(),
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
   		?>
	<div class="readMore">
		<p class="readMore_title">Read more</p>
		<div class="readMore_item">
			<div class="readMore_text">
				<div class="category_block">
                    <a href="<?php echo get_home_url( null, 'category/', null ).$categoryFirst[0]->slug; ?>"><?php echo $categoryFirst[0]->name; ?></a>
                    <div class="block-time"><?php estimated_reading_time($posts[0]->ID);?></div>
				</div>
				<a href="<?php echo get_permalink($posts[0]->ID);?>" class="linkMore">
					<?php echo get_the_title($posts[0]->ID);?>
				</a>
				<p><?php echo get_the_excerpt($posts[0]->ID);?></p>
				<div class="post_date">
					<?php echo get_the_date( null, $posts[0]->ID );?>
                </div>
			</div>
			<a href="<?php echo get_permalink($posts[0]->ID)?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[0]->ID, 'full' ); ?>" alt=""></a>
		</div>
		<div class="readMore_item">
			<div class="readMore_text">
				<div class="category_block">
                    <a href="<?php echo get_home_url( null, 'category/', null ).$categorySecond[0]->slug; ?>"><?php echo $categorySecond[0]->name; ?></a>
                    <div class="block-time"><?php estimated_reading_time($posts[1]->ID);?></div>
				</div>
				<a href="<?php echo get_permalink($posts[1]->ID);?>" class="linkMore">
					<?php echo get_the_title($posts[1]->ID);?>
				</a>
				<p><?php echo get_the_excerpt($posts[1]->ID);?></p>
				<div class="post_date">
					<?php echo get_the_date( null, $posts[1]->ID );?>
                </div>
			</div>
			<a href="<?php echo get_permalink($posts[1]->ID)?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[1]->ID, 'full' ); ?>" alt=""></a>
		</div>
		<div class="readMore_item">
			<div class="readMore_text">
				<div class="category_block">
                    <a href="<?php echo get_home_url( null, 'category/', null ).$categoryThird[2]->slug; ?>"><?php echo $categoryThird[2]->name; ?></a>
                    <div class="block-time"><?php estimated_reading_time($posts[2]->ID);?></div>
				</div>
				<a href="<?php echo get_permalink($posts[2]->ID);?>" class="linkMore">
					<?php echo get_the_title($posts[2]->ID);?>
				</a>
				<p><?php echo get_the_excerpt($posts[2]->ID);?></p>
				<div class="post_date">
					<?php echo get_the_date( null, $posts[2]->ID );?>
                </div>
			</div>
			<a href="<?php echo get_permalink($posts[2]->ID)?>"><img src="<?php echo get_the_post_thumbnail_url( $posts[2]->ID, 'full' ); ?>" alt=""></a>
		</div>
	</div>
</div>
</div>
</main>

<?php get_footer();?>
