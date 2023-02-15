<?php
/**
 * Webby_Performance class
 *
 * @package Webby_Performance
 *
 * @since 1.0.0
 */

namespace Webby_Performance;

/**
 * Core class Webby_Performance
 *
 * @since 1.0.0
 */
class Webby_Performance {

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'load_plugin_data' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		add_action( 'init', [ $this, 'load_textdomain' ] );
	}

	/**
	 * Load plugin data
	 *
	 * @access public
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_data() {
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$this->plugin_data = get_plugin_data( WEBBY_PERFORMANCE );
	}

	/**
	 * Load textdomain
	 *
	 * @access public
	 *
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		return load_plugin_textdomain(
			'webby-performance',
			false,
			plugin_dir_path( WEBBY_PERFORMANCE ) . 'languages'
		);
	}

	/**
	 * Set links below a plugin on the Plugins page.
	 *
	 * Hooks to plugin_row_meta
	 *
	 * @see https://developer.wordpress.org/reference/hooks/plugin_row_meta/
	 *
	 * @access public
	 *
	 * @param array  $links  An array of the plugin's metadata.
	 * @param string $file   Path to the plugin file relative to the plugins directory.
	 *
	 * @return array $links
	 *
	 * @since 1.0.0
	 */
	public function plugin_metadata_links( $links, $file ) {
		if ( $file === plugin_basename( WEBBY_PERFORMANCE ) ) {
			$links[] = '<a href="https://github.com/sponsors/thingsym">' . __( 'Become a sponsor', 'webby-performance' ) . '</a>';
		}

		return $links;
	}

}
