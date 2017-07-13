<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           category.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>
  
<div class="wrap">
	<div class="container-fluid">
	<?php get_template_part( 'content', 'top-search');?>
		<div class="col-md-8 blog">

		<div class="panel panel-default">
			<div class="panel-heading"><h1> <?php single_cat_title(); ?></h1></div>
			<div class="panel-body"><?php echo category_description() ?></div>
		</div>

		<?php 
		// Check if there are any posts to display
		if ( have_posts() ) : ?>

		<?php
		
		// The Loop
		while ( have_posts() ) : the_post();
		
		get_template_part( 'content', 'categorie');
		
		endwhile; ?>
		
				<div class="navigation">
					<div class="alignleft">
						<?php previous_posts_link( __( '&#8592; Previous Article', 'social-magazine' ) ); ?>
					</div><!-- /alignleft -->
					<div class="alignright">
						<?php next_posts_link( __( 'Next Articles &#187;', 'social-magazine' ) ); ?>
					</div><!-- /alignright -->
				</div><!-- /navigation -->
		
		<?php else :
					
		get_template_part( 'content', 'none');
					
		endif; ?>
	</div><!-- /col-md-8 blog -->
<?php get_sidebar(); ?>
</div><!-- /container -->
<?php get_footer(); ?>