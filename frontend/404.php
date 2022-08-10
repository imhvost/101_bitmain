<?php get_header(); ?>
<?php the_post(); ?>
<main class="page-body">
	<div class="container">
		<?php get_template_part( 'inc/breadcrumbs' ); ?>
		<h1 class="page-title"><?php _e( 'Ошибка 404', DOMAIN ); ?></h1>
		<div class="section-desc"><?php _e( 'Страница не существует', DOMAIN ); ?></div>
		<a href="<?php echo home_url( '/' ); ?>" class="btn"><?php _e( 'На главную', DOMAIN ); ?></a>
	</div>
</main>
<?php get_footer(); ?>