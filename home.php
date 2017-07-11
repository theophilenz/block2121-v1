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
	<?php get_template_part( 'content', 'intro');?>
		<div class="col-md-8 blog">
			<div class="titre-categories-recentes">
				<h2>Par Sujets</h2>
			</div>
		<div class="row">
		<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
 
foreach( $categories as $category ) {
	echo '<div class="post blog-block">';
    $category_link = sprintf( 
        '<a href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );?>
	<?php
    
    echo '<h2 class="align-left social-magazine-one-post-link">' . sprintf($category_link ) . '</h2> ';
    echo '<p>' . sprintf($category->count. " Articles") . '</p>';
	echo '</div>';
} ?>
</div>
</div><!-- /col-md-8 blog -->
<?php get_sidebar(); ?>
</div><!-- /container -->
<?php get_footer(); ?>