<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package godex
 */

get_header();
?>
<main class="block page_not-found-page">
    <!-- <div class="breadcrumbs">
       <a href="<?php echo get_home_url();?>">Godex Blog /</a>
       <a>404</a>
    </div> -->
	<div class="page_not-found">
		<div class="page_not-found_text">
			<div class="page_not-found_title">
				Page not found 404
			</div>
			<p>The link you clicked may be broken, or the page may have been removed</p>
			<a href="<?php echo get_home_url();?>">
				Get you home
			</a>
		</div>
		<div class="page_not-found_image">
			<img src="https://godex.io/blog/wp-content/uploads/2021/10/01_bg_godex-1.png" alt="image_not-found">
		</div>
	</div>
	
</main>

<?php
get_footer();
