<?php 

class ZDS_Google_Gateway extends WC_Gateway {

	//Constructor
	__construct() {

		$this->id = "google_gateway";
		$this->has_fields = false;
		$this->method_title = "Google checkout"
		$this->method_description = "Checkout via Google"

		$this->init_form_fieldsk();
		$this->init_settings();
		$this->title = $this->get_option( 'title' );

		add_action ( 'woocommerce_update_options_payment_gateways_' . $this->id , array( $this, 'process_admin_options' ) );

	}

	$this->form_fields = array(
    'enabled' => array(
        'title' => __( 'Enable/Disable', 'woocommerce' ),
        'type' => 'checkbox',
        'label' => __( 'Enable Cheque Payment', 'woocommerce' ),
        'default' => 'yes'
    ),
    'title' => array(
        'title' => __( 'Title', 'woocommerce' ),
        'type' => 'text',
        'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
        'default' => __( 'Cheque Payment', 'woocommerce' ),
        'desc_tip'      => true,
    ),
    'description' => array(
        'title' => __( 'Customer Message', 'woocommerce' ),
        'type' => 'textarea',
        'default' => ''
    )
);

}

?>
