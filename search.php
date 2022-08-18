<?php
/*
Template Name: Search Page
*/
get_header();
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
      },
     ]
    }
    </script>
		<section class="section-block list-section">
		<div class="breadcrumbs">
			<?php $mainCat = get_the_category();?>
			<a href="<?php echo get_home_url();?>">Godex Blog /</a>
    		<a>Search</a>
		</div>
		<?php
			$link = $_SERVER["REQUEST_URI"];
			if(substr($link, -1) == '/') {
			$link = substr($link, 0, -1);
			}
			$link_array = explode('/',$link);
			$s = urldecode(end($link_array));
		?>
    	<div class="section_title">
    		<h2>Search result for query: "<?php echo $s;?>"</h2>
		</div>
		<div class="postList search-block">
        <div>
        <div class="mainList search-list">
			<?php
				// $s=get_search_query();

				$args = array(
					'post_type'     => 'post',
					'post_status'   => 'publish',
					'search_prod_title' => $s,
				);
				add_filter( 'posts_where', 'title_filter', 10, 2 );
				$the_query = new WP_Query($args);
				remove_filter( 'posts_where', 'title_filter', 10, 2 );
				
				// $args = array(
				// 	"post_type" => "post",
				// 	's' =>$s,
            	// );
				// $the_query = new WP_Query( $args );


				if ( $the_query->have_posts() ) {
        			while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$image_id = get_post_thumbnail_id($post->ID);
						$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
            ?>
                    <div class="itemPostList">
					<div class="itemDatePost"><?php the_date()?></div>
					<div class="infoPostSubList">
						<div class="infoTextPost">
							<div class="infoCategory">
								<a href="<?php echo home_url('/').get_the_category( $post->ID )[0]->slug;?>"><?php echo get_the_category( $post->ID )[0]->name;?></a>
								<div class="infoCategoryTime"><?php echo estimated_reading_time_alt()?></div>
							</div>
							<a href="<?php echo get_permalink();?>" class="linkPost">
								<?php echo the_title();?>
							</a>
							<?php echo wp_trim_words(the_excerpt(), 25, '');?>
							<?php
								$url = get_author_posts_url(get_the_author_meta('ID'));
							?>
							<a href="<?php $url?>" class="linkAuthor"><?php echo get_the_author_meta( 'first_name');?></a>
						</div>
						<a href="<?php echo get_permalink();?>"><img src="<?php echo the_post_thumbnail_url("full")?>" alt="<?php echo $image_alt;?>" class="imagePostList"></a>
						</div>
					</div>
                	<?php
        			}
    				}else{
				?>
        			<div class='search_zero'>
						<p class='search_heading'>We couldn't find anything</p>
						<p class='search_describe'>Make sure the product name is entered correctly</p>
				  	</div>
				<?php } ?>
			<!-- <?php
				global $query_string;

				wp_parse_str( $query_string, $search_query );
			
				$args = array(  
					'post_type' => 'post', 
					'posts_per_page' => -1, 
					'order' => 'DESC',
					'orderby' => 'date',
					's' => $search_query["s"],
				);
			
				$loop = new WP_Query( $args ); 

				if($loop->have_posts()){
				while ( $loop->have_posts() ) : $loop->the_post();
				$image_id = get_post_thumbnail_id($loop->the_post());
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
				echo '<div class="itemPostList">
				<div class="itemDatePost">'.get_the_date( null, $loop->the_post() ).'</div>
					<div class="infoPostSubList">
						<div class="infoTextPost">
							<div class="infoCategory">
								<a href="'.get_home_url( null, 'category/', null ).get_the_category($loop->the_post())[0]->slug.'">'.get_the_category($loop->the_post())[0]->name.'</a>
								<div class="infoCategoryTime">'.estimated_reading_time_alt($loop->the_post()).'</div>
							</div>
							<a href="'.get_permalink($loop->the_post()).'" class="linkPost">
								'.get_the_title($loop->the_post()).'
							</a>
							<p>'.wp_trim_words( get_the_excerpt($loop->the_post()), 25, '' ).'</p>
							<a href="'.get_author_posts_url($item->post_author).'" class="linkAuthor">'.get_the_author_meta( 'first_name' , $item->post_author ).'</a>
						</div>
						<a href="'.get_permalink($item->ID).'"><img src="'.get_the_post_thumbnail_url($loop->the_post(),"full").'" alt="'.$image_alt.'" class="imagePostList" alt="search image"></a>
						</div>
					</div>';
					wp_reset_postdata();
				endwhile;
				}
				else{
					echo "<div class='search_zero'>
							<p class='search_heading'>We couldn't find anything</p>
							<p class='search_describe'>Make sure the product name is entered correctly</p>
				  		  </div>";
				}
			?> -->
        </div>
        </div>
        </div>
        <div class="sidebarList">
            
        </div>
    </div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
