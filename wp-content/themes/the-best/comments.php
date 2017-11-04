<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Best
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">


		<h2 class="comments-title">
			<?php
				$the_best_comments_number = get_comments_number();
				if ( '1' === $the_best_comments_number ) {
					/* translators: %s: post title */
					printf( _x( '댓글 1개', 'comments title', 'the-best' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'댓글 %1$s개',
							$the_best_comments_number,
							'comments title',
							'the-best'
						),
						number_format_i18n( $the_best_comments_number ),
						get_the_title()
					);
				}
			?>
		</h2><!-- .comments-title -->
		<?php
		$current_user = wp_get_current_user();
		$avatar_url = explode('@', $current_user->user_email);
		if(strlen($avatar_url[0]) <25){
			$avatar_url[0] = get_avatar_url( $current_user->user_email);
		}
		$comments_args = array(
		  	'logged_in_as' => '',
			// change the title of send button 
			'label_submit'=>'댓글 달기',
			// change the title of the reply section
			'title_reply'=>'',
			// remove "Text or HTML to be displayed after the set of comment fields"
			'comment_notes_after' => '',
			// redefine your own textarea (the comment body)
			'comment_field' => '<p class="comment-form-comment">'.get_avatar("",50,'','', array( 'url' => $avatar_url[0])).'<textarea id="comment" name="comment" aria-required="true"></textarea></p>',
		);
			comment_form($comments_args);
		?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'the-best' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'the-best' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'the-best' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<?php

	function better_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		
		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		}

		?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
		  	<?php $avatar_url = explode('@', $comment->comment_author_email);
	  			 if(strlen($avatar_url[0]) <25){
					$avatar_url[0] = get_avatar_url( $current_user->user_email);
				}
	  		?>
			<?php echo get_avatar("",50,'','', array( 'url' => $avatar_url[0])); ?>
			<div class="comment-meta post-meta" role="complementary">
				<h2 class="comment-author">
					<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
				</h2>
				<?php comment_text() ?>
			    <?php edit_comment_link('수정','',''); ?>
			  	<span role="presentation" aria-hidden="true"> · </span>
				<?php comment_reply_link( array_merge($args, array(
		  			'add_below' => 'comment',
					'reply_text' => __('답글 달기', 'textdomain'),
					'depth'      => $depth,
					'max_depth'  => $args['max_depth']
					)
				)); ?>
			  	<span role="presentation" aria-hidden="true"> · </span>
			  	<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('Y년 F j일') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time('A h:i') ?></a></time>
			</div>
 		 </article>
		<?php 
			}
		 ?>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
				  	'callback' => 'better_comment',
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'the-best' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'the-best' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'the-best' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'the-best' ); ?></p>
	<?php
	endif;

	?>

</div><!-- #comments -->
