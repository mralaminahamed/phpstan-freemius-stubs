<?php
/**
 * Mock 'Debug Bar' panel class.
 *
 * @package query-monitor
 */

abstract class Debug_Bar_Panel {

	/**
	 * @var string
	 */
	public $_title = '';

	/**
	 * @var bool
	 */
	public $_visible = true;

	/**
	 * @param string $title
	 */
	public function __construct( $title = '' ) {}

	/**
	 * Initializes the panel.
	 *
	 * @return false|void
	 */
	public function init() {}

	/**
	 * @return void
	 */
	public function prerender() {}

	/**
	 * Renders the panel.
	 *
	 * @return void
	 */
	public function render() {}

	/**
	 * @return bool
	 */
	public function is_visible() {}

	/**
	 * @param bool $visible
	 * @return void
	 */
	public function set_visible( $visible ) {}

	/**
	 * @param string|null $title
	 * @return string|void
	 */
	public function title( $title = null ) {}

	/**
	 * @param array<int, string> $classes
	 * @return array<int, string>
	 */
	public function debug_bar_classes( $classes ) {}

	/**
	 * @param string $title
	 * @return void
	 */
	public function Debug_Bar_Panel( $title = '' ) {}

}
