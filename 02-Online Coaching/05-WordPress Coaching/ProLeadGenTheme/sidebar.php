<div class="sidebar">
    <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
        <h3>Search:</h3>
        <?php get_search_form(); ?>
        <h3>
            <?php _e('Categories', 'black-rider'); ?>
        </h3>
        <ul>
            <?php wp_list_categories('title_li'); ?>
        </ul>
        <h3>
            <?php _e('Archives', 'black-rider'); ?>
        </h3>
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul> 		
        <?php
    endif; // end primary widget area 
// A second sidebar for widgets, just because.
    if (is_active_sidebar('secondary-widget-area')) :
        dynamic_sidebar('secondary-widget-area');
    endif;
    ?>      
</div>