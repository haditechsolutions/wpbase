<?php
/**
 * List Posts.
 *
 * @package Classic BlogBell
 */

function classic_blogbell_sidebar_list_news() {
	register_widget( 'Classic_BlogBell_Sidebar_List_News' );
}
add_action( 'widgets_init', 'classic_blogbell_sidebar_list_news' );

class Classic_BlogBell_Sidebar_List_News extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_sidebar_list = array(
		  'classname'   => 'sidebar-list-news',
		  'description' => esc_html__( 'Add Widget to Display List Posts.', 'classic-blogbell' )
		);
		parent::__construct( 'Classic_BlogBell_Sidebar_List_News',esc_html__( 'ST: List Posts', 'classic-blogbell' ), $widget_sidebar_list, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'title'			=> esc_html__( 'List Posts', 'classic-blogbell' ),		
			  'category'       	=> '', 
			  'number'          => 5, 
			  'show_category'	=> true,	
			) 
		);
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'List Posts', 'classic-blogbell' );
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;   
		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true; 
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'classic-blogbell' ); ?></label>
	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'classic-blogbell' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('List Posts','classic-blogbell'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number (Max: 10)', 'classic-blogbell' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="10" />
	    </p>	
  
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 				= sanitize_text_field( $new_instance['title'] );
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];  	   
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args ); 
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'List Posts', 'classic-blogbell' );
    	$title 				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
    	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $featured_category  = isset( $instance[ 'featured_category' ] ) ? $instance[ 'featured_category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        echo $before_widget;
        ?>   		    
	        
        <?php $recent_args = array(
            'posts_per_page' => absint( $number ),
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),      
        );

        if ( absint( $category ) > 0 ) {
          $recent_args['cat'] = absint( $category );
        }

        $recent_loop = new WP_Query( $recent_args ); 
         ?>		            
			<div class="section-header">
            	<?php if ( !empty( $title ) ): ?>
		           <?php echo $args['before_title'] . esc_html($title) . $args['after_title']; ?>
		        <?php endif; ?>
		    </div>     
 			<ul>
    			<?php if ($recent_loop->have_posts()) : 
    				$count= 0;
        		 while ( $recent_loop->have_posts() ) : $recent_loop->the_post(); 
        		 	if( has_post_thumbnail() ){
					        $image_class = 'has-post-thumbnail'; 
					    } else {
					        $image_class = 'no-post-thumbnail'; 
					    }
					    ?>
              <li class="<?php echo esc_attr( $image_class ); ?>">
				        <div class="entry-container">  
				        	<div class="entry-meta">
										<?php classic_blogbell_entry_meta(); ?>									
									</div> 
					        <header class="entry-header">
                      <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </header>
                  <div class="entry-meta">  
                  	<?php classic_blogbell_posted_on();?>
                  </div><!-- .entry-meta -->
              </div>
				    </li>
        		<?php endwhile; wp_reset_postdata(); endif;?>
        		</ul>	    
        <?php echo $after_widget;

    } 

}