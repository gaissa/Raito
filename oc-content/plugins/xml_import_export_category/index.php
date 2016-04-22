<?php

/*
Plugin Name: XML Import Export Category
Plugin URI: http://www.osclass.org/
Description: Import and Export Category form/to XML file.
Version: 1.5
Author: xinony
Author URI: xinony@gmail.com
Short Name: xml_import_export_category
Plugin update URI: xml-import-export-category
*/

function xml_import_export_category_admin_menu() 
{
    osc_add_admin_submenu_page(
        'plugins',
        __('XML Import Export Category', 'xml_import_export_category'),
        osc_admin_render_plugin_url(osc_plugin_folder(__FILE__)."functions.php"),
        'xml_import_export_category',
        'moderator'
    );
}

// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), '');

// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", '');

osc_add_hook('admin_header','xml_import_export_category_admin_menu');

?>
