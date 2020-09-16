<?php
/**
 * Handle cron events.
 * NOTE: DO NOT edit this file in WooCommerce core, this is generated from woocommerce-admin.
 */

namespace Automattic\WooCommerce\Admin;

defined( 'ABSPATH' ) || exit;

use \Automattic\WooCommerce\Admin\Notes\Choose_Niche;
use \Automattic\WooCommerce\Admin\Notes\Giving_Feedback_Notes;
use \Automattic\WooCommerce\Admin\Notes\Mobile_App;
use \Automattic\WooCommerce\Admin\Notes\New_Sales_Record;
use \Automattic\WooCommerce\Admin\Notes\Tracking_Opt_In;
use \Automattic\WooCommerce\Admin\Notes\Onboarding_Email_Marketing;
use \Automattic\WooCommerce\Admin\Notes\Onboarding_Payments;
use \Automattic\WooCommerce\Admin\Notes\Personalize_Store;
use \Automattic\WooCommerce\Admin\Notes\EU_VAT_Number;
use \Automattic\WooCommerce\Admin\Notes\WooCommerce_Payments;
use \Automattic\WooCommerce\Admin\Notes\Marketing;
use \Automattic\WooCommerce\Admin\Notes\Start_Dropshipping_Business;
use \Automattic\WooCommerce\Admin\Notes\WooCommerce_Subscriptions;
use \Automattic\WooCommerce\Admin\Notes\Migrate_From_Shopify;
use \Automattic\WooCommerce\Admin\Notes\Launch_Checklist;
use \Automattic\WooCommerce\Admin\Notes\Real_Time_Order_Alerts;
use \Automattic\WooCommerce\Admin\RemoteInboxNotifications\DataSourcePoller;
use \Automattic\WooCommerce\Admin\RemoteInboxNotifications\RemoteInboxNotificationsEngine;
use \Automattic\WooCommerce\Admin\Loader;
use \Automattic\WooCommerce\Admin\Notes\Insight_First_Sale;
use \Automattic\WooCommerce\Admin\Notes\Home_Screen_Feedback;
use \Automattic\WooCommerce\Admin\Notes\Need_Some_Inspiration;
use \Automattic\WooCommerce\Admin\Notes\Learn_More_About_Product_Settings;
use \Automattic\WooCommerce\Admin\Notes\Online_Clothing_Store;
use \Automattic\WooCommerce\Admin\Notes\First_Product;
use \Automattic\WooCommerce\Admin\Notes\Customize_Store_With_Blocks;
use \Automattic\WooCommerce\Admin\Notes\Facebook_Marketing_Expert;
use \Automattic\WooCommerce\Admin\Notes\Test_Checkout;
use \Automattic\WooCommerce\Admin\Notes\Edit_Products_On_The_Move;
use \Automattic\WooCommerce\Admin\Notes\Performance_On_Mobile;
use \Automattic\WooCommerce\Admin\Notes\Apple_Pay_TBD;

/**
 * WC_Admin_Events Class.
 */
class Events {
	/**
	 * The single instance of the class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function __construct() {}

	/**
	 * Get class instance.
	 *
	 * @return object Instance.
	 */
	final public static function instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Cron event handlers.
	 */
	public function init() {
		add_action( 'wc_admin_daily', array( $this, 'do_wc_admin_daily' ) );
	}

	/**
	 * Daily events to run.
	 *
	 * Note: Order_Milestones::other_milestones is hooked to this as well.
	 */
	public function do_wc_admin_daily() {
		New_Sales_Record::possibly_add_note();
		Mobile_App::possibly_add_note();
		Tracking_Opt_In::possibly_add_note();
		Onboarding_Email_Marketing::possibly_add_note();
		Onboarding_Payments::possibly_add_note();
		Personalize_Store::possibly_add_note();
		WooCommerce_Payments::possibly_add_note();
		EU_VAT_Number::possibly_add_note();
		Marketing::possibly_add_note();
		Giving_Feedback_Notes::possibly_add_note();
		Start_Dropshipping_Business::possibly_add_note();
		WooCommerce_Subscriptions::possibly_add_note();
		Migrate_From_Shopify::possibly_add_note();
		Insight_First_Sale::possibly_add_note();
		Launch_Checklist::possibly_add_note();
		Home_Screen_Feedback::possibly_add_note();
		Need_Some_Inspiration::possibly_add_note();
		Learn_More_About_Product_Settings::possibly_add_note();
		Online_Clothing_Store::possibly_add_note();
		First_Product::possibly_add_note();
		Choose_Niche::possibly_add_note();
		Real_Time_Order_Alerts::possibly_add_note();
		Customize_Store_With_Blocks::possibly_add_note();
		Facebook_Marketing_Expert::possibly_add_note();
		Test_Checkout::possibly_add_note();
		Edit_Products_On_The_Move::possibly_add_note();
		Performance_On_Mobile::possibly_add_note();
		Apple_Pay_TBD::possibly_add_note();

		if ( Loader::is_feature_enabled( 'remote-inbox-notifications' ) ) {
			DataSourcePoller::read_specs_from_data_sources();
			RemoteInboxNotificationsEngine::run();
		}
	}
}
