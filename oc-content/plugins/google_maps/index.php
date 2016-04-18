<?php
/*
Plugin Name: Google Maps for Raito
Plugin URI: #
Description: Customized Google Maps plugin for the items. Based on the Google Maps plugin by Osclass & kingsult
Version: 0.0.1
Author: Osclass & kingsult & Janne Kähkönen
Author URI: #
Plugin update URI: #
*/

    function google_maps_location() {
        $item = osc_item();
        osc_google_maps_header();
        require 'map.php';
    }

    // HELPER
    function osc_google_maps_header() {
        echo '<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>';
        echo '<style>#itemMap img { max-width: 140em; } </style>';
    }

    osc_add_hook('location', 'google_maps_location');  

?>
