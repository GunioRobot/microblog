<?php get_header(); ?>
	<div id="content-wrapper">
		<section id="content-area">
			<section id="content">
				<h1 id="archive-title"><?php _e( '404 Not found' ); ?></h1>
				<article id="post-0" class="post error404 not-found">
					<div class="article-content-wrapper">
						<section class="article-content">
							<p><?php _e( 'The page you requested cannot be found on this website.' ); ?></p>
						</section><!-- END article-content -->
					</div><!-- END article-content-wrapper -->
					<footer class="article-footer">
						<nav class="article-bottom-nav"><a href="#" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>
					</footer>
				</article>
			</section><!-- END content -->
			<?php get_sidebar(); ?>
		</section><!-- END content-area -->
	</div><!-- END content-wrapper -->
<?php get_footer(); ?>