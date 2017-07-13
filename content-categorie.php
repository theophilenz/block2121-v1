<?php
/*
* default template used for the loop	
*/
?>

<div class="post blog-block">
	<h2 id="post-<?php the_ID(); ?>" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>  
	<?php get_template_part( 'post', 'likes'); ?>
	<div class="col-md-4">
		<?php
			if ( has_post_thumbnail() ) { the_post_thumbnail(); }
		?>
	</div>
	<div class="col-md-8">
		<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="label lien bouton-lire-plus">Consulter la fiche</a>
	</div>
	
</div><!-- /blog-block -->