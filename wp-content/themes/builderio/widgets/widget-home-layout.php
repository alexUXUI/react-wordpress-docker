<?php

// builderio widget 

// start class - Builderio_Get_A_Quote
if( !class_exists( 'Builderio_Get_A_Quote' ) ) :

	class Builderio_Get_A_Quote extends WP_Widget {
	
	    /**
	     * Sets up the widgets name etc
	     */
		public function __construct() {
			parent::__construct(
				'builderio_get_a_quote', // Base ID
				esc_html__( 'Get A Quote - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'Get A Quote Widget', 'builderio' ), ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		 $builderio_quote_title = ! empty( $instance['builderio_quote_title'] ) ? $instance['builderio_quote_title'] : '';
		 $builderio_quote_btn_label = ! empty( $instance['builderio_quote_btn_label'] ) ? $instance['builderio_quote_btn_label'] : '';
		 $builderio_quote_btn_url = ! empty( $instance['builderio_quote_btn_url'] ) ? $instance['builderio_quote_btn_url'] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_quote_title' ) ); ?>"><?php esc_attr_e( 'Get A Quote Title:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_quote_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_quote_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_quote_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_quote_btn_label' ) ); ?>"><?php esc_attr_e( 'Button Label:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_quote_btn_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_quote_btn_label' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_quote_btn_label ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_quote_btn_url' ) ); ?>"><?php esc_attr_e( 'Quote Link:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_quote_btn_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_quote_btn_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_quote_btn_url ); ?>">
		</p>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['builderio_quote_title'] = ( ! empty( $new_instance['builderio_quote_title'] ) ) ? sanitize_text_field( $new_instance['builderio_quote_title'] ) : '';
			$instance['builderio_quote_btn_label'] = ( ! empty( $new_instance['builderio_quote_btn_label'] ) ) ? sanitize_text_field( $new_instance['builderio_quote_btn_label'] ) : '';
			$instance['builderio_quote_btn_url'] = ( ! empty( $new_instance['builderio_quote_btn_url'] ) ) ? esc_url_raw( $new_instance['builderio_quote_btn_url'] ) : '';
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $builderio_quote_title = ! empty( $instance['builderio_quote_title'] ) ? $instance['builderio_quote_title'] : '';
		 $builderio_quote_btn_label = ! empty( $instance['builderio_quote_btn_label'] ) ? $instance['builderio_quote_btn_label'] : '';
		 $builderio_quote_btn_url = ! empty( $instance['builderio_quote_btn_url'] ) ? $instance['builderio_quote_btn_url'] : '';
		
		?>
		
		<section class="builderio-quote-section">
			<div class="container">
				<div class="row quote-wrapper">
					<div class="col-lg-10">
						<h5 class="quote-title"><?php echo esc_html( $builderio_quote_title ); ?></h5>
					</div>
					<div class="col-lg-2">
						<div class="button-wrap">
							<a href="<?php echo esc_url( $builderio_quote_btn_url ); ?>" class="quote-btn"><?php echo esc_html( $builderio_quote_btn_label );?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php }
		
	} // end class - Builderio_Get_A_Quote
	
endif; 

//counter
// start class - Builderio_Counter
if( !class_exists( 'Builderio_Counter' ) ) :

	class Builderio_Counter extends WP_Widget {
	
	    /**
	     * Sets up the widgets name etc
	     */
		public function __construct() {
			parent::__construct(
				'builderio_counter', // Base ID
				esc_html__( 'Counter - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'Counter Widget', 'builderio' ), ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		 $builderio_counter_one_title = ! empty( $instance['builderio_counter_one_title'] ) ? $instance['builderio_counter_one_title'] : '';
		 $builderio_counter_one_count = ! empty( $instance['builderio_counter_one_count'] ) ? $instance['builderio_counter_one_count'] : '';
		 $builderio_counter_one_icon  = ! empty( $instance['builderio_counter_one_icon'] ) ? $instance['builderio_counter_one_icon'] : '';
		 $builderio_counter_two_title = ! empty( $instance['builderio_counter_two_title'] ) ? $instance['builderio_counter_two_title'] : '';
		 $builderio_counter_two_count = ! empty( $instance['builderio_counter_two_count'] ) ? $instance['builderio_counter_two_count'] : '';
		 $builderio_counter_two_icon  = ! empty( $instance['builderio_counter_two_icon'] ) ? $instance['builderio_counter_two_icon'] : '';
		 $builderio_counter_three_title = ! empty( $instance['builderio_counter_three_title'] ) ? $instance['builderio_counter_three_title'] : '';
		 $builderio_counter_three_count = ! empty( $instance['builderio_counter_three_count'] ) ? $instance['builderio_counter_three_count'] : '';
		 $builderio_counter_three_icon  = ! empty( $instance['builderio_counter_three_icon'] ) ? $instance['builderio_counter_three_icon'] : '';
		 $builderio_counter_four_title = ! empty( $instance['builderio_counter_four_title'] ) ? $instance['builderio_counter_four_title'] : '';
		 $builderio_counter_four_count = ! empty( $instance['builderio_counter_four_count'] ) ? $instance['builderio_counter_four_count'] : '';
		 $builderio_counter_four_icon  = ! empty( $instance['builderio_counter_four_icon'] ) ? $instance['builderio_counter_four_icon'] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_one_title' ) ); ?>"><?php esc_attr_e( 'Counter 1 Title', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_one_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_one_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_one_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_one_count' ) ); ?>"><?php esc_attr_e( 'Counter 1 Count:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_one_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_one_count' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_one_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_one_icon' ) ); ?>"><?php esc_attr_e( 'Counter 1 Icon:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_one_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_one_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_one_icon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_two_title' ) ); ?>"><?php esc_attr_e( 'Counter 2 Title', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_two_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_two_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_two_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_two_count' ) ); ?>"><?php esc_attr_e( 'Counter 2 Count:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_two_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_two_count' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_two_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_two_icon' ) ); ?>"><?php esc_attr_e( 'Counter 2 Icon:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_two_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_two_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_two_icon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_three_title' ) ); ?>"><?php esc_attr_e( 'Counter 3 Title', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_three_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_three_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_three_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_three_count' ) ); ?>"><?php esc_attr_e( 'Counter 3 Count:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_three_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_three_count' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_three_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_three_icon' ) ); ?>"><?php esc_attr_e( 'Counter 3 Icon:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_three_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_three_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_three_icon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_four_title' ) ); ?>"><?php esc_attr_e( 'Counter 4 Title', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_four_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_four_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_four_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_four_count' ) ); ?>"><?php esc_attr_e( 'Counter 4 Count:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_four_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_four_count' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_four_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_four_icon' ) ); ?>"><?php esc_attr_e( 'Counter 4 Icon:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_counter_four_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_counter_four_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_counter_four_icon ); ?>">
		</p>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['builderio_counter_one_title'] = ( ! empty( $new_instance['builderio_counter_one_title'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_one_title'] ) : '';
			$instance['builderio_counter_one_count'] = ( ! empty( $new_instance['builderio_counter_one_count'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_one_count'] ) : '';
			$instance['builderio_counter_one_icon'] = ( ! empty( $new_instance['builderio_counter_one_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_one_icon'] ) : '';
			$instance['builderio_counter_two_title'] = ( ! empty( $new_instance['builderio_counter_two_title'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_two_title'] ) : '';
			$instance['builderio_counter_two_count'] = ( ! empty( $new_instance['builderio_counter_two_count'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_two_count'] ) : '';
			$instance['builderio_counter_two_icon'] = ( ! empty( $new_instance['builderio_counter_two_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_two_icon'] ) : '';
			$instance['builderio_counter_three_title'] = ( ! empty( $new_instance['builderio_counter_three_title'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_three_title'] ) : '';
			$instance['builderio_counter_three_count'] = ( ! empty( $new_instance['builderio_counter_three_count'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_three_count'] ) : '';
			$instance['builderio_counter_three_icon'] = ( ! empty( $new_instance['builderio_counter_three_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_three_icon'] ) : '';
			$instance['builderio_counter_four_title'] = ( ! empty( $new_instance['builderio_counter_four_title'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_four_title'] ) : '';
			$instance['builderio_counter_four_count'] = ( ! empty( $new_instance['builderio_counter_four_count'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_four_count'] ) : '';
			$instance['builderio_counter_four_icon'] = ( ! empty( $new_instance['builderio_counter_four_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_counter_four_icon'] ) : '';
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $builderio_counter_one_title = ! empty( $instance['builderio_counter_one_title'] ) ? $instance['builderio_counter_one_title'] : '';
		 $builderio_counter_one_count = ! empty( $instance['builderio_counter_one_count'] ) ? $instance['builderio_counter_one_count'] : '';
		 $builderio_counter_one_icon  = ! empty( $instance['builderio_counter_one_icon'] ) ? $instance['builderio_counter_one_icon'] : '';
		 $builderio_counter_two_title = ! empty( $instance['builderio_counter_two_title'] ) ? $instance['builderio_counter_two_title'] : '';
		 $builderio_counter_two_count = ! empty( $instance['builderio_counter_two_count'] ) ? $instance['builderio_counter_two_count'] : '';
		 $builderio_counter_two_icon  = ! empty( $instance['builderio_counter_two_icon'] ) ? $instance['builderio_counter_two_icon'] : '';
		 $builderio_counter_three_title = ! empty( $instance['builderio_counter_three_title'] ) ? $instance['builderio_counter_three_title'] : '';
		 $builderio_counter_three_count = ! empty( $instance['builderio_counter_three_count'] ) ? $instance['builderio_counter_three_count'] : '';
		 $builderio_counter_three_icon  = ! empty( $instance['builderio_counter_three_icon'] ) ? $instance['builderio_counter_three_icon'] : '';
		 $builderio_counter_four_title = ! empty( $instance['builderio_counter_four_title'] ) ? $instance['builderio_counter_four_title'] : '';
		 $builderio_counter_four_count = ! empty( $instance['builderio_counter_four_count'] ) ? $instance['builderio_counter_four_count'] : '';
		 $builderio_counter_four_icon  = ! empty( $instance['builderio_counter_four_icon'] ) ? $instance['builderio_counter_four_icon'] : '';
		
		?>
		
		<section class="builderio-counter-section pb-55">
			<div class="container">
				<div class="row counter-wrapper">
					
					<div class="col-lg-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $builderio_counter_one_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $builderio_counter_one_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $builderio_counter_one_title );?></h6>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $builderio_counter_two_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $builderio_counter_two_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $builderio_counter_two_title );?></h6>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $builderio_counter_three_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $builderio_counter_three_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $builderio_counter_three_title );?></h6>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $builderio_counter_four_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $builderio_counter_four_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $builderio_counter_four_title );?></h6>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<?php }
		
	} // end class - Builderio_Counter
	
endif; 

//recent blog post
// start class - Builderio_Recent_Blog_Post
if( !class_exists( 'Builderio_Recent_Blog_Post' ) ) :

	class Builderio_Recent_Blog_Post extends WP_Widget {
	
	    /**
	     * Sets up the widgets name etc
	     */
		public function __construct() {
			parent::__construct(
				'builderio_recent_blog_post', // Base ID
				esc_html__( 'Recent Blog Post - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'Recent Blog Post', 'builderio' ), ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		$builderio_blog_post_title = ! empty( $instance['builderio_blog_post_title'] ) ? $instance['builderio_blog_post_title'] : '';
		$builderio_blog_post_count = ! empty( $instance['builderio_blog_post_count'] ) ? $instance['builderio_blog_post_count'] : '';
		$builderio_blog_post_cat = ! empty( $instance[ 'builderio_blog_post_cat' ] ) ? $instance[ 'builderio_blog_post_cat' ] : '';
		$builderio_blog_post_excerpt = ! empty( $instance[ 'builderio_blog_post_excerpt' ] ) ? absint( $instance[ 'builderio_blog_post_excerpt' ] ) : 20;
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_title' ) ); ?>"><?php esc_attr_e( 'Post Title:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_blog_post_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_blog_post_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_cat' ) ); ?>"><?php esc_attr_e( 'Post Category:', 'builderio' ); ?></label>
			<?php
				$post_cat = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 0,
					'id'	=> $this->get_field_id( 'builderio_blog_post_cat' ),
					'name'	=> $this->get_field_name( 'builderio_blog_post_cat' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $builderio_blog_post_cat ),
					'show_option_all'	=> esc_html__( 'Choose Category', 'builderio' )
				);
				wp_dropdown_categories( $post_cat );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_count' ) )?>"><?php esc_attr_e( 'Number Of Post: ', 'builderio' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_blog_post_count' ) ); ?>" value="<?php echo esc_attr( $builderio_blog_post_count ); ?>" min="1" max="4" class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_excerpt' ) )?>"><?php esc_attr_e( 'Post Excerpt: ', 'builderio' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'builderio_blog_post_excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_blog_post_excerpt' ) ); ?>" value="<?php echo esc_attr( $builderio_blog_post_excerpt ); ?>" min="1" max="50" class="widefat">
		</p>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['builderio_blog_post_title'] = ( ! empty( $new_instance['builderio_blog_post_title'] ) ) ? sanitize_text_field( $new_instance['builderio_blog_post_title'] ) : '';
			$instance['builderio_blog_post_count'] = ( ! empty( $new_instance['builderio_blog_post_count'] ) ) ? absint( $new_instance['builderio_blog_post_count'] ) : '';
			$instance[ 'builderio_blog_post_cat' ] = absint( $new_instance[ 'builderio_blog_post_cat' ] );
			$instance[ 'builderio_blog_post_excerpt' ] = absint( $new_instance[ 'builderio_blog_post_excerpt' ] );
			
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $builderio_blog_post_title = ! empty( $instance['builderio_blog_post_title'] ) ? $instance['builderio_blog_post_title'] : '';
		 $builderio_blog_post_count = ! empty( $instance['builderio_blog_post_count'] ) ? $instance['builderio_blog_post_count'] : '';
		 $builderio_blog_post_cat = ! empty( $instance[ 'builderio_blog_post_cat' ] ) ? $instance[ 'builderio_blog_post_cat' ] : '';
		 $builderio_blog_post_excerpt = ! empty( $instance[ 'builderio_blog_post_excerpt' ] ) ? absint( $instance[ 'builderio_blog_post_excerpt' ] ) : 20;
		 
		?>
		
		<section class="builderio-recent-post pb-55">
			<div class="container">
				<?php if( !empty( $builderio_blog_post_title ) ): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( $builderio_blog_post_title );?></h2>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row">
				
					<?php if( $builderio_blog_post_count == '4' ){
								$size = 'col-lg-3';
					
							}elseif( $builderio_blog_post_count == '3' ){
								$size = 'col-lg-4';
							}elseif( $builderio_blog_post_count == '2' ){
								$size = 'col-lg-6';
							}else{
								$size = 'col-lg-12';
							}
					$args = array(
							'post_type' => 'post',
							'posts_per_page'        => absint( $builderio_blog_post_count ),
							'ignore_sticky_posts'   => true,
							'post_status'		   => 'publish',
							'cat'					=> absint( $builderio_blog_post_cat )
					);
					$post_query = new WP_Query( $args );
						
					if( $post_query->have_posts() ):
						while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
							
							<div class="<?php echo esc_attr( $size ); ?>">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="post-wrapper">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="post-thumbnail">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
											</div><!-- .post-thumbnail -->
										<?php endif; ?>
										<div class="post-content">
											<div class="post-inner-wrapper">
												<header class="entry-header">
													<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
												</header><!-- .entry-header -->
												<div class="entry-content">
													<p><?php printf( esc_html( wp_trim_words( get_the_content(), $builderio_blog_post_excerpt ) ) ); ?></p>
													<p class="read-more">
														<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-btn">
															<?php esc_html_e( 'Read More','builderio' );?>
															<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
														</a>
													</p>
												</div>
											</div>  
										</div>
									</div>
								</article>
							</div>
						
						<?php endwhile;
						
						wp_reset_postdata();
						 
					endif; ?>
					
				</div>
			</div>
		</section>
		<?php }
		
	} // end class - Builderio_Recent_Blog_Post
	
endif;

//our works
// start class - Builderio_Our_Works
if( !class_exists( 'Builderio_Our_Works' ) ) :

	class Builderio_Our_Works extends WP_Widget {
	
	    /**
	     * Sets up the widgets name etc
	     */
		public function __construct() {
			parent::__construct(
				'builderio_our_works', // Base ID
				esc_html__( 'Our Works - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'Our Works Post', 'builderio' ), ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		$builderio_our_works_title = ! empty( $instance['builderio_our_works_title'] ) ? $instance['builderio_our_works_title'] : '';
		$builderio_our_works_post_count = ! empty( $instance['builderio_our_works_post_count'] ) ? $instance['builderio_our_works_post_count'] : '';
		$builderio_our_works_post_cat = ! empty( $instance[ 'builderio_our_works_post_cat' ] ) ? $instance[ 'builderio_our_works_post_cat' ] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_our_works_title' ) ); ?>"><?php esc_attr_e( 'Title:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_our_works_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_our_works_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_our_works_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_our_works_post_cat' ) ); ?>"><?php esc_attr_e( 'Category:', 'builderio' ); ?></label>
			<?php
				$post_cat = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 0,
					'id'	=> $this->get_field_id( 'builderio_our_works_post_cat' ),
					'name'	=> $this->get_field_name( 'builderio_our_works_post_cat' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $builderio_our_works_post_cat ),
					'show_option_all'	=> esc_html__( 'Choose Category', 'builderio' )
				);
				wp_dropdown_categories( $post_cat );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_our_works_post_count' ) )?>"><?php esc_attr_e( 'Number Of Post: ', 'builderio' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'builderio_our_works_post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_our_works_post_count' ) ); ?>" value="<?php echo esc_attr( $builderio_our_works_post_count ); ?>" min="1" max="8" class="widefat">
		</p>
		
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['builderio_our_works_title'] = ( ! empty( $new_instance['builderio_our_works_title'] ) ) ? sanitize_text_field( $new_instance['builderio_our_works_title'] ) : '';
			$instance['builderio_our_works_post_count'] = ( ! empty( $new_instance['builderio_our_works_post_count'] ) ) ? absint( $new_instance['builderio_our_works_post_count'] ) : '';
			$instance[ 'builderio_our_works_post_cat' ] = absint( $new_instance[ 'builderio_our_works_post_cat' ] );
			
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $builderio_our_works_title = ! empty( $instance['builderio_our_works_title'] ) ? $instance['builderio_our_works_title'] : '';
		 $builderio_our_works_post_count = ! empty( $instance['builderio_our_works_post_count'] ) ? $instance['builderio_our_works_post_count'] : '';
		 $builderio_our_works_post_cat = ! empty( $instance[ 'builderio_our_works_post_cat' ] ) ? $instance[ 'builderio_our_works_post_cat' ] : '';
		
		?>
		
		<section class="builderio-our-works section-bg">
			<div class="container">
				<?php if( !empty( $builderio_our_works_title ) ): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( $builderio_our_works_title );?></h2>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row">
				
				<?php 
					$args = array(
							'post_type' => 'post',
							'posts_per_page'        => absint($builderio_our_works_post_count),
							'ignore_sticky_posts'   => true,
							'post_status'		   => 'publish',
							'cat'					=> absint($builderio_our_works_post_cat)
					);
					$item_query = new WP_Query( $args );
						
					if( $item_query->have_posts() ):
						while ( $item_query->have_posts() ) : $item_query->the_post(); ?>
							
							<div class="col-lg-3">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="post-wrapper">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="post-thumbnail">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
											</div><!-- .post-thumbnail -->
										<?php endif; ?>
										<div class="post-content">
											<header class="entry-header">
												<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
											</header><!-- .entry-header -->
										</div>
									</div>
								</article>
							</div>
						
						<?php endwhile;
						
						wp_reset_postdata();
						 
					endif; ?>
					
				</div>
			</div>
		</section>
		<?php }
		
	} // end class - Builderio_Our_Works
	
endif;  

if( !class_exists( 'Builderio_Our_Service' ) ):

	class Builderio_Our_Service extends WP_Widget{
		
		/**
	     * Sets up the widgets name etc
	     */
		 public function __construct(){
		 	parent::__construct(
				'builderio_our_service', // Base ID
				esc_html__( 'Our Service - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'Our Service Widget', 'builderio' ), ) // Args
			);
		 }
		  
		 /**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		 public function form( $instance ){
		 
		 	$builderio_service_section_title = ! empty( $instance['builderio_service_section_title'] ) ? $instance['builderio_service_section_title'] : '';
			$builderio_service_box_1 = ! empty( $instance['builderio_service_box_1'] ) ? $instance['builderio_service_box_1'] : '';
			$builderio_service_box_1_title = ! empty( $instance['builderio_service_box_1_title'] ) ? $instance['builderio_service_box_1_title'] : '';
			$builderio_service_box_1_title_url = ! empty( $instance['builderio_service_box_1_title_url'] ) ? $instance['builderio_service_box_1_title_url'] : '';
			$builderio_service_box_1_content = ! empty( $instance['builderio_service_box_1_content'] ) ? $instance['builderio_service_box_1_content'] : '';
			$builderio_service_box_1_icon = ! empty( $instance['builderio_service_box_1_icon'] ) ? $instance['builderio_service_box_1_icon'] : '';
			$builderio_service_box_2 = ! empty( $instance['builderio_service_box_2'] ) ? $instance['builderio_service_box_2'] : '';
			$builderio_service_box_2_title = ! empty( $instance['builderio_service_box_2_title'] ) ? $instance['builderio_service_box_2_title'] : '';
			$builderio_service_box_2_title_url = ! empty( $instance['builderio_service_box_2_title_url'] ) ? $instance['builderio_service_box_2_title_url'] : '';
			$builderio_service_box_2_content = ! empty( $instance['builderio_service_box_2_content'] ) ? $instance['builderio_service_box_2_content'] : '';
			$builderio_service_box_2_icon = ! empty( $instance['builderio_service_box_2_icon'] ) ? $instance['builderio_service_box_2_icon'] : '';
			$builderio_service_box_3 = ! empty( $instance['builderio_service_box_3'] ) ? $instance['builderio_service_box_3'] : '';
			$builderio_service_box_3_title = ! empty( $instance['builderio_service_box_3_title'] ) ? $instance['builderio_service_box_3_title'] : '';
			$builderio_service_box_3_title_url = ! empty( $instance['builderio_service_box_3_title_url'] ) ? $instance['builderio_service_box_3_title_url'] : '';
			$builderio_service_box_3_content = ! empty( $instance['builderio_service_box_3_content'] ) ? $instance['builderio_service_box_3_content'] : '';
			$builderio_service_box_3_icon = ! empty( $instance['builderio_service_box_3_icon'] ) ? $instance['builderio_service_box_3_icon'] : '';
			$builderio_service_box_4 = ! empty( $instance['builderio_service_box_4'] ) ? $instance['builderio_service_box_4'] : '';
			$builderio_service_box_4_title = ! empty( $instance['builderio_service_box_4_title'] ) ? $instance['builderio_service_box_4_title'] : '';
			$builderio_service_box_4_title_url = ! empty( $instance['builderio_service_box_4_title_url'] ) ? $instance['builderio_service_box_4_title_url'] : '';
			$builderio_service_box_4_content = ! empty( $instance['builderio_service_box_4_content'] ) ? $instance['builderio_service_box_4_content'] : '';
			$builderio_service_box_4_icon = ! empty( $instance['builderio_service_box_4_icon'] ) ? $instance['builderio_service_box_4_icon'] : '';
			$builderio_service_box_5 = ! empty( $instance['builderio_service_box_5'] ) ? $instance['builderio_service_box_5'] : '';
			$builderio_service_box_5_title = ! empty( $instance['builderio_service_box_5_title'] ) ? $instance['builderio_service_box_5_title'] : '';
			$builderio_service_box_5_title_url = ! empty( $instance['builderio_service_box_5_title_url'] ) ? $instance['builderio_service_box_5_title_url'] : '';
			$builderio_service_box_5_content = ! empty( $instance['builderio_service_box_5_content'] ) ? $instance['builderio_service_box_5_content'] : '';
			$builderio_service_box_5_icon = ! empty( $instance['builderio_service_box_5_icon'] ) ? $instance['builderio_service_box_5_icon'] : '';
			$builderio_service_box_6 = ! empty( $instance['builderio_service_box_6'] ) ? $instance['builderio_service_box_6'] : '';
			$builderio_service_box_6_title = ! empty( $instance['builderio_service_box_6_title'] ) ? $instance['builderio_service_box_6_title'] : '';
			$builderio_service_box_6_title_url = ! empty( $instance['builderio_service_box_6_title_url'] ) ? $instance['builderio_service_box_6_title_url'] : '';
			$builderio_service_box_6_content = ! empty( $instance['builderio_service_box_6_content'] ) ? $instance['builderio_service_box_6_content'] : '';
			$builderio_service_box_6_icon = ! empty( $instance['builderio_service_box_6_icon'] ) ? $instance['builderio_service_box_6_icon'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_section_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_section_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_section_title ); ?>">
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1' ) ); ?>"><?php esc_attr_e( 'Active Box 1:', 'builderio' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $builderio_service_box_1 ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_1' ) ); ?>" />
            </p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_title' ) ); ?>"><?php esc_attr_e( 'Box 1 Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_1_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_1_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_title_url' ) ); ?>"><?php esc_attr_e( 'Box 1 Title URL:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_1_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_service_box_1_title_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_content' ) ); ?>"><?php esc_attr_e( 'Box 1 Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_service_box_1_content') ); ?>"><?php echo esc_html( $builderio_service_box_1_content ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_icon' ) ); ?>"><?php esc_attr_e( 'Box 1 Icon:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_1_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_1_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_1_icon ); ?>">
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2' ) ); ?>"><?php esc_attr_e( 'Active Box 2:', 'builderio' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $builderio_service_box_2 ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_2' ) ); ?>" />
            </p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_title' ) ); ?>"><?php esc_attr_e( 'Box 2 Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_2_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_2_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_title_url' ) ); ?>"><?php esc_attr_e( 'Box 2 Title URL:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_2_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_service_box_2_title_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_content' ) ); ?>"><?php esc_attr_e( 'Box 2 Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_service_box_2_content') ); ?>"><?php echo esc_html( $builderio_service_box_2_content ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_icon' ) ); ?>"><?php esc_attr_e( 'Box 2 Icon:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_2_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_2_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_2_icon ); ?>">
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3' ) ); ?>"><?php esc_attr_e( 'Active Box 3:', 'builderio' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $builderio_service_box_3 ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_3' ) ); ?>" />
            </p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_title' ) ); ?>"><?php esc_attr_e( 'Box 3 Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_3_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_3_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_title_url' ) ); ?>"><?php esc_attr_e( 'Box 3 Title URL:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_3_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_service_box_3_title_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_content' ) ); ?>"><?php esc_attr_e( 'Box 3 Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_service_box_3_content') ); ?>"><?php echo esc_html( $builderio_service_box_3_content ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_icon' ) ); ?>"><?php esc_attr_e( 'Box 3 Icon:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_3_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_3_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_3_icon ); ?>">
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4' ) ); ?>"><?php esc_attr_e( 'Active Box 4:', 'builderio' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $builderio_service_box_4 ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_4' ) ); ?>" />
            </p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_title' ) ); ?>"><?php esc_attr_e( 'Box 4 Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_4_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_4_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_title_url' ) ); ?>"><?php esc_attr_e( 'Box 4 Title URL:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_4_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_service_box_4_title_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_content' ) ); ?>"><?php esc_attr_e( 'Box 4 Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_service_box_4_content') ); ?>"><?php echo esc_html( $builderio_service_box_4_content ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_icon' ) ); ?>"><?php esc_attr_e( 'Box 4 Icon:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_4_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_4_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_4_icon ); ?>">
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5' ) ); ?>"><?php esc_attr_e( 'Active Box 5:', 'builderio' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $builderio_service_box_5 ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_5' ) ); ?>" />
            </p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_title' ) ); ?>"><?php esc_attr_e( 'Box 5 Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_5_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_5_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_title_url' ) ); ?>"><?php esc_attr_e( 'Box 5 Title URL:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_5_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_service_box_5_title_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_content' ) ); ?>"><?php esc_attr_e( 'Box 5 Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_service_box_5_content') ); ?>"><?php echo esc_html( $builderio_service_box_5_content ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_icon' ) ); ?>"><?php esc_attr_e( 'Box 5 Icon:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_5_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_5_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_5_icon ); ?>">
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6' ) ); ?>"><?php esc_attr_e( 'Active Box 6:', 'builderio' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $builderio_service_box_6 ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_6' ) ); ?>" />
            </p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_title' ) ); ?>"><?php esc_attr_e( 'Box 6 Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_6_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_6_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_title_url' ) ); ?>"><?php esc_attr_e( 'Box 6 Title URL:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_6_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $builderio_service_box_6_title_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_content' ) ); ?>"><?php esc_attr_e( 'Box 6 Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_service_box_6_content') ); ?>"><?php echo esc_html( $builderio_service_box_6_content ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_icon' ) ); ?>"><?php esc_attr_e( 'Box 6 Icon:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_service_box_6_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_service_box_6_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_service_box_6_icon ); ?>">
			</p>
		 <?php }
		 
		 /**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		 public function update( $new_instance, $old_instance ) {
		 	$instance = array();
			$instance['builderio_service_section_title'] = ( ! empty( $new_instance['builderio_service_section_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_section_title'] ) : '';
			$instance['builderio_service_box_1'] = (bool) $new_instance['builderio_service_box_1'] ? 1 : 0;
			$instance['builderio_service_box_1_title'] = ( ! empty( $new_instance['builderio_service_box_1_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_1_title'] ) : '';
			$instance['builderio_service_box_1_title_url'] = ( ! empty( $new_instance['builderio_service_box_1_title_url'] ) ) ? esc_url_raw( $new_instance['builderio_service_box_1_title_url'] ) : '';
			$instance['builderio_service_box_1_content'] = ( ! empty( $new_instance['builderio_service_box_1_content'] ) ) ? sanitize_textarea_field( $new_instance['builderio_service_box_1_content'] ) : '';
			$instance['builderio_service_box_1_icon'] = ( ! empty( $new_instance['builderio_service_box_1_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_1_icon'] ) : '';
			$instance['builderio_service_box_2'] = (bool) $new_instance['builderio_service_box_2'] ? 1 : 0;
			$instance['builderio_service_box_2_title'] = ( ! empty( $new_instance['builderio_service_box_2_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_2_title'] ) : '';
			$instance['builderio_service_box_2_title_url'] = ( ! empty( $new_instance['builderio_service_box_2_title_url'] ) ) ? esc_url_raw( $new_instance['builderio_service_box_2_title_url'] ) : '';
			$instance['builderio_service_box_2_content'] = ( ! empty( $new_instance['builderio_service_box_2_content'] ) ) ? sanitize_textarea_field( $new_instance['builderio_service_box_2_content'] ) : '';
			$instance['builderio_service_box_2_icon'] = ( ! empty( $new_instance['builderio_service_box_2_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_2_icon'] ) : '';
			$instance['builderio_service_box_3'] = (bool) $new_instance['builderio_service_box_3'] ? 1 : 0;
			$instance['builderio_service_box_3_title'] = ( ! empty( $new_instance['builderio_service_box_3_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_3_title'] ) : '';
			$instance['builderio_service_box_3_title_url'] = ( ! empty( $new_instance['builderio_service_box_3_title_url'] ) ) ? esc_url_raw( $new_instance['builderio_service_box_3_title_url'] ) : '';
			$instance['builderio_service_box_3_content'] = ( ! empty( $new_instance['builderio_service_box_3_content'] ) ) ? sanitize_textarea_field( $new_instance['builderio_service_box_3_content'] ) : '';
			$instance['builderio_service_box_3_icon'] = ( ! empty( $new_instance['builderio_service_box_3_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_3_icon'] ) : '';
			$instance['builderio_service_box_4'] = (bool) $new_instance['builderio_service_box_4'] ? 1 : 0;
			$instance['builderio_service_box_4_title'] = ( ! empty( $new_instance['builderio_service_box_4_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_4_title'] ) : '';
			$instance['builderio_service_box_4_title_url'] = ( ! empty( $new_instance['builderio_service_box_4_title_url'] ) ) ? esc_url_raw( $new_instance['builderio_service_box_4_title_url'] ) : '';
			$instance['builderio_service_box_4_content'] = ( ! empty( $new_instance['builderio_service_box_4_content'] ) ) ? sanitize_textarea_field( $new_instance['builderio_service_box_4_content'] ) : '';
			$instance['builderio_service_box_4_icon'] = ( ! empty( $new_instance['builderio_service_box_4_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_4_icon'] ) : '';
			$instance['builderio_service_box_5'] = (bool) $new_instance['builderio_service_box_5'] ? 1 : 0;
			$instance['builderio_service_box_5_title'] = ( ! empty( $new_instance['builderio_service_box_5_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_5_title'] ) : '';
			$instance['builderio_service_box_5_title_url'] = ( ! empty( $new_instance['builderio_service_box_5_title_url'] ) ) ? esc_url_raw( $new_instance['builderio_service_box_5_title_url'] ) : '';
			$instance['builderio_service_box_5_content'] = ( ! empty( $new_instance['builderio_service_box_5_content'] ) ) ? sanitize_textarea_field( $new_instance['builderio_service_box_5_content'] ) : '';
			$instance['builderio_service_box_5_icon'] = ( ! empty( $new_instance['builderio_service_box_5_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_5_icon'] ) : '';
			$instance['builderio_service_box_6'] = (bool) $new_instance['builderio_service_box_6'] ? 1 : 0;
			$instance['builderio_service_box_6_title'] = ( ! empty( $new_instance['builderio_service_box_6_title'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_6_title'] ) : '';
			$instance['builderio_service_box_6_title_url'] = ( ! empty( $new_instance['builderio_service_box_6_title_url'] ) ) ? esc_url_raw( $new_instance['builderio_service_box_6_title_url'] ) : '';
			$instance['builderio_service_box_6_content'] = ( ! empty( $new_instance['builderio_service_box_6_content'] ) ) ? sanitize_textarea_field( $new_instance['builderio_service_box_6_content'] ) : '';
			$instance['builderio_service_box_6_icon'] = ( ! empty( $new_instance['builderio_service_box_6_icon'] ) ) ? sanitize_text_field( $new_instance['builderio_service_box_6_icon'] ) : '';
			
			return $instance;
		 }
		 
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		  public function widget( $args, $instance ) {
		  
		  	$builderio_service_section_title = ! empty( $instance['builderio_service_section_title'] ) ? $instance['builderio_service_section_title'] : '';
			$builderio_service_box_1 = ! empty( $instance['builderio_service_box_1'] ) ? $instance['builderio_service_box_1'] : '';
			$builderio_service_box_1_title = ! empty( $instance['builderio_service_box_1_title'] ) ? $instance['builderio_service_box_1_title'] : '';
			$builderio_service_box_1_title_url = ! empty( $instance['builderio_service_box_1_title_url'] ) ? $instance['builderio_service_box_1_title_url'] : '';
			$builderio_service_box_1_content = ! empty( $instance['builderio_service_box_1_content'] ) ? $instance['builderio_service_box_1_content'] : '';
			$builderio_service_box_1_icon = ! empty( $instance['builderio_service_box_1_icon'] ) ? $instance['builderio_service_box_1_icon'] : '';
			$builderio_service_box_2 = ! empty( $instance['builderio_service_box_2'] ) ? $instance['builderio_service_box_2'] : '';
			$builderio_service_box_2_title = ! empty( $instance['builderio_service_box_2_title'] ) ? $instance['builderio_service_box_2_title'] : '';
			$builderio_service_box_2_title_url = ! empty( $instance['builderio_service_box_2_title_url'] ) ? $instance['builderio_service_box_2_title_url'] : '';
			$builderio_service_box_2_content = ! empty( $instance['builderio_service_box_2_content'] ) ? $instance['builderio_service_box_2_content'] : '';
			$builderio_service_box_2_icon = ! empty( $instance['builderio_service_box_2_icon'] ) ? $instance['builderio_service_box_2_icon'] : '';
			$builderio_service_box_3 = ! empty( $instance['builderio_service_box_3'] ) ? $instance['builderio_service_box_3'] : '';
			$builderio_service_box_3_title = ! empty( $instance['builderio_service_box_3_title'] ) ? $instance['builderio_service_box_3_title'] : '';
			$builderio_service_box_3_title_url = ! empty( $instance['builderio_service_box_3_title_url'] ) ? $instance['builderio_service_box_3_title_url'] : '';
			$builderio_service_box_3_content = ! empty( $instance['builderio_service_box_3_content'] ) ? $instance['builderio_service_box_3_content'] : '';
			$builderio_service_box_3_icon = ! empty( $instance['builderio_service_box_3_icon'] ) ? $instance['builderio_service_box_3_icon'] : '';
			$builderio_service_box_4 = ! empty( $instance['builderio_service_box_4'] ) ? $instance['builderio_service_box_4'] : '';
			$builderio_service_box_4_title = ! empty( $instance['builderio_service_box_4_title'] ) ? $instance['builderio_service_box_4_title'] : '';
			$builderio_service_box_4_title_url = ! empty( $instance['builderio_service_box_4_title_url'] ) ? $instance['builderio_service_box_4_title_url'] : '';
			$builderio_service_box_4_content = ! empty( $instance['builderio_service_box_4_content'] ) ? $instance['builderio_service_box_4_content'] : '';
			$builderio_service_box_4_icon = ! empty( $instance['builderio_service_box_4_icon'] ) ? $instance['builderio_service_box_4_icon'] : '';
			$builderio_service_box_5 = ! empty( $instance['builderio_service_box_5'] ) ? $instance['builderio_service_box_5'] : '';
			$builderio_service_box_5_title = ! empty( $instance['builderio_service_box_5_title'] ) ? $instance['builderio_service_box_5_title'] : '';
			$builderio_service_box_5_title_url = ! empty( $instance['builderio_service_box_5_title_url'] ) ? $instance['builderio_service_box_5_title_url'] : '';
			$builderio_service_box_5_content = ! empty( $instance['builderio_service_box_5_content'] ) ? $instance['builderio_service_box_5_content'] : '';
			$builderio_service_box_5_icon = ! empty( $instance['builderio_service_box_5_icon'] ) ? $instance['builderio_service_box_5_icon'] : '';
			$builderio_service_box_6 = ! empty( $instance['builderio_service_box_6'] ) ? $instance['builderio_service_box_6'] : '';
			$builderio_service_box_6_title = ! empty( $instance['builderio_service_box_6_title'] ) ? $instance['builderio_service_box_6_title'] : '';
			$builderio_service_box_6_title_url = ! empty( $instance['builderio_service_box_6_title_url'] ) ? $instance['builderio_service_box_6_title_url'] : '';
			$builderio_service_box_6_content = ! empty( $instance['builderio_service_box_6_content'] ) ? $instance['builderio_service_box_6_content'] : '';
			$builderio_service_box_6_icon = ! empty( $instance['builderio_service_box_6_icon'] ) ? $instance['builderio_service_box_6_icon'] : '';
		 ?>
		 <section class="builderio-service-section featurebox section-bg pb-55">
		 	<div class="container">
				<?php if( !empty( $builderio_service_section_title ) ): ?>
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center">
									<?php echo esc_html( $builderio_service_section_title ); ?>
								</h2>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row featurebox-inner-wrap">
					<?php if( $builderio_service_box_1 ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="featurebox-wrapper text-center">
								<?php if( !empty( $builderio_service_box_1_icon ) ): ?>
									<div class="featurebox-icon">
										<i class="<?php echo esc_attr( $builderio_service_box_1_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_1_title ) ): ?>
									<div class="featurebox-title">
										<?php if(!empty( $builderio_service_box_1_title_url )): ?>
										<h5 class="title">
											<a href="<?php echo esc_url( $builderio_service_box_1_title_url ); ?>">
												<?php echo esc_html( $builderio_service_box_1_title ); ?>
											</a>
										</h5>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_1_content ) ): ?>
									<div class="featurebox-content">
										<p class="content"><?php echo esc_html( $builderio_service_box_1_content );?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if( $builderio_service_box_2 ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="featurebox-wrapper text-center">
								<?php if( !empty( $builderio_service_box_2_icon ) ): ?>
									<div class="featurebox-icon">
										<i class="<?php echo esc_attr( $builderio_service_box_2_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_2_title ) ): ?>
									<div class="featurebox-title">
										<?php if(!empty( $builderio_service_box_2_title_url )): ?>
										<h5 class="title">
											<a href="<?php echo esc_url( $builderio_service_box_2_title_url ); ?>">
												<?php echo esc_html( $builderio_service_box_2_title ); ?>
											</a>
										</h5>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_2_content ) ): ?>
									<div class="featurebox-content">
										<p class="content"><?php echo esc_html( $builderio_service_box_2_content );?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if( $builderio_service_box_3 ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="featurebox-wrapper text-center">
								<?php if( !empty( $builderio_service_box_3_icon ) ): ?>
									<div class="featurebox-icon">
										<i class="<?php echo esc_attr( $builderio_service_box_3_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_3_title ) ): ?>
									<div class="featurebox-title">
										<?php if(!empty( $builderio_service_box_3_title_url )): ?>
										<h5 class="title">
											<a href="<?php echo esc_url( $builderio_service_box_3_title_url ); ?>">
												<?php echo esc_html( $builderio_service_box_3_title ); ?>
											</a>
										</h5>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_3_content ) ): ?>
									<div class="featurebox-content">
										<p class="content"><?php echo esc_html( $builderio_service_box_3_content );?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if( $builderio_service_box_4 ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="featurebox-wrapper text-center">
								<?php if( !empty( $builderio_service_box_4_icon ) ): ?>
									<div class="featurebox-icon">
										<i class="<?php echo esc_attr( $builderio_service_box_4_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_4_title ) ): ?>
									<div class="featurebox-title">
										<?php if(!empty( $builderio_service_box_4_title_url )): ?>
										<h5 class="title">
											<a href="<?php echo esc_url( $builderio_service_box_4_title_url ); ?>">
												<?php echo esc_html( $builderio_service_box_4_title ); ?>
											</a>
										</h5>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_4_content ) ): ?>
									<div class="featurebox-content">
										<p class="content"><?php echo esc_html( $builderio_service_box_4_content );?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if( $builderio_service_box_5 ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="featurebox-wrapper text-center">
								<?php if( !empty( $builderio_service_box_5_icon ) ): ?>
									<div class="featurebox-icon">
										<i class="<?php echo esc_attr( $builderio_service_box_5_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_5_title ) ): ?>
									<div class="featurebox-title">
										<?php if(!empty( $builderio_service_box_5_title_url )): ?>
										<h5 class="title">
											<a href="<?php echo esc_url( $builderio_service_box_5_title_url ); ?>">
												<?php echo esc_html( $builderio_service_box_5_title ); ?>
											</a>
										</h5>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_5_content ) ): ?>
									<div class="featurebox-content">
										<p class="content"><?php echo esc_html( $builderio_service_box_5_content );?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if( $builderio_service_box_6 ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="featurebox-wrapper text-center">
								<?php if( !empty( $builderio_service_box_6_icon ) ): ?>
									<div class="featurebox-icon">
										<i class="<?php echo esc_attr( $builderio_service_box_6_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_6_title ) ): ?>
									<div class="featurebox-title">
										<?php if(!empty( $builderio_service_box_6_title_url )): ?>
										<h5 class="title">
											<a href="<?php echo esc_url( $builderio_service_box_6_title_url ); ?>">
												<?php echo esc_html( $builderio_service_box_6_title ); ?>
											</a>
										</h5>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $builderio_service_box_6_content ) ): ?>
									<div class="featurebox-content">
										<p class="content"><?php echo esc_html( $builderio_service_box_6_content );?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		 </section>
		 <?php }
	} 
endif;

if( !class_exists( 'Builderio_Aboutus' ) ):

	class Builderio_Aboutus extends WP_Widget{
		/**
	     * Sets up the widgets name etc
	     */
		 public function __construct(){
		 	parent::__construct(
				'builderio_aboutus', // Base ID
				esc_html__( 'About Us - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'About Us Widget', 'builderio' ), ) // Args
			);
		 }
		  
		 /**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		 public function form( $instance ){
		 
		 	$builderio_aboutus_section_title = ! empty( $instance['builderio_aboutus_section_title'] ) ? $instance['builderio_aboutus_section_title'] : '';
			$builderio_aboutus_content = ! empty( $instance['builderio_aboutus_content'] ) ? $instance['builderio_aboutus_content'] : '';
			$builderio_signature_image = ! empty( $instance['builderio_signature_image'] ) ? $instance['builderio_signature_image'] : '';
			$builderio_designation = ! empty( $instance['builderio_designation'] ) ? $instance['builderio_designation'] : '';
			$builderio_abt_right_image = ! empty( $instance['builderio_abt_right_image'] ) ? $instance['builderio_abt_right_image'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_aboutus_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_aboutus_section_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_aboutus_section_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_aboutus_section_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_aboutus_content' ) ); ?>"><?php esc_attr_e( 'Content:', 'builderio' ); ?></label> 
				<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'builderio_aboutus_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('builderio_aboutus_content') ); ?>"><?php echo stripslashes( $builderio_aboutus_content ); ?></textarea>
			</p>
			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_signature_image' ) ); ?>"><?php esc_attr_e( 'Upload Signature Image:', 'builderio' ); ?></label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'builderio_signature_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'builderio_signature_image' ) ); ?>" value="<?php echo esc_url( $builderio_signature_image ); ?>" />
               
                <input type="button" class="select-img button button-primary builderio-upload-btn" value="<?php esc_attr_e( 'Upload', 'builderio' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'builderio' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'builderio' ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Remove', 'builderio' ); ?>" class="button button-secondary btn-image-remove builderio-remove-btn"/>
            </div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_designation' ) ); ?>"><?php esc_attr_e( 'Designation:', 'builderio' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_designation' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_designation' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_designation ); ?>">
			</p>
			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'builderio_abt_right_image' ) ); ?>"><?php esc_attr_e( 'Upload Right Side Image:', 'builderio' ); ?></label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'builderio_abt_right_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'builderio_abt_right_image' ) ); ?>" value="<?php echo esc_url( $builderio_abt_right_image ); ?>" />
               
                <input type="button" class="select-img button button-primary builderio-upload-btn" value="<?php esc_attr_e( 'Upload', 'builderio' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'builderio' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'builderio' ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Remove', 'builderio' ); ?>" class="button button-secondary btn-image-remove builderio-remove-btn"/>
            </div>
		 <?php }
		 
		 /**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		 public function update( $new_instance, $old_instance ) {
		 	$instance = array();
			$instance['builderio_aboutus_section_title'] = ( ! empty( $new_instance['builderio_aboutus_section_title'] ) ) ? sanitize_text_field( $new_instance['builderio_aboutus_section_title'] ) : '';
			$instance['builderio_aboutus_content'] = ( ! empty( $new_instance['builderio_aboutus_content'] ) ) ? stripslashes( $new_instance['builderio_aboutus_content'] ) : '';
			$instance['builderio_signature_image'] = ( ! empty( $new_instance['builderio_signature_image'] ) ) ? esc_url_raw( $new_instance['builderio_signature_image'] ) : '';
			$instance['builderio_designation'] = ( ! empty( $new_instance['builderio_designation'] ) ) ? sanitize_text_field( $new_instance['builderio_designation'] ) : '';
			$instance['builderio_abt_right_image'] = ( ! empty( $new_instance['builderio_abt_right_image'] ) ) ? esc_url_raw( $new_instance['builderio_abt_right_image'] ) : '';
			return $instance;
		 }
		 
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		  public function widget( $args, $instance ) {
		  
		  	$builderio_aboutus_section_title = ! empty( $instance['builderio_aboutus_section_title'] ) ? $instance['builderio_aboutus_section_title'] : '';
			$builderio_aboutus_content = ! empty( $instance['builderio_aboutus_content'] ) ? $instance['builderio_aboutus_content'] : '';
			$builderio_signature_image = ! empty( $instance['builderio_signature_image'] ) ? $instance['builderio_signature_image'] : '';
			$builderio_designation = ! empty( $instance['builderio_designation'] ) ? $instance['builderio_designation'] : '';
			$builderio_abt_right_image = ! empty( $instance['builderio_abt_right_image'] ) ? $instance['builderio_abt_right_image'] : '';
		 ?>
		 <section class="builderio-aboutus-section">
		 	<div class="container">
				<?php if( !empty( $builderio_aboutus_section_title ) ): ?>
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center">
									<?php echo esc_html( $builderio_aboutus_section_title ); ?>
								</h2>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-lg-6">
						<div class="section-description">
							<?php if( !empty( $builderio_aboutus_content ) ): ?>
								<div class="content">
									<?php echo stripslashes( $builderio_aboutus_content );?>
								</div>
							<?php endif; ?>
						</div>
						<?php if( !empty( $builderio_signature_image ) ): ?>
							<div class="signature">
								<img src="<?php echo esc_url( $builderio_signature_image ); ?>" alt="<?php esc_attr_e( 'aboutimage', 'builderio');?>" class="img-responsive" />
							</div>
						<?php endif; ?>
						<?php if( !empty( $builderio_designation ) ): ?>
							<div class="designation"><p><?php echo esc_html( $builderio_designation ); ?></p></div>
						<?php endif; ?>
					</div>
					<div class="col-lg-6">
						<div class="right-side-wrap">
							<div class="single-image">
								<img src="<?php echo esc_url( $builderio_abt_right_image ); ?>" alt="<?php esc_attr_e( 'aboutimage', 'builderio');?>" class="img-responsive" />
							</div>
						</div>
					</div>
				</div>
			</div>
		 </section>
		 <?php }
	}
endif;

//recent blog post
// start class - Builderio_Testimonial
if( !class_exists( 'Builderio_Testimonial' ) ) :

	class Builderio_Testimonial extends WP_Widget {
	
	    /**
	     * Sets up the widgets name etc
	     */
		public function __construct() {
			parent::__construct(
				'builderio_testimonial', // Base ID
				esc_html__( 'Testimonial - Builderio', 'builderio' ), // Name
				array( 'description' => esc_html__( 'Testimonial', 'builderio' ), ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		$builderio_testimonial_section_title = ! empty( $instance['builderio_testimonial_section_title'] ) ? $instance['builderio_testimonial_section_title'] : '';
		$builderio_testmonial_item_count = ! empty( $instance['builderio_testmonial_item_count'] ) ? $instance['builderio_testmonial_item_count'] : '';
		$builderio_testimonial_post_cat = ! empty( $instance[ 'builderio_testimonial_post_cat' ] ) ? $instance[ 'builderio_testimonial_post_cat' ] : '';
		$builderio_testimonial_post_excerpt = ! empty( $instance[ 'builderio_testimonial_post_excerpt' ] ) ? absint( $instance[ 'builderio_testimonial_post_excerpt' ] ) : 20;
		$builderio_testimonial_navigation = ! empty( $instance[ 'builderio_testimonial_navigation' ] ) ? absint( $instance[ 'builderio_testimonial_navigation' ] ) : ''; 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'builderio' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_section_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_testimonial_section_title' ) ); ?>" type="text" value="<?php echo esc_attr( $builderio_testimonial_section_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_post_cat' ) ); ?>"><?php esc_attr_e( 'Category:', 'builderio' ); ?></label>
			<?php
				$post_cat = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 0,
					'id'	=> $this->get_field_id( 'builderio_testimonial_post_cat' ),
					'name'	=> $this->get_field_name( 'builderio_testimonial_post_cat' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $builderio_testimonial_post_cat ),
					'show_option_all'	=> esc_html__( 'Choose Category', 'builderio' )
				);
				wp_dropdown_categories( $post_cat );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_testmonial_item_count' ) )?>"><?php esc_attr_e( 'Item Display: ', 'builderio' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'builderio_testmonial_item_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_testmonial_item_count' ) ); ?>" value="<?php echo esc_attr( $builderio_testmonial_item_count ); ?>" min="1" max="4" class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_post_excerpt' ) )?>"><?php esc_attr_e( 'Excerpt: ', 'builderio' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_post_excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_testimonial_post_excerpt' ) ); ?>" value="<?php echo esc_attr( $builderio_testimonial_post_excerpt ); ?>" min="1" max="50" class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_navigation' ) ); ?>"><?php esc_attr_e( 'Active Navigation:', 'builderio' ); ?></label>
			<input class="checkbox" type="checkbox" <?php checked( $builderio_testimonial_navigation ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'builderio_testimonial_navigation' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'builderio_testimonial_navigation' ) ); ?>" />
		</p>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['builderio_testimonial_section_title'] = ( ! empty( $new_instance['builderio_testimonial_section_title'] ) ) ? sanitize_text_field( $new_instance['builderio_testimonial_section_title'] ) : '';
			$instance['builderio_testmonial_item_count'] = ( ! empty( $new_instance['builderio_testmonial_item_count'] ) ) ? absint( $new_instance['builderio_testmonial_item_count'] ) : '';
			$instance[ 'builderio_testimonial_post_cat' ] = absint( $new_instance[ 'builderio_testimonial_post_cat' ] );
			$instance[ 'builderio_testimonial_post_excerpt' ] = absint( $new_instance[ 'builderio_testimonial_post_excerpt' ] );
			$instance['builderio_testimonial_navigation'] = (bool) $new_instance['builderio_testimonial_navigation'] ? 1 : 0;
			
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $builderio_testimonial_section_title = ! empty( $instance['builderio_testimonial_section_title'] ) ? $instance['builderio_testimonial_section_title'] : '';
		 $builderio_testmonial_item_count = ! empty( $instance['builderio_testmonial_item_count'] ) ? $instance['builderio_testmonial_item_count'] : '';
		 $builderio_testimonial_post_cat = ! empty( $instance[ 'builderio_testimonial_post_cat' ] ) ? $instance[ 'builderio_testimonial_post_cat' ] : '';
		 $builderio_testimonial_post_excerpt = ! empty( $instance[ 'builderio_testimonial_post_excerpt' ] ) ? absint( $instance[ 'builderio_testimonial_post_excerpt' ] ) : 20;
		 $builderio_testimonial_navigation = ! empty( $instance[ 'builderio_testimonial_navigation' ] ) ? absint( $instance[ 'builderio_testimonial_navigation' ] ) : '';
		?>
		
		<section class="builderio-testimonial section-bg">
			<div class="container">
				<?php if( !empty( $builderio_testimonial_section_title ) ): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( $builderio_testimonial_section_title );?></h2>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-lg-12">
					<?php $nav_status = $builderio_testimonial_navigation ? $builderio_testimonial_navigation : '0';
						  $item_count = $builderio_testmonial_item_count ? $builderio_testmonial_item_count : '1';  
						$args = array(
							'post_type' => 'post',
							'posts_per_page'        => 4,
							'ignore_sticky_posts'   => true,
							'post_status'		   => 'publish',
							'cat'					=> absint( $builderio_testimonial_post_cat )
						);
						$post_query = new WP_Query( $args );
						
						if( $post_query->have_posts() ): ?>
						<div class="client-post owl-carousel owl-theme" client-nav="<?php echo esc_attr( $nav_status );?>" client-item="<?php echo esc_attr( $item_count ); ?>">
							<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
								
								
									<div class="client-item">
										<div class="client-wrapper">
											<?php if ( has_post_thumbnail() ) : ?>
												<div class="client-thumbnail">
													<?php the_post_thumbnail('builderio-thumbnail-avatar', array( 'class' => 'rounded-circle' ) ); ?>
												</div><!-- .post-thumbnail -->
											<?php endif; ?>
											<div class="client-content-wrap text-center">
											<?php the_title( '<h5 class="client-name">', '</h5>' ); ?>
												<div class="client-comment">
													<?php the_content(); ?>
												</div>
											</div>  
										</div>
									</div>
							
								<?php endwhile;
							
								wp_reset_postdata();
							 
							endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php }
		
	} // end class - Builderio_Testimonial
	
endif;
?>
