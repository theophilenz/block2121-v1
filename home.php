<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
 * @file           home.php
 * @package        Social Magazine
 * @author         ThemesMatic
 * @copyright      2015 ThemesMatic
 */
get_header(); ?>

<div class="wrap">
    <div class="container-fluid">
        <?php get_template_part('content', 'intro'); ?>
            <div class="col-md-8 blog">
				<div class="titre">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Produits récemments ajoutés</h3></div>
                        <div class="panel-body">
							Chaque jour des nouveaux produits sont découverts et ajoutés à la collection de Block2121 pour vous donner le maximum de choix dans les recommandations
                        </div>
                    </div>
                </div>
				<div class="row">
					<?php while (have_posts()) : the_post(); ?>
					<div>
						<div class="col-md-4">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail( array(300, 300) ); } ?>						       
						</div>
						<div class="col-md-8">
							<h4 id="post-<?php the_ID(); ?>" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						</div>
					</div>
						<?php endwhile; ?>
                </div>
                <div class="titre">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Tout est dans les listes</h3></div>
                        <div class="panel-body">
                            Les recommandations sur Block2121 fonctionnent sous forme de listes thématiques avec les produits classés selon un ordre de pertinence précis qui prend en compte les facteurs comme le thème, la popularité et les votes. En voici quelques unes triées au hasard.
                        </div>
                    </div>
                </div>
                <div class="row">
					<?php blk2121_listes_accueil(); ?>
                </div>
            </div>
            <!-- /col-md-8 blog -->
            <?php get_sidebar(); ?>
    </div>
    <!-- /container -->
    <?php get_footer(); ?>