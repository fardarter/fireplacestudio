<?php

global $post;
/** @var ffOptionsQuery $query */
$queryWrapping = ffTemporaryQueryHolder::getQuery('comments-list');
$query = $queryWrapping->get('comments-list');
$postMetaGetter = ffContainer()->getThemeFrameworkFactory()->getPostMetaGetter();
ffTemporaryQueryHolder::setQuery( 'one-comment', $query->get('one-comment'));
?>

	<section id="comments">
		<?php if( $query->get('heading show') ) { ?>
			<?php
			$headingQuery = $query->get('heading');
			$heading = $postMetaGetter->getPostCommentsText( $headingQuery->get('trans-zero'),$headingQuery->get('trans-one'),$headingQuery->get('trans-more') );
			?>
			<header class="heading with-accent">
				<h3 class="comments-title"><?php echo ff_wp_kses( $heading ); ?></h3>
			</header>
		<?php } ?>

		<ol class="comment-list">
			<?php
			function ff_comments_list_callback($comment, $args, $depth) {
				global $ff_global_comment_depth;
				$ff_global_comment_depth++;
				$postMetaGetter = ffContainer()->getThemeFrameworkFactory()->getPostMetaGetter();

				$oneCommentQuery = ffTemporaryQueryHolder::getQuery('one-comment');
				$commentDateFormat = $oneCommentQuery->get('date-format');

				// LI printing
				echo '<li class="comment" id="comment-';
				comment_ID();
				echo '">';

				echo '<article class="comment-body">';
				echo '<footer class="comment-meta">';
				echo '<figure class="comment-author">';
				echo ff_wp_kses( $postMetaGetter->getCommentAuthorImage(80) );
				echo '<figcaption>';
				echo '<span class="fn"><a href="'.$postMetaGetter->getCommentAuthorUrl().'">'.$postMetaGetter->getCommentAuthorName().' </a></span>';
				echo '<span class="says">says:</span>';
				echo '</figcaption>';
				echo '</figure>';

				if( $oneCommentQuery->get('show-date') ) {
					echo '<div class="comment-metadata">';
					echo '<div>' . ff_wp_kses( $postMetaGetter->getCommentDate($commentDateFormat) ) . '</div>';
					echo '</div>';
				}
				echo '</footer>';

				echo '<div class="comment-content">';

				if ( '0' == $comment->comment_approved ) {
					echo '<em class="comment-awaiting-moderation">';
					echo ff_wp_kses( $oneCommentQuery->get('trans-moderation') );
					echo '</em>';
					echo '</br>';
					echo '</br>';
				}
				echo ff_wp_kses( get_comment_text() );
				echo '<p class="reply">';
				echo $postMetaGetter->getCommentReplyLink( $oneCommentQuery->get('trans-reply'), $args, $depth );
				echo '</p>';
				echo '</div>';


			}
			wp_list_comments(
				array(
					'style' => 'ul',
					'callback' => 'ff_comments_list_callback',
					'end-callback' => 'ff_comments_list_callback_end',
				)
			);
			?>
		</ol>
	</section>

<?php
function ff_comments_list_callback_end(){
	global $ff_global_comment_depth;

	echo '</li>';

	$ff_global_comment_depth--;
}