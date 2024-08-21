<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function classic_blogbell_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'classic-blogbell' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'classic_blogbell_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function classic_blogbell_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'classic-blogbell' ),
            'off'       => esc_html__( 'Disable', 'classic-blogbell' )
        );
        return apply_filters( 'classic_blogbell_switch_options', $arr );
    }
endif;

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function classic_blogbell_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'classic-blogbell' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}
if ( ! function_exists( 'classic_blogbell_get_woo_product' ) ) {
    /**
     * Get product.
     */
    function classic_blogbell_get_woo_product() {
        $args = array(
            'posts_per_page' => -1,
        );
         
        $choices = array( '' => esc_html__( '--Select--', 'classic-blogbell' ) );
        $products = wc_get_products( $args );
        foreach ( $products as $product ) {
            $id = $product->get_id();
            $title = $product->get_name();
            $choices[ $id ] = $title;
        }
        return $choices;
    }
}




 /**
 * Get an array of google fonts.
 * 
 */
function classic_blogbell_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'classic-blogbell' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'classic_blogbell_font_choices', $font_family_arr );
}

if ( ! function_exists( 'classic_blogbell_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'classic-blogbell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'classic-blogbell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'classic-blogbell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'header-font-5'   => esc_html__( 'Lato', 'classic-blogbell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'header-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'header-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'classic-blogbell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'classic-blogbell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'classic-blogbell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'classic-blogbell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'classic-blogbell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'classic-blogbell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'classic-blogbell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'classic-blogbell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'classic-blogbell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'classic-blogbell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'classic-blogbell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'classic-blogbell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'classic-blogbell' ),
            'header-font-31'   => esc_html__( 'Gloria Hallelujah', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'classic-blogbell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'classic-blogbell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'classic-blogbell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'body-font-5'     => esc_html__( 'Lato', 'classic-blogbell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'body-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'body-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'classic-blogbell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'classic_blogbell_archive_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_archive_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'classic-blogbell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'classic-blogbell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'classic-blogbell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'header-font-5'   => esc_html__( 'Lato', 'classic-blogbell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'header-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'header-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'classic-blogbell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'classic-blogbell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'classic-blogbell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'classic-blogbell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'classic-blogbell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'classic-blogbell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'classic-blogbell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'classic-blogbell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'classic-blogbell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'classic-blogbell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'classic-blogbell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'classic-blogbell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'classic-blogbell' ),
            'header-font-31'   => esc_html__( 'Gloria Hallelujah', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_archive_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_archive_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_archive_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'classic-blogbell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'classic-blogbell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'classic-blogbell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'body-font-5'     => esc_html__( 'Lato', 'classic-blogbell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'body-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'body-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'classic-blogbell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_archive_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_page_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_page_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'classic-blogbell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'classic-blogbell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'classic-blogbell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'header-font-5'   => esc_html__( 'Lato', 'classic-blogbell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'header-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'header-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'classic-blogbell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'classic-blogbell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'classic-blogbell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'classic-blogbell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'classic-blogbell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'classic-blogbell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'classic-blogbell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'classic-blogbell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'classic-blogbell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'classic-blogbell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'classic-blogbell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'classic-blogbell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'classic-blogbell' ),
            'header-font-31'   => esc_html__( 'Gloria Hallelujah', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_page_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_page_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_page_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'classic-blogbell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'classic-blogbell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'classic-blogbell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'body-font-5'     => esc_html__( 'Lato', 'classic-blogbell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'body-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'body-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'classic-blogbell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_page_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_post_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_post_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'classic-blogbell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'classic-blogbell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'classic-blogbell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'header-font-5'   => esc_html__( 'Lato', 'classic-blogbell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'header-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'header-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'classic-blogbell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'classic-blogbell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'classic-blogbell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'classic-blogbell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'classic-blogbell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'classic-blogbell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'classic-blogbell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'classic-blogbell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'classic-blogbell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'classic-blogbell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'classic-blogbell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'classic-blogbell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'classic-blogbell' ),
            'header-font-31'   => esc_html__( 'Gloria Hallelujah', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_post_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_post_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_post_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'classic-blogbell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'classic-blogbell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'classic-blogbell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'body-font-5'     => esc_html__( 'Lato', 'classic-blogbell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'body-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'body-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'classic-blogbell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_post_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'classic_blogbell_site_title_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_site_title_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'site-font-1'   => esc_html__( 'Raleway', 'classic-blogbell' ),
            'site-font-2'   => esc_html__( 'Poppins', 'classic-blogbell' ),
            'site-font-3'   => esc_html__( 'Montserrat', 'classic-blogbell' ),
            'site-font-4'   => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'site-font-5'   => esc_html__( 'Lato', 'classic-blogbell' ),
            'site-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'site-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'site-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'site-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'site-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'site-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'site-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'site-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'site-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'site-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'site-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'site-font-17'   => esc_html__( 'Henny Penny', 'classic-blogbell' ),
            'site-font-18'   => esc_html__( 'Orbitron' , 'classic-blogbell' ),
            'site-font-19'   => esc_html__( 'Marck Script', 'classic-blogbell' ),
            'site-font-20'   => esc_html__( 'Kaushan Script', 'classic-blogbell' ),
            'site-font-21'   => esc_html__( 'Courgette', 'classic-blogbell' ),
            'site-font-22'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
            'site-font-23'   => esc_html__( 'Bad Script', 'classic-blogbell' ),
            'site-font-24'   => esc_html__( 'Righteous', 'classic-blogbell' ),
            'site-font-25'   => esc_html__( 'Dosis', 'classic-blogbell' ),
            'site-font-26'   => esc_html__( 'Cinzel Decorative', 'classic-blogbell' ),
            'site-font-27'   => esc_html__( 'Faster one', 'classic-blogbell' ),
            'site-font-28'   => esc_html__( 'Tangerine', 'classic-blogbell' ),
            'site-font-29'   => esc_html__( 'Fredericka the Great', 'classic-blogbell' ),
            'site-font-30'   => esc_html__( 'Shadows Into Light', 'classic-blogbell' ),
            'site-font-31'   => esc_html__( 'Gloria Hallelujah', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_site_title_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'classic_blogbell_site_tagline_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function classic_blogbell_site_tagline_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'classic-blogbell' ),
            'tagline-font-1'     => esc_html__( 'Raleway', 'classic-blogbell' ),
            'tagline-font-2'     => esc_html__( 'Poppins', 'classic-blogbell' ),
            'tagline-font-3'     => esc_html__( 'Roboto', 'classic-blogbell' ),
            'tagline-font-4'     => esc_html__( 'Open Sans', 'classic-blogbell' ),
            'tagline-font-5'     => esc_html__( 'Lato', 'classic-blogbell' ),
            'tagline-font-6'   => esc_html__( 'Ubuntu', 'classic-blogbell' ),
            'tagline-font-7'   => esc_html__( 'Playfair Display', 'classic-blogbell' ),
            'tagline-font-8'   => esc_html__( 'Lora', 'classic-blogbell' ),
            'tagline-font-9'   => esc_html__( 'Titillium Web', 'classic-blogbell' ),
            'tagline-font-10'   => esc_html__( 'Muli', 'classic-blogbell' ),
            'tagline-font-11'   => esc_html__( 'Oxygen', 'classic-blogbell' ),
            'tagline-font-12'   => esc_html__( 'Nunito Sans', 'classic-blogbell' ),
            'tagline-font-13'   => esc_html__( 'Maven Pro', 'classic-blogbell' ),
            'tagline-font-14'   => esc_html__( 'Cairo', 'classic-blogbell' ),
            'tagline-font-15'   => esc_html__( 'Philosopher', 'classic-blogbell' ),
            'tagline-font-16'   => esc_html__( 'Quicksand', 'classic-blogbell' ),
            'tagline-font-17'   => esc_html__( 'Dancing Script ', 'classic-blogbell' ),
            'tagline-font-18'   => esc_html__( 'Rajdhani', 'classic-blogbell' ),
        );

        $output = apply_filters( 'classic_blogbell_site_tagline_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>