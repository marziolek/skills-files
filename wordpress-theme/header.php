<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $themeum; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<?php if(isset($themeum['favicon'])){ ?>
		<link rel="shortcut icon" href="<?php echo $themeum['favicon']; ?>" type="image/x-icon"/>
	<?php }else{ ?>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/images/plus.png' ?>" type="image/x-icon"/>
	<?php } ?>
    
    <link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/ico.png"/>
	<link rel="stylesheet" type="text/css" href="">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php if(isset($themeum['before_head'])) echo $themeum['before_head'];?>
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
</head>

<body <?php body_class() ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header wrapfixed" role="banner">
			<div id="navigation" class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                        <?php
									if (isset($themeum['logo_image']))
									   {
									   		if(!empty($themeum['logo_image'])){
								?>
						<a class="navbar-brand scroll" href="<?php echo site_url(); ?>" style="background-image: url('<?php echo $themeum['logo_image'] ?>')">
								<?php
											}
											else{
												echo '<span>'.get_bloginfo('name').'<span>'; 
											}
									   }
									else
									   {
									    echo '<span>'.get_bloginfo('name').'<span>';
									   }
									?>
						</a>
					</div>
					<div class="navbar-collapse collapse">
						<?php if(has_nav_menu('primary')): ?>
							<?php wp_nav_menu( array( 'theme_location' => 'primary','container' => false,'menu_class' => 'nav navbar-nav button-views', 'walker' => new Onepage_Walker()) ); ?>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		</header><!--/#header-->
        
        <div class="side-nav-circles">
            <?php if(has_nav_menu('primary')): ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary','container' => false,'menu_class' => 'nav navbar-nav button-views', 'walker' => new Onepage_Walker()) ); ?>
            <?php endif; ?>
        </div>