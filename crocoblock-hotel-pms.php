<?php
/**
 * Plugin Name: Crocoblock Hotel PMS
 * Description: Example plugin demonstrating how to set up a basic Property Management System (PMS)
 *              for a hotel using Crocoblock (JetEngine, JetBooking) tools. This is a simplified
 *              example provided for educational purposes only.
 * Version: 0.1.0
 * Author: Example Author
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register 'room' custom post type using JetEngine.
 * In a real implementation you would create custom fields for room features
 * and pricing through the JetEngine UI and export the configuration.
 */
function cbhp_register_room_cpt() {
    if (class_exists('\Jet_Engine')) {
        \Jet_Engine\post_types\manager()->register_post_type(
            array(
                'slug'        => 'room',
                'name'        => 'Rooms',
                'menu_icon'   => 'dashicons-admin-multisite',
                'supports'    => array('title', 'thumbnail'),
                'rewrite'     => array('slug' => 'room'),
                'public'      => true,
                'show_in_rest'=> true,
            )
        );
    }
}
add_action('init', 'cbhp_register_room_cpt');

/**
 * Example callback to handle custom booking confirmation after JetBooking creates a booking.
 */
function cbhp_after_booking_created($booking_id, $args) {
    // You could send custom emails, update availability, etc.
    // This is a simple placeholder for demonstration only.
    error_log('New booking created with ID: ' . $booking_id);
}
add_action('jet-booking/booking-created', 'cbhp_after_booking_created', 10, 2);

/**
 * Create a dashboard page for check-in/check-out management.
 */
function cbhp_admin_menu() {
    add_menu_page(
        'Hotel PMS',
        'Hotel PMS',
        'manage_options',
        'cbhp_pms_dashboard',
        'cbhp_render_dashboard',
        'dashicons-building',
        30
    );
}
add_action('admin_menu', 'cbhp_admin_menu');

function cbhp_render_dashboard() {
    ?>
    <div class="wrap">
        <h1>Hotel PMS Dashboard</h1>
        <p>This is a placeholder admin page. Here you could list today\'s arrivals,
        manage check-in/check-out status, or see upcoming bookings.</p>
    </div>
    <?php
}
/**
 * Simple example of check-in status management using post meta.
 */
function cbhp_set_checkin_status($booking_id, $status) {
    update_post_meta($booking_id, '_checkin_status', $status);
}

function cbhp_get_checkin_status($booking_id) {
    return get_post_meta($booking_id, '_checkin_status', true);
}

