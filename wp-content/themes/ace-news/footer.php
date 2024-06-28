<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ace News
 */

if ( ! is_front_page() || is_home() ) {
	?>
</div>
</div>
</div>

<?php } ?>

<!-- start of footer -->
	<footer class="site-footer">
		<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
			<div class="ace-news-top-footer">
				<div class="section-wrapper">
					<div class="top-footer-wrapper">
						<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
							<div class="footer-container-wrapper">
								<div class="footer-content-inside">
									<?php dynamic_sidebar( 'footer-widget-' . $i ); ?>
								</div>
							</div>
						<?php } ?>
					</div>	
				</div>	
			</div>
		<?php endif; ?>
	<div class="ace-news-bottom-footer">
		<div class="section-wrapper">
			<div class="bottom-footer-content">
				<?php
					/**
					 * Hook: ace_news_footer_copyright.
					 *
					 * @hooked - ace_news_output_footer_copyright_content - 10
					 */
					do_action( 'ace_news_footer_copyright' );
				?>
				</div>
			</div>
		</div>
</footer>
<!-- end of brand footer -->

<?php
$is_scroll_top_active = get_theme_mod( 'ace_news_scroll_top', true );
if ( $is_scroll_top_active ) :
	?>
	<a href="#" class="scroll-to-top scroll-style-1"></a>
	<?php
endif;
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
