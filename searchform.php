<?php echo "\n"; ?><form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
    <fieldset>
    	<label class="screen-reader-text" for="s"><?php _e( 'Search for&nbsp;:' ); ?></label>
        <input type="search" name="s" id="s" value="<?php
	        $value = get_search_query();
	        if ( !empty( $value ) ) { echo get_search_query(); }
	        else { _e( 'Search' ); }
        ?>" onfocus="this.value=(this.value=='<?php _e( 'Search' ); ?>') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php _e( 'Search' ); ?>' : this.value;" />
        <input type="hidden" id="searchsubmit" value="<?php _e( 'Search' ); ?>" />
    </fieldset>
</form>
