<?php
namespace TenUp\TMI_2015\Core;

/**
 * This is a very basic test case to get things started. You should probably rename this and make
 * it work for your project. You can use all the tools provided by WP Mock and Mockery to create
 * your tests. Coverage is calculated against your includes/ folder, so try to keep all of your
 * functional code self contained in there.
 *
 * References:
 *   - http://phpunit.de/manual/current/en/index.html
 *   - https://github.com/padraic/mockery
 *   - https://github.com/10up/wp_mock
 */

use TenUp\TMI_2015 as Base;

class Core_Tests extends Base\TestCase {

	protected $testFiles = [
		'functions/core.php'
	];

	/**
	 * Make sure all theme-specific constants are defined before we get started
	 */
	public function setUp() {
		if ( ! defined( 'TMI_TEMPLATE_URL' ) ) {
			define( 'TMI_TEMPLATE_URL', 'template_url' );
		}
		if ( ! defined( 'TMI_VERSION' ) ) {
			define( 'TMI_VERSION', '0.0.1' );
		}
		if ( ! defined( 'TMI_URL' ) ) {
			define( 'TMI_URL', 'url' );
		}

		parent::setUp();
	}

	/** 
	 * Test setup method.
	 */
	public function test_setup() {
		// Setup
		\WP_Mock::expectActionAdded( 'init',               'TenUp\TMI_2015\Core\i18n'        );
		\WP_Mock::expectActionAdded( 'wp_head',            'TenUp\TMI_2015\Core\header_meta' );
		\WP_Mock::expectActionAdded( 'wp_enqueue_scripts', 'TenUp\TMI_2015\Core\scripts'     );
		\WP_Mock::expectActionAdded( 'wp_enqueue_scripts', 'TenUp\TMI_2015\Core\styles'      );

		// Act
		setup();

		// Verify
		$this->assertConditionsMet();
	}

	/** 
	 * Test internationalization integration.
	 */
	public function test_i18n() {
		// Setup
		\WP_Mock::wpFunction( 'load_theme_textdomain', array(
			'times' => 1,
			'args' => array(
				'tmi',
				TMI_PATH . '/languages'
			),
		) );

		// Act
		i18n();

		// Verify
		$this->assertConditionsMet();
	}

	/** 
	 * Test scripts enqueue.
	 */
	public function test_scripts() {
		// Regular
		\WP_Mock::wpFunction( 'wp_enqueue_script', array(
			'times' => 1,
			'args' => array(
				'tmi',
				'template_url/assets/js/tmi-.min.js',
				array(),
				'0.0.1',
				true,
			),
		) );

		scripts();
		$this->assertConditionsMet();
		
		// Debug Mode
		\WP_Mock::wpFunction( 'wp_enqueue_script', array(
			'times' => 1,
			'args' => array(
				'tmi',
				'template_url/assets/js/tmi-.js',
				array(),
				'0.0.1',
				true,
			),
		) );

		scripts( true );
		$this->assertConditionsMet();
	}

	/** 
	 * Test style enqueue.
	 */
	public function test_styles() {
		// Regular
		\WP_Mock::wpFunction( 'wp_enqueue_style', array(
			'times' => 1,
			'args' => array(
				'tmi',
				'url/assets/css/tmi-.min.css',
				array(),
				'0.0.1',
			),
		) );

		styles();
		$this->assertConditionsMet();
		
		// Debug Mode
		\WP_Mock::wpFunction( 'wp_enqueue_style', array(
			'times' => 1,
			'args' => array(
				'tmi',
				'url/assets/css/tmi-.css',
				array(),
				'0.0.1',
			),
		) );

		styles( true );
		$this->assertConditionsMet();
	}

	/** 
	 * Test header meta injection
	 */
	public function test_header_meta() {
		// Setup
		$meta = '<link type="text/plain" rel="author" href="template_url/humans.txt" />';
		\WP_Mock::onFilter( 'tmi_humans' )->with( $meta )->reply( $meta );

		// Act
		ob_start();
		header_meta();
		$result = ob_get_clean();

		// Verify
		$this->assertConditionsMet();
		$this->assertEquals( $meta, $result );
	}
}