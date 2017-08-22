<?php
/*
* used in search results
*/
?>

<div class="post blog-block">
<div class="search-results">
	<h2 id="post-<?php the_ID(); ?>" class="lien-article-recherche" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	     
	<div class="col-md-4">
		<?php
			if ( has_post_thumbnail() ) { the_post_thumbnail(); }
		?>
	</div>
	<div class="col-md-8">
		<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="label lien bouton-lire-plus">Consulter la fiche</a>
	</div>
</div><!-- /search-results -->
</div><!-- /blog-block -->