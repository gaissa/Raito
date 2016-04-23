<?php
/*
 *      Osclass – software for creating and publishing online classified
 *                           advertising platforms
 *
 *                        Copyright (C) 2014 OSCLASS
 *
 *       This program is free software: you can redistribute it and/or
 *     modify it under the terms of the GNU Affero General Public License
 *     as published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful, but
 *         WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public
 * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**

DEFINES

*/
define('raito_teema_THEME_VERSION', '0.0.1');
define('raito_teema_THEME_FOLDER', 'raito_teema');

if (!osc_get_preference('keyword_placeholder', 'raito_teema_theme')) {
    osc_set_preference('keyword_placeholder', osc_esc_html(__('ie. PHP Programmer', raito_teema_THEME_FOLDER)), 'raito_teema_theme');
}
osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/font-awesome/css/font-awesome.min.css'));

// used for date/dateinterval custom fields
osc_enqueue_script('php-date');

if (!OC_ADMIN) {
    osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
    osc_enqueue_style('raito_teema-fine-uploader-css', osc_current_web_theme_url('css/ajax-uploader.css'));
}
osc_enqueue_script('jquery-fineuploader');

/**
 ** DEFAULT VALUES
 **/
if (!osc_get_preference('site_info_text', 'raito_teema_theme')) {
    osc_set_preference('site_info_text', 'Rovaniemen Raito', 'raito_teema_theme');
}
if (!osc_get_preference('sub_cat_limit', 'raito_teema_theme')) {
    osc_set_preference('sub_cat_limit', 5, 'raito_teema_theme');
}
if (!osc_get_preference('popular_regions_limit', 'raito_teema_theme')) {
    osc_set_preference('popular_regions_limit', 10, 'raito_teema_theme');
}
if (!osc_get_preference('popular_cities_limit', 'raito_teema_theme')) {
    osc_set_preference('popular_cities_limit', 10, 'raito_teema_theme');
}
if (!osc_get_preference('popular_searches_limit', 'raito_teema_theme')) {
    osc_set_preference('popular_searches_limit', 10, 'raito_teema_theme');
}

if (!osc_get_preference('locations_input_as', 'raito_teema_theme')) {
    osc_set_preference('locations_input_as', 'text', 'raito_teema_theme');
}
if (!osc_get_preference('premium_listings_shown_home', 'raito_teema_theme')) {
    osc_set_preference('premium_listings_shown_home', 6, 'raito_teema_theme');
}
if (!osc_get_preference('premium_listings_shown', 'raito_teema_theme')) {
    osc_set_preference('premium_listings_shown', 6, 'raito_teema_theme');
}
if (!osc_get_preference('title_minimum_length', 'raito_teema_theme')) {
    osc_set_preference('title_minimum_length', 1, 'raito_teema_theme');
}
if (!osc_get_preference('description_minimum_length', 'raito_teema_theme')) {
    osc_set_preference('description_minimum_length', 3, 'raito_teema_theme');
}
if (osc_get_preference('first_load_cat_icons', 'raito_teema_theme_cat_icons') == "") {
    osc_set_preference('cat-icons-1', 'SHOPPING-CART', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-2', 'CAR', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-3', 'BULLHORN', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-4', 'HOME', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-5', 'WRENCH', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-6', 'USERS', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-7', 'HEART', 'raito_teema_theme_cat_icons');
    osc_set_preference('cat-icons-8', 'SUITCASE', 'raito_teema_theme_cat_icons');
    
    osc_set_preference('first_load_cat_icons', 'loaded', 'raito_teema_theme_cat_icons');
}
if (!osc_get_preference('theme_color_mode', 'raito_teema_theme')) {
    osc_set_preference('theme_color_mode', 'green', 'raito_teema_theme');
}
if (!osc_get_preference('theme_color', 'raito_teema_theme')) {
    osc_set_preference('theme_color', '#77c04b', 'raito_teema_theme');
}
if (!osc_get_preference('google_fonts', 'raito_teema_theme')) {
    osc_set_preference('google_fonts', 'Open Sans', 'raito_teema_theme');
}

osc_reset_preferences();

if (!function_exists('raito_teema_theme_install')) {
    function raito_teema_theme_install()
    {
        osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'raito_teema_theme');
        osc_set_preference('version', raito_teema_THEME_VERSION, 'raito_teema_theme');
        osc_set_preference('show_banner', '1', 'raito_teema_theme');
        osc_set_preference('show_popular', '1', 'raito_teema_theme');
        osc_set_preference('show_popular_regions', '1', 'raito_teema_theme');
        osc_set_preference('show_popular_cities', '1', 'raito_teema_theme');
        osc_set_preference('show_search_country', '0', 'raito_teema_theme');
        osc_set_preference('show_popular_searches', '1', 'raito_teema_theme');
        osc_set_preference('defaultShowAs@all', 'list', 'raito_teema_theme');
        osc_set_preference('defaultShowAs@search', 'list');
        osc_set_preference('site_info_text', 'Rovaniemen Raito', 'raito_teema_theme');
        osc_set_preference('sub_cat_limit', 5, 'raito_teema_theme');
        osc_set_preference('google_fonts', 'Open Sans', 'raito_teema_theme');
        osc_reset_preferences();
    }
}

// update options
if (!function_exists('raito_teema_theme_update')) {
    
    function raito_teema_theme_update()
    {
        
        //osc_set_preference('version', raito_teema_THEME_VERSION, 'raito_teema_theme');
        osc_delete_preference('default_logo', 'raito_teema_theme');
        
        $logo_prefence = osc_get_preference('logo', 'raito_teema_theme');
        $logo_name     = 'logo';
        $temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/logo.jpg';
        if (file_exists($temp_name) && !$logo_prefence) {
            
            $img = ImageResizer::fromFile($temp_name);
            $ext = $img->getExt();
            $logo_name .= '.' . $ext;
            $img->saveToFile(osc_uploads_path() . $logo_name);
            @unlink($temp_name);
            osc_set_preference('logo', $logo_name, 'raito_teema_theme');
        }
        osc_reset_preferences();
    }
}
if (!function_exists('check_install_raito_teema_theme')) {
    function check_install_raito_teema_theme()
    {
        $current_version = osc_get_preference('version', 'raito_teema_theme');
        
        //check if current version is installed or need an update<
        if (!$current_version) {
            raito_teema_theme_install();
        } else if ($current_version < raito_teema_THEME_VERSION) {
            raito_teema_theme_update();
        }
    }
}

if (!function_exists('raito_teema_add_body_class_construct')) {
    function raito_teema_add_body_class_construct($classes)
    {
        $raito_teemaBodyClass = raito_teemaBodyClass::newInstance();
        $classes              = array_merge($classes, $raito_teemaBodyClass->get());
        return $classes;
    }
}
if (!function_exists('raito_teema_body_class')) {
    function raito_teema_body_class($echo = true)
    {
        osc_add_filter('raito_teema_bodyClass', 'raito_teema_add_body_class_construct');
        $classes = osc_apply_filter('raito_teema_bodyClass', array());
        if ($echo && count($classes)) {
            echo 'class="' . implode(' ', $classes) . '"';
        } else {
            return $classes;
        }
    }
}
if (!function_exists('raito_teema_add_body_class')) {
    function raito_teema_add_body_class($class)
    {
        $raito_teemaBodyClass = raito_teemaBodyClass::newInstance();
        $raito_teemaBodyClass->add($class);
    }
}
if (!function_exists('raito_teema_nofollow_construct')) {
    
    function raito_teema_nofollow_construct()
    {
        echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
        echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;
        
    }
}
if (!function_exists('raito_teema_follow_construct')) {
    
    function raito_teema_follow_construct()
    {
        echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
        echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;
        
    }
}
if (!function_exists('logo_header')) {
    function logo_header()
    {
        $logo = osc_get_preference('logo', 'raito_teema_theme');
        $html = '<a href="' . osc_base_url() . '"><img border="0" alt="' . osc_page_title() . '" src="' . raito_teema_logo_url() . '"></a>';
        if ($logo != '' && file_exists(osc_uploads_path() . $logo)) {
            return $html;
        } else {
            return '<a href="' . osc_base_url() . '">' . osc_page_title() . '</a>';
        }
    }
}
if (!function_exists('homepage_image')) {
    function homepage_image()
    {
        $logo = osc_get_preference('homeimage', 'raito_teema_theme');
        $html = '<img border="0" alt="' . osc_page_title() . '" src="' . raito_teema_homeimage_url() . '">';
        if ($logo != '' && file_exists(osc_uploads_path() . $logo)) {
            return $html;
        } else {
            return false;
        }
    }
}
if (!function_exists('raito_teema_favicon_url')) {
    function raito_teema_favicon_url()
    {
        $logo = osc_get_preference('favicon', 'raito_teema_theme');
        if ($logo) {
            return osc_uploads_url($logo);
        } else {
            return osc_current_web_theme_url('images/favicon.png');
        }
    }
}
if (!function_exists('raito_teema_logo_url')) {
    function raito_teema_logo_url()
    {
        $logo = osc_get_preference('logo', 'raito_teema_theme');
        if ($logo) {
            return osc_uploads_url($logo);
        }
        return false;
    }
}

if (!function_exists('raito_teema_homeimage_url')) {
    function raito_teema_homeimage_url()
    {
        $logo = osc_get_preference('homeimage', 'raito_teema_theme');
        if ($logo) {
            return osc_uploads_url($logo);
        }
        return false;
    }
}
if (!function_exists('raito_teema_draw_item')) {
    function raito_teema_draw_item($class = false, $admin = false, $premium = false)
    {
        $filename = 'loop-single';
        if ($premium) {
            $filename .= '-premium';
        }
        require WebThemes::newInstance()->getCurrentThemePath() . $filename . '.php';
    }
}
if (!function_exists('raito_teema_show_as')) {
    function raito_teema_show_as()
    {
        
        $p_sShowAs          = Params::getParam('sShowAs');
        $aValidShowAsValues = array(
            'list',
            'gallery'
        );
        if (!in_array($p_sShowAs, $aValidShowAsValues)) {
            $p_sShowAs = raito_teema_default_show_as();
        }
        
        return $p_sShowAs;
    }
}
if (!function_exists('raito_teema_default_show_as')) {
    function raito_teema_default_show_as()
    {
        return getPreference('defaultShowAs@all', 'raito_teema_theme');
    }
}
if (!function_exists('raito_teema_draw_categories_list')) {
    function raito_teema_draw_categories_list()
    {
?>
<?php
        if (!osc_is_home_page()) {
            echo '<div class="resp-wrapper">';
        }
?>

<h1 class="title"><?php
        _e('Categories', raito_teema_THEME_FOLDER);
?></h1>
<div class="row">
<?php
        
        $total_categories = osc_count_categories();
        $col1_max_cat     = ceil($total_categories / 1);
        osc_goto_first_category();
        $catcount = 0;
        while (osc_has_categories()) {
?>
<ul class="col-sm-6 col-md-3 grid_list">
  <li>
    <section class="listings">
     <h2><i class="fa fa-<?php
            echo raito_teema_category_icon(osc_category_id());
?>"></i>
      <?php
            $_slug        = osc_category_slug();
            $_url         = osc_search_category_url();
            $_name        = osc_category_name();
            $_total_items = osc_category_total_items();
            if (osc_count_subcategories() > 0) {
?>
      <?php
            }
?>
      <?php
            if ($_total_items > 0) {
?>
      <a class="category <?php
                echo $_slug;
?>" href="<?php
                echo $_url;
?>"><?php
                echo $_name;
?></a> <span><?php
                echo $_total_items;
?></span>
      <?php
            } else {
?>
      <a class="category <?php
                echo $_slug;
?>" href="#"><?php
                echo $_name;
?></a> <span><?php
                echo $_total_items;
?></span>
      <?php
            }
?>
    </h2>
    <?php
            if (osc_count_subcategories() > 0) {
                $m = 1;
?>
    <ul>
      <?php
                while (osc_has_subcategories()) {
                    if ($m <= (osc_get_preference('sub_cat_limit', 'raito_teema_theme'))) {
?>
      <li>
        <?php
                        if (osc_category_total_items() > 0) {
?>
        <a class="category sub-category <?php
                            echo osc_category_slug();
?>" href="<?php
                            echo osc_search_category_url();
?>"><?php
                            echo osc_category_name();
?></a> <span>(<?php
                            echo osc_category_total_items();
?>)</span>
        <?php
                        } else {
?>
        <a class="category sub-category <?php
                            echo osc_category_slug();
?>" href="#"><?php
                            echo osc_category_name();
?></a> <span>(<?php
                            echo osc_category_total_items();
?>)</span>
        <?php
                        }
?>
      </li>
      <?php
                    }
                    $m++;
                }
                if ($m > (osc_get_preference('sub_cat_limit', 'raito_teema_theme')) + 1) {
?>
      <li class="last"><a href="<?php
                    echo $_url;
?>"><strong><?php
                    _e('See more listings...', raito_teema_THEME_FOLDER);
?></strong></a></li>
      <?php
                }
?>
    </ul>
    <?php
            }
?>
    </section>
  </li>
</ul>
<?php
            $catcount++;
            if ($catcount % 4 == 0) {
                echo '</div><div class="row">';
            }
        }
?>
 </div>
<?php
    }
}
if (!function_exists('raito_teema_search_number')) {
    function raito_teema_search_number()
    {
        $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);
        $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());
        if ($search_to > osc_search_total_items()) {
            $search_to = osc_search_total_items();
        }
        
        return array(
            'from' => $search_from,
            'to' => $search_to,
            'of' => osc_search_total_items()
        );
    }
}
if (!function_exists('raito_teema_item_title')) {
    function raito_teema_item_title()
    {
        $title = osc_item_title();
        foreach (osc_get_locales() as $locale) {
            if (Session::newInstance()->_getForm('title') != "") {
                $title_ = Session::newInstance()->_getForm('title');
                if (@$title_[$locale['pk_c_code']] != "") {
                    $title = $title_[$locale['pk_c_code']];
                }
            }
        }
        return $title;
    }
}
if (!function_exists('raito_teema_item_description')) {
    function raito_teema_item_description()
    {
        $description = osc_item_description();
        foreach (osc_get_locales() as $locale) {
            if (Session::newInstance()->_getForm('description') != "") {
                $description_ = Session::newInstance()->_getForm('description');
                if (@$description_[$locale['pk_c_code']] != "") {
                    $description = $description_[$locale['pk_c_code']];
                }
            }
        }
        return $description;
    }
}
if (!function_exists('related_listings')) {
    function related_listings()
    {
        View::newInstance()->_exportVariableToView('items', array());
        
        $mSearch = new Search();
        $mSearch->addCategory(osc_item_category_id());
        $mSearch->addRegion(osc_item_region());
        $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
        $mSearch->limit('0', '3');
        
        $aItems      = $mSearch->doSearch();
        $iTotalItems = count($aItems);
        if ($iTotalItems == 3) {
            View::newInstance()->_exportVariableToView('items', $aItems);
            return $iTotalItems;
        }
        unset($mSearch);
        
        $mSearch = new Search();
        $mSearch->addCategory(osc_item_category_id());
        $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
        $mSearch->limit('0', '3');
        
        $aItems      = $mSearch->doSearch();
        $iTotalItems = count($aItems);
        if ($iTotalItems > 0) {
            View::newInstance()->_exportVariableToView('items', $aItems);
            return $iTotalItems;
        }
        unset($mSearch);
        
        return 0;
    }
}
if (!function_exists('osc_is_contact_page')) {
    function osc_is_contact_page()
    {
        if (Rewrite::newInstance()->get_location() === 'contact') {
            return true;
        }
        
        return false;
    }
}
if (!function_exists('get_breadcrumb_lang')) {
    function get_breadcrumb_lang()
    {
        $lang                           = array();
        $lang['item_add']               = __('Publish a listing', raito_teema_THEME_FOLDER);
        $lang['item_edit']              = __('Edit your listing', raito_teema_THEME_FOLDER);
        $lang['item_send_friend']       = __('Send to a friend', raito_teema_THEME_FOLDER);
        $lang['item_contact']           = __('Contact publisher', raito_teema_THEME_FOLDER);
        $lang['search']                 = __('Search results', raito_teema_THEME_FOLDER);
        $lang['search_pattern']         = __('Search results: %s', raito_teema_THEME_FOLDER);
        $lang['user_dashboard']         = __('Dashboard', raito_teema_THEME_FOLDER);
        $lang['user_dashboard_profile'] = __("%s's profile", raito_teema_THEME_FOLDER);
        $lang['user_account']           = __('Account', raito_teema_THEME_FOLDER);
        $lang['user_items']             = __('Listings', raito_teema_THEME_FOLDER);
        $lang['user_alerts']            = __('Alerts', raito_teema_THEME_FOLDER);
        $lang['user_profile']           = __('Update account', raito_teema_THEME_FOLDER);
        $lang['user_change_email']      = __('Change email', raito_teema_THEME_FOLDER);
        $lang['user_change_username']   = __('Change username', raito_teema_THEME_FOLDER);
        $lang['user_change_password']   = __('Change password', raito_teema_THEME_FOLDER);
        $lang['login']                  = __('Login', raito_teema_THEME_FOLDER);
        $lang['login_recover']          = __('Recover password', raito_teema_THEME_FOLDER);
        $lang['login_forgot']           = __('Change password', raito_teema_THEME_FOLDER);
        $lang['register']               = __('Create a new account', raito_teema_THEME_FOLDER);
        $lang['contact']                = __('Contact', raito_teema_THEME_FOLDER);
        return $lang;
    }
}

if (!function_exists('user_dashboard_redirect')) {
    function user_dashboard_redirect()
    {
        $page   = Params::getParam('page');
        $action = Params::getParam('action');
        if ($page == 'user' && $action == 'dashboard') {
            if (ob_get_length() > 0) {
                ob_end_flush();
            }
            header("Location: " . osc_user_list_items_url(), TRUE, 301);
        }
    }
    osc_add_hook('init', 'user_dashboard_redirect');
}

if (!function_exists('get_user_menu')) {
    function get_user_menu()
    {
        $options   = array();
        $options[] = array(
            'name' => __('Public Profile', raito_teema_THEME_FOLDER),
            'url' => osc_user_public_profile_url(),
            'class' => 'opt_publicprofile'
        );
        $options[] = array(
            'name' => __('Account', raito_teema_THEME_FOLDER),
            'url' => osc_user_profile_url(),
            'class' => 'opt_account'
        );
        $options[] = array(
            'name' => __('Listings', raito_teema_THEME_FOLDER),
            'url' => osc_user_list_items_url(),
            'class' => 'opt_items'
        );
        #$options[] = array(
        #'name' => __('Alerts', raito_teema_THEME_FOLDER),
        #'url' => osc_user_alerts_url(),
        #'class' => 'opt_alerts'
        #);
        $options[] = array(
            'name' => __('Change email', raito_teema_THEME_FOLDER),
            'url' => osc_change_user_email_url(),
            'class' => 'opt_change_email'
        );
        $options[] = array(
            'name' => __('Change username', raito_teema_THEME_FOLDER),
            'url' => osc_change_user_username_url(),
            'class' => 'opt_change_username'
        );
        $options[] = array(
            'name' => __('Change password', raito_teema_THEME_FOLDER),
            'url' => osc_change_user_password_url(),
            'class' => 'opt_change_password'
        );
        $options[] = array(
            'name' => __('Delete account', raito_teema_THEME_FOLDER),
            'url' => '#',
            'class' => 'opt_delete_account'
        );
        
        return $options;
    }
}

# USER PROFILE / DELETE USER
if (!function_exists('delete_user_js')) {
    function delete_user_js()
    {
        $location = Rewrite::newInstance()->get_location();
        $section  = Rewrite::newInstance()->get_section();
        if (($location === 'user' && in_array($section, array(
            'dashboard',
            'profile',
            'alerts',
            'change_email',
            'change_username',
            'change_password',
            'items'
        ))) || (Params::getParam('page') === 'custom' && Params::getParam('in_user_menu') == true)) {
            
            osc_enqueue_script('delete-user-js');
        }
    }
    osc_add_hook('header', 'delete_user_js', 1);
}

# USER PROFILE / DELETE ITEM
if (!function_exists('delete_user_item_js')) {
    function delete_user_item_js()
    {
        $location = Rewrite::newInstance()->get_location();
        $section  = Rewrite::newInstance()->get_section();
        if (($location === 'user' && in_array($section, array(
            'items'
        ))) || (Params::getParam('page') === 'custom' && Params::getParam('in_user_menu') == true)) {
            
            osc_enqueue_script('delete-user-item-js');
        }
    }
    osc_add_hook('header', 'delete_user_item_js', 1);
}

if (!function_exists('user_info_js')) {
    function user_info_js()
    {
        $location = Rewrite::newInstance()->get_location();
        $section  = Rewrite::newInstance()->get_section();
        
        if ($location === 'user' && in_array($section, array(
            'dashboard',
            'profile',
            'alerts',
            'change_email',
            'change_username',
            'change_password',
            'items'
        ))) {
            $user = User::newInstance()->findByPrimaryKey(Session::newInstance()->_get('userId'));
            View::newInstance()->_exportVariableToView('user', $user);
?>
<script type="text/javascript">
    raito_teema.user = {};
    raito_teema.user.id = '<?php
            echo osc_user_id();
?>';
    raito_teema.user.secret = '<?php
            echo osc_user_field("s_secret");
?>';
</script>
<?php
        }
    }
    osc_add_hook('header', 'user_info_js');
}

function raito_teema_add_google_fonts()
{
    echo "<link href='http://fonts.googleapis.com/css?family=" . raito_teema_google_fonts() . "' rel='stylesheet' type='text/css'>";
    echo "<style>body, .gm-style,h1, h2, h3, h4, h5, h6, .listings h2 a, .listing-attr .currency-value, input[type=text], input[type=password], textarea, select, div.fancy-select div.trigger, .main-search label {
	font-family: '" . str_replace('+', ' ', raito_teema_google_fonts()) . "', sans-serif;
}
</style>";
}

if (!function_exists('theme_raito_teema_actions_admin')) {
    function theme_raito_teema_actions_admin()
    {
        if (Params::getParam('file') == 'oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php') {
            if (Params::getParam('donation') == 'successful') {
                osc_set_preference('donation', '1', 'raito_teema_theme');
                osc_reset_preferences();
            }
        }
        switch (Params::getParam('action_specific')) {
            case ('settings'):
                osc_set_preference('site_info_text', trim(Params::getParam('site_info_text', false, false, false)), 'raito_teema_theme');
                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'raito_teema_theme');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));
                
                osc_add_flash_ok_message(__('Theme settings updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php'));
                break;
            case ('templates_home'):
                osc_set_preference('show_banner', ((Params::getParam('show_banner')) ? '1' : '0'), 'raito_teema_theme');
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'raito_teema_theme');
                osc_set_preference('show_search_country', ((Params::getParam('show_search_country')) ? '1' : '0'), 'raito_teema_theme');
                osc_set_preference('premium_listings_shown_home', Params::getParam('premium_listings_shown_home'), 'raito_teema_theme');
                osc_set_preference('sub_cat_limit', Params::getParam('sub_cat_limit'), 'raito_teema_theme');
                osc_set_preference('show_popular', Params::getParam('show_popular'), 'raito_teema_theme');
                osc_set_preference('show_popular_regions', Params::getParam('show_popular_regions'), 'raito_teema_theme');
                osc_set_preference('show_popular_cities', Params::getParam('show_popular_cities'), 'raito_teema_theme');
                osc_set_preference('show_popular_searches', Params::getParam('show_popular_searches'), 'raito_teema_theme');
                osc_set_preference('popular_regions_limit', Params::getParam('popular_regions_limit'), 'raito_teema_theme');
                osc_set_preference('popular_cities_limit', Params::getParam('popular_cities_limit'), 'raito_teema_theme');
                osc_set_preference('popular_searches_limit', Params::getParam('popular_searches_limit'), 'raito_teema_theme');
                
                osc_add_flash_ok_message(__('Templates settings updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#templates'));
                break;
            case ('templates_search'):
                osc_set_preference('premium_listings_shown', Params::getParam('premium_listings_shown'), 'raito_teema_theme');
                
                osc_add_flash_ok_message(__('Templates settings updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#templates'));
                break;
            case ('templates_item_post'):
                $locations_input_as        = Params::getParam('locations_input_as', 'raito_teema_theme');
                $locations_required        = Params::getParam('locations_required', 'raito_teema_theme');
                $category_multiple_selects = Params::getParam('category_multiple_selects', 'raito_teema_theme');
                osc_set_preference('title_minimum_length', Params::getParam('title_minimum_length', 'raito_teema_theme'), 'raito_teema_theme');
                osc_set_preference('description_minimum_length', Params::getParam('description_minimum_length', 'raito_teema_theme'), 'raito_teema_theme');
                osc_set_preference('locations_input_as', $locations_input_as, 'raito_teema_theme');
                osc_set_preference('locations_required', ($locations_required ? '1' : '0'), 'raito_teema_theme');
                osc_set_preference('category_multiple_selects', ($category_multiple_selects ? '1' : '0'), 'raito_teema_theme');
                
                osc_add_flash_ok_message(__('Templates settings updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#templates'));
                break;
            case ('ads_mgmt'):
                osc_set_preference('header-728x90', trim(Params::getParam('header-728x90', false, false, false)), 'raito_teema_theme');
                osc_set_preference('homepage-728x90', trim(Params::getParam('homepage-728x90', false, false, false)), 'raito_teema_theme');
                osc_set_preference('sidebar-300x250', trim(Params::getParam('sidebar-300x250', false, false, false)), 'raito_teema_theme');
                osc_set_preference('search-results-top-728x90', trim(Params::getParam('search-results-top-728x90', false, false, false)), 'raito_teema_theme');
                osc_set_preference('search-results-middle-728x90', trim(Params::getParam('search-results-middle-728x90', false, false, false)), 'raito_teema_theme');
                
                osc_add_flash_ok_message(__('Ads management updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#ads'));
                break;
            case ('categories_icons'):
                $catsIcons = Params::getParam('cat-icons');
                foreach ($catsIcons as $catId => $iconName) {
                    osc_set_preference('cat-icons-' . $catId, $iconName, 'raito_teema_theme_cat_icons');
                }
                osc_add_flash_ok_message(__('Category icons settings updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#category-icons'));
                break;
            case ('theme_style'):
                $color_mode = Params::getParam('theme_color_mode');
                osc_set_preference('theme_color_mode', $color_mode, 'raito_teema_theme');
                osc_set_preference('google_fonts', Params::getParam('google_fonts'), 'raito_teema_theme');
                
                $rtl_view = Params::getParam('rtl_view', 'raito_teema_theme');
                osc_set_preference('rtl_view', ($rtl_view ? '1' : '0'), 'raito_teema_theme');
                osc_set_preference('custom_css', trim(Params::getParam('custom_css', false, false, false)), 'raito_teema_theme');
                
                osc_add_flash_ok_message(__('Theme color settings updated correctly', raito_teema_THEME_FOLDER), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#theme-style'));
                
                break;
            case ('upload_favicon'):
                $package = Params::getFiles('favicon');
                if ($package['error'] == UPLOAD_ERR_OK) {
                    $img       = ImageResizer::fromFile($package['tmp_name']);
                    $ext       = $img->getExt();
                    $logo_name = 'favicon';
                    $logo_name .= '.' . $ext;
                    $path = osc_uploads_path() . $logo_name;
                    $img->saveToFile($path);
                    
                    osc_set_preference('favicon', $logo_name, 'raito_teema_theme');
                    
                    osc_add_flash_ok_message(__('The favicon image has been uploaded correctly', raito_teema_THEME_FOLDER), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", raito_teema_THEME_FOLDER), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#favicon'));
                break;
            case ('upload_logo'):
                $package = Params::getFiles('logo');
                if ($package['error'] == UPLOAD_ERR_OK) {
                    $img       = ImageResizer::fromFile($package['tmp_name']);
                    $ext       = $img->getExt();
                    $logo_name = 'logo';
                    $logo_name .= '.' . $ext;
                    $path = osc_uploads_path() . $logo_name;
                    $img->saveToFile($path);
                    
                    osc_set_preference('logo', $logo_name, 'raito_teema_theme');
                    
                    osc_add_flash_ok_message(__('The logo image has been uploaded correctly', raito_teema_THEME_FOLDER), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", raito_teema_THEME_FOLDER), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#logo'));
                break;
            
            case ('remove_favicon'):
                $logo = osc_get_preference('favicon', 'raito_teema_theme');
                $path = osc_uploads_path() . $logo;
                if (file_exists($path)) {
                    @unlink($path);
                    osc_delete_preference('favicon', 'raito_teema_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The favicon image has been removed', raito_teema_THEME_FOLDER), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", raito_teema_THEME_FOLDER), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#favicon'));
                break;
            
            case ('remove'):
                $logo = osc_get_preference('logo', 'raito_teema_theme');
                $path = osc_uploads_path() . $logo;
                if (file_exists($path)) {
                    @unlink($path);
                    osc_delete_preference('logo', 'raito_teema_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The logo image has been removed', raito_teema_THEME_FOLDER), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", raito_teema_THEME_FOLDER), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#logo'));
                break;
            
            case ('upload_homeimage'):
                $package = Params::getFiles('homeimage');
                if ($package['error'] == UPLOAD_ERR_OK) {
                    $img       = ImageResizer::fromFile($package['tmp_name']);
                    $ext       = $img->getExt();
                    $logo_name = 'homeimage';
                    $logo_name .= '.' . $ext;
                    $path = osc_uploads_path() . $logo_name;
                    $img->saveToFile($path);
                    
                    osc_set_preference('homeimage', $logo_name, 'raito_teema_theme');
                    
                    osc_add_flash_ok_message(__('The banner image has been uploaded correctly', raito_teema_THEME_FOLDER), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", raito_teema_THEME_FOLDER), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#banner'));
                break;
            case ('remove_homeimage'):
                $logo = osc_get_preference('homeimage', 'raito_teema_theme');
                $path = osc_uploads_path() . $logo;
                if (file_exists($path)) {
                    @unlink($path);
                    osc_delete_preference('homeimage', 'raito_teema_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The banner image has been removed', raito_teema_THEME_FOLDER), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", raito_teema_THEME_FOLDER), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php#banner'));
                break;
                
        }
    }
}

function raito_teema_redirect_user_dashboard()
{
    if ((Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard')) {
        header('Location: ' . osc_user_list_items_url());
        exit;
    }
}

function raito_teema_delete()
{
    Preference::newInstance()->delete(array(
        's_section' => raito_teema_THEME_FOLDER
    ));
}

osc_add_hook('init', 'raito_teema_redirect_user_dashboard', 2);
osc_add_hook('init_admin', 'theme_raito_teema_actions_admin');
osc_add_hook('theme_delete_raito_teema', 'raito_teema_delete');
osc_admin_menu_appearance(__('Raito -theme settings', raito_teema_THEME_FOLDER), osc_admin_render_theme_url('oc-content/themes/' . raito_teema_THEME_FOLDER . '/admin/settings.php'), 'settings_raito_teema');

check_install_raito_teema_theme();
if (osc_is_home_page()) {
    osc_add_hook('inside-main', 'raito_teema_draw_categories_list');
}

/* if (osc_is_home_page() || osc_is_search_page()) {
    raito_teema_add_body_class('has-searchbox');
} */

function raito_teema_sidebar_category_search($catId = null)
{
    $aCategories = array();
    if ($catId == null) {
        $aCategories[] = Category::newInstance()->findRootCategoriesEnabled();
    } else {
        // if parent category, only show parent categories
        $aCategories = Category::newInstance()->toRootTree($catId);
        end($aCategories);
        $cat             = current($aCategories);
        // if is parent of some category
        $childCategories = Category::newInstance()->findSubcategoriesEnabled($cat['pk_i_id']);
        if (count($childCategories) > 0) {
            $aCategories[] = $childCategories;
        }
    }
    
    if (count($aCategories) == 0) {
        return "";
    }
    
    raito_teema_print_sidebar_category_search($aCategories, $catId);
}

function raito_teema_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)
{
    $class = '';
    if (!isset($aCategories[$i])) {
        return null;
    }
    
    if ($i === 0) {
        $class = 'class="category"';
    }
    
    $c = $aCategories[$i];
    $i++;
    if (!isset($c['pk_i_id'])) {
        echo '<ul ' . $class . '>';
        if ($i == 1) {
            echo '<li><a href="' . osc_esc_html(osc_update_search_url(array(
                'sCategory' => null,
                'iPage' => null
            ))) . '">' . __('All categories', raito_teema_THEME_FOLDER) . "</a></li>";
        }
        foreach ($c as $key => $value) {
?>
<li> <a id="cat_<?php
            echo osc_esc_html($value['pk_i_id']);
?>" href="<?php
            echo osc_esc_html(osc_update_search_url(array(
                'sCategory' => $value['pk_i_id'],
                'iPage' => null
            )));
?>">
  <?php
            if (isset($current_category) && $current_category == $value['pk_i_id']) {
                echo '<strong>' . $value['s_name'] . '</strong>';
            } else {
                echo $value['s_name'];
            }
?>
  </a> </li>
<?php
        }
        if ($i == 1) {
            echo "</ul>";
        } else {
            echo "</ul>";
        }
    } else {
?>
<ul <?php
        echo $class;
?>>
  <?php
        if ($i == 1) {
?>
  <li><a href="<?php
            echo osc_esc_html(osc_update_search_url(array(
                'sCategory' => null,
                'iPage' => null
            )));
?>">
    <?php
            _e('All categories', raito_teema_THEME_FOLDER);
?>
    </a></li>
  <?php
        }
?>
  <li> <a id="cat_<?php
        echo osc_esc_html($c['pk_i_id']);
?>" href="<?php
        echo osc_esc_html(osc_update_search_url(array(
            'sCategory' => $c['pk_i_id'],
            'iPage' => null
        )));
?>">
    <?php
        if (isset($current_category) && $current_category == $c['pk_i_id']) {
            echo '<strong>' . $c['s_name'] . '</strong>';
        } else {
            echo $c['s_name'];
        }
?>
    </a>
    <?php
        raito_teema_print_sidebar_category_search($aCategories, $current_category, $i);
?>
  </li>
  <?php
        if ($i == 1) {
?>
  <?php
        }
?>
</ul>
<?php
    }
}

function raito_teema_item_post_form_validate()
{
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#regionId, #cityId').removeAttr('disabled');
	});

	//form validate
	$('form[name=item]').validate({
		rules: {
			catId: {
				required: true,
				digits: true
			},
			'title[<?php
    echo osc_current_user_locale();
?>]': {
				required:true,
				minlength:<?php
    echo raito_teema_title_minimum_length();
?>
			},
			'description[<?php
    echo osc_current_user_locale();
?>]': {
				minlength:<?php
    echo raito_teema_description_minimum_length();
?>
			},
			price: {
				maxlength: 50
			},
			currency: "required",
			"photos[]": {
				accept: "png,gif,jpg,jpeg"
			},
			contactName: {
				required: true,
				minlength: 3,
				maxlength: 35
			},
			contactEmail: {
				required: true,
				email: true
			},
			countryId:{
				required: <?php
    echo raito_teema_locations_required();
?>
			},
			region: {
				required: <?php
    echo raito_teema_locations_required();
?>,
				minlength: 3,
				maxlength: 100
			},
			city: {
				required: <?php
    echo raito_teema_locations_required();
?>,
				minlength: 3,
				maxlength: 100
			}
			<?php
    if (raito_teema_locations_input_as() == 'select') {
?>
			,
			regionId: {
				required: <?php
        echo raito_teema_locations_required();
?>
			},
			cityId: {
				required: <?php
        echo raito_teema_locations_required();
?>
			}
			<?php
    }
?>
			
		},
		messages: {
			catId: {
			required: "<?php
    echo osc_esc_js(__("Choose one category", raito_teema_THEME_FOLDER));
?>."
			},
			'title[<?php
    echo osc_current_user_locale();
?>]': {
				required: "<?php
    echo osc_esc_js(__("Title: this field is required", raito_teema_THEME_FOLDER));
?>.",
				minlength: "<?php
    echo osc_esc_js(__("Title too short", raito_teema_THEME_FOLDER));
?>."
			},
			'description[<?php
    echo osc_current_user_locale();
?>]': {
				minlength: "<?php
    echo osc_esc_js(__("Description too short", raito_teema_THEME_FOLDER));
?>."
			},
			price: {
				maxlength: "<?php
    echo osc_esc_js(__("Price: no more than 50 characters", raito_teema_THEME_FOLDER));
?>."
			},
			currency: "<?php
    echo osc_esc_js(__("Currency: make your selection", raito_teema_THEME_FOLDER));
?>.",
			"photos[]": {
				accept: "<?php
    echo osc_esc_js(__("Photo: must be png,gif,jpg,jpeg", raito_teema_THEME_FOLDER));
?>."
			},
			contactName: {
				required: "<?php
    echo osc_esc_js(__("Name: this field is required", raito_teema_THEME_FOLDER));
?>.",
				minlength: "<?php
    echo osc_esc_js(__("Name: enter at least 3 characters", raito_teema_THEME_FOLDER));
?>.",
				maxlength: "<?php
    echo osc_esc_js(__("Name: no more than 35 characters", raito_teema_THEME_FOLDER));
?>."
			},
			contactEmail: {
				required: "<?php
    echo osc_esc_js(__("Email: this field is required", raito_teema_THEME_FOLDER));
?>.",
				email: "<?php
    echo osc_esc_js(__("Invalid email address", raito_teema_THEME_FOLDER));
?>."
			},
			countryId: {
				required: "<?php
    echo osc_esc_js(__("Please select a country", raito_teema_THEME_FOLDER));
?>."
			},
			region: {
				required: "<?php
    echo osc_esc_js(__("Region: this field is required", raito_teema_THEME_FOLDER));
?>.",
				minlength: "<?php
    echo osc_esc_js(__("Region: enter at least 3 characters", raito_teema_THEME_FOLDER));
?>.",
				maxlength: "<?php
    echo osc_esc_js(__("Region: no more than 100 characters", raito_teema_THEME_FOLDER));
?>."
			},
			city: {
				required: "<?php
    echo osc_esc_js(__("City: this field is required", raito_teema_THEME_FOLDER));
?>.",
				minlength: "<?php
    echo osc_esc_js(__("City: enter at least 3 characters", raito_teema_THEME_FOLDER));
?>.",
				maxlength: "<?php
    echo osc_esc_js(__("City: no more than 100 characters", raito_teema_THEME_FOLDER));
?>."
			}
			<?php
    if (raito_teema_locations_input_as() == 'select') {
?>
			,
			regionId: {
				required: "<?php
        echo osc_esc_js(__("Region: this field is required", raito_teema_THEME_FOLDER));
?>."
			},
			cityId: {
				required: "<?php
        echo osc_esc_js(__("City: this field is required", raito_teema_THEME_FOLDER));
?>."
			}
			<?php
    }
?>
		},
		errorLabelContainer: "#error_list",
		wrapper: "li",
		invalidHandler: function(form, validator) {
			$('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
		},
		submitHandler: function(form){
			$('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
			setTimeout("$('button[type=submit], input[type=submit]').removeAttr('disabled')", 5000);
			form.submit();
		}
	});
</script>
<?php
}

if (osc_is_publish_page() || osc_is_edit_page()) {
    osc_add_hook('footer', 'raito_teema_item_post_form_validate');
}

class raito_teemaBodyClass
{
    /**
     * Custom Class for add, remove or get body classes.
     *
     * @param string $instance used for singleton.
     * @param array $class.
     */
    private static $instance;
    private $class;
    
    private function __construct()
    {
        $this->class = array();
    }
    
    public static function newInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function add($class)
    {
        $this->class[] = $class;
    }
    public function get()
    {
        return $this->class;
    }
}

if (!function_exists('osc_uploads_url')) {
    function osc_uploads_url($item = '')
    {
        return osc_base_url() . 'oc-content/uploads/' . $item;
    }
}

function raito_teema_site_info_text()
{
    if (osc_get_preference('site_info_text', 'raito_teema_theme')) {
        return osc_get_preference('site_info_text', 'raito_teema_theme');
    } else {
        return false;
    }
}
function raito_teema_premium_listings_shown_home()
{
    return osc_get_preference('premium_listings_shown_home', 'raito_teema_theme');
}

function raito_teema_title_minimum_length()
{
    return osc_get_preference('title_minimum_length', 'raito_teema_theme');
}
function raito_teema_description_minimum_length()
{
    return osc_get_preference('description_minimum_length', 'raito_teema_theme');
}
function raito_teema_premium_listings_shown()
{
    return osc_get_preference('premium_listings_shown', 'raito_teema_theme');
}
function raito_teema_locations_input_as()
{
    return osc_get_preference('locations_input_as', 'raito_teema_theme');
}
function raito_teema_locations_required()
{
    return (osc_get_preference('locations_required', 'raito_teema_theme') == '1') ? 'true' : 'false';
}
function raito_teema_categories_select($name, $id, $label)
{
    $name  = osc_esc_html($name);
    $id    = osc_esc_html($id);
    $label = osc_esc_html($label);
    
    $categories = Category::newInstance()->toTreeAll();
    
    if (count($categories) > 0) {
        
        $html = '<select name="' . $name . '" id="' . $id . '">';
        $html .= '<option value="">' . $label . '</option>';
        foreach ($categories as $topcat) {
            $html .= '<option class="top" value="' . $topcat['s_name'] . '">' . $topcat['s_name'] . '</option>';
            if (!empty($topcat['categories'])) {
                
                foreach ($topcat['categories'] as $subcat) {
                    $html .= '<option value="' . $subcat['s_name'] . '">&nbsp;&nbsp;' . $subcat['s_name'] . '</option>';
                }
                
            }
        }
        $html .= '</select>';
    }
    
    echo $html;
}
function raito_teema_countries_select($name, $id, $label, $value = NULL)
{
    $name  = osc_esc_html($name);
    $id    = osc_esc_html($id);
    $label = osc_esc_html($label);
    
    $aCountries = Country::newInstance()->listAll();
    if (count($aCountries) > 0) {
        $html = '<select name="' . $name . '" id="' . $id . '">';
        $html .= '<option value="">' . $label . '</option>';
        foreach ($aCountries as $country) {
            if ($value == $country['pk_c_code'])
                $selected = 'selected="selected"';
            else
                $selected = '';
            $html .= '<option value="' . $country['pk_c_code'] . '" ' . $selected . '>' . $country['s_name'] . '</option>';
        }
        $html .= '</select>';
    }
    
    echo $html;
}
function raito_teema_regions_select($name, $id, $label, $value = NULL)
{
    $name  = osc_esc_html($name);
    $id    = osc_esc_html($id);
    $label = osc_esc_html($label);
    
    $aRegions = Region::newInstance()->listAll();
    if (count($aRegions) > 0) {
        
        $html = '<select name="' . $name . '" id="' . $id . '">';
        $html .= '<option value="" id="sRegionSelect">' . $label . '</option>';
        foreach ($aRegions as $region) {
            if ($value == $region['s_name'])
                $selected = 'selected="selected"';
            else
                $selected = '';
            $html .= '<option value="' . $region['pk_i_id'] . '" ' . $selected . '>' . $region['s_name'] . '</option>';
        }
        $html .= '</select>';
    }
    
    echo $html;
}
function raito_teema_cities_select($name, $id, $label, $value = NULL)
{
    $name  = osc_esc_html($name);
    $id    = osc_esc_html($id);
    $label = osc_esc_html($label);
    
    $html = '<select name="' . $name . '" id="' . $id . '">';
    $html .= '<option value="" id="sCitySelect">' . $label . '</option>';
    if (osc_count_list_cities() > 0) {
        while (osc_has_list_cities()) {
            if ($value == osc_list_city_name())
                $selected = 'selected="selected"';
            else
                $selected = '';
            $html .= '<option value="' . osc_list_city_name() . '" ' . $selected . '>' . osc_list_city_name() . '</option>';
        }
    }
    $html .= '</select>';
    
    echo $html;
}

function raito_teema_popular_regions($limit = 20)
{
    View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>'));
    if (osc_count_list_regions() > 0) {
        $array = array();
        while (osc_has_list_regions()) {
            if (osc_list_region_items() > 0) {
                $region_name         = osc_list_region_name();
                $array[$region_name] = osc_list_region_items();
            }
        }
        arsort($array);
        return array_slice($array, 0, $limit);
    } else {
        return false;
    }
}

function raito_teema_popular_cities($limit = 20)
{
    View::newInstance()->_exportVariableToView('list_cities', Search::newInstance()->listCities('%%%%', '>'));
    if (osc_count_list_cities() > 0) {
        $array = array();
        while (osc_has_list_cities()) {
            if (osc_list_city_items() > 0) {
                $city_name         = osc_list_city_name();
                $array[$city_name] = osc_list_city_items();
            }
        }
        arsort($array);
        return array_slice($array, 0, $limit);
    } else {
        return false;
    }
}

function raito_teema_popular_searches($limit = 20)
{
    
    if (osc_count_latest_searches() > 0) {
        $conn = getConnection();
        $conn->autocommit(false);
        try {
            $results = $conn->osc_dbFetchResults("SELECT s_search, COUNT(s_search) AS total FROM %st_latest_searches WHERE s_search != '' GROUP BY s_search ORDER BY total DESC LIMIT %d", DB_TABLE_PREFIX, $limit);
            $conn->commit();
            return $results;
        }
        catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }
        $conn->autocommit(true);
    } else {
        return false;
    }
}

function raito_teema_insert_search()
{
    $search_word = Params::getParam('sPattern');
    if (isset($search_word) && $search_word != "") {
        $conn = getConnection();
        $conn->autocommit(false);
        try {
            $conn->osc_dbExec("INSERT INTO %st_latest_searches (d_date, s_search) VALUES (now(), '%s')", DB_TABLE_PREFIX, $search_word);
            $conn->commit();
        }
        catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }
        $conn->autocommit(true);
    }
}

osc_add_hook('search', 'raito_teema_insert_search');

function raito_teema_category_icon($catId)
{
    $icon = osc_esc_html(strtolower(osc_get_preference('cat-icons-' . $catId, 'raito_teema_theme_cat_icons')));
    if ($icon != "")
        return strtolower($icon);
    else
        return "shopping-cart";
}

function raito_teema_theme_color_mode()
{
    return osc_get_preference('theme_color_mode', 'raito_teema_theme');
}

function raito_teema_google_fonts()
{
    return trim(osc_get_preference('google_fonts', 'raito_teema_theme'));
}

function raito_teema_show_popular_regions()
{
    if (osc_get_preference('show_popular_regions', 'raito_teema_theme') == 1) {
        return true;
    } else {
        return false;
    }
}

function raito_teema_popular_regions_limit()
{
    return osc_get_preference('popular_regions_limit', 'raito_teema_theme');
}

function raito_teema_show_popular_cities()
{
    if (osc_get_preference('show_popular_cities', 'raito_teema_theme') == 1) {
        return true;
    } else {
        return false;
    }
}

function raito_teema_popular_cities_limit()
{
    return osc_get_preference('popular_cities_limit', 'raito_teema_theme');
}

function raito_teema_show_popular_searches()
{
    if (osc_get_preference('show_popular_searches', 'raito_teema_theme') == 1) {
        return true;
    } else {
        return false;
    }
}

function raito_teema_popular_searches_limit()
{
    return osc_get_preference('popular_searches_limit', 'raito_teema_theme');
}

# FOOTER
function raito_teema_footer_css()
{
    
    raito_teema_add_google_fonts();
    $custom_css = trim(osc_get_preference('custom_css', 'raito_teema_theme'));
    if ($custom_css != "") {
        echo "<style>";
        echo $custom_css;
        echo "</style>";
    }
}
osc_add_hook('header', 'raito_teema_footer_css');

function raito_teema_footer_js()
{
    echo '<script type="text/javascript" src="' . osc_current_web_theme_js_url('main.js') . '"></script>';
}
#osc_add_hook('footer', 'raito_teema_footer_js');

?>
