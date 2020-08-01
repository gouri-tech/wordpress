<?php
/**
* Plugin Name: DraftRemovePlugin
* Description: Auto delete draft post 
* Version: 1.0
* Author: Gouri Pandey
**/

add_action( 'init', 'remove_draft_post' );

function remove_draft_post(){

	global $wpdb;

    // Cleanup old auto-drafts more than 1 days old.
    $old_posts = $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE (post_status = 'auto-draft' OR post_status = 'draft' ) " );

    foreach ( (array) $old_posts as $delete ) {
        // Force delete.
        wp_delete_post( $delete, true );
    }
}
