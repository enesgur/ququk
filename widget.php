<?php
class Quq_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'foo_widget', // Base ID
            __('Ququk Widgets', 'text_domain'), // Name
            array( 'description' => __( 'Ququk Widget', 'text_domain' ), ) // Args
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
        extract($args);
        $title = $instance['title'];
        $cat   = $instance['cat'];
        $count = $instance['count'];
        if($return = ququkDb::quq($count,$cat)){
            foreach($return as $row){
                $results[] = htmlspecialchars_decode(stripslashes($row->Body));
            }
        }
        echo $before_widget;
        echo $before_title.$title.$after_title;
        if(isset($results)){
            foreach($results as $row){
                echo $row."<br />";
            }
        }
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'cat' ], $instance['title'], $instance['count'] ) ) {
            $cat = $instance[ 'cat' ];
            $title = $instance['title'];
            $count = $instance['count'];
        }
        $cats = ququkDb::allQuq(null,null,"ququkCategory");
        foreach($cats as $row){
            if($instance['cat'] == $row->Id)
                $option .= "<option value='$row->Id' selected>$row->Slug</option> \n";
            else
                $option .= "<option value='$row->Id'>$row->Slug</option> \n";
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            <!--<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:' ); ?></label>-->
            <!--<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />-->
            <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Category:' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'cat' ); ?>" id="<?php echo $this->get_field_id( 'cat' ); ?>">
                <?php echo $option; ?>
            </select>
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
        $instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? strip_tags($new_instance['count']) : '1';
        return $instance;
    }

} // class Foo_Widget
?>