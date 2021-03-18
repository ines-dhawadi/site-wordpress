<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Car_Rental_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-car-rental' ),
				'family'      => esc_html__( 'Font Family', 'vw-car-rental' ),
				'size'        => esc_html__( 'Font Size',   'vw-car-rental' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-car-rental' ),
				'style'       => esc_html__( 'Font Style',  'vw-car-rental' ),
				'line_height' => esc_html__( 'Line Height', 'vw-car-rental' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-car-rental' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-car-rental-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-car-rental-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-car-rental' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-car-rental' ),
        'Acme' => __( 'Acme', 'vw-car-rental' ),
        'Anton' => __( 'Anton', 'vw-car-rental' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-car-rental' ),
        'Arimo' => __( 'Arimo', 'vw-car-rental' ),
        'Arsenal' => __( 'Arsenal', 'vw-car-rental' ),
        'Arvo' => __( 'Arvo', 'vw-car-rental' ),
        'Alegreya' => __( 'Alegreya', 'vw-car-rental' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-car-rental' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-car-rental' ),
        'Bangers' => __( 'Bangers', 'vw-car-rental' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-car-rental' ),
        'Bad Script' => __( 'Bad Script', 'vw-car-rental' ),
        'Bitter' => __( 'Bitter', 'vw-car-rental' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-car-rental' ),
        'BenchNine' => __( 'BenchNine', 'vw-car-rental' ),
        'Cabin' => __( 'Cabin', 'vw-car-rental' ),
        'Cardo' => __( 'Cardo', 'vw-car-rental' ),
        'Courgette' => __( 'Courgette', 'vw-car-rental' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-car-rental' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-car-rental' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-car-rental' ),
        'Cuprum' => __( 'Cuprum', 'vw-car-rental' ),
        'Cookie' => __( 'Cookie', 'vw-car-rental' ),
        'Chewy' => __( 'Chewy', 'vw-car-rental' ),
        'Days One' => __( 'Days One', 'vw-car-rental' ),
        'Dosis' => __( 'Dosis', 'vw-car-rental' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-car-rental' ),
        'Economica' => __( 'Economica', 'vw-car-rental' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-car-rental' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-car-rental' ),
        'Francois One' => __( 'Francois One', 'vw-car-rental' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-car-rental' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-car-rental' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-car-rental' ),
        'Handlee' => __( 'Handlee', 'vw-car-rental' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-car-rental' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-car-rental' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-car-rental' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-car-rental' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-car-rental' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-car-rental' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-car-rental' ),
        'Kanit' => __( 'Kanit', 'vw-car-rental' ),
        'Lobster' => __( 'Lobster', 'vw-car-rental' ),
        'Lato' => __( 'Lato', 'vw-car-rental' ),
        'Lora' => __( 'Lora', 'vw-car-rental' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-car-rental' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-car-rental' ),
        'Merriweather' => __( 'Merriweather', 'vw-car-rental' ),
        'Monda' => __( 'Monda', 'vw-car-rental' ),
        'Montserrat' => __( 'Montserrat', 'vw-car-rental' ),
        'Muli' => __( 'Muli', 'vw-car-rental' ),
        'Marck Script' => __( 'Marck Script', 'vw-car-rental' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-car-rental' ),
        'Open Sans' => __( 'Open Sans', 'vw-car-rental' ),
        'Overpass' => __( 'Overpass', 'vw-car-rental' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-car-rental' ),
        'Oxygen' => __( 'Oxygen', 'vw-car-rental' ),
        'Orbitron' => __( 'Orbitron', 'vw-car-rental' ),
        'Patua One' => __( 'Patua One', 'vw-car-rental' ),
        'Pacifico' => __( 'Pacifico', 'vw-car-rental' ),
        'Padauk' => __( 'Padauk', 'vw-car-rental' ),
        'Playball' => __( 'Playball', 'vw-car-rental' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-car-rental' ),
        'PT Sans' => __( 'PT Sans', 'vw-car-rental' ),
        'Philosopher' => __( 'Philosopher', 'vw-car-rental' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-car-rental' ),
        'Poiret One' => __( 'Poiret One', 'vw-car-rental' ),
        'Quicksand' => __( 'Quicksand', 'vw-car-rental' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-car-rental' ),
        'Raleway' => __( 'Raleway', 'vw-car-rental' ),
        'Rubik' => __( 'Rubik', 'vw-car-rental' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-car-rental' ),
        'Russo One' => __( 'Russo One', 'vw-car-rental' ),
        'Righteous' => __( 'Righteous', 'vw-car-rental' ),
        'Slabo' => __( 'Slabo', 'vw-car-rental' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-car-rental' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-car-rental'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-car-rental' ),
        'Sacramento' => __( 'Sacramento', 'vw-car-rental' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-car-rental' ),
        'Tangerine' => __( 'Tangerine', 'vw-car-rental' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-car-rental' ),
        'VT323' => __( 'VT323', 'vw-car-rental' ),
        'Varela Round' => __( 'Varela Round', 'vw-car-rental' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-car-rental' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-car-rental' ),
        'Volkhov' => __( 'Volkhov', 'vw-car-rental' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-car-rental' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-car-rental' ),
			'100' => esc_html__( 'Thin',       'vw-car-rental' ),
			'300' => esc_html__( 'Light',      'vw-car-rental' ),
			'400' => esc_html__( 'Normal',     'vw-car-rental' ),
			'500' => esc_html__( 'Medium',     'vw-car-rental' ),
			'700' => esc_html__( 'Bold',       'vw-car-rental' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-car-rental' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-car-rental' ),
			'italic'  => esc_html__( 'Italic', 'vw-car-rental' ),
			'oblique' => esc_html__( 'Oblique', 'vw-car-rental' )
		);
	}
}
