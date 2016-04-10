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
</div>
</div>
<?php osc_run_hook('after-main'); ?>
</div>
<?php osc_show_widgets('footer');?>

<footer id="footer">
  <div class="container">
    <div class="footer">
      <?php ?>
      <?php if ( osc_count_web_enabled_locales() > 1) { ?>
      <?php osc_goto_first_locale(); ?>
      <strong>
      <?php _e('Language:', raito_teema_THEME_FOLDER); ?>
      </strong>
      <ul>
        <?php $i = 0;  ?>
        <?php while ( osc_has_web_enabled_locales() ) { ?>
        <li><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></li>
        <?php if( $i == 0 ) { echo ""; } ?>
        <?php $i++; ?>
        <?php } ?>
      </ul>
      <?php } ?>
      <ul>
        <?php if( osc_users_enabled() ) { ?>
        <?php if( osc_is_web_user_logged_in() ) { ?>
        <li> <?php echo sprintf(__('Hi %s', raito_teema_THEME_FOLDER), osc_logged_user_name() . '!'); ?> &#10072; <strong><a href="<?php echo osc_user_dashboard_url(); ?>">
          <?php _e('My account', raito_teema_THEME_FOLDER); ?>
          </a></strong> <a href="<?php echo osc_user_logout_url(); ?>">
          <?php _e('Logout', raito_teema_THEME_FOLDER); ?>
          </a> </li>
        <?php } else { ?>
        <li> <a href="<?php echo osc_user_login_url(); ?>">
          <?php _e('Login', raito_teema_THEME_FOLDER); ?>
          </a></li>
        <?php if(osc_user_registration_enabled()) { ?>
        <li> <a href="<?php echo osc_register_account_url(); ?>">
          <?php _e('Register for a free account', raito_teema_THEME_FOLDER); ?>
          </a> </li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php
        osc_reset_static_pages();
        while( osc_has_static_pages() ) { ?>
        <li> <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a> </li>
        <?php
        }
        ?>
        <li> <a href="<?php echo osc_contact_url(); ?>">
          <?php _e('Contact', raito_teema_THEME_FOLDER); ?>
          </a> </li>
        <?php if( osc_is_web_user_logged_in() && osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
        <li class="publish"> <a href="<?php echo osc_item_post_url_in_category(); ?>">
          <?php _e("Publish your ad for free", raito_teema_THEME_FOLDER);?>
          </a> </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</footer>
<?php osc_run_hook('footer'); ?>