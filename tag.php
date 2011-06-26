<?php get_header(); ?>
	<div id="content-wrapper">
		<section id="content-area">
			<section id="content">
				<h1 id="archive-title"><?php _e( 'Archives for the tag' ); echo ' '; _e( '“&nbsp;' ); single_cat_title( '', true ); _e( '&nbsp;”' ); ?></h1>
				<?php get_template_part( 'loop' ); ?>
				<?php display_pagination_nav(); ?>
			</section><!-- END content -->
			<?php get_sidebar(); ?>
		</section><!-- END content-area -->
	</div><!-- END content-wrapper -->
<?php get_footer(); ?>