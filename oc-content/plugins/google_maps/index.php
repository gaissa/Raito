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
        echo '<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>';
        echo '<style>#itemMap img { max-width: 140em; } </style>';
    }

    function insert_geo_location($item) {
        $itemId = $item['pk_i_id'];
        $aItem = Item::newInstance()->findByPrimaryKey($itemId);
        $sAddress = (isset($aItem['s_address']) ? $aItem['s_address'] : '');
        $sCity = (isset($aItem['s_city']) ? $aItem['s_city'] : '');
        //$sRegion = (isset($aItem['s_region']) ? $aItem['s_region'] : '');
        $sCountry = (isset($aItem['s_country']) ? $aItem['s_country'] : '');
        $address = sprintf('%s, %s, %s', $sAddress, $sCity, $sCountry);
        $response = osc_file_get_contents(sprintf('http://maps.google.com/maps/geo?q=%s&output=json&sensor=false', urlencode($address)));
        $jsonResponse = json_decode($response);

        if (isset($jsonResponse->Placemark) && count($jsonResponse->Placemark[0]) > 0) {
            $coord = $jsonResponse->Placemark[0]->Point->coordinates;
            ItemLocation::newInstance()->update (array('d_coord_lat' => $coord[1]
                                                      ,'d_coord_long' => $coord[0])
                                                ,array('fk_i_item_id' => $itemId));
        }
    }

    osc_add_hook('location', 'google_maps_location');

    osc_add_hook('posted_item', 'insert_geo_location');
    osc_add_hook('edited_item', 'insert_geo_location');

?>
