<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package innovecs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php is_archive() ? post_class('col-4 col_lg-6 col_md-12') : post_class(); ?>>
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
		
		<?php echo the_time('d.m.Y'); ?>
	</header><!-- .entry-header -->

	<div class="entry-content <?php if (is_single()) : echo 'grid'; endif ?>">

	<?php if (is_single()) : echo '<div class="col-4 col_lg-12">'; endif ?>

		<?php innovecs_post_thumbnail(); ?>

		<div class="date-event">
			<?php if( get_field('data_event_begin') ): ?>
				<span class="date-event_heading">
					<?php echo __('Початок події:', 'innovex');?>
				</span>
				<?php the_field('data_event_begin'); ?>
			<?php endif; ?>
		</div>
		<div>
			<?php if( get_field('data_event_end') ): ?>
				<span class="date-event_heading">
					<?php echo __('Закінчення події:', 'innovex');?>
				</span>
				<?php the_field('data_event_end'); ?>
			<?php endif; ?>
		</div>

	<?php if (is_single()) : echo '</div>'; endif ?>

	<?php if (is_single()) : echo '<div class="col-6 col_lg-12">'; endif ?>
		<?php
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
		?>
		<?php if (is_single()) : echo '</div>'; endif ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'innovecs' ),
				'after'  => '</div>',
			)
		);

		if ( is_single()) : ?>
			<section class="grid">
				<h2 class="col-12"><?php echo __('Нещодавні записи', 'innovex') ?></h2>
				<?php
					$recent_posts = wp_get_recent_posts(array(
						'post_type'=>'innovecs_news',
						'numberposts' => 3,
						'orderby' => 'post_date',
						'order' => 'DESC'
					));
					foreach( $recent_posts as $recent ){
						echo '<div class="col-4 col_lg-6 col_sm-12">';
						if ( has_post_thumbnail( $recent["ID"]) ) {
							echo  get_the_post_thumbnail($recent["ID"],'thumbnail');
						}
						echo '<div><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </div> ';
						echo '</div>';
					}
				?>
			</section>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php innovecs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
