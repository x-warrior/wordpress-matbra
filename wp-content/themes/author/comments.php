<div class="bottom-personal-banner" style="background:white; padding-top:20px; padding-bottom:20px; margin-top: 1.5em">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Wordpress Matbra.com -->
	<ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-7865232871831497"
	     data-ad-slot="1027287528"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>	
<?php
/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( ! have_comments() && ! comments_open() && ! pings_open() ) ) {
	return;
}

$comments_display = get_theme_mod( 'comments_display' );
$post_type        = get_post_type();

if ( is_array( $comments_display ) ) {

	if ( ! in_array( $post_type, $comments_display ) ) {
		return;
	}
}

if ( comments_open() ) { ?>
	<section id="comments" class="comments">
		<div class="comments-number">
			<h2>
				<?php comments_number( __( 'Be First to Comment', 'author' ), __( 'One Comment', 'author' ), __( '% Comments', 'author' ) ); ?>
			</h2>
		</div>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'callback' => 'ct_author_customize_comments' ) ); ?>
		</ol>
		<?php
		if ( ( get_option( 'page_comments' ) == 1 ) && ( get_comment_pages_count() > 1 ) ) { ?>
			<nav class="comment-pagination">
				<p class="previous-comment"><?php previous_comments_link(); ?></p>
				<p class="next-comment"><?php next_comments_link(); ?></p>
			</nav>
		<?php } ?>
		<?php comment_form(); ?>
	</section>
	<?php
} elseif ( ! comments_open() && have_comments() && pings_open() ) { ?>
	<section id="comments" class="comments">
		<div class="comments-number">
			<h2>
				<?php comments_number( __( 'Be First to Comment', 'author' ), __( 'One Comment', 'author' ), __( '% Comments', 'author' ) ); ?>
			</h2>
		</div>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'callback' => 'ct_author_customize_comments' ) ); ?>
		</ol>
		<?php
		if ( ( get_option( 'page_comments' ) == 1 ) && ( get_comment_pages_count() > 1 ) ) { ?>
			<nav class="comment-pagination">
				<p class="previous-comment"><?php previous_comments_link(); ?></p>
				<p class="next-comment"><?php next_comments_link(); ?></p>
			</nav>
		<?php } ?>
		<p class="comments-closed pings-open">
			<?php printf( __( 'Comments are closed, but <a href="%s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'author' ), esc_url( get_trackback_url() ) ); ?>
		</p>
	</section>
	<?php
} elseif ( ! comments_open() && have_comments() ) { ?>
	<section id="comments" class="comments">
		<div class="comments-number">
			<h2>
				<?php comments_number( __( 'Be First to Comment', 'author' ), __( 'One Comment', 'author' ), __( '% Comments', 'author' ) ); ?>
			</h2>
		</div>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'callback' => 'ct_author_customize_comments' ) ); ?>
		</ol>
		<?php
		if ( ( get_option( 'page_comments' ) == 1 ) && ( get_comment_pages_count() > 1 ) ) { ?>
			<nav class="comment-pagination">
				<p class="previous-comment"><?php previous_comments_link(); ?></p>
				<p class="next-comment"><?php next_comments_link(); ?></p>
			</nav>
		<?php } ?>
		<p class="comments-closed">
			<?php _e( 'Comments are closed.', 'author' ); ?>
		</p>
	</section>
	<?php
} else { ?>
	<section id="comments" class="comments">
		<p class="comments-closed">
			<?php _e( 'Comments are closed.', 'author' ); ?>
		</p>
	</section>
<?php }