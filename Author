add_action('template_redirect', 'check_author_id_query_var');

function check_author_id_query_var() {
    if ( is_singular('recipes') && !isset($_GET['author_id']) ) {
		$post_id = get_the_ID();
		$author_id = get_post_field( 'post_author', $post_id );
        $url = add_query_arg( 'author_id', $author_id, get_permalink() );
        wp_redirect( $url );
        exit;
    }
}
