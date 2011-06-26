<?php get_header(); ?>
	<div id="content-wrapper">
		<section id="content-area">
			<section id="content">
				<h1 id="archive-title"><?php
				if ( is_day() ) { printf( __( 'Articles posted on <time>%s</time>' ), get_the_date() ); }
				elseif ( is_month() ) { printf( __( 'Articles posted in <time>%s</time>' ), strtolower( get_the_date( 'F Y' ) ) ); }
				elseif ( is_year() ) { printf( __( 'Articles posted in <time>%s</time>' ), get_the_date( 'Y' ) ); }
				else { _e( 'Archives' ); }
				?></h1>
				<?php get_template_part( 'loop' ); ?>
				<?php display_pagination_nav(); ?>
			</section><!-- END content -->
			<?php get_sidebar(); ?>
		</section><!-- END content-area -->
	</div><!-- END content-wrapper -->
<?php get_footer(); ?>