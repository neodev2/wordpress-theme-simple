<?php

get_header();

?>

<?php while(have_posts()): the_post();

	global $post;

	the_content();

	if( is_front_page() ){
		get_template_part( 'home' );
	}else{
		if( $post->post_name === 'page1' ){

		}
		else if( $post->post_name === 'page2' ){

		}
	}

endwhile; ?>

<?php

get_footer();

?>
