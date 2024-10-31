<?php
//Hook Widget
add_action( 'widgets_init', 'reverbnation_master_widget_buttons' );
//Register Widget
function reverbnation_master_widget_buttons() {
register_widget( 'reverbnation_master_widget_buttons' );
}

class reverbnation_master_widget_buttons extends WP_Widget {
	function __construct(){
	$widget_ops = array( 'classname' => 'Reverbnation Master Buttons', 'description' => __('Reverbnation Master Buttons is perfect to connect people to your Reverbnation Profile. ', 'reverbnation_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'reverbnation_master_widget_buttons' );
	parent::__construct( 'reverbnation_master_widget_buttons', __('Reverbnation Master Buttons', 'reverbnation_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$reverbnation_title = isset( $instance['reverbnation_title'] ) ? $instance['reverbnation_title'] :false;
		$reverbnation_title_new = isset( $instance['reverbnation_title_new'] ) ? $instance['reverbnation_title_new'] :false;
		$reverbnationspacer ="'";
		$show_reverbbutton = isset( $instance['show_reverbbutton'] ) ? $instance['show_reverbbutton'] :false;
		$reverbpage = $instance['reverbpage'];
		echo $before_widget;
		
		// Display the widget title
	if ( $reverbnation_title ){
		if (empty ($reverbnation_title_new)){
			$reverbnation_title_new = constant('REVERBNATION_MASTER_NAME');
			echo $before_title . $reverbnation_title_new . $after_title;
		}
		else{
			echo $before_title . $reverbnation_title_new . $after_title;
		}
	}
	else{
	}
	//Display Reverbnation Profile Button
	if ( $show_reverbbutton ){
			$url_loc = plugins_url();
			echo '<a href="'.$reverbpage.'" target="_blank"><img src="'.$url_loc.'/reverbnation-master/images/reverbnation_button.png"></a>';
	}
	else{
	}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['reverbnation_title'] = strip_tags( $new_instance['reverbnation_title'] );
		$instance['reverbnation_title_new'] = $new_instance['reverbnation_title_new'];
		$instance['show_reverbbutton'] = $new_instance['show_reverbbutton'];
		$instance['reverbpage'] = $new_instance['reverbpage'];
		return $instance;
	}
	function form( $instance ) {
	$plugin_master_name = constant('REVERBNATION_MASTER_NAME');
	//Set up some default widget settings.
	$defaults = array( 'reverbnation_title_new' => __('Reverbnation Master', 'reverbnation_master'), 'reverbnation_title' => true, 'reverbnation_title_new' => false, 'show_reverbbutton' => false, 'reverbpage' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['reverbnation_title'], true ); ?> id="<?php echo $this->get_field_id( 'reverbnation_title' ); ?>" name="<?php echo $this->get_field_name( 'reverbnation_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'reverbnation_title' ); ?>"><b><?php _e('Display Widget Title', 'reverbnation_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'reverbnation_title_new' ); ?>"><?php _e('Change Title:', 'reverbnation_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'reverbnation_title_new' ); ?>" name="<?php echo $this->get_field_name( 'reverbnation_title_new' ); ?>" value="<?php echo $instance['reverbnation_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_reverbbutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_reverbbutton' ); ?>" name="<?php echo $this->get_field_name( 'show_reverbbutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_reverbbutton' ); ?>"><b><?php _e('Reverbnation Profile Button', 'reverbnation_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'reverbpage' ); ?>"><?php _e('insert Reverbnation Profile link:', 'reverbnation_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'reverbpage' ); ?>" name="<?php echo $this->get_field_name( 'reverbpage' ); ?>" value="<?php echo $instance['reverbpage']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; width:18px; vertical-align:middle;" />
	&nbsp;
	<b><?php echo $plugin_master_name; ?> Website</b>
	</p>
	<p><a class="button-secondary" href="https://wordpress.techgasp.com/reverbnation-master/" target="_blank" title="<?php echo $plugin_master_name; ?> Info Page">Info Page</a> <a class="button-secondary" href="https://wordpress.techgasp.com/reverbnation-master-documentation/" target="_blank" title="<?php echo $plugin_master_name; ?> Documentation">Documentation</a> <a class="button-primary" href="https://wordpress.techgasp.com/reverbnation-master/" target="_blank" title="Visit Website">Get Add-ons</a></p>
	<?php
	}
 }
?>
