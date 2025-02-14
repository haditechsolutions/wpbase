<?php
add_action('save_post', 'process_save_custom_tempalte');

//invintory section woocmmerce
add_action('woocommerce_product_options_inventory_product_data',  'add_total_stock_qty_to_invintory');

if( !function_exists('add_total_stock_qty_to_invintory') )
{
    function add_total_stock_qty_to_invintory()
    {
        global $post;
    
        if(!$post) {
            return ;
        }
        $output = get_post_meta($post->ID, 'custom_total_stock_qty', true);
    
        ?>
        <div class="options_group">
            <p class="form-field" >
                <label for="custom_total_stock_qty" ><?php esc_html_e('تعداد اولیه موجود در انبار (برای اسلایدر شگفت انگیز)', 'woodmartplus'); ?></label>
                <input type="text" class="short" name="custom_total_stock_qty" id="custom_total_stock_qty" value="<?php echo !empty($output) ? esc_attr($output) : ''  ; ?>" >
            </p>
        </div> 
        <?php
    }
}

if( !function_exists('process_save_custom_tempalte') )
{
    function process_save_custom_tempalte($post_id)
    {
        global $typenow, $wp_post_type;
    
        if(isset($_POST['custom_total_stock_qty']) && !empty($_POST['custom_total_stock_qty'])) {
    
            $santized_total_stock = sanitize_text_field($_POST['custom_total_stock_qty']);
            update_post_meta($post_id, 'custom_total_stock_qty', $santized_total_stock);
        }else{
            delete_post_meta($post_id ,'custom_total_stock_qty' );
        }
    }
}

if( wplus_helper::get_setting('active_color_carouel') )
{
    if( !function_exists('add_color_show_on_carousel') )
    {
        function add_color_show_on_carousel( $term )
        {
            wp_enqueue_script('color-picker');
            $color_code = get_term_meta( $term->term_id , 'carousel_color',true ) ? get_term_meta( $term->term_id , 'carousel_color',true ) : '';
        
            ?>
            <tr class="form-field term-slug-wrap">
                <th scope="row">
                    <label for="color_application"><?php esc_html_e('این رنگ صرفا بر روی اسلایدر محصولات مخصوص افزونه فعال میشود','woodmartplu') ?></label>
                    <td>
                        <input class="cpa-color-picker" name="carousel_color" value="<?php echo esc_html( $color_code ) ?>">
                    </td>
                </th>
            </tr>
            <?php
        }

        add_action ( 'pa_color_edit_form_fields', 'add_color_show_on_carousel');
    }
    
    if( !function_exists('save_color_carousel') )
    {
        function save_color_carousel( $term_id )
        {
            $color_code = isset( $_POST['carousel_color'] ) && !empty( $_POST['carousel_color'] ) ? sanitize_text_field( $_POST['carousel_color'] ) : null;
            if( is_null( $color_code ) ) return;
        
            update_term_meta( $term_id, 'carousel_color',$color_code );
        }
        add_action ( 'edited_pa_color', 'save_color_carousel');
    }
  
}




