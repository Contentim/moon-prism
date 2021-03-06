<?php

	$sites = array(
			'constructiontop100plus.ru',
			'tehnomegapolis.ru',
			'raduga-lk.ru'
		);
	foreach ($sites as $value) {
		if( strpos( $_SERVER["HTTP_REFERER"], $value ) !== FALSE){
			header("Location: http://sl.stebnev-studio.ru");
			exit();
		}
	}

?>

<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php main_classes(); ?>" role="main">

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<?php display_post(true); ?>

		<?php endwhile; ?>	

		<?php page_navi(); ?>

		<?php else : ?>

		<article id="post-not-found" class="block">
		    <p><?php _e("No posts found."); ?></p>
		</article>

		<?php endif; ?>

	</div>

	<?php get_sidebar("right"); ?>

</div>

<?php get_footer(); ?>