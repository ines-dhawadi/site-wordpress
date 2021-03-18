<?php
/**
 * Popular Posts Widget
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

if ( ! class_exists( 'Great_News_Popular_Post' ) ) :

     
    class Great_News_Popular_Post extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $tp_widget_popular_post = array(
                'classname'   => 'widget_popular_news',
                'description' => esc_html__( 'Retrive popular posts.', 'greatnews' ),
            );
            parent::__construct( 'great_news_popular_post', esc_html__( 'TP : Popular Posts', 'greatnews' ), $tp_widget_popular_post );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $tp_title  = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
            $tp_title  = apply_filters( 'widget_title', $tp_title, $instance, $this->id_base );
            $tp_number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $tp_category = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
            ?>

            <section id="popular-news-1" class="widget widget_popular_news">
                <div class="widget-header">
                    <h2 class="widget-title"><?php echo esc_html( $tp_title ) ;?></h2>
                </div><!-- .widget-header -->
                <ul>
                <?php
                $popular_args = array(
                 'post_type'         => 'post',
                 'posts_per_page'    => absint( $tp_number ),
                 'order'             => 'DESC',
                 'cat'               => absint( $tp_category ),
                 );
                $wp_query = new WP_Query( $popular_args );
                if ( $wp_query->have_posts() ) : 
                     $count = 1;
                while ( $wp_query->have_posts() ) : $wp_query->the_post();
                $image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';
                 ?>

                    <li>
                        <span class="post-number"><?php echo $count++; ?></span>
                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>

                            <div class="entry-meta">
                                <?php great_news_posted_on(); ?>

                                <span class="cat-links">
                                     <?php the_category(''); ?>
                                </span><!-- .cat-links -->
                            </div>
                        </div><!-- .entry-container -->
                    </li>
                <?php endwhile; 
                wp_reset_postdata();
                endif;
                ?>

                </ul>
            </section>
<?php
}

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $tp_title      = isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Popular Posts', 'greatnews' );
            $tp_number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $tp_category   = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
           ?>

           <p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'greatnews' ); ?></label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $tp_title ); ?>" />
           </p>

           <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'greatnews' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="10" value="<?php echo absint( $tp_number ); ?>" size="3" />
           </p>

           <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'greatnews' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;">

                    <?php 
                    $categories = great_news_category_choices();
                    foreach($categories as $category => $value) { ?>
                    <option value="<?php echo absint( $category ); ?>" <?php selected( $tp_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
                    <?php } ?>      
                </select>
            </p>

           <?php
        }

        /**
        * Processing widget options on save
        *
        * @param array $new_instance The new options
        * @param array $old_instance The previous options
        */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance           = $old_instance;
            $instance['title']  = sanitize_text_field( $new_instance['title'] );
            $instance['number'] = (int) $new_instance['number'];
            $instance['category'] = great_news_sanitize_single_category( $new_instance['category'] );
           
            return $instance;
        }
    }
endif;
