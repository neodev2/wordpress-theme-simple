<?php

// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
	die ('Please do not load this page directly. Thanks!');
}

if ( post_password_required() ) {
	echo '<p class="nocomments">'._e('This post is password protected. Enter the password to view comments.').'</p>';
	return;
}

?>

<?php // You can start editing here ?>
<div class="comments-cont">
<?php if ( have_comments() ) : ?>

	<h3 id="comments">
		<?php echo (1 == get_comments_number()) ? '1 Comment:' : get_comments_number().' Comments:'; ?>
	</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>

	<?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>
</div>
