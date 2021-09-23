<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package innovecs
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info grid">
			<div class="col-6 col_sm-12">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'innovecs' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'innovecs' ), 'WordPress' );
					?>
				</a>
			</div>
			<div class="col-6 col_sm-12">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'innovecs' ), 'innovecs', '<a href="http://underscores.me/">Dmytro Tumannik</a>' );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
