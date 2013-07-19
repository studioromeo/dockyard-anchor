<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>
		<meta name="description" content="<?php echo site_description(); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/style.css'); ?>">
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
		<link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">

		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script src="<?php echo asset_url('/js/zepto.js'); ?>"></script>

	    <meta name="viewport" content="width=device-width">
	    <meta name="generator" content="Anchor CMS">

	    <meta property="og:title" content="<?php echo site_name(); ?>">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="<?php echo current_url(); ?>">
	    <meta property="og:image" content="<?php echo theme_url('img/og_image.gif'); ?>">
	    <meta property="og:site_name" content="<?php echo site_name(); ?>">
	    <meta property="og:description" content="<?php echo site_description(); ?>">

		<?php if(customised()): ?>
    		<style><?php echo article_css(); ?></style>
    		<script><?php echo article_js(); ?></script>
		<?php endif; ?>
	</head>
	<body class="<?php echo body_class(); ?>">
		<div class="clearfix">
			<aside>
				<header>
					<a id="logo" href="<?php echo base_url(); ?>" title="<?php echo site_name(); ?>">
						<img src="<?php echo theme_url('/img/logo.svg'); ?>" width="50px"/>
					</a>
				</header>

				<?php if(has_menu_items()): ?>
				<nav id="main" role="navigation">
					<ul>
						<?php while(menu_items()): ?>
						<li <?php echo (menu_active() ? 'class="active"' : ''); ?>>
							<a href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>">
								<?php echo menu_name(); ?>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
				</nav>
				<?php endif; ?>

				<nav>
					<ul>
						<?php while(categories()): ?>
							<li>
								<span title="<?php echo category_description(); ?>">
									<?php echo category_title(); ?>
								</span>

								<ul>
									<?php $items = Query::table(Base::table('posts'))
											->where('category', '=', category_id())
											->where('status', '=', 'published')->get();
											$page = Registry::get('posts_page');

									foreach($items as $item): ?>
										<li><a href="<?php echo base_url($page->slug . '/' . $item->slug); ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></li>
									<?php endforeach; ?>
								</ul>

							</li>
						<?php endwhile; ?>
					</ul>
				</nav>
				
			</aside>