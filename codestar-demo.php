<?php
/**
 * Plugin Name:       Code Star Demo
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This is a sample description of   Our Metabox.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shaped Plugin
 * Author URI:        https://www.shapedplugin.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       csf-demo
 */

// Include the main plugin class .
require_once plugin_dir_path( __FILE__ ) . './libs/csf/codestar-framework.php';
/**
 * Code_Star_Demo
 */
class Code_Star_Demo {

	/**
	 * The __construct method of Code_Star_Demo class .
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'initialize_metabox' ) );
	}

	/**
	 * Method of initialize_metabox that function has initialize this plugin.
	 *
	 * @return void
	 */
	public function initialize_metabox() {
		if ( class_exists( 'CSF' ) ) {
			// Set a unique slug-like ID .
			$prefix = 'users-info';

			// Create a metabox .
			CSF::createMetabox(
				$prefix,
				array(
					'title'     => 'Give Your Info',
					'post_type' => 'post',
				)
			);

			CSF::createSection(
				$prefix,
				array(
					'fields' => $this->get_fields(),
				)
			);
		}
	}


	/**
	 * Method get_fields are provide the all of fields on metabox.
	 *
	 * @return array of fields
	 */
	private function get_fields() {
		return array(
			array(
				'id'    => 'opt-text',
				'title' => 'Enter Name',
				'type'  => 'text',
			),
			array(
				'id'    => 'opt-text',
				'title' => 'Your Email',
				'type'  => 'text',
			),
			array(
				'id'      => 'opt-radio',
				'type'    => 'radio',
				'title'   => 'Gender',
				'options' => array(
					'option-1' => 'Male',
					'option-2' => 'Female',
					'option-3' => 'Others',
				),
				'default' => 'option-1',
			),
			array(
				'id'    => 'opt-gallery-1',
				'type'  => 'gallery',
				'title' => 'Image Gallery',
			),
			array(
				'id'    => 'opt-date-1',
				'type'  => 'date',
				'title' => 'Date of Birth',
			),
			array(
				'id'      => 'opt-button-set-1',
				'type'    => 'button_set',
				'title'   => 'Button Set',
				'options' => array(
					'enabled'  => 'Enabled',
					'disabled' => 'Disabled',
				),
				'default' => 'enabled',
			),
			array(
				'id'    => 'opt-media-1',
				'type'  => 'media',
				'title' => 'Media',
			),
			array(
				'id'      => 'opt-textarea',
				'type'    => 'textarea',
				'title'   => 'Textarea',
				'default' => 'Lorem ipsum dollar.',
			),
		);
	}
}

$demo = new Code_Star_Demo();
$demo->initialize_metabox();
