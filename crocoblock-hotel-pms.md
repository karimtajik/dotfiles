# Crocoblock Hotel PMS Plugin

This example WordPress plugin demonstrates how you might implement a very basic
hotel property management system (PMS) using the Crocoblock suite (JetEngine,
JetBooking, etc.). It is a simplified educational reference and is **not** a
complete commercial solution.

## Features
- Registers a `room` custom post type via JetEngine.
- Hooks into JetBooking to log a message whenever a booking is created.
- Provides an admin dashboard page where you could manage check-ins and
  check-outs.
- Includes helper functions to store check-in status on bookings using post
  meta.

## Installation
1. Copy `crocoblock-hotel-pms.php` into your WordPress `wp-content/plugins` directory.
2. Ensure you have the Crocoblock plugins (JetEngine and JetBooking) installed
   and activated.
3. Activate the **Crocoblock Hotel PMS** plugin from the WordPress admin panel.
4. Customize the plugin to suit your needs, adding fields or templates via
   Crocoblock tools.

This skeleton should serve as a starting point for creating a richer PMS by
leveraging Crocoblock's booking forms, dynamic listings, and front‑end editing
capabilities.
