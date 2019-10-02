<?php

/*
-----------------------------------------------------------------------------------------------------
	Theme License and Updater
-----------------------------------------------------------------------------------------------------
*/

// Includes the files needed for the theme updater.
if ( ! class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes.
$updater = new EDD_Theme_Updater_Admin(
	// Config settings.
	$config = array(
		'remote_api_url' => 'https://organicthemes.com', // Site where EDD is hosted.
		'item_name' => 'Origin Theme', // Name of theme.
		'theme_slug' => 'organic-origin', // Theme slug.
		'version' => '1.3.2', // The current version of this theme.
		'author' => 'Organic Themes', // The author of this theme.
		'download_id' => '', // Optional, used for generating a license renewal link.
		'renew_url' => '',// Optional, allows for a custom license renewal link.
	),
	// Strings.
	$strings = array(
		'theme-license' => __( 'Theme License', 'organic-origin' ),
		'enter-key' => __( 'Enter your theme license key.', 'organic-origin' ),
		'license-key' => __( 'License Key', 'organic-origin' ),
		'license-action' => __( 'License Action', 'organic-origin' ),
		'deactivate-license' => __( 'Deactivate License', 'organic-origin' ),
		'activate-license' => __( 'Activate License', 'organic-origin' ),
		'status-unknown' => __( 'License status is unknown.', 'organic-origin' ),
		'renew' => __( 'Renew?', 'organic-origin' ),
		'unlimited' => __( 'unlimited', 'organic-origin' ),
		'license-key-is-active' => __( 'License key is active.', 'organic-origin' ),
		'expires%s' => __( 'Expires %s.', 'organic-origin' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'organic-origin' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'organic-origin' ),
		'license-key-expired' => __( 'License key has expired.', 'organic-origin' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'organic-origin' ),
		'license-is-inactive' => __( 'License is inactive.', 'organic-origin' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'organic-origin' ),
		'site-is-inactive' => __( 'Site is inactive.', 'organic-origin' ),
		'license-status-unknown' => __( 'License status is unknown.', 'organic-origin' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'organic-origin' ),
		'update-available' => __( '<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'organic-origin' ),
	)
);
