<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package University_of_Illinois_2020
 */

?>
<?php

$use_theme_menu =  get_field('use_theme_menu', 'option') ? get_field('use_theme_menu', 'option') : false; //Advanced Custom Fields function, get_field()

$navigation_tabs = null;

$site_navigation_menu =  get_field('site_navigation_menu', 'option') ? get_field('site_navigation_menu', 'option') : null; //Advanced Custom Fields function, get_field()
	if($site_navigation_menu)
		{
		$navigation_tabs = $site_navigation_menu['navigation_tabs'] ? $site_navigation_menu['navigation_tabs'] : null; /* Array, formatted:  */
		}

$secondary_site_title_group = get_field('secondary_site_title_group', 'option') ? get_field('secondary_site_title_group', 'option') : null;

$secondary_site_title_text = null;
$secondary_site_title_link = null;

if($secondary_site_title_group)
	{
	$secondary_site_title_text = $secondary_site_title_group['secondary_site_title'] ? $secondary_site_title_group['secondary_site_title'] : null;
	$secondary_site_title_link = $secondary_site_title_group['secondary_site_link'] ? $secondary_site_title_group['secondary_site_link'] : null;	
	}
	
$secondary_site_title = null;
	if( $secondary_site_title_link )
		{
		$secondary_site_title = '<a href="' . $secondary_site_title_link . '">' . $secondary_site_title_text . '</a>';
		}
	else
		{
		$secondary_site_title = $secondary_site_title_text;
		}

$header_links_group = get_field('header_links', 'option') ? get_field('header_links', 'option') : null;

// Thanks to Pete at https://wordpress.stackexchange.com/a/367174/148349 for  the wp_get_menu_array function!
function wp_get_menu_array($current_menu='Main Menu') {

		$menu_array = wp_get_nav_menu_items($current_menu);

		$menu = array();

		function populate_children($menu_array, $menu_item)
		{
			$children = array();
			if (!empty($menu_array)){
				foreach ($menu_array as $k=>$m) {
					if ($m->menu_item_parent == $menu_item->ID) {
						$children[$m->ID] = array();
						$children[$m->ID]['ID'] = $m->ID;
						$children[$m->ID]['title'] = $m->title;
						$children[$m->ID]['url'] = $m->url;
						unset($menu_array[$k]);
						$children[$m->ID]['children'] = populate_children($menu_array, $m);
					}
				}
			};
			return $children;
		}

		foreach ($menu_array as $m) {
			if (empty($m->menu_item_parent)) {
				$menu[$m->ID] = array();
				$menu[$m->ID]['ID'] = $m->ID;
				$menu[$m->ID]['title'] = $m->title;
				$menu[$m->ID]['url'] = $m->url;
				$menu[$m->ID]['children'] = populate_children($menu_array, $m);
			}
		}

		return $menu;

	}

//Currently, the il-header component's built in menu system only allow for a single level of nesting within the nav menu. If this changes, we'll want to tweak this function to be recursive, instead of only descending into the first level of nesting as it does now. --rslater
function uofi_make_menu_list_items($menu_item=null) {
	$list_items = '';
	$no_children_class = '';
	if($menu_item['children'])
		{
		if	($menu_item)
			{
			$list_items .= "\r\n";
			$list_items .= '<il-nav-section><a href="' . $menu_item['url'] .  '" slot="label">' . $menu_item['title'] . '</a>';
			if($menu_item['children'])
				{
				$list_items .= "\r\n"; 
				$list_items .= '<ul class="il-subnav">';
				foreach ($menu_item['children'] as $child_menu_item)
					{
						//var_dump($child_menu_item);
						$list_items .= '<li><a href="' . $child_menu_item['url'] .  '">' . $child_menu_item['title'] . '</a></li>';
					}
				$list_items .= '</ul>' . "\r\n";
				}
			$list_items .= '</il-nav-section>';
			}
		}
		else
		{
		if	($menu_item)
			{
			$list_items .= "\r\n";
			$list_items .= '<il-nav-link><a href="' . $menu_item['url'] .  '">' . $menu_item['title'] . '</a></il-nav-link>';
			}
		}
		
	return $list_items;
	}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!-- OneTrust Cookies Consent Notice start for illinois.edu -->
	<script>
	function OptanonWrapper() { }
	</script>
	<!-- OneTrust Cookies Consent Notice end for illinois.edu -->

	<?php wp_head(); ?>

	<link rel="icon" href="https://cdn.brand.illinois.edu/favicon.ico">
	

	
		

		
		
		
							
		<?php
		//this can't be global. It needs to be done for each of the tabs menu. Give each one a class, used here and in the output below
		//$cta_width = $navigation_tab['call_to_action']['width'] ? $navigation_tab['call_to_action']['width'] : '40';
		//could loop here, and then again in the bottom, which makes the styles claner (leaning this way) our output style blocks in the body...
		$cta_width = 40;
		?>
		<style>
		body .tile-list .tile.w66
		{
		flex: 0 0 calc(<?= $cta_width ?>% - 1.2rem);
		max-width: calc(<?= $cta_width ?>% - 1.2rem);
		min-width: calc(<?= $cta_width ?>% - 1.2rem);
		}

		<?php
		//$sidebar_active = get_field('secondary_site_title_group', 'option') ? get_field('secondary_site_title_group', 'option') : null;
		$suppress_sidebar_site_wide =  get_field('sidebar_default', 'options') ? get_field('sidebar_default', 'options') : false; //Advanced Custom Fields function, get_field() = TRUE || FALSE
		$show_sidebar_this_page =  get_field('suppress_sidebar', get_queried_object_id()) ? get_field('suppress_sidebar', get_queried_object_id()) : 0; //Advanced Custom Fields function, get_field()  = 0 Use Site Default || 1 : Hide Sidebar || 2 : Show Sidebar
		$show_sidebar = $suppress_sidebar_site_wide;
		if($show_sidebar_this_page != 0) 
			{
			$show_sidebar = $show_sidebar_this_page - 1;
			}

			$sidebar_active = TRUE;
			if( $show_sidebar )
			{
			?>
			#primary_secondary_wrapper header, #primary_secondary_wrapper .entry-content > *
				{
				max-width: 870px !important;
				}
				
			#primary_secondary_wrapper #secondary
				{
				max-width: 300px !important;
				}
			
			@media (max-width: 768px)
			{
			#primary_secondary_wrapper #secondary.widget-area
				{
				max-width: 100% !important;
				}			
			}
			<?php
			}
			else
			{
			?>
			#primary_secondary_wrapper header, #primary_secondary_wrapper .entry-content > *
				{
				max-width: 1140px !important;
				}
			
			@media (max-width: 768px)
			{
			#primary_secondary_wrapper #secondary
				{
				max-width: 100% !important;
				}			
			}			
			<?php
			}
			?>
			#primary_secondary_wrapper header, #primary_secondary_wrapper .entry-content > *, .search #primary_secondary_wrapper article
				{
				margin-left: auto;
				margin-right: auto;
				}
				
			#primary_secondary_wrapper #secondary
				{
				max-width: 300px !important;
				}
			
			.search #primary_secondary_wrapper article .entry-summary
			{
			margin-top: 0;
			padding-left: 1rem;
			padding-right: 1rem;
			}
			
			.search #primary_secondary_wrapper article .post-thumbnail
				{
				max-width: 33%;
				margin: 0 1rem 0.25rem 1rem;
				float: right;
				}
			
			@media (max-width: 768px)
				{
				.search #primary_secondary_wrapper article .post-thumbnail
						{
						max-width: 50%;
						}		
				}

			@media (max-width: 400px)
				{
				.search #primary_secondary_wrapper article .post-thumbnail
						{
						max-width: 100%;
						width: 100%;
						float: none;
						display: block;
						padding: 0;
						margin: 0 0 0.5rem 0;
						}		
				}

			.archive #primary_secondary_wrapper #primary
				{
				max-width: 1140px;
				}
				
			.has-sidebar .archive #primary_secondary_wrapper #primary
				{
				max-width: 870px;
				}
			
			.has-sidebar #primary_secondary_wrapper main article .alignfull
				{
				max-width: 870px !important;	
				}
			
	</style>
</head>
<?php
//Add title-hidden class to body if the title is offscreen positioned
if (get_field('suppress_page_title'))
	{
	add_filter( 'body_class', function( $classes ) {
		return array_merge($classes, array('title-hidden'));
		});
	}
?>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<div>
	<div>
		<header id="masthead" class="site-header">
		<?php /* <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'uofi-2020' ); ?></a> */ ?>
			<div class="masthead_inner d-flex justify-content-between align-items-stretch">
				<div class="il-header-wrapper flex-grow-1"> <?php /* site-branding site-branding-2 flex-grow-1 */ ?>
					<il-header>
						<div slot="wordmark">
							<il-unit-wordmark>
							<?php
							if( $secondary_site_title )
							{
							?>
								<p class="il-primary-unit"><?= $secondary_site_title ?></p>
								<h1 class="il-secondary-unit"><a href="<?=get_home_url()?>"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							}
							else
							{
							?>
								<h1><a href="<?=get_home_url()?>"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							}
							?>
							</il-unit-wordmark>
						</div>
						
						<il-search slot="search" action="<?php echo(get_site_url()); ?>" method="get" searchname="s"></il-search>
						
						<?php
						if( ! $use_theme_menu && has_nav_menu( 'navigation' ) && ( wp_get_nav_menu_items( get_nav_menu_locations()['navigation'] ) ) )
						{
						?>
							
							<div slot="navigation">
								<div id="uofinavbar-1" class="uofinavbar">
									<?php
									wp_nav_menu( array( 
										'theme_location' => 'cybergis-cert-main-menu', 
										'container_class' => 'cybergis-cert-main-menu' ) ); 
									?>	
								</div>
							</div>	
							
								<!-- <il-nav slot="navigation">
									
								</il-nav> -->
						<?php
						}				
						elseif(has_nav_menu( 'navigation' ) && wp_get_nav_menu_items(get_nav_menu_locations()['navigation']))
						{
						?>
						<div slot="navigation" id="navbar_wrapper_outer" class="navbar navbar-expand-lg p-0">
							<div id="megamenunavbar"id="mainnav">
								<nav aria-label="Site Navigation">
									<?php
										wp_nav_menu( array(
											'theme_location'  => 'navigation',
											'depth'           => 7, // Only supports up to 3 drop downs for now, because of bug with keyboard accesbility beyond this level
											'container'       => 'ul',
											'container_class' => 'mynewclass',
											'container_id'    => 'list_container',
											'menu_class'      => 'navbar-nav w-100',
											'fallback_cb'     => 'WP_Mega_Menu_Navwalker::fallback',
											'walker'          => new WP_Mega_Menu_Navwalker(),
										) );
									?>
								</nav>
							</div>
						</div>	
						<?php
						}
						?>
					<?php
					if($header_links_group)
						{
						?>
						<nav slot="links" class="il-links" aria-label="Top">
							<ul>
								<?php
								foreach ( $header_links_group as $header_link )
									{
									echo('<li><a href="' . $header_link['link']['url'] . '">'. $header_link['link']['title'] . '</a></li>');
									}
								?>
							</ul>
						</nav>
						<?php
						}
						?>
					</il-header>
				</div>
			</div>
		</header><!-- #masthead -->
	</div>
