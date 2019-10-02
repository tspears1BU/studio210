<?php
/**
 * Theme customizer controls
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

/** Category Dropdown Control */
class Organic_Origin_Category_Dropdown_Control extends WP_Customize_Control {

	/**
	 * Define dropdown categories.
	 *
	 * @var type
	 */
	public $type = 'dropdown-categories';

	/**
	 * Dropdown category arguments.
	 */
	public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'              => '_customize-dropdown-categories-' . $this->id,
				'echo'              => 0,
				'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'organic-origin' ),
				'option_none_value' => '0',
				'selected'          => $this->value(),
			)
		);

		// Hackily add in the data link parameter.
		$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

		printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			$this->label,
			$dropdown
		);
	}
}
