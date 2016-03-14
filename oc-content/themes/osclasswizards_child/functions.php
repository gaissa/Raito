<?php

# TEMPORARY FIX
if (strpos($_SERVER['REQUEST_URI'], "admin") !== false) {
// PASS
}
else {
	define('OSCLASSWIZARDS_THEME_FOLDER', 'osclasswizards_child');
	osc_enqueue_style('main', 'oc-content/themes/' . OSCLASSWIZARDS_THEME_FOLDER . '/css/main.css');
}

?>