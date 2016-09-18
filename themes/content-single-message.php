<?php

// Prevent direct access
defined('ABSPATH') || exit;

?>


<div class="<?php bbpm_message_classes( $ID ); ?>" id="message-<?php echo $ID; ?>">

	<div class="avatar-container">

		<a href="<?php echo bbpm_bbp_get_user_profile_url( bbpm_get_message( $ID )->sender ); ?>">
			<?php echo get_avatar( bbpm_get_message( $ID )->sender, apply_filters('bbpm_in_message_avatar_size', 44) ); ?>
			<span>
				<?php // WPGURU4U edit 9/17/16 ?>
				<?php // echo bbpm_get_message( $ID )->sender_name; ?>
				<?php $u_sender = get_userdata( bbpm_get_message( $ID )->sender ); ?>
				<?php echo ( filter_var( $u_sender->display_name, FILTER_VALIDATE_EMAIL ) ) ? $u_sender->nickname : $u_sender->display_name; ?>
			</span>
		</a>
<?php
$u = wp_get_current_user();
if ( '1196' == $u->ID ) {
//	echo '<pre>'; print_r(bbpm_get_message( $ID )); echo '</pre>';
}
?>
		<?php do_action('bbpm_after_single_message_avatar', $ID ); ?>

	</div>

	<div class="message-content">

		<?php do_action('bbpm_before_single_message_content', $ID ); ?>

		<div class="message-content-text">

			<?php echo bbpm_output_message( bbpm_get_message( $ID )->message ); ?>

		</div>

		<div class="message-meta">

			<span><?php echo bbpm_time_diff( bbpm_get_message( $ID )->date, false, ' ago' ); ?></span>
			&middot;
			<span><a href="<?php echo bbpm_get_conversation_permalink( '?do=delete&m=' . $ID ); ?>" class="delete-message">delete</a></span>

			<?php do_action('bbpm_after_single_message_meta', $ID ); ?>

		</div>

		<?php do_action('bbpm_after_single_message_content', $ID ); ?>

	</div>

</div>