<?php
// Adds widget: Ronin Widget  Social Widget share
class Roninwidgetsocialwid_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'roninwidgetsocialwid_widget',
			esc_html__( 'Ronin Widget  Social Widget share', 'ronin' ),
			array( 'description' => esc_html__( 'Put social  Link', 'ronin' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Ronin Sub Title',
			'id' => 'ronin_subtitle',
			'type' => 'text',
		),
		array(
			'label' => 'Ronin Facebook Url',
			'id' => 'ronin_fb_url',
			'type' => 'url',
		),
		array(
			'label' => 'Ronin Twitter Url',
			'id' => 'ronin_tw_url',
			'type' => 'url',
		),
		array(
			'label' => 'Ronin Dribbble Url',
			'id' => 'ronin_db_url',
			'type' => 'url',
		),
		array(
			'label' => 'Ronin Behance Url',
			'id' => 'ronin_bn_url',
			'type' => 'url',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		echo '<p>'.$instance['ronin_subtitle'].'</p>';
        
        echo '<ul class="list">';

        printf('<li><a href="%s"><i class="fa fa-facebook"></i></a></li>', $instance['ronin_fb_url']);
        printf('<li><a href="%s"><i class="fa fa-twitter"></i></a></li>', $instance['ronin_tw_url']);
        printf('<li><a href="%s"><i class="fa fa-dribbble"></i></a></li>', $instance['ronin_db_url']);
        printf('<li><a href="%s"><i class="fa fa-behance"></i></a></li>', $instance['ronin_bn_url']);

        echo '</ul>';
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'ronin' );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'ronin' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'ronin' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'ronin' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_roninwidgetsocialwid_widget() {
	register_widget( 'Roninwidgetsocialwid_Widget' );
}
add_action( 'widgets_init', 'register_roninwidgetsocialwid_widget' );