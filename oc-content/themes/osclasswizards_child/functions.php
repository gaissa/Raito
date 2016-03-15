<?php

define('OSCLASSWIZARDS_THEME_FOLDER', 'osclasswizards_child');

if (strpos($_SERVER['REQUEST_URI'], "admin") !== false)
{
	// PASS
}
else
{	
	osc_enqueue_style('main', 'oc-content/themes/' . OSCLASSWIZARDS_THEME_FOLDER . '/css/main.css');
}

?>
