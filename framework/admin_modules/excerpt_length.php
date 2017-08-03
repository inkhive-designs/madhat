<?php
//Function to Trim Excerpt Length & more..
function madhat_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'madhat_excerpt_length', 999 );

function madhat_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'madhat_excerpt_more' );

//Backwards Compatibility FUnction
function madhat_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}