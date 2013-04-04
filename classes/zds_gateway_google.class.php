<?php

/**
* GOOGLE GATEWAY CLASS
*/
class ZDS_Gateway_Google extends WC_Payment_Gateway {

    //Constructor
    public function	__construct() {

        //Load Google Classes <--Doesn't work
        spl_autoload_register(function ($class) {
            include 'googlecheckout/library/' . $class . '.php';
        });

        $this->id = 'google';
        $this->has_fields = false;
        $this->method_title = __( 'Google checkout' , 'woocommerce');

        //Define and load settings fields
        $this->init_form_fields();
        $this->init_settings();

        //Define user set variables
        $this->title = $this->get_option( 'title');

        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id , array( $this, 'process_admin_options' ) );
    }

    //Init form fields (admin)
    public function init_form_fields() {
        $this->form_fields = array(
            'enabled' => array(
                'title' => __( 'Enable/Disable', 'woocommerce' ),
                'type' => 'checkbox',
                'label' => __( 'Enable Google Checkout', 'woocommerce' ),
                'default' => 'yes'
            ),
            'title' => array(
                'title' => __( 'Title', 'woocommerce' ),
                'type' => 'text',
                'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
                'default' => __( 'Google Checkout', 'woocommerce' ),
                'desc_tip'      => true,
            ),
            'description' => array(
                'title' => __( 'Customer Message', 'woocommerce' ),
                'type' => 'textarea',
                'description' => __( 'This is the message that the customer sees when checking out.', 'woocommerce' ),
                'desc_tip' => true,
                'default' => ''
            ),
            'merchantid' => array(
                'title' => __( 'Merchant ID' , 'woocommerce' ),
                'type' => 'text',
                'description' => 'This is the Google Merchant ID to your account',
                'desc_tip' => true
            ),
            'merchantkey' => array(
                'title' => __( 'Merchant Key' , 'woocommerce' ),
                'type' => 'password',
                'description' => __( 'This is the merchant key for your Google Checkout account' , 'woocommerce' ),
                'desc_tip' => true,
            ),
            'testing' => array(
                'title' => __( 'Gateway Testing options' , 'woocommerce' ),
                'type' => 'title'
            ),
            'testmode' => array(
                'title' => __( 'Sandbox Mode' , 'woocommerce' ),
                'type' => 'checkbox',
                'label' => __( 'Enable Google Sandbox mode' , 'woocommerce' ),
                'default' => 'yes',
                'description' => __( 'Google Sandbox is a non-live setup that allows transaction testing.' , 'woocommerce' ),
                'desc_tip' => true,
            ),
            'testmerchantid' => array(
                'title' => __( 'Sandbox Merchant ID' , 'woocommerce' ),
                'type' => 'text',
                'description' => 'This is the Google Merchant ID to your Sandbox account',
                'desc_tip' => true
            ),
            'testmerchantkey' => array(
                'title' => __( 'Sandbox Merchant Key' , 'woocommerce' ),
                'type' => 'password',
                'description' => __( 'This is the merchant key for your Google Checkout Sandbox account' , 'woocommerce' ),
                'desc_tip' => true,
            ),

        );
    }

    //Process Payments
    public function process_payment($order_id) {
        global $woocommerce;
        $order = new WC_Order( $order_id );

        //get Google checkout args
        $google_args = $this->get_google_args ( $order );


        //Mark as on-hold
        $order->update_status( 'on-hold', __( 'Awaiting Google Checkout Payment' , 'woocommerce' ));

        //Reduce stock levels
        $order->reduce_order_stock();

        //Remove cart
        $woocommerce->cart->empty_cart();

        //Return thankyou redirect
        return array(
            'result' => 'success',
            'redirect' => $this->get_return_url( $order )
        );
    }
    
    //Get Google Checkout Args
    public function get_google_args ( $order ) {

        return array();
    }
}




?>
