<?php

add_option( 'algolia_wc_pages', array() );
add_option( 'algolia_wc_selector', '' );
add_option( 'algolia_wc_primary_color', '#46AEDA' );

/**
 * @return array
 */
function aw_get_pages() {
	return (array) get_option( 'algolia_wc_pages', array( 'category', 'tag', 'search' ) );
}

/**
 * @param array $pages
 */
function aw_set_pages( array $pages ) {
	$allowed = array( 'category', 'tag', 'search' );
	$filtered = array();
	foreach ( $pages as $page ) {
		if ( in_array( $page, $allowed, true ) ) {
			$filtered[] = $page;
		}
	}

	update_option( 'algolia_wc_pages', $filtered );
}

/**
 * @return bool
 */
function aw_is_configured_pages() {
	return count( aw_get_pages() ) > 0;
}

/**
 * @param string $selector
 */
function aw_set_selector( $selector ) {
	update_option( 'algolia_wc_selector', (string) $selector );
}

/**
 * @return string
 */
function aw_get_selector() {
	return (string) get_option( 'algolia_wc_selector' );
}

/**
 * @return bool
 */
function aw_is_configured_zoning() {
	// Todo: Check in the output if the selector is present.
	return mb_strlen( aw_get_selector() ) > 1;
}

/**
 * @return array
 */
function aw_get_primary_color() {
	return (string) get_option( 'algolia_wc_primary_color', '#46AEDA' );
}

/**
 * @param string $color
 *
 * @return array
 */
function aw_set_primary_color( $color ) {
	// Todo: validate hexacode.
	
	update_option( 'algolia_wc_primary_color', $color );
}

/**
 * @return bool
 */
function aw_is_configured_appearance() {
	return mb_strlen( aw_get_primary_color() ) > 3;
}
