<?php theme_include('header'); ?>

<section class="sheet answer" id="article-<?php echo article_id(); ?>">
	<header class="ribbon"><?php echo page_title(); ?></header>
	
	<article>
		<?php echo page_content(); ?>
	</article>
</section>

<?php theme_include('footer'); ?>