<?php
/**
 * The template to display the Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;



// Callback for output single comment layout
if (!function_exists('petermason_output_single_comment')) {
	function petermason_output_single_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) {
			case 'pingback' :
				?>
				<li class="trackback"><?php esc_html_e( 'Trackback:', 'petermason' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'petermason' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			case 'trackback' :
				?>
				<li class="pingback"><?php esc_html_e( 'Pingback:', 'petermason' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'petermason' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			default :
				$author_id = $comment->user_id;
				$author_link = get_author_posts_url( $author_id );
				$mult = petermason_get_retina_multiplier();
				?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment_item'); ?>>
					<div class="comment_author_avatar"><?php echo get_avatar( $comment, 130*$mult ); ?></div>
					<div class="comment_content">
						<div class="comment_info">
							<h6 class="comment_author"><?php echo (!empty($author_id) ? '<a href="'.esc_url($author_link).'">' : '') . comment_author() . (!empty($author_id) ? '</a>' : ''); ?></h6>
							<div class="comment_posted">
								<span class="comment_posted_label"><?php esc_html_e('Posted', 'petermason'); ?></span>
								<span class="comment_date"><?php
									echo petermason_get_date(get_comment_date('U'));	
								?></span>
								<span class="comment_time"><?php
									echo get_comment_date(get_option('time_format'));
								?></span>
							</div>
						</div>
						<div class="comment_text_wrap">
							<?php if ( $comment->comment_approved == 0 ) { ?>
							<div class="comment_not_approved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'petermason' ); ?></div>
							<?php } ?>
							<div class="comment_text"><?php comment_text(); ?></div>
						</div>
						<?php if ($depth < $args['max_depth']) { ?>
							<div class="comment_reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
						<?php } ?>
					</div>
				<?php
				break;
		}
	}
}


// Output comments list
if ( have_comments() || comments_open() ) {
	?>
	<section class="comments_wrap">
	<?php
	if ( have_comments() ) {
	?>
		<div id="comments" class="comments_list_wrap">
			<h3 class="section_title comments_list_title"><?php $petermason_post_comments = get_comments_number(); echo esc_html($petermason_post_comments); ?> <?php echo (1==$petermason_post_comments ? esc_html__('Comment', 'petermason') : esc_html__('Comments', 'petermason')); ?></h3>
			<ul class="comments_list">
				<?php
				wp_list_comments( array('callback'=>'petermason_output_single_comment') );
				?>
			</ul><!-- .comments_list -->
			<?php if ( !comments_open() && get_comments_number()!=0 && post_type_supports( get_post_type(), 'comments' ) ) { ?>
				<p class="comments_closed"><?php esc_html_e( 'Comments are closed.', 'petermason' ); ?></p>
			<?php }	?>
			<div class="comments_pagination"><?php paginate_comments_links(); ?></div>
		</div><!-- .comments_list_wrap -->
	<?php 
	}

	if ( comments_open() ) {
		?>
		<div class="comments_form_wrap">
			<div class="comments_form">
				<?php
				$petermason_form_style = esc_attr(petermason_get_theme_option('input_hover'));
				if (empty($petermason_form_style) || petermason_is_inherit($petermason_form_style)) $petermason_form_style = 'default';
				$petermason_commenter = wp_get_current_commenter();
				$petermason_req = get_option( 'require_name_email' );
				$petermason_comments_args = array(
						// class of the 'form' tag
						'class_form' => 'comment-form ' . ($petermason_form_style != 'default' ? 'sc_input_hover_' . esc_attr($petermason_form_style) : ''),
						// change the id of send button 
						'id_submit' => 'send_comment',
						// change the title of send button 
						'label_submit' => esc_html__('Submit', 'petermason'),
						// change the title of the reply section
						'title_reply' => esc_html__('ADD COMMENTS', 'petermason'),
						'title_reply_before' => '<h3 id="reply-title" class="section_title comments_form_title">',
						'title_reply_after' => '</h3>',

						// remove "Logged in as"
						'logged_in_as' => '',
						// remove text before textarea
						'comment_notes_before' => '',
						// remove text after textarea
						'comment_notes_after' => '',
						// redefine your own textarea (the comment body)
						'comment_field' => petermason_single_comments_field(array(
												'form_style' => $petermason_form_style,
												'field_type' => 'textarea',
												'field_req' => true,
												'field_icon' => 'icon-feather',
												'field_value' => '',
												'field_name' => 'comment',
												'field_title' => esc_html__('Comment', 'petermason'),
												'field_placeholder' => esc_attr__( 'Your Comment', 'petermason' )
											)),
						'fields' => apply_filters( 'petermason_filter_comment_form_default_fields', array(
							'author' => petermason_single_comments_field(array(
												'form_style' => $petermason_form_style,
												'field_type' => 'text',
												'field_req' => $petermason_req,
												'field_icon' => 'icon-user',
												'field_value' => isset($petermason_commenter['comment_author']) ? $petermason_commenter['comment_author'] : '',
												'field_name' => 'author',
												'field_title' => esc_html__('Name', 'petermason'),
												'field_placeholder' => esc_attr__( 'Your Name', 'petermason' )
											)),
							'email' => petermason_single_comments_field(array(
												'form_style' => $petermason_form_style,
												'field_type' => 'text',
												'field_req' => $petermason_req,
												'field_icon' => 'icon-mail',
												'field_value' => isset($petermason_commenter['comment_author_email']) ? $petermason_commenter['comment_author_email'] : '',
												'field_name' => 'email',
												'field_title' => esc_html__('E-mail', 'petermason'),
												'field_placeholder' => esc_attr__( 'Your E-mail', 'petermason' )
											))
						) )
				);
			
				comment_form($petermason_comments_args);
				?>
			</div>
		</div><!-- /.comments_form_wrap -->
		<?php 
	}
	?>
	</section><!-- /.comments_wrap -->
<?php 
}
?>