<?php
/**
 * Plugin Name:   Product Manager
 * Plugin URI:    http://www.product-manager.com
 * Description:    Manage and display your products just like a shopping cart, but without the cart.
 * Version:        1.0
 * Author:         Product Manager
 * Author URI:    http://www.product-manager.com/
 * Text Domain:    inventory
 *
 * ------------------------------------------------------------------------
 * Copyright 2009-2020 WP Product Manager, LLC
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

// No direct access allowed.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include( plugin_dir_path( __FILE__ ) . 'init.php');
include( plugin_dir_path( __FILE__ ) . 'functions.php');