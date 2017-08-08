<?php /* * template used for Single and Page */ ?>

<h1 id="post-<?php the_ID(); ?>" <?php post_class(); ?> title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
<div class="blog-block single-page">

    <div class="col-md-6">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
    </div>
    <div class="col-md-6 panel-primary zone-details">
        <div>
            <span class="bouton-favoris"><?php the_favorites_button() ?></span><span class="compteur-favoris"><?php the_favorites_count(); ?></span>
        </div>
        <div class="label label-black">
            <i class="fa fa-laptop" aria-hidden="true"></i>
            <?php the_field( "plateformes_supportees"); ?>
        </div>
        <div class="label label-black">
            <i class="fa fa-dollar" aria-hidden="true"></i>
            <?php the_field( "prix_produit"); ?>
        </div>
        <div class="lien-obtenir">
            <a href="<?php the_field(" lien_produit "); ?>" rel="nofollow" target="_blank" class="label label-black lien"><i class="fa fa-link" aria-hidden="true"></i>Site web officiel</a>
        </div>
    </div>
    <div class="col-md-12">
            <div class="panel panel-default liste-fiche-produit module-listes-suivantes">
                <div class="panel-heading">Apparaît dans les listes suivates</div>
                <div class="panel-body">
					<div class="listes-page-produit">
						<?php 
							$categories = get_the_category();
							$separator = ' ';
							$output = '';
							if ( ! empty( $categories ) ) {
								foreach( $categories as $category ) {
									$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><i class="fa fa-list" aria-hidden="true"></i>  ' . esc_html( $category->name ) . '</a>' . $separator;
								}
								echo trim( $output, $separator );
							}
						?>
					</div>
                </div>
            </div>
    </div>
    <div class="col-md-12">
        <?php the_content(); ?>
    </div>

    <div class="col-md-12">
        <?php comments_template(); ?>
    </div>

    <?php wp_link_pages( array( 'before'=> '
    <div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'social-magazine' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>',
				'link_after'  => '</span>', 'pagelink' => '<span class="screen-reader-text">' . __( 'Page', 'social-magazine' ) . ' </span>%', 'separator' => '<span class="screen-reader-text">, </span>', ) ); if ( is_attachment() ) { ?>

    <div class="alignleft galleryimg">
        <?php previous_image_link( false, __( '&#60; Previous Image', 'social-magazine') ); ?>
    </div>
    <div class="alignright galleryimg">
        <?php next_image_link( false, __( 'Next Image &#62;', 'social-magazine') ); ?>
    </div>

    <?php } ?>


</div>
<!-- /blog-block -->