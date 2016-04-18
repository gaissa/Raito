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
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<h2 class="render-title">
  <?php _e('Home page settings', raito_teema_THEME_FOLDER); ?>
</h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.raito_teema_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" class="nocsrf">
  <input type="hidden" name="action_specific" value="templates_home" />
  <fieldset>
    <div class="form-horizontal">
      <div class="form-row">
        <div class="form-label">
          <?php _e('Show banner', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" name="show_banner" value="1" <?php echo ( osc_esc_html( osc_get_preference('show_banner', 'raito_teema_theme') ) == "1")? "checked": ""; ?>>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Search placeholder', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'raito_teema_theme') ); ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Search country option', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" class="switch" name="show_search_country" value="1" <?php echo (osc_esc_html( osc_get_preference('show_search_country', 'raito_teema_theme') ) == "1")? "checked": ""; ?>>
          </div>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-label">
          <?php _e('Premium listings shown', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <input type="number" min="1" max="50" class="xlarge" name="premium_listings_shown_home" value="<?php echo osc_esc_html( osc_get_preference('premium_listings_shown_home', 'raito_teema_theme') ); ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Subcategories limit ', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <input type="number" min="1" max="100" class="xlarge" name="sub_cat_limit" value="<?php echo osc_esc_html( osc_get_preference('sub_cat_limit', 'raito_teema_theme') ); ?>">
        </div>
      </div>
	   <div class="form-row">
        <div class="form-label">
          <?php _e('Show popular', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" name="show_popular" value="1" <?php echo ( osc_esc_html( osc_get_preference('show_popular', 'raito_teema_theme') ) == "1")? "checked": ""; ?>>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Popular searches', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" name="show_popular_searches" value="1" <?php echo ( osc_esc_html( osc_get_preference('show_popular_searches', 'raito_teema_theme') ) == "1")? "checked": ""; ?>>
          </div>
        </div>
      </div>
	   <div class="form-row">
        <div class="form-label">
          <?php _e('Popular regions', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" name="show_popular_regions" value="1" <?php echo ( osc_esc_html( osc_get_preference('show_popular_regions', 'raito_teema_theme') ) == "1")? "checked": ""; ?>>
          </div>
        </div>
      </div>
	        <div class="form-row">
        <div class="form-label">
          <?php _e('Popular cities', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" name="show_popular_cities" value="1" <?php echo ( osc_esc_html( osc_get_preference('show_popular_cities', 'raito_teema_theme') ) == "1")? "checked": ""; ?>>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Popular searches limit', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <input type="number" min="1" max="100" name="popular_searches_limit" value="<?php echo osc_esc_html( osc_get_preference('popular_searches_limit', 'raito_teema_theme') ); ?>">
        </div>
      </div>

      <div class="form-row">
        <div class="form-label">
          <?php _e('Popular regions limit', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <input type="number" min="1" max="100" name="popular_regions_limit" value="<?php echo osc_esc_html( osc_get_preference('popular_regions_limit', 'raito_teema_theme') ); ?>">
        </div>
      </div>

      <div class="form-row">
        <div class="form-label">
          <?php _e('Popular cities limit', raito_teema_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <input type="number" min="1" max="100" name="popular_cities_limit" value="<?php echo osc_esc_html( osc_get_preference('popular_cities_limit', 'raito_teema_theme') ); ?>">
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-actions">
    <input type="submit" value="<?php echo osc_esc_html(__('Save changes', raito_teema_THEME_FOLDER)); ?>" class="btn btn-submit">
  </div>
</form>
