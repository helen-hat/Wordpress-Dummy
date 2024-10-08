<?php
///----Blog widgets---
//Latest News
class Sinco_Latest_News extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Sinco_Latest_News', /* Name */esc_html__('Sinco Latest News', 'sinco'), array( 'description' => esc_html__('Show the Footer Latest News', 'sinco')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

		<!--Start Single Sidebar Box-->
        <div class="news-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <!-- Footer Column -->
            <div class="widget-content">
                <?php $query_string = array('showposts'=>$instance['number']);
					if ($instance['cat']) {
						$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
					}
					$this->posts($query_string); 
				?>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Latest News', 'sinco');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'sinco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'sinco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'sinco'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'sinco'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php
                global $post;
				while ($query->have_posts()): $query->the_post();
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <div class="post">
                <div class="thumb" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>)"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"></a></div>
                <h6><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h6>
                <span class="date"><?php echo get_the_date(); ?></span>
            </div>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}


///----Service Sidebar widgets----
//Service Quote Info
class Sinco_Service_Quote_Info extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Sinco_Service_Quote_Info', /* Name */esc_html__('Sinco Service Quote Info','sinco'), array( 'description' => esc_html__('Show the Service Quote Info', 'sinco' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="sidebar-quote mb-50">
                <ul class="style-none d-flex justify-content-center rating">
                    <?php
					$ratting =  $instance['select_rating']; 
					for ($x = 1; $x <= 5; $x++) {
						if($x <= $ratting) echo '<li><i class="bi bi-star-fill"></i></li>'; else echo '<li><i class="bi bi-star"></i></li>'; 
						}
					?>
                </ul>
                <p><?php echo wp_kses_post($instance['content']); ?></p>
                <div class="name"><?php echo wp_kses_post($instance['author_title']); ?>, <span><?php echo wp_kses_post($instance['author_designation']); ?></span></div>
            </div> 
                           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['select_rating'] = strip_tags($new_instance['select_rating']);
		$instance['content'] = $new_instance['content'];
		$instance['author_title'] = $new_instance['author_title'];
		$instance['author_designation'] = $new_instance['author_designation'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$select_rating = ($instance) ? esc_attr($instance['select_rating']) : '4';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$author_title = ($instance) ? esc_attr($instance['author_title']) : '';
		$author_designation = ($instance) ? esc_attr($instance['author_designation']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('select_rating')); ?>"><?php esc_html_e('No. of Rating:', 'sinco'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('select_rating')); ?>" name="<?php echo esc_attr($this->get_field_name('select_rating')); ?>" type="text" value="<?php echo esc_attr($select_rating); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'sinco'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_title')); ?>"><?php esc_html_e('Author Title:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('Rashed Kabir', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('author_title')); ?>" name="<?php echo esc_attr($this->get_field_name('author_title')); ?>" type="text" value="<?php echo esc_attr($author_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_designation')); ?>"><?php esc_html_e('Author Designation:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('Designer', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('author_designation')); ?>" name="<?php echo esc_attr($this->get_field_name('author_designation')); ?>" type="text" value="<?php echo esc_attr($author_designation); ?>" />
        </p>     
                
		<?php 
	}
	
}

//Download Brochure
class Sinco_Download_Brochure extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Sinco_Download_Brochure', /* Name */esc_html__('Sinco Download Brochure','sinco'), array( 'description' => esc_html__('Show the Download Brochure', 'sinco' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
		<div class="download-btn-group">
            <?php if($instance['pdf_file_title'] || $instance['pdf_file_link'] ){ ?>
            <a href="<?php echo esc_url($instance['pdf_file_link']); ?>" class="d-flex tran3s mb-15">
                <i class="bi bi-file-earmark-pdf"></i>
                <span><?php echo wp_kses_post($instance['pdf_file_title']); ?></span>
            </a>
            <?php } ?>
            <?php if($instance['doc_file_title'] || $instance['doc_file_link'] ){ ?>
            <a href="<?php echo esc_url($instance['doc_file_link']); ?>" class="d-flex tran3s mb-15">
                <i class="bi bi-file-earmark-text"></i>
                <span><?php echo wp_kses_post($instance['doc_file_title']); ?></span>
            </a>
            <?php } ?>
        </div>
                             
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['pdf_file_title'] = strip_tags($new_instance['pdf_file_title']);
		$instance['pdf_file_link'] = $new_instance['pdf_file_link'];
		$instance['doc_file_title'] = $new_instance['doc_file_title'];
		$instance['doc_file_link'] = $new_instance['doc_file_link'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$pdf_file_title = ($instance) ? esc_attr($instance['pdf_file_title']) : 'Download PDF';
		$pdf_file_link = ($instance) ? esc_attr($instance['pdf_file_link']) : '#';
		$doc_file_title = ($instance) ? esc_attr($instance['doc_file_title']) : 'Company Report';
		$doc_file_link = ($instance) ? esc_attr($instance['doc_file_link']) : '#';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_title')); ?>"><?php esc_html_e('Enter PDF File Title:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('Download PDF', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_title')); ?>" type="text" value="<?php echo esc_attr($pdf_file_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_link')); ?>"><?php esc_html_e('Enter PDF Link:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_link')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_link')); ?>" type="text" value="<?php echo esc_attr($pdf_file_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('doc_file_title')); ?>"><?php esc_html_e('Enter DOC File Title:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('Company Report', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('doc_file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('doc_file_title')); ?>" type="text" value="<?php echo esc_attr($doc_file_title); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('doc_file_link')); ?>"><?php esc_html_e('DOC File Link:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('doc_file_link')); ?>" name="<?php echo esc_attr($this->get_field_name('doc_file_link')); ?>" type="text" value="<?php echo esc_attr($doc_file_link); ?>" />
        </p>
               
                
		<?php 
	}
	
}



///----footer widgets---
//About Company
class Sinco_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Sinco_About_Company', /* Name */esc_html__('Sinco About Company','sinco'), array( 'description' => esc_html__('Show the About Company', 'sinco' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="footer-intro mb-40">
                <?php if($instance['widget_logo_img']){ ?>
                <div class="logo">
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                		<img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" width="130">
                    </a>
                </div>
                <?php } ?>
                <p><?php echo wp_kses_post($instance['content']); ?></p>
                
                <?php if( $instance['show'] ): ?>
                	<?php echo wp_kses_post(sinco_get_social_icon()); ?>
                <?php endif; ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Enter Logo Image:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'sinco'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'sinco'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>             
                
		<?php 
	}
	
}

//Subscribe Us
class Sinco_Subscribe_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Sinco_Subscribe_Us', /* Name */esc_html__('Sinco Subscribe Us','sinco'), array( 'description' => esc_html__('Show the Subscribe Us', 'sinco' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Start Single Sidebar Box-->
            <div class="newsletter">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <p><?php echo wp_kses_post($instance['form_text']); ?></p>
                <?php echo do_shortcode($instance['form_url']); ?>
            </div> <!-- /.newsletter -->
                        
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['form_text'] = strip_tags($new_instance['form_text']);
		$instance['form_url'] = $new_instance['form_url'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe Us';
		$form_text = ($instance) ? esc_attr($instance['form_text']) : '';
		$form_url = ($instance) ? esc_attr($instance['form_url']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_text')); ?>"><?php esc_html_e('Description:', 'sinco'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('form_text')); ?>" name="<?php echo esc_attr($this->get_field_name('form_text')); ?>" ><?php echo wp_kses_post($form_text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url')); ?>"><?php esc_html_e('Mail Chimp Form Url:', 'sinco'); ?></label>
            <input placeholder="<?php esc_attr_e('MailChimp Form Url', 'sinco');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url')); ?>" type="text" value="<?php echo esc_attr($form_url); ?>" />
        </p>
               
		<?php 
	}
	
}