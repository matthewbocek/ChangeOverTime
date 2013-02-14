<?php #Get the header ?>
<?php get_header(); ?>

</header><!-- end header div -->

<?php #Get the sidebar ?>
<?php //get_sidebar('primary'); #no sub-navigation on the home page?>
<?php #Get the sidebar ?>
<?php get_sidebar('secondary'); ?>

<div id="content">
<?php #Start Loop ?>
<?php if( have_posts() ): ?>
	<?php while( have_posts() ) : the_post(); ?>
	<?php if( ( strtotime( get_field('start_date' ) ) ) <= ( time() ) && ( strtotime( get_field('end_date' ) ) ) >= ( time() ) ): ?>
	
	<?php #Show Post Title ?>

	<div id="<?php the_ID(); ?>" class="post">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a> - Now Playing</h3>

			
		<h5><?php #Show post Date ?>
			<?php $date = array(
				'format' => 'l-F-j-Y',
				'before' => 'Posted on: ',
				'after'  => ' at ',
				'echo'   => TRUE
			); ?>
			<?php the_date(); ?>
			<?php the_time(); ?>
			<?php #Show Post Category ?>
			 in 
			<?php the_category( ' , '); ?>
		.</h5>
		<p style="color:green;">
			<?php the_content(); ?>
			<br />
			Content for <?php the_title; ?>
		</p>
	</div>
	
	<?php endif; #End Now Playing?>
<?php #End loop ?>
	<?php endwhile; ?>

	<hr />
	<?php rewind_posts(); ?>


<?php while( have_posts() ) : the_post(); ?>
	<?php if( ( strtotime( get_field('start_date' ) ) ) >= ( time() ) && ( strtotime( get_field('start_date' ) ) ) <= ( time() + (60 * 60 * 24 * 14) ) && ( strtotime( get_field('end_date' ) ) ) >= ( time() ) ): ?>
	
	<?php #Show Post Title ?>

	<div id="<?php the_ID(); ?>" class="post">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a> - Coming soon</h3>

			
		<h5><?php #Show post Date ?>
			<?php $date = array(
				'format' => 'l-F-j-Y',
				'before' => 'Posted on: ',
				'after'  => ' at ',
				'echo'   => TRUE
			); ?>
			<?php the_date(); ?>
			<?php the_time(); ?>
			<?php #Show Post Category ?>
			 in 
			<?php the_category( ' , '); ?>
		.</h5>
		<p style="color:green;">
			<?php the_content(); ?>
			<br />
			Content for <?php the_title; ?>
		</p>
	</div>
	
	<?php endif; #End Coming Soon?>
<?php #End loop ?>
	<?php endwhile; ?>


	<hr />
	<?php rewind_posts(); ?>


<?php while( have_posts() ) : the_post(); ?>
	<?php if( ( strtotime( get_field('start_date' ) ) ) <= ( time() ) && ( strtotime( get_field('end_date' ) ) ) <= ( time() ) ): ?>
	
	<?php #Show Post Title ?>

	<div id="<?php the_ID(); ?>" class="post">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a> - Closed</h3>

			
		<h5><?php #Show post Date ?>
			<?php $date = array(
				'format' => 'l-F-j-Y',
				'before' => 'Posted on: ',
				'after'  => ' at ',
				'echo'   => TRUE
			); ?>
			<?php the_date(); ?>
			<?php the_time(); ?>
			<?php #Show Post Category ?>
			 in 
			<?php the_category( ' , '); ?>
		.</h5>
		<p style="color:green;">
			<?php the_content(); ?>
			<br />
			Content for <?php the_title; ?>
		</p>
	</div>
	
	<?php endif; #End Closed?>
<?php #End loop ?>
	<?php endwhile; ?>





<?php else: ?>
	<div id="fail">No posts found!</div>
<?php endif; ?>
	</div><!-- End Content -->



<?php
#Get the footer
	get_footer();
?>