<?php get_header(); ?>
	<div id="content-wrapper">
		<section id="content-area">
			<section id="content">
				<h1 id="archive-title"><?php echo __( 'Search results for' ) . ' ' . __( '“&nbsp;' ) . get_search_query() . __( '&nbsp;”' ); ?></h1>
				<?php get_template_part( 'loop' ); ?>
				<?php display_pagination_nav(); ?>
			</section><!-- END content -->
			<?php get_sidebar(); ?>
		</section><!-- END content-area -->
	</div><!-- END content-wrapper -->
<?php get_footer(); ?>