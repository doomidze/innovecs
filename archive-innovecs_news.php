<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package innovecs
 */

get_header();
?>

	<main id="primary" class="site-main grid">

		<?php if ( have_posts() ) : ?>

			<header class="page-header col-12">
				<?php
				post_type_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
			$args = array(  
				'post_type' => 'innovecs_news',
				'post_status' => 'publish',
				'posts_per_page' => 10, 
				'orderby' => 'date', 
				'order' => 'DESC', 
				'paged' => $paged
			);
	
			$loop = new WP_Query( $args ); 
	
			while ( $loop->have_posts() ) : $loop->the_post(); 
				get_template_part( 'template-parts/content' );	
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
