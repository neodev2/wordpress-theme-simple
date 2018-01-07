<?php

get_header();


if(have_posts()){
	echo '<h1>Search results for: "'.get_search_query().'"</h1>';
}else{
	echo '<h1>Nothing found for: "'.get_search_query().'"</h1>';
}


if ( have_posts() ){
	while ( have_posts() ) {
		the_post();

		the_title( sprintf('<h3><a href="%s">', esc_url(get_permalink())), '</a></h3>' );
		the_excerpt();

	}

	the_posts_pagination( array(
		'prev_text' => '',
		'next_text' => '',
		'before_page_number' => '',
	) );

}else{
	echo '<p>Nothing was found corresponding to the search terms. Try using different keywords</p>';
	get_search_form();
}


get_footer();
