<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $eo_options,$wpdb,$th_xs_slug;

?><!DOCTYPE html> 
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
               <?php if( ! empty ($eo_options["favicon_url"]) ) { ?>
       			<link rel="shortcut icon" href="<?php echo $eo_options["favicon_url"]; ?>">
				<?php } ?>
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="library/js/respond.min.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php if($eo_options["use_placeholder"] == "1") { ?>
		<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/rsc/js/holder.js'></script>
        <?php } ?>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

		<!-- theme options from options panel -->
       <?php if ( $eo_options['use_bsw_themes'] == "1" && $eo_options['bsw_theme'] != "default"  && $eo_options['bsw_theme_sup'] == "1" ) { 
	    $gl_u = get_template_directory_uri().'/lib/bootstrap/fonts/';
		?>
       <?php
	      echo '<style>@font-face {
		  font-family: "Glyphicons Halflings";
		  src: url("'.$gl_u.'glyphicons-halflings-regular.eot");
		  src: url("'.$gl_u.'glyphicons-halflings-regular.eot?#iefix") format("embedded-opentype"), url("'.$gl_u.'glyphicons-halflings-regular.woff") format("woff"), url("'.$gl_u.'glyphicons-halflings-regular.ttf") format("truetype"), url("'.$gl_u.'glyphicons-halflings-regular.svg#glyphicons-halflingsregular") format("svg");
		}
	   </style>';
	    } ?>
		<?php  if ( is_singular() ) eo_inline_css_per_post(); ?>

		<?php if ( $eo_options['eo_typo_body'] && array_key_exists("source",$eo_options['eo_typo_body']) && $eo_options['eo_typo_body']["source"] == "gwf_font") { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $eo_options['eo_typo_body']["face"] ?>:<?php echo $eo_options['eo_typo_body']["variant"] ?>' rel='stylesheet' type='text/css'>
        <?php } ?>
		<?php if ( $eo_options['eo_typo_heading'] && array_key_exists("source",$eo_options['eo_typo_heading']) && $eo_options['eo_typo_heading']["source"] == "gwf_font") { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $eo_options['eo_typo_heading']["face"] ?>:<?php echo $eo_options['eo_typo_heading']["variant"] ?>' rel='stylesheet' type='text/css'>
        <?php } ?>
        <?php if ( $eo_options['eo_typo_nav'] && array_key_exists("source",$eo_options['eo_typo_nav']) && $eo_options['eo_typo_nav']["source"] == "gwf_font") { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $eo_options['eo_typo_nav']["face"] ?>:<?php echo $eo_options['eo_typo_nav']["variant"] ?>' rel='stylesheet' type='text/css'>
        <?php }
		// _eo-todo: compact the typography csses ? ?>
        <?php wp_head(); ?>
	</head>
	<body <?php ( of_get_option('nav_position')  == "fixed" ) ? body_class('fixednav') : body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5QQ458"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5QQ458');</script>
<!-- End Google Tag Manager -->


	<div id="wrap"<?php if ( $eo_options['sticky_footer']  == "1" ) echo ' class="stickyf"' ?>>			
		<header role="banner" class="header">
			<div id="inner-header" class="clearfix">			
				<div class="navbar navbar-<?php echo of_get_option('nav_pref') ?><?php if ( of_get_option('nav_position')  == "fixed" ) echo " navbar-fixed-top" ?>">
					<div class="container" id="navbarcont">
						<?php
							$blogn = get_option('blogname');
							if ( of_get_option('trim_site_title')  == "1" ){
							$blogname = (strlen($blogn) > 18) ? substr($blogn,0,16).'..' : $blogn;

							}
							else {
								$blogname = $blogn;
							}
                         ?>
                         <?php ( $eo_options['nav_select_menu'] == "1" ) ? $nav_select_hide = ' hidden-xs hidden-sm' : $nav_select_hide = ''; ?>
                         
						 <div id="header">
							<ul class="nav nav-1 navbar-nav navbar-left" style="
								margin-right: 20px;
								">
								<li><a class="logo" href="http://www.littledata.co.uk/"></a></li>
							</ul>
							<ul class="nav nav-2 navbar-nav navbar-left">
								<li class="hidden-xs hidden-sm">
									<a href="http://www.littledata.co.uk/marketing-analytics">
									MARKETING ANALYTICS
									</a>
								</li>
								<li class="hidden-xs hidden-sm">
									<a href="http://www.littledata.co.uk/web-conversion-optimisation">
									CONVERSION OPTIMISATION
									</a>
								</li>
							</ul>
							<ul class="nav nav-3 navbar-nav navbar-right">
								<li><a class="contact" href="/contact">
									CONTACT
									</a>
								</li>
								<li><a class="login hidden-xs" href="http://news.littledata.co.uk/login">
									LOGIN
									</a>
								</li>
							</ul>
						</div>
						
						 <!-- 
						 <div id="header">
							<ul class="nav navbar-nav navbar-left">
								<li><a class="logo" href="http://www.littledata.co.uk/"></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								
									<li class="hidden-xs hidden-sm">
										<a href="http://www.littledata.co.uk/marketing-analytics">
											MARKETING ANALYTICS
										</a>
									</li>
								
									<li class="hidden-xs hidden-sm">
										<a href="http://www.littledata.co.uk/web-conversion-optimisation">
											CONVERSION OPTIMISATION
										</a>
									</li>
								
									<li class="hidden-xs hidden-sm">
										<a href="http://www.littledata.co.uk/lifetime-customer-value">
											LIFETIME CUSTOMER VALUE
										</a>
									</li>
								
								<li><a href="tel:+442032892220">
									<i class="glyphicon glyphicon-earphone"></i>
									<span class="phone">020 3289 2220</span>
								</a></li>
							</ul>	

						</div>
						-->
						
					</div> <!-- end .#navbarcont.container -->
                         <?php if( $eo_options['nav_select_menu'] == "1" ) {
							//				eo_mobile_nav_menu(); // Adjust using Menus in Wordpress Admin 
										}/* else {
											wp_nav_menu();
										}*/?>
                          <!--   <div class="clearfix visible-xs visible-sm"></div> -->
				</div> <!-- end .navbar -->	
			</div> <!-- end #inner-header -->
			<div class="container grey-top">
				<div class="row">
					<div class="hidden-sm hidden-xs col-md-10">
						<h5>
							<a href="http://www.littledata.co.uk">Home </a> >
							<a href="http://blog.littledata.co.uk">Blog </a> >
							<a><?php the_title(); ?></a>
						</h5>
						
					</div>
					
	                <div class="searchwrap searchf_mlg col-md-2">
	                    <form class="navbar-form navbar-right form-inline" role="search" method="get" id="searchformtop" action="<?php echo home_url( '/' ); ?>">
	                        <div class="input-group clearfix">
	                            <input name="s" id="search_lg" style="min-width: 10em;" type="text" class="search-query form-control pull-right s_exp" autocomplete="off" placeholder="<?php _e('Search','bonestheme'); ?>">
	                            <div class="input-group-btn">
	                               <button class="btn btn-info">
	                               <span class="glyphicon glyphicon-search"></span>
	                               </button>
								</div>
	                        </div>
	                    </form>
	                </div><!-- end .searchwrap -->
					
				</div>
			</div>
			
		</header> <!-- end header -->
