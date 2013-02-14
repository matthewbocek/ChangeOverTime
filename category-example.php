<?php get_header; ?>

<?php if (have_posts() ): ?> 
	<?php while( have_posts() ) : the_post(); ?>
			
			get_template_part( ct_get_template() );
	
	<?php endwhile; ?>
<?php endif; ?>

<?php get_header; ?>