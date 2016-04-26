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

    // meta tag robots
    osc_add_hook('header','raito_teema_nofollow_construct');

    raito_teema_add_body_class('user user-profile');
   
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return osc_esc_html(__('Update account', raito_teema_THEME_FOLDER));
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
?>

<div class="row">
  <?php
	    osc_current_web_theme_path('user-sidebar.php');
   ?>
  <div class="col-sm-8 col-md-9">
    <h1 class="title">
      <?php _e('Update account', raito_teema_THEME_FOLDER); ?>
    </h1>
    <?php UserForm::location_javascript(); ?>
    <div class="dashboard_form">
      <ul id="error_list">
      </ul>
	  <?php profile_picture_upload(); ?>
      <form action="<?php echo osc_base_url(true); ?>" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="page" value="user" />
        <input type="hidden" name="action" value="profile_post" />
        <div class="form-group">
          <label class="control-label" for="name">
            <?php _e('Name', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::name_text(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="user_type">
            <?php _e('User type', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::is_company_select(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="phoneMobile">
            <?php _e('Cell phone', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::mobile_text(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="phoneLand">
            <?php _e('Phone', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::phone_land_text(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="country">
            <?php _e('Country', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="region">
            <?php _e('Region', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="city">
            <?php _e('City', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="city_area">
            <?php _e('City area', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::city_area_text(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label"l for="address">
            <?php _e('Address', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::address_text(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="webSite">
            <?php _e('Website', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::website_text(osc_user()); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="s_info">
            <?php _e('Description', raito_teema_THEME_FOLDER); ?>
          </label>
          <div class="controls">
            <?php UserForm::info_textarea('s_info', osc_current_user_locale(), @$osc_user['locale'][osc_current_user_locale()]['s_info']); ?>
          </div>
        </div>
        <?php osc_run_hook('user_profile_form', osc_user()); ?>
        <div class="form-group">
          <div class="controls">
            <button type="submit" class="btn btn-success">
            <?php _e("Update", raito_teema_THEME_FOLDER);?>
            </button>
          </div>
        </div>
        <div class="form-group">
          <div class="controls">
            <?php osc_run_hook('user_form', osc_user()); ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
