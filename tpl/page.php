<?php
/**
 * @var $custom_css string The custom CSS string to be edited.
 * @var $revision int If the CSS to be edited is a revision, this will contain the timestamp of the revision.
 * @var $custom_css_revisions array Saved revisions for the current theme.
 */

$snippets = SiteOrigin_CSS::single()->get_snippets();
$user = wp_get_current_user();
if ( ! empty( $revision ) ) {
	$revision_date = date( 'j F Y @ H:i:s', $revision + get_option( 'gmt_offset' ) * 60 * 60 );
}
?>

<div class="wrap" id="siteorigin-custom-css">
	<h2>
		<img src="<?php echo plugin_dir_url(__FILE__) . '../css/images/icon.png' ?>" class="icon" />
		<?php _e( 'SiteOrigin CSS', 'so-css' ) ?>
	</h2>


	<?php if( isset($_POST['siteorigin_custom_css_save']) ) : ?>
		<div class="notice notice-success"><p><?php _e('Site design updated.', 'so-css') ?></p></div>
	<?php endif; ?>

	<?php if ( ! empty( $revision ) ) : ?>
		<div class="notice notice-warning">
			<p><?php printf( __( 'Editing revision dated %s. Click %sRevert to this revision%s to keep using it.', 'so-css'), $revision_date, '<em>', '</em>' ) ?></p>
		</div>
	<?php endif; ?>

	<div id="poststuff">
		<div id="so-custom-css-info">

			<?php if( !get_user_meta( $user->ID, 'socss_hide_gs' ) ) : ?>
				<div class="postbox" id="so-custom-css-getting-started">
					<h3 class="hndle">
						<span><?php _e('Getting Started Video', 'so-css') ?></span>
						<a href="<?php echo wp_nonce_url( admin_url('admin-ajax.php?action=socss_hide_getting_started'), 'hide' ) ?>" class="hide"><?php _e('Dismiss', 'so-css') ?></a>
					</h3>
					<div class="inside">
						<a href="https://siteorigin.com/css/getting-started/" target="_blank"><img src="<?php echo plugin_dir_url(__FILE__).'../css/images/video.jpg' ?>" /></a>
					</div>
				</div>
			<?php endif; ?>

			<div class="postbox" id="so-custom-css-revisions">
				<h3 class="hndle"><span><?php _e('CSS Revisions', 'so-css') ?></span></h3>
				<div class="inside">
					<ol data-confirm="<?php esc_attr_e('Are you sure you want to load this revision?', 'so-css') ?>">
						<?php
						if ( is_array( $custom_css_revisions ) ) {
							$i = 0;
							foreach ( $custom_css_revisions as $time => $css ) {
								$is_current = ( empty( $revision ) && $i == 0 ) || ( ! empty( $revision ) && $time == $revision );
								$link_url = $i == 0 ?
									admin_url( 'themes.php?page=so_custom_css' ) :
									add_query_arg( array( 'theme' => $theme, 'time' => $time ) );
								?>
								<li>
									<?php if ( ! $is_current ) : ?>
									<a href="<?php echo esc_url( $link_url ) ?>" class="load-css-revision">
									<?php endif; ?>
										<?php echo date('j F Y @ H:i:s', $time + get_option('gmt_offset') * 60 * 60) ?>
									<?php if ( ! $is_current ) : ?>
									</a>
									<?php endif; ?>
									(<?php printf( __('%d chars', 'so-css'), strlen( $css ) ) ?>)<?php if ( $i == 0 ) : ?> (<?php _e( 'Latest', 'so-css' ) ?>)<?php endif; ?>
								</li>
								<?php
								$i++;
							}
						}
						?>
					</ol>
				</div>
			</div>

		</div>

		<form action="<?php echo esc_url( admin_url('themes.php?page=so_custom_css') ) ?>" method="POST" id="so-custom-css-form">

			<div class="custom-css-toolbar">
				<div class="toolbar-function-buttons">
					<div class="toolbar-functions-dropdown">
						<span class="dashicons dashicons-menu"></span>
					</div>
					<ul class="toolbar-buttons">
					</ul>
				</div>

				<div class="toolbar-action-buttons">

					<a href="#visual" class="editor-visual socss-button">
						<span class="fa fa-eye"></span>
					</a>

					<a href="#expand" class="editor-expand socss-button">
						<span class="fa fa-expand"></span>
						<span class="fa fa-compress"></span>
					</a>
				</div>
			</div>

			<div class="custom-css-container">
				<textarea name="custom_css" id="custom-css-textarea" class="css-editor" rows="<?php echo max( 10, substr_count( $custom_css, "\n" )+1 ) ?>"><?php echo esc_textarea( $custom_css ) ?></textarea>
				<?php wp_nonce_field( 'custom_css', '_sononce' ) ?>
			</div>
			<p class="description"><?php SiteOrigin_CSS::editor_description() ?></p>

			<p class="submit">
				<input type="submit" name="siteorigin_custom_css_save" class="button-primary" value="<?php esc_attr_e( ( ! empty ( $revision ) ?  __( 'Revert to this revision', 'so-css' ) : __( 'Save CSS', 'so-css' ) ) ); ?>" />
			</p>

			<div class="custom-css-preview">

			</div>

			<div class="decoration"></div>

		</form>

		<div id="so-custom-css-properties">

			<div class="toolbar">
				<select>
				</select>
				<div class="close socss-button">
					<span class="fa fa-check"></span>
				</div>
			</div>

			<ul class="section-tabs">
			</ul>

			<div class="sections">
			</div>

		</div>

	</div>

	<div class="clear"></div>

</div>
