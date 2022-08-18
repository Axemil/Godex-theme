<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package godex
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
	<?php
		global $paged;
		global $wp;
		if(is_paged() && $paged >= 2){
			$term = get_queried_object();
			if(is_tag()){
				echo '<link rel="canonical" href="'.home_url().'/tag/'.$term->slug.'/" />';
			} else {
				echo '<link rel="canonical" href="'.home_url().'/category/'.$term->slug.'/" />';
			}
		}
	?>
	<?php 
		if(is_single()){
	?>
		<itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
		<meta itemprop="bestRating" content="10">
		<meta itemprop="ratingValue" content="8.8">
		<!-- <a href="/film/564577/votes/" class="continue rating_link rating_ball_green">
		<span class="rating_ball">9.657</span>
		<span class="ratingCount" itemprop="ratingCount">356 233</span> -->
	<?php
		}
	?>
	<?php wp_head(); ?>
</head>
 
<header class="block_header">
	<div class="header_top">
		<div class="header_top_wrapper">
			<a target="_blank" href="https://godex.io"><img src="https://godex.io/blog/wp-content/uploads/2022/04/Logo.svg" alt=""></a>
			<a target="_blank" href="https://godex.io/how-it-works ">How it works</a>
			<a target="_blank" href="https://godex.io/about-us">About us</a>
			<a target="_blank" href="https://godex.io/exchange-rate">Exchange rate</a>
			<a target="_blank" href="https://godex.io/contact">Contact</a>
			<a class="header_top_wrapper_active" href="https://godex.io/blog">Blog</a>
			<a target="_blank" href="https://godex.io/faq">F.A.Q.</a>
			<div class="header_top_dropdown">
				<p>
					Affiliate program
					<span>
						<svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.65226 4.60535L1.65244 4.60518L4.9963 1.4736L8.3469 4.60535C8.55324 4.79822 8.88167 4.79822 9.08802 4.60535C9.30399 4.40347 9.30399 4.06835 9.08802 3.86647L5.37359 0.394653C5.26965 0.297507 5.13871 0.25 5.00303 0.25C4.87734 0.25 4.73852 0.295527 4.63246 0.394654L0.920364 3.8643C0.694691 4.06603 0.69486 4.40319 0.911143 4.60535C1.11749 4.79822 1.44591 4.79822 1.65226 4.60535Z" fill="#000" stroke="#000" stroke-width="0.5"/>
						</svg>
					</span>
					<div class="header_top_dropdown_child">
						<a target="_blank" href="https://godex.io/affiliate-program">For Personal</a>
						<a target="_blank" href="https://godex.io/b2b">For Business</a>
					</div>
				</p>
			</div>
		</div>
		<a class="mobile_logo" href="https://godex.io">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M8.68628 0H5C2.23853 0 0 2.23877 0 5V14.3022L8.68628 0ZM15.3137 24L24 9.69775V19C24 21.7612 21.7615 24 19 24H15.3137Z" fill="black"/>
				<path d="M24 0H17.6156C15.8957 0 14.2782 0.805552 13.2582 2.17011L0 24H6.3844C8.10427 24 9.72176 23.1944 10.7418 21.8299L24 0Z" fill="url(#paint0_linear_18284_91370)"/>
				<defs>
					<linearGradient id="paint0_linear_18284_91370" x1="21.9963" y1="-7.38462" x2="21.9963" y2="25.8462" gradientUnits="userSpaceOnUse">
						<stop stop-color="#24BEFC"/>
						<stop offset="1" stop-color="#1265E7"/>
					</linearGradient>
				</defs>
			</svg>
		</a>
		<div class="header_sub-wrapper">
			<div class="header_mobile-menu">
				<span>MENU</span>
				<svg id="unactive-btn" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="1.6" cy="1.6" r="1.6" fill="#0D7DFD"/>
					<circle cx="7.99844" cy="1.6" r="1.6" fill="#0D7DFD"/>
					<circle cx="14.4008" cy="1.6" r="1.6" fill="#0D7DFD"/>
					<circle cx="1.6" cy="8.00002" r="1.6" fill="#0D7DFD"/>
					<circle cx="7.99844" cy="8.00002" r="1.6" fill="#0D7DFD"/>
					<circle cx="14.4008" cy="8.00002" r="1.6" fill="#0D7DFD"/>
					<circle cx="1.6" cy="14.4" r="1.6" fill="#0D7DFD"/>
					<circle cx="7.99844" cy="14.4" r="1.6" fill="#0D7DFD"/>
					<circle cx="14.4008" cy="14.4" r="1.6" fill="#0D7DFD"/>
				</svg>
				<svg id="active-btn" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11.9589 1.35355L1.35235 11.9602C1.15708 12.1554 1.15708 12.472 1.35235 12.6673C1.54761 12.8625 1.86419 12.8625 2.05945 12.6673L12.6661 2.06066C12.8613 1.8654 12.8613 1.54882 12.6661 1.35355C12.4708 1.15829 12.1542 1.15829 11.9589 1.35355Z" stroke="#0D7DFD"/>
					<path d="M2.37308 1.35355L12.9797 11.9602C13.1749 12.1554 13.1749 12.472 12.9797 12.6673C12.7844 12.8625 12.4678 12.8625 12.2726 12.6673L1.66598 2.06066C1.47072 1.8654 1.47072 1.54882 1.66598 1.35355C1.86124 1.15829 2.17782 1.15829 2.37308 1.35355Z" stroke="#0D7DFD"/>
				</svg>
			</div>
		</div>
	</div>
	
	<nav class="header_navigation">
		<ul>
			<li><a class="<?php if(single_cat_title("",false) == "Popular") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/popular-posts";?>">Popular</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Godex News") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/godex-news";?>">Godex News</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Crypto Tips") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/crypto-tips";?>">Crypto Tips</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Crypto Currencies") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/crypto-currencies";?>">Cryptocurrencies</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Crypto Talks") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/crypto-talks";?>">Crypto Talks</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Price Predictions") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/price-predictions";?>">Price Predictions</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Mining") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/crypto-mining";?>">Mining</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Crypto Market") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/crypto-market";?>">Crypto Market</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Trading") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/trading";?>">Trading</a></li>
			<li><a class="<?php if(single_cat_title("",false) == "Guides") echo "active_nav-item";?>" href="<?php echo get_home_url()."/category/guides";?>">Guides</a></li>
			<div class="header_articles_mobile">
				<p class="header_articles_mobile_title">
					<span>
						<?php echo single_cat_title("",false)?>
					</span>
					<svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.34774 0.394654L8.34756 0.394821L5.0037 3.5264L1.6531 0.394654C1.44676 0.201782 1.11833 0.201782 0.911985 0.394654C0.696005 0.596527 0.696005 0.931654 0.911985 1.13353L4.62642 4.60535C4.73035 4.70249 4.86129 4.75 4.99697 4.75C5.12266 4.75 5.26148 4.70447 5.36754 4.60535L9.07963 1.13571C9.30531 0.933979 9.30514 0.596812 9.08886 0.394654C8.88251 0.201782 8.55409 0.201782 8.34774 0.394654Z" fill="black" stroke="black" stroke-width="0.5"/>
					</svg>
				</p>
			</div>
			<div class="header_searcher">
				<svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle r="8" transform="matrix(-1 0 0 1 13.5 9)" stroke="black"/>
					<path d="M7 14L1 20" stroke="black"/>
				</svg>
				<div class="searcher-form_wrapper"><?php get_search_form(array("echo" => true)); ?></div>
			</div>
			<div class="dropdown">
				<span>Tags</span>
				<svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.30078 0.5L4.59368 3.79289C4.9842 4.18342 5.61736 4.18342 6.00789 3.79289L9.30078 0.5"/>
				</svg>
			</div>
		</ul>
		<div class="dropdown_list dropdown_list_desktop">
			<?php 
				$tags = get_tags();
				$list;
				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );
					$list .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a>";;
				}
				echo $list;
			?>
		</div>
	</nav>
	<nav class="header_mobile_nav">
		<ul>
			<li><a href="<?php echo get_home_url()."/category/popular-posts";?>">Popular</a></li>
			<li><a href="<?php echo get_home_url()."/category/godex-news";?>">Godex News</a></li>
			<li><a href="<?php echo get_home_url()."/category/crypto-tips";?>">Crypto Tips</a></li>
			<li><a href="<?php echo get_home_url()."/category/crypto-currencies";?>">Cryptocurrencies</a></li>
			<li><a href="<?php echo get_home_url()."/category/crypto-talks";?>">Crypto Talks</a></li>
			<li><a href="<?php echo get_home_url()."/category/price-predictions";?>">Price Predictions</a></li>
			<li><a href="<?php echo get_home_url()."/category/crypto-mining";?>">Mining</a></li>
			<li><a href="<?php echo get_home_url()."/category/crypto-market";?>">Crypto Market</a></li>
			<li><a href="<?php echo get_home_url()."/category/trading";?>">Trading</a></li>
			<li><a href="<?php echo get_home_url()."/category/guides";?>">Guides</a></li>
		</ul>
	</nav>
	<div class="header_mobile_burger-menu">
		<ul>
			<li><a target="_blank" href="https://godex.io/how-it-works ">How it works</a></li>
			<li><a target="_blank" href="https://godex.io/about-us">About us</a></li>
			<li><a target="_blank" href="https://godex.io/exchange-rate">Exchange rate</a></li>
			<li><a target="_blank" href="https://godex.io/contact">Contact</a></li>
			<li><a class="header_top_wrapper_active" href="https://godex.io/blog">Blog</a></li>
			<li><a target="_blank" href="https://godex.io/faq">F.A.Q.</a></li>
			<div class="header_mobile_burger-menu_dropdown">
				Affiliate program
				<svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.34774 0.394654L8.34756 0.394821L5.0037 3.5264L1.6531 0.394654C1.44676 0.201782 1.11833 0.201782 0.911985 0.394654C0.696005 0.596527 0.696005 0.931654 0.911985 1.13353L4.62642 4.60535C4.73035 4.70249 4.86129 4.75 4.99697 4.75C5.12266 4.75 5.26148 4.70447 5.36754 4.60535L9.07963 1.13571C9.30531 0.933979 9.30514 0.596812 9.08886 0.394654C8.88251 0.201782 8.55409 0.201782 8.34774 0.394654Z" fill="#101012" stroke="#101012" stroke-width="0.5"/>
				</svg>
			</div>
			<div class="header_mobile_burger-menu_dropdown_links">
				<a target="_blank" href="https://godex.io/affiliate-program">For Personal</a>
				<a target="_blank" href="https://godex.io/b2b">For Business</a>
			</div>
		</ul>
		<div class="header_mobile_burger-menu_social">
			<p>Follow us on social networks:</p>
			<div class="header_mobile_burber_social_block">
			<a rel="nofollow, noopener" target="_blank" href="https://www.facebook.com/godex.io/">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20 3.33356C20 1.582 18.4187 0 16.6667 0H3.33333C1.58133 0 0 1.582 0 3.33356V16.6664C0 18.418 1.58133 20 3.33356 20H10V12.4444H7.55556V9.11111H10V7.81244C10 5.57267 11.6818 3.55556 13.75 3.55556H16.4444V6.88889H13.75C13.4551 6.88889 13.1111 7.24689 13.1111 7.78311V9.11111H16.4444V12.4444H13.1111V20H16.6667C18.4187 20 20 18.418 20 16.6664V3.33356Z" fill="black"/>
				</svg>
			</a>
			<a rel="nofollow, noopener" target="_blank" href="https://www.instagram.com/godex_io/">
				<svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20 2.00617C19.2648 2.34696 18.4735 2.57683 17.6433 2.6797C18.491 2.15053 19.1409 1.31233 19.4475 0.312419C18.6546 0.803062 17.7768 1.15908 16.8418 1.35128C16.0936 0.519852 15.0271 0 13.8469 0C11.5811 0 9.74403 1.91558 9.74403 4.27862C9.74403 4.61348 9.78016 4.93987 9.85039 5.25356C6.44013 5.07491 3.41636 3.37184 1.39253 0.783165C1.03932 1.41478 0.83714 2.14968 0.83714 2.93454C0.83714 4.41875 1.56142 5.72854 2.66244 6.49562C1.99013 6.47318 1.35721 6.28056 0.803849 5.9601C0.803443 5.97788 0.803443 5.99608 0.803443 6.01429C0.803443 8.08692 2.21789 9.81581 4.09516 10.2095C3.75089 10.3069 3.38834 10.3594 3.01403 10.3594C2.74933 10.3594 2.49234 10.3327 2.24184 10.2823C2.76435 11.982 4.27948 13.2194 6.07474 13.2537C4.67044 14.4014 2.90157 15.0855 0.978828 15.0855C0.647951 15.0855 0.321133 15.0651 0 15.0253C1.81637 16.2399 3.97296 16.9477 6.28991 16.9477C13.8376 16.9477 17.9644 10.4284 17.9644 4.77435C17.9644 4.58893 17.9607 4.40393 17.953 4.2202C18.7544 3.61822 19.4503 2.86427 20 2.00617Z" fill="black"/>
				</svg>
			</a>
			<a rel="nofollow, noopener" target="_blank" href="https://twitter.com/godex_io/">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4C0 1.79086 1.79086 0 4 0ZM4.60341 6.24975C4.72657 6.36076 4.78947 6.52378 4.77277 6.68871V12.6272C4.80932 12.8414 4.74179 13.0602 4.59087 13.2166L3.17954 14.9286V15.1543H7.18145V14.9286L5.77012 13.2166C5.61809 13.0605 5.54638 12.8431 5.57567 12.6272V7.49137L9.08832 15.1543H9.49604L12.5132 7.49137V13.5992C12.5132 13.7622 12.5132 13.7935 12.4065 13.9002L11.3214 14.9537V15.1794H16.5903V14.9537L15.5428 13.9252C15.4503 13.8548 15.4045 13.7389 15.4236 13.6242V6.0679C15.4045 5.95323 15.4503 5.83738 15.5428 5.7669L16.6154 4.73848V4.51273H12.9021L10.255 11.1159L7.24418 4.51273H3.3489V4.73848L4.60341 6.24975Z" fill="black"/>
				</svg>
			</a>
			<a rel="nofollow, noopener" target="_blank" href="https://bitcointalk.org/index.php?topic=4693949.0">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.1348 0H3.86518C1.7339 0 0 1.7335 0 3.86477V7.94739V16.1348C0 18.2661 1.7339 19.9996 3.86518 19.9996H16.1352C18.2665 19.9996 20 18.2661 20 16.1348V7.94699V3.86437C19.9996 1.7331 18.2661 0 16.1348 0ZM17.2434 2.30474L17.6856 2.30313V2.74326V5.69308L14.3069 5.70397L14.2952 2.31443L17.2434 2.30474ZM7.14539 7.94699C7.78603 7.06067 8.82524 6.47934 10 6.47934C11.1748 6.47934 12.214 7.06067 12.8538 7.94699C13.2705 8.5255 13.5203 9.2331 13.5203 9.9996C13.5203 11.9405 11.9396 13.5194 9.9996 13.5194C8.05833 13.5194 6.47934 11.9405 6.47934 9.9996C6.47975 9.2331 6.72866 8.5255 7.14539 7.94699ZM18.0511 16.1344C18.0511 17.1918 17.1914 18.0507 16.1348 18.0507H3.86518C2.80821 18.0507 1.94852 17.1918 1.94852 16.1344V7.94699H4.93384C4.67605 8.58117 4.53123 9.27384 4.53123 9.9996C4.53123 13.0144 6.98402 15.4688 10 15.4688C13.0156 15.4688 15.4684 13.0144 15.4684 9.9996C15.4684 9.27384 15.3227 8.58117 15.065 7.94699H18.0511V16.1344Z" fill="black"/>
				</svg>
			</a>
			<a rel="nofollow, noopener" target="_blank" href="https://medium.com/@account_94523">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10 19.4822C4.47727 19.4822 0 15.1215 0 9.7416C0 4.36073 4.47727 0 10 0C15.5227 0 20 4.36169 20 9.7416C19.9982 11.4844 19.5249 13.19 18.6364 14.6549C18.4255 15.0056 18.1618 15.8654 18.6364 17.412C18.7945 17.9279 19.2491 18.7857 20 19.9865C19.0673 20.0512 18.2245 19.8831 17.4718 19.4822C16.2973 18.8562 15.4964 17.8854 15.2464 18.0351C13.6446 18.9909 11.8371 19.4895 10 19.4822ZM14.1427 8.28287C14.3336 6.92847 13.3627 6.20008 12.0355 5.71416L12.4655 3.87867L11.4145 3.60045L10.9945 5.38763C10.7146 5.31447 10.434 5.24426 10.1527 5.17704L10.5755 3.37826L9.52455 3.10004L9.09364 4.93456C8.86949 4.88086 8.64584 4.82483 8.42273 4.76647V4.76067L6.97364 4.37618L6.69455 5.56925C6.69455 5.56925 7.47455 5.75956 7.45818 5.77115C7.88364 5.88418 7.96091 6.18365 7.94727 6.4213L7.45636 8.51182C7.48636 8.51955 7.52455 8.53114 7.56636 8.54853L7.45545 8.51955L6.76818 11.4486C6.71545 11.5858 6.58364 11.7925 6.28636 11.7133C6.29636 11.7297 5.52273 11.5104 5.52273 11.5104L5 12.7904L6.36818 13.1527C6.62273 13.2203 6.87273 13.2908 7.11727 13.3585L6.68273 15.2142L7.73273 15.4934L8.16364 13.657C8.45 13.7391 8.72909 13.8154 9.00091 13.8879L8.57182 15.7156L9.62273 15.9938L10.0582 14.141C11.8509 14.5013 13.1991 14.3564 13.7655 12.6339C14.2227 11.2467 13.7436 10.4458 12.8 9.92418C13.4873 9.75512 14.0045 9.275 14.1427 8.28287ZM12.0655 8.26355C11.7691 9.5252 9.93909 8.88375 9.34545 8.72725L9.86909 6.49569C10.4627 6.65315 12.3745 6.94683 12.0655 8.26355ZM11.7409 11.8621C11.4155 13.2493 9.21727 12.4997 8.50455 12.3113L9.08182 9.85269C9.79455 10.0411 12.0791 10.4159 11.7409 11.8621Z" fill="black"/>
				</svg>
			</a>
			<a rel="nofollow, noopener" target="_blank" href="https://www.reddit.com/user/Godex_io">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10ZM15.1979 8.64087C15.9968 8.64087 16.6523 9.28464 16.6523 10.0953C16.6523 10.6913 16.2948 11.204 15.7941 11.4306C15.8179 11.5735 15.8299 11.7286 15.8299 11.8718C15.8299 14.1249 13.219 15.9371 10.0001 15.9371C6.78121 15.9371 4.17032 14.1129 4.17032 11.8718C4.17032 11.7166 4.1821 11.5735 4.2061 11.4306C3.70521 11.204 3.34766 10.7033 3.34766 10.1073C3.34766 9.30842 3.99143 8.65287 4.8021 8.65287C5.19543 8.65287 5.55321 8.80776 5.81543 9.0582C6.82877 8.33087 8.22366 7.86598 9.77343 7.8182L10.5128 4.33709C10.5245 4.26553 10.5603 4.20598 10.6199 4.1702C10.6677 4.13442 10.7392 4.12242 10.8108 4.13442L13.2308 4.64709C13.3977 4.30131 13.7554 4.06287 14.1608 4.06287C14.733 4.06287 15.1979 4.52775 15.1979 5.09998C15.1979 5.67242 14.733 6.13731 14.1608 6.13731C13.6003 6.13731 13.1474 5.6962 13.1234 5.14776L10.9537 4.68287L10.2861 7.80642C11.8121 7.86598 13.1832 8.33087 14.1845 9.0462C14.4468 8.79575 14.8045 8.64087 15.1979 8.64087ZM7.69921 10.0953C7.12677 10.0953 6.66188 10.5602 6.66188 11.1324C6.66188 11.7046 7.12677 12.1815 7.69921 12.1698C8.27143 12.1698 8.73632 11.7046 8.73632 11.1324C8.73632 10.5602 8.27143 10.0953 7.69921 10.0953ZM10.0001 14.6495C10.3934 14.6495 11.7525 14.6018 12.4679 13.8864C12.5632 13.7791 12.5632 13.6122 12.4679 13.5049C12.3605 13.3978 12.1937 13.3978 12.0863 13.5049C11.6452 13.958 10.6797 14.1129 10.0001 14.1129C9.32055 14.1129 8.36677 13.958 7.91366 13.5049C7.80632 13.3978 7.63943 13.3978 7.5321 13.5049C7.42499 13.6122 7.42499 13.7791 7.5321 13.8864C8.23566 14.5898 9.59477 14.6495 10.0001 14.6495ZM11.2399 11.1444C11.2399 11.7166 11.7048 12.1815 12.277 12.1815C12.8494 12.1815 13.3143 11.7046 13.3143 11.1444C13.3143 10.5722 12.8494 10.1073 12.277 10.1073C11.7048 10.1073 11.2399 10.5722 11.2399 11.1444Z" fill="black"/>
				</svg>
			</a>
			</div>
		</div>
		
	</div>
</header>
