<?php
/**
 * The template for displaying the file field.
 *
 * This template can be overridden by copying it to yourtheme/wpum/form-fields/file-field.php
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

$classes            = array( 'input-text' );
$allowed_mime_types = ! empty( $data->allowed_mime_types ) ? explode( ',', $data->allowed_mime_types ) : array_values( get_allowed_mime_types() );
$field_name         = isset( $data->name ) ? $data->name : $data->key;
$field_name         .= ! empty( $data->multiple ) ? '[]' : '';
$file_size = isset( $data->max_file_size ) ? $data->max_file_size : false;

if ( ! empty( $data->ajax ) && wpum_user_can_upload_file_via_ajax() ) {
	wp_enqueue_script( 'wpum-ajax-file-upload' );
	$classes[] = 'wpum-file-upload';
}
?>

<div class="wpum-uploaded-files">
  <?php if ( ! empty( $data->value ) ) :
	  if ( is_array( $data->value ) ) :
		  if ( isset( $data->value['url'] ) ) :
			  WPUM()->templates->set_template_data( [
					  'key'   => $data->key,
					  'name'  => 'current_' . $field_name,
					  'value' => $data->value['url'],
					  'type'  => $data->type,
					  'field' => [],
				  ] )->get_template_part( 'form-fields/file', 'uploaded' );
		  endif;
	  elseif ( $value = $data->value ) :
		  WPUM()->templates->set_template_data( [
				  'key'   => $data->key,
				  'name'  => 'current_' . $field_name,
				  'value' => $value,
				  'type'  => $data->type,
				  'field' => [],
			  ] )->get_template_part( 'form-fields/file', 'uploaded' );
	  endif;
  endif; 
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
  $rand_str = substr(str_shuffle($permitted_chars), 0, 10);
  ?>
</div>
<input type="file" id="<?php echo $rand_str ?>" class="fileInput <?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-file_types="<?php echo esc_attr( implode( '|', $allowed_mime_types ) ); ?>" <?php if ( ! empty( $data->multiple ) ) echo 'multiple'; ?> name="<?php echo esc_attr( isset( $data->name ) ? $data->name : $data->key ); ?><?php if ( ! empty( $data->multiple ) ) echo '[]'; ?>" id="<?php echo esc_attr( $data->key ); ?>" placeholder="<?php echo empty( $data->placeholder ) ? '' : esc_attr( $data->placeholder ); ?>" />
<label for="<?php echo $rand_str ?>" class="viewInput">
	<div class="containerFileInput">
		<i class="fa fa-download" aria-hidden="true"></i>
		<span class="textFileInput">Upload file</span>
	</div>
</label>
<small class="description">
<?php if ( ! empty( $data->description ) ) :
		 echo $data->description;
	 	endif;
	  printf( __( 'Maximum file size: %s.', 'wp-user-manager' ), wpum_max_upload_size( isset( $data->key ) ? $data->key : '', $file_size ) ); ?>
</small>
