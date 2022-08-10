<?php get_header(); ?>
<?php the_post(); ?>
<main class="page-body">
	<div class="container">
		<?php get_template_part( 'inc/breadcrumbs' ); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="article-content content-text">
			<?php the_content(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>