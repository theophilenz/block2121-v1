<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           tag.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>

<div class="wrap">
	<div class="container-fluid">
	<?php get_template_part( 'content', 'top-search');?>
		<div class="col-md-8 blog">
			<?php if ( have_posts() ) :

					// Start the Loop.
					while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

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
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- /col-md-8 blog -->
		<?php get_sidebar(); ?>
	</div><!-- /container -->
<?php get_footer(); ?>