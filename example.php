
<?php $ct_start_date = strtotime( get_field('start_date' ) ); ?>
<?php $ct_end_date = strtotime( get_field('end_date' ) ); ?>
<?php $ct_today = time(); ?>
<?php $ct_day = 86400; ?>

<?php while( have_posts() ) : the_post(); ?>
	<?php if( $ct_start_date >= $ct_today /* hasn't started yet */&& $ct_start_date <= ( $ct_today * $ct_day * 14 ) /* will start in <=14 days */&& $ct_end_date >= $ct_today /* hasn't ended yet */): ?>
	
	<!-- HTML for the post goes here -->
	
	<?php endif; #End Coming Soon?>
<?php #End loop ?>
	<?php endwhile; ?>


	<hr />
	<?php rewind_posts(); ?>