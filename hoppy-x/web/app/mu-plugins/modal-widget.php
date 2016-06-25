<?php
/*
Plugin Name: Simple Modal
Plugin URI: http://mydomain.com
Description: A title which links to a modal popup.
Author: Jerome Toole
Version: 1.0
*/
// Block direct requests
if ( !defined('ABSPATH') )
    die('-1');


add_action( 'widgets_init', function(){
     register_widget( 'Simple_Modal' );
});
/**
 * Adds Simple_Modal widget.
 */
class Simple_Modal extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Simple_Modal', // Base ID
            __('Simple Modal', 'text_domain'), // Name
            array( 'description' => __( 'A title which links to a modal popup.', 'text_domain' ), ) // Args
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        $before_title = '<label for="modal-footer">
                            <div class="modal-trigger"><h3>';
        $after_title = '</h3></div></label>';

        $before_modal = '<input class="modal-state" id="modal-footer" type="checkbox"/>
                            <div class="modal-fade-screen">
                                <div class="modal-inner">
                                    <div class="modal-close" for="modal-footer"></div>';
        $after_modal = '</div>
                        </div>';

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $before_title . apply_filters( 'widget_title', $instance['title'] ). $after_title;
        }
        if ( ! empty( $instance['content'] ) ) {
            echo $before_modal . apply_filters( 'widget_text', $instance['content'] ). $after_modal;
        }
        echo $args['after_widget'];
    }
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        };
        if ( isset( $instance[ 'content' ] ) ) {
            $content = $instance[ 'content' ];
        }
        else {
            $content = __( 'New Modal Content', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" type="textarea" placeholder="<?php echo esc_attr( $content ); ?>"><?php echo esc_attr( $content ); ?></textarea>
        </p>
        <?php
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['content'] = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
        return $instance;
    }
} // class Simple_Modal
