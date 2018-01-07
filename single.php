<?php

get_header();

?>

<?php while(have_posts()): the_post(); ?>

    <?php

        echo '<img src="'.(has_post_thumbnail() ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] : get_stylesheet_directory_uri().'/assets/img/no-image.png').'">';

        the_title( '<h1>', '</h1>' );

        the_content();

        comments_template();

    ?>

<?php endwhile; ?>

<?php

$entries = array();

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'post',
);

$the_query = new WP_Query( $args );

if($the_query->have_posts()){
	while($the_query->have_posts()){
		$the_query->the_post();

		$entries[get_the_ID()] = array(
			'title' => get_the_title(),
			'url' => get_the_permalink(),
			'img' => has_post_thumbnail() ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ) : array('0' => get_stylesheet_directory_uri().'/assets/img/no-image.png'),
			'date' => get_the_date(),
			'authorName' => get_the_author_meta('display_name'),
			'excerpt' => has_excerpt() ? get_the_excerpt() : limit_chars_entire_words(get_the_content(), 260).'...',
		);

	}
}

wp_reset_postdata();

?>

<?php
//echo '<pre>', print_r( $entries ), '</pre>';
unset($entries[get_the_ID()]);
?>

<ul>
	<?php foreach($entries as $key => $val){ ?>
    	<li>
            <a href="<?php echo $entries[$key]['url']; ?>">
    			<h4><?php echo $entries[$key]['title']; ?></h4>
                <img src="<?php echo $entries[$key]['img'][0]; ?>">
    		</a>
            <p><?php echo $entries[$key]['excerpt']; ?></p>
            <small><?php echo $entries[$key]['authorName']; ?></small>
            <b><?php echo $entries[$key]['date']; ?></b>
        </li>
	<?php } ?>
</ul>

<?php

get_footer();

?>
