			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="article-header hidden">
						<?php display_post_title(); ?>
					</header><!-- END article-header -->
					<div class="article-content-wrapper">
						<aside class="article-meta">
						<?php 
							echo get_avatar( get_the_author_meta( 'user_email' ), $size = '64', $default = '<path_to_url>' );
						 ?>	
						</aside><!-- END article-meta -->
						<section class="article-content">
							<p class="smaller"><?php display_author(); ?></p>
							<?php the_content(); ?>
						</section><!-- END article-content -->
					</div><!-- END article-content-wrapper -->
					<footer class="article-footer">
						<nav class="article-bottom-nav">
						<?php
						
							echo '<a href="'
								. get_day_link( get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ))
								. '" title="'
								.  __( 'Articles posted on ' )
								. get_the_time( get_option( 'date_format' ) )
								. ' | ';
							bloginfo( 'name' );
							echo	'">'
								. get_the_date( 'Y-m-d H:i' )
								. '</a> | ';
						?>

						<?php if ( comments_open() || have_comments() ): ?>
						<?php comments_popup_link(__( 'Comment on this article' ), __( '1 Comment' ), __( '% Comments' ) ); ?> <?php display_post_comments_rss_button(); ?> | 
						<?php endif; ?>
						
						<?php display_permalink( '' ); ?> | <a href="#" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>
					</footer>
				</article>
			<?php if( is_single() || is_page ) { comments_template(); } ?>
			<?php endwhile; else: ?>
				<article id="post-0" class="post error404 not-found">
					<div class="article-content-wrapper">
						<section class="article-content">
							<p><?php _e( 'Sorry, no post or page matched your criteria.' ); ?></p>
						</section><!-- END article-content -->
					</div><!-- END article-content-wrapper -->
					<footer class="article-footer">
						<nav class="article-bottom-nav"><a href="#" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>
					</footer>
				</article>
			<?php endif; ?>
