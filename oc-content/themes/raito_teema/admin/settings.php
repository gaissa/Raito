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

<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/jquery.switchButton.css');?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/admin.main.css');?>">

<div id="tabs" class="wizards_tab wiz_main_tabs" style="display: none">
  <ul>
    <li><a href="#general"><?php _e('General',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#theme-style"><?php _e('Theme Style',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#templates"><?php _e('Templates',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#logo"><?php _e('Header Logo',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#favicon"><?php _e('Favicon',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#banner"><?php _e('Banner',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#category-icons"><?php _e('Category Icons',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#ads"><?php _e('Ads Management',raito_teema_THEME_FOLDER);?></a></li>
    <li><a href="#documentation"><?php _e('Documentation',raito_teema_THEME_FOLDER);?></a></li>
  </ul>
  <div id="general">
    <h2 class="render-title">
      <?php _e('Theme settings', raito_teema_THEME_FOLDER); ?>
    </h2>
    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.raito_teema_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" class="nocsrf">
      <input type="hidden" name="action_specific" value="settings" />
      <fieldset>
        <div class="form-horizontal">
          <div class="form-row">
            <div class="form-label">
              <?php _e('Welcome message', raito_teema_THEME_FOLDER); ?>
            </div>
            <div class="form-controls">
              <textarea style="height: 50px; width: 500px;" name="site_info_text"><?php echo osc_get_preference('site_info_text', 'raito_teema_theme'); ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-label">
              <?php _e('Show lists as', raito_teema_THEME_FOLDER); ?>
            </div>
            <div class="form-controls">
              <select name="defaultShowAs@all">
                <option value="gallery" <?php if((raito_teema_default_show_as()) == 'gallery'){ echo 'selected="selected"'; } ?>>
                <?php echo osc_esc_html(__('Grid',raito_teema_THEME_FOLDER)); ?>
                </option>
                <option value="list" <?php if((raito_teema_default_show_as()) == 'list'){ echo 'selected="selected"'; } ?>>
                <?php echo osc_esc_html(__('List',raito_teema_THEME_FOLDER)); ?>
                </option>
              </select>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-actions">
        <input type="submit" value="<?php echo osc_esc_html(__('Save changes', raito_teema_THEME_FOLDER)); ?>" class="btn btn-submit btn-success">
      </div>
    </form>
  </div>

  <div id="theme-style">
    <?php include 'theme-style.php'; ?>
  </div>
  <div id="templates">
    <?php include 'templates.php'; ?>
  </div>
  <div id="logo">
    <?php include 'header.php'; ?>
  </div>
  <div id="favicon">
    <?php include 'favicon.php'; ?>
  </div>
  <div id="banner">
    <?php include 'homeimage.php'; ?>
  </div>
  <div id="category-icons">
    <?php include 'category-icons.php'; ?>
  </div>
  <div id="ads">
    <?php include 'ads.php'; ?>
  </div>
  <div id="documentation">
    <?php include 'documentation.php'; ?>
  </div>
  
</div>

<!-- include admin side menu js and replace checkboxes with the switchbutton for mobile -->
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.switchButton.js');?>"></script>
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.admin.js');?>"></script>
