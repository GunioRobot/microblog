<?php get_header(); ?>
	<div id="content-wrapper">
		<section id="content-area">
			<section id="content">
				<?php
				/**
				 * Preload data so that we can extract the author meta
				 */
				if ( have_posts() ) { the_post(); }
				?>
				<h1 id="archive-title"><?php the_author_meta( 'display_name' ); ?></h1>
				<article>
					<header class="article-header">
						<h2><?php _e( 'Bibliography' ); ?></h2>
					</header><!-- END article-header -->
					<div class="article-content-wrapper">
						<section class="article-content">
							<?php 	rewind_posts(); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<p><?php display_scientific_reference(); ?></p>
							<?php endwhile; endif; ?>
						</section><!-- END article-content -->
					</div><!-- END article-content-wrapper -->
					<footer class="article-footer">
						<nav class="article-bottom-nav"><a href="#" class="up" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>
					</footer>
				</article>
				<?php display_pagination_nav(); ?>
			</section><!-- END content -->
			<?php get_sidebar(); ?>
		</section><!-- END content-area -->
	</div><!-- END content-wrapper -->
<?php get_footer(); ?>