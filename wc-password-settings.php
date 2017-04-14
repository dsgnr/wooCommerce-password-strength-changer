<?php
/*
 Plugin Name: WooCommerce Password Strength Settings
 Plugin URI: https://github.com/dsgnr
 Description: Allows administrators to use weaker passwords for WooCommerce
 Author: Daniel Hand
 Author URI: https://www.designsbytouch.co.uk
 Version: 1.0.0
 License: GPLv2 or later
 */
add_filter('woocommerce_get_settings_account','wc_pass_setting_st');
function wc_pass_setting_st($settings){
    $settings[]=array( 'title' => __( 'User Password Strength Settings', 'woocommerce' ), 'type' => 'title', 'id' => 'account_password_options' );
    $settings[]=array(
                'title'    => __( 'Strength Requirement', 'woocommerce' ),
                'desc'     => __( 'Select the minimum strength of your user passwords. Level 4 = Default.', 'woocommerce' ) ,
                'id'       => 'woocommerce_myaccount_password_strength',
                'type'     => 'select',
                'default'  => '',
                'class'    => 'wc-enhanced-select',
                'css'      => 'min-width:300px;',
                'desc_tip' => true,
                'options'  =>array(
                    '0'=>__( 'Level 1 - Anything', 'woocommerce' ),
                    '1'=>__( 'Level 2 - Weakest', 'woocommerce' ),
                    '2'=>__( 'Level 3 - Weak', 'woocommerce' ),
                    '3'=>__( 'Level 4 - Medium', 'woocommerce' ),
                    '4'=>__( 'Level 5 - Strong', 'woocommerce' ),
                ),
            );
    $settings[]=array( 'type' => 'sectionend', 'id' => 'account_password_options' );
    return $settings;
}
add_filter('woocommerce_min_password_strength','wc_change_pass_setting_st',30);
function wc_change_pass_setting_st(){
    $strength=get_option( 'woocommerce_myaccount_password_strength', null );
    return intval($strength);

}
?>
