<?php
/**
 * Class for footer widgets.
 *
 * @package Dikka Business
 */

/**
 * Footer Widgets class.
 *
 * @since 1.0
 */
class dikka_business_Footer_Widgets {

	/**
	 * Number of maximum registered widgets.
	 *
	 * @since 1.0
	 *
	 * @access protected
	 * @var int
	 */
	protected $max_widgets = 0;

	/**
	 * Number of active widgets.
	 *
	 * @since 1.0
	 *
	 * @access protected
	 * @var int
	 */
	protected $active_widgets = 0;

	/**
	 * Prefix to apply hook.
	 *
	 * @since 1.0
	 *
	 * @access protected
	 * @var int
	 */
	protected $theme_prefix = 'dikka_business';

	/**
	 * Construcor.
	 *
	 * @since 1.0
	 */
	function __construct() {

		$this->setup();
		$this->init();

	}

	/**
	 * Initial setup.
	 *
	 * @since 1.0
	 */
	function setup() {

		$support = get_theme_support( 'footer-widgets' );
		if ( empty( $support ) ) {
			return;
		}
		if ( absint( $support[0] ) < 1 ) {
			return;
		}
		$this->max_widgets = absint( $support[0] );
		$this->active_widgets = $this->get_number_of_active_widgets();

	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0
	 */
	function init() {

		if ( $this->max_widgets < 1 ) {
			return;
		}
		//print_r($this->active_widgets);die;
		// Register footer widgets.
		add_action( 'widgets_init', array( $this, 'footer_widgets_init' ), 20 );

		if ( $this->active_widgets > 0 ) {
			// Add footer widgets in front end.
			add_action( $this->theme_prefix . '_action_before_footer', array( $this, 'add_footer_widgets' ), 3 );
		}

		// Add custom class in widgets.
		add_filter( $this->theme_prefix . '_filter_footer_widget_class', array( $this, 'custom_footer_widget_class' ), 10, 2 );

	}

	/**
	 * Register footer widgets.
	 *
	 * @since 1.0
	 */
	function footer_widgets_init() {

		for ( $i = 1; $i <= $this->max_widgets; $i++ ) {
			register_sidebar( array(
				/* translators: %d: number label of footer widget */
				'name'          => sprintf( __( 'Footer Widget %d', 'dikka-business' ), $i ),
				'id'            => sprintf( 'footer-%d', $i ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}

	}

	/**
	 * Returns number of active footer widgets.
	 *
	 * @since 1.0
	 *
	 * @return int Number of active widgets.
	 */
	private function get_number_of_active_widgets() {

		$count = 0;

		for ( $i = 1; $i <= $this->max_widgets; $i++ ) {
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}

		return $count;

	}

	/**
	 * Add footer widgets content in front end.
	 *
	 * @since 1.0
	 */
	function add_footer_widgets() {

		$flag_apply_footer_widgets_content = apply_filters( $this->theme_prefix . '_filter_footer_widgets', true );
		if ( true !== $flag_apply_footer_widgets_content ) {
			return false;
		}

		$args = array(
		'container' => 'div',
		'before'    => '<div class="container footer-widget-area"><div class="row">',
		'after'     => '</div><!-- .row --></div><!-- .container/.footer-widget-area -->',
		);
		$footer_widgets_content = $this->get_footer_widgets_content( $args );
		echo wp_kses_post( $footer_widgets_content );

	}

	/**
	 * Returns all active footer widgets number in array.
	 *
	 * @since 1.0
	 *
	 * @return array Active widgets
	 */
	function all_active_widgets() {

		$arr = array();

		for ( $i = 1; $i <= $this->max_widgets ; $i++ ) {
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$arr[] = $i;
			}
		}
		return $arr;

	}

	/**
	 * Returns footer widget contents.
	 *
	 * @since 1.0
	 *
	 * @param array $args Footer widget arguments.
	 */
	function get_footer_widgets_content( $args ) {

		$number = $this->active_widgets;
		$all_active_widgets = $this->all_active_widgets();

		// Default arguments.
		$args = wp_parse_args( (array) $args, array(
			'container'       => 'div',
			'container_class' => '',
			'container_style' => '',
			'container_id'    => 'footer-widgets',
			'before'          => '',
			'after'           => '',
			'wrap_class'	  => ''
		) );
		$args = apply_filters( $this->theme_prefix . '_filter_footer_widgets_args', $args );

		ob_start();
		$container_open = '';
		$container_close = '';

		if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
			$container_open = sprintf(
				'<%s %s %s %s>',
				$args['container'],
				( $args['container_class'] ) ? 'class="' . esc_attr( $args['container_class'] ) . '"':'',
				( $args['container_id'] ) ? 'id="' . esc_attr( $args['container_id'] ) . '"':'',
				( $args['container_style'] ) ? 'style="' . esc_attr( $args['container_style'] ) . '"':''
			);
		}
		if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
			$container_close = sprintf(
				'</%s>',
				$args['container']
			);
		}

		echo wp_kses_post( $container_open );

		echo wp_kses_post( $args['before'] );

		for ( $i = 1; $i <= $number; $i++ ) {

			$item_class = apply_filters( $this->theme_prefix . '_filter_footer_widget_class', '', $i );
			$div_classes = implode( ' ', array( $item_class, $args['wrap_class'] ) );
			$div_classes = trim( $div_classes );

			echo '<div class="' . esc_attr( $div_classes ) .  '">';
			$sidebar_name = 'footer-' . $all_active_widgets[ $i - 1 ];
			dynamic_sidebar( $sidebar_name );
			echo '</div><!-- .' . esc_attr( $args['wrap_class'] ) . ' -->';

		} // End for loop.

		echo wp_kses_post( $args['after'] );

		echo wp_kses_post( $container_close );

		$output = ob_get_contents();
		ob_end_clean();
		return $output;

	}

	/**
	 * Add custom class in widgets.
	 *
	 * @since 1.0
	 *
	 * @param string $input Class for footer widget column.
	 */
	function custom_footer_widget_class( $input, $col ) {

		$footer_widgets_number = $this->active_widgets;

		$input .= 'footer-active-' . $footer_widgets_number;
		if( 1 == $col){
			$input .= ' footer-column';
		}
		if( 2 == $col){
			$input .= ' footer-column';
		}
		if( 3 == $col){
			$input .= ' footer-column';
		}
		if( 4 == $col){
			$input .= ' footer-column';
		}

		return $input;

	}
}

// Initialize.
$dikka_business_footer_widgets = new dikka_business_Footer_Widgets();
