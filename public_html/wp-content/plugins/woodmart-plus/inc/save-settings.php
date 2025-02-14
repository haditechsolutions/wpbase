<?php


class save_settings{

    public function __construct()
    {
        
        $this->process_save_setting();
        add_action('admin_init',[$this,'process_integration_previous_setting']);
    }

    public function process_save_setting()
    {
        if( isset( $_POST['save_settings'] ) && 'save' === $_POST['save_settings'] )
        {
            $options =  isset( $_POST[WOODMARTPLUSOPTION] ) && !empty( $_POST[WOODMARTPLUSOPTION] )? $_POST[WOODMARTPLUSOPTION] : [];

            $sanitized_options = array_map([$this,'new_sanitize_text_field'],$options);
            
            if( $sanitized_options )
            {
                update_option(WOODMARTPLUSOPTION,$sanitized_options);
            }
        }
    }

    public function new_sanitize_text_field( $option )
    {
        if( is_array( $option ) )
        {
            $option = array_map([$this, 'new_sanitize_text_field'],$option);
        }else{
            $option = sanitize_text_field( $option );
        }
        return $option;
    }

    public function process_integration_previous_setting()
    {
        if( isset( $_POST['integration_setting'] ) && !empty( $_POST['integration_setting'] ) && 'yes' === $_POST['integration_setting'] )
        {
            $previous_options = [
                'wplus_general_option',
                'woodplus_option_notification',
                'woodplus_sms',
                'woodplus_option_offer',
                'woodplus_ticket',
                'wplus_factor',
            ];
            $new_array = [];
            foreach( $previous_options as $option )
            {
                $options = get_option( $option );

                if( $options )
                {
                    if( isset( $options['general_option'] ) )
                    {
                        foreach( $options['general_option'] as $key => $general_option )
                        {
                           
                            $new_array[$key] = $general_option;
                        }

                    }elseif( isset( $options['woodplus_sms'] ) ){
                        
                        foreach( $options['woodplus_sms'] as $key => $sms )
                        {
                            if( 'otp' === $key ){
                                foreach( $sms as $key => $otp )
                                {
                                    $new_array[$key] = $otp;
                                }
                                
                            }else{
                                $new_array[$key] = $sms;
                            }
                            
                        }
                    }elseif(isset( $options['ticket'] )){

                        foreach( $options['ticket'] as $key => $ticket )
                        {
                            $new_array[$key] = $ticket;
                        }
                    }else{
                        foreach( $options as $key => $value )
                        {
                            if( 'seller_info' == $key )
                            {
                                $new_array['factor'][$key] = $value;
                                
                            }elseif( 'manager_note' == $key )
                            {
                                $new_array['factor'][$key] = $value;
                            }else{
                                $new_array[$key] = $value;
                            }
                        }
                    }
                    delete_option($option);
                }
            }
           
            if( $new_array )
            {
                update_option(WOODMARTPLUSOPTION, $new_array);
            }
            
        }
    }

}

new save_settings;