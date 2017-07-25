<?php
/*
* template used for Single and Page	
*/
?>

<h1 id="post-<?php the_ID(); ?>" <?php post_class(); ?> title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
<div class="blog-block single-page">
	
	<div class="col-md-7">
		<?php if ( has_post_thumbnail() ) {
		 the_post_thumbnail(); } ?>
	</div>
	<div class="col-md-5 panel-primary zone-details">
		<div>
			<span class="bouton-favoris"><?php the_favorites_button() ?></span><span class="compteur-favoris"><?php the_favorites_count(); ?></span>
		</div>
		<div class="label label-black">
			<i class="fa fa-laptop" aria-hidden="true"></i><?php the_field("plateformes_supportees"); ?>
		</div>
		<div class="label label-black">
			<i class="fa fa-dollar" aria-hidden="true"></i><?php the_field("prix_produit"); ?>
		</div>
		<div class="lien-obtenir">
			<a href="<?php the_field("lien_produit"); ?>" rel="nofollow" target="_blank" class="label label-black lien"><i class="fa fa-link" aria-hidden="true"></i>Site web officiel</a>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-5">
			<div class="panel panel-default liste-fiche-produit">
			<div class="panel-heading">Apparaît dans les listes suivates</div>
			<div class="panel-body"><?php the_category(); ?></div>
		</div>
		</div>
		<div class="col-md-7">
			<div class="panel panel-default liste-fiche-produit">
			<div class="panel-heading">Specifications particulières</div>
			<div class="panel-body">
				<?php 
				if(null!==the_field("specifications")){
					the_field("specifications");
				}else{
					echo " "."Visitez le site web de ".get_field("nom_court")." pour plus d'informations";
				}
				?>
				
			</div>
		</div>
		</div>
		
		
	</div>
	<div class="col-md-12">
		<div class="col-md-8"></div>
		<?php the_content(); ?>
	</div>
	<div class="col-md-12">
		<?php comments_template(); ?>
	</div>
	
		 <?php 
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'social-magazine' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'social-magazine' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		 
		 if ( is_attachment() ) { ?>
		 
				<div class="alignleft galleryimg"><?php previous_image_link( false, __('&#60; Previous Image', 'social-magazine') ); ?></div>
				<div class="alignright galleryimg"><?php next_image_link( false, __('Next Image &#62;', 'social-magazine') ); ?></div>
				
			<?php }

		?>

    
</div><!-- /blog-block -->