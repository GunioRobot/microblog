			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="article-header">
						<?php display_post_title(); ?>
					</header><!-- END article-header -->
					<div class="article-content-wrapper">
						<aside class="article-meta">
	
							<?php if ( !is_page() ): ?>
							<div class="post-date"><time datetime="<?php the_time( get_option( 'date_format' ) ); ?>, <?php the_time( get_option( 'time_format' ) ); ?>" pubdate><a href="<?php echo get_day_link( get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' )); ?>" title="<?php _e( 'Articles posted on ' ); the_time( get_option( 'date_format' ) ); ?> | <?php bloginfo( 'name' ); ?>"><div class="post-date-month"><?php the_time( 'F' ); ?></div><div class="post-date-day"><?php the_time( 'd' ); ?></div></a></time></div>
							<?php endif; ?>
							
							<?php if ( comments_open() || have_comments() ): ?>
							<p><?php comments_popup_link(__( 'Comment on this article' ), __( '1 Comment' ), __( '% Comments' ) ); ?> <?php display_post_comments_rss_button(); ?></p>
							<?php endif; ?>
							
							<?php
								/**
								 * Count the number of categories
								 * and output singular or plural string accordingly
								 */
								$count = count( get_the_category( ) );
								
								if ( $count != 0 ) {
									echo '<p class="smaller">';
									if ( $count == 1 ) { _e( 'Category' ); }
									else { _e( 'Categories' ); }
									echo '&nbsp;: ';
									the_category( ', ' );
									echo "</p>\n";
								}
							?>
								
							<?php	
								/**
								 * Count the number of keywords
								 * and output singular or plural string accordingly
								 */
								$count = count( get_the_tags( ) );
	
								/**
								 * If there are no keywords
								 */
								if ( get_the_tags() == false ) { }
								
								/**
								 * If there is one keyword
								 */
								elseif ( $count == 1 ) {
									echo '<p class="smaller">';
									_e( 'Keyword' );
									echo '&nbsp;: ';
									the_tags( '' );
									echo "</p>\n";
								}
								
								/**
								 * If there is more than one keyword
								 */
								else {
									echo '<p class="smaller">';
									_e( 'Keywords' );
									echo '&nbsp;: ';
									the_tags( '' );
									echo "</p>\n";
								}
							?>
	
							<?php
								/**
								 * If the user can edit posts, display the Edit link
								 */
								if ( current_user_can( 'edit_posts' ) ) { echo '<p class="smaller">'; edit_post_link(__( 'Edit' )); echo "</p>\n"; }
							?>
							
						</aside><!-- END article-meta -->
						<section class="article-content">
							<?php the_content(); ?>
						</section><!-- END article-content -->
					</div><!-- END article-content-wrapper -->
					<footer class="article-footer">
						<?php display_scientific_reference(); ?>
						<p><?php _e( 'Trackback URL' ); ?>&nbsp;: &lt;<a href="<?php trackback_url(); ?>" title="<?php _e( 'Trackback URL for' ); ?>&nbsp;: <?php the_title(); ?> | <?php bloginfo( 'name' ); ?>"><?php trackback_url(); ?></a>&gt;</p>

						<nav class="article-bottom-nav"><a href="#" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>
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
