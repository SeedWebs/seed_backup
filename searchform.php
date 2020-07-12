<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *  
 */ 
?>
<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s">
        <span class="screen-reader-text"><?php _e( 'Search for:', 'seed' ); ?></span>
        <input type="search" id="s" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>"
            value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="button-primary"><?php seed_icon('search'); ?></button>
</form>