			<aside id="sidebar-content">
				<ul id="sidebar">
				 <?php if ( !dynamic_sidebar( 'primary-widget-area' ) ) : ?>
				    <li><?php wp_loginout(); ?></li>
				    <?php wp_list_pages(); ?>
				 <?php endif; ?>
				 	<!--<li>Magic number&nbsp;: <?php timer_stop(1); ?></li>-->
				 </ul>
			</aside>
