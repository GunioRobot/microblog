<?php if ( comments_open() || have_comments() ): ?>
<section id="comments">
	<h2><?php _e( 'Comments' ); ?></h2>

<?php if ( have_comments() ) : ?>

<?php $args = array(
	'walker'						=> null,
	'max_depth'				=> '',
	'style'						=> 'div',
	'callback'					=> null,
	'end-callback'			=> null,
	'type'						=> 'all',
	'page'						=> '',
	'per_page'					=> '',
	'avatar_size'				=> 64,
	'reverse_top_level'		=> null,
	'reverse_children'		=> ''
); ?>

<?php wp_list_comments( $args ); ?>

<?php endif; ?>

<?php if( comments_open() ): ?>
	<nav class="top"><a href="#" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>

	<?php comment_form(); ?>

<?php else: ?>
	<p class="comments-closed"><?php _e( 'Comments on this article are now closed.' ); ?></p>
<?php endif; ?>


	<nav class="top"><a href="#" rel="nofollow" title="<?php _e( 'Back to the top of this page' ); ?> | <?php bloginfo( 'name' ); ?>">^ <?php _e( 'Top' ); ?></a></nav>
</section><!-- END Comments -->
<?php endif; ?>