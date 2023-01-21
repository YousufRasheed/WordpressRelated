function update_recipe_views() {
    global $post;
    if ( 'recipes' === $post->post_type ) {
        $author_id = $post->post_author;
        $author_total_views = (int)get_the_author_meta( 'total-views', $author_id );
        $author_total_earnings = (float)get_the_author_meta( 'total-earnings', $author_id );
        $post_id = $post->ID;
        $post_views = (int)get_post_meta($post_id, 'recipe_views', true);
        $cookie_name = 'je_data_store_views';
        $cookies = explode(',', $_COOKIE[$cookie_name]);
        if(!in_array($post_id, $cookies)){
            update_user_meta( $author_id, 'total-views', $author_total_views + 1 );
            update_user_meta( $author_id, 'total-earnings', $author_total_earnings + 0.005 );
            update_post_meta( $post_id, 'recipe_views', $post_views + 1 );
            array_push($cookies,$post_id);
            setcookie($cookie_name, implode(",",$cookies), time()+60*60*24*30, "/");
        }
    }
}
add_action('wp_head', 'update_recipe_views');
