<?php $defaults = array(
	'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'logged_in_as'         => '',
	'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => '',
	'title_reply_to'       => __( 'Leave a Reply to %s' ),
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'コメントする' ),
);
?>
				<section id="comment">
					<h1>Comment</h1>
					<?php if (!is_user_logged_in()) : ?>
					<p class="login"><a href="/wp-login.php">ログイン</a></p>
					<?php endif; ?>
					<div id="comment-form">
						<div class="gravator">
							<?php if (function_exists('get_avatar')) {
								if (!is_user_logged_in()) {
									echo get_avatar( $comment, 48 );
								} else {
									global $user_ID;
									//ユーザー情報を取得
									get_currentuserinfo();
									echo get_avatar( get_the_author_meta('user_email',$user_ID), $size = '48' );
								}
							} else {
								$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . 
								md5($email) . "&default=" . urlencode($default) . "&size=" . 48;
								echo "<img src='$grav_url'/>";
							} ?>
						</div>
						<div id="form-body">
							<?php comment_form($defaults); ?>
							<div id="cancel-comment-reply"><p><?php cancel_comment_reply_link() ?></p></div>
						</div>
					</div>
					<ol>
						<?php wp_list_comments('comment_field=type=comment&callback=mytheme_comment&title_reply='); ?>
					</ol>
				</section>
				
