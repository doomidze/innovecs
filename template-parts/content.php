<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package innovecs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				innovecs_posted_on();
				innovecs_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php innovecs_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		
		echo the_date();
		
		is_archive() ? the_excerpt() : the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'innovecs' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'innovecs' ),
				'after'  => '</div>',
			)
		);
		?>

		<h2><?php echo __('Нещодавні записи', 'innovex') ?></h2>
		<ul>
			<?php
				$recent_posts = wp_get_recent_posts(array(
					'post_type'=>'innovex_news', 
					'numberposts' => 3,
					'orderby' => 'post_date',
					'order' => 'DESC'
				));
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
				}
			?>
		</ul>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php innovecs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
