<?php
/**
 * The Template for displaying the profile cover.
 *
 * This template can be overridden by copying it to yourtheme/wpum/profiles/cover.php
 *
 * HOWEVER, on occasion WPUM will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$cover_image = get_user_meta( $data->user->ID, 'user_cover', true );

$display_cover_image = apply_filters( 'wpum_profile_display_cover_image', true );
$display_avatar      = apply_filters( 'wpum_profile_display_avatar', true );
?>

<div id="header-cover-image" <?php if ( $display_cover_image && $cover_image ) : ?>style="background-image: url(<?php echo esc_url( $cover_image ); ?>);"<?php endif; ?>>
	<?php if ( $display_avatar ) : ?>
		<div class="content-cover">
			<div id="header-avatar-container">
				<a href="<?php echo esc_url( wpum_get_profile_url( $data->user ) ); ?>">
					<?php echo get_avatar( $data->user->ID, 128 ); ?>
				</a>
			</div>
			<div id="header-name-container">
				<h2>
					<?php echo esc_html( $data->user->display_name ); ?>
					<?php if ( $data->current_user_id === $data->user->ID ) :
						$edit_account_text = apply_filters( 'wpum_profile_edit_account_text', 'Edit account', $data->user->ID );
						?>
						<a href="<?php echo esc_url( get_permalink( wpum_get_core_page_id( 'account' ) ) ); ?>"><small><?php echo esc_html( $edit_account_text ); ?></small></a>
					<?php endif; ?>
				</h2>
			</div>
		</div>
	<?php endif; ?>
</div>
