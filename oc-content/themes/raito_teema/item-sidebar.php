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

<div id="sidebar">
  <?php if( osc_get_preference('sidebar-300x250', 'raito_teema_theme') != '') {?>
  <div class="ads_300"> <?php echo osc_get_preference('sidebar-300x250', 'raito_teema_theme'); ?> </div>
  <?php } ?>
  
  
  <div id="contact" class="widget-box form-container form-vertical">
    <?php if( osc_item_is_expired () ) { ?>
    <p class="alert_user">
      <?php _e("The listing is expired. You can't contact the publisher.", raito_teema_THEME_FOLDER); ?>
    </p>
    <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
    <p class="alert_user">
      <?php _e("It's your own listing, you can't contact the publisher.", raito_teema_THEME_FOLDER); ?>
    </p>
    <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
    <p class="alert_user">
      <?php _e("You must log in or register a new account in order to contact the advertiser", raito_teema_THEME_FOLDER); ?>
    </p>
    <p class="contact_button"> <strong><a href="<?php echo osc_user_login_url(); ?>">
      <?php _e('Login', raito_teema_THEME_FOLDER); ?>
      </a></strong> <strong><a href="<?php echo osc_register_account_url(); ?>">
      <?php _e('Register for a free account', raito_teema_THEME_FOLDER); ?>
      </a></strong> </p>
    <?php } else { ?>
    <?php if( osc_item_user_id() != null ) { ?>
	
	
    <div class="user-card">	
  
	  
      <!--<figure><img class="img-responsive" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=400&d=<?php echo osc_current_web_theme_url('images/default.gif') ; ?>" /></figure> -->
	  
    </div>
	
    <h1 class="name">
	
	<li><a class="see_all" href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>">
            <?php _e('Profile and other items', raito_teema_THEME_FOLDER); ?>
    </a> </li><hr>
	
	  <i class="fa fa-user"></i>
      <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></h1>
	    <?php profile_picture_show(); ?>
		<br><br>
		
    <?php } else { ?>
    <h3 class="name"><i class="fa fa-user"></i><?php printf('%s', osc_item_contact_name()); ?></h3>
    <?php } ?>
	<h5 class="name">
    <?php _e("Contact publisher", raito_teema_THEME_FOLDER); ?>:
  </h5>
    <?php if( osc_item_show_email() ) { ?>
    <p class="email"><?php printf(__('E-mail: %s', raito_teema_THEME_FOLDER), osc_item_contact_email()); ?></p>
    <?php } ?>
    <?php if ( osc_user_phone() != '' ) { ?>
    <p class="phone"><i class="fa fa-phone"></i><?php printf('%s', osc_user_phone()); ?></p>
    <?php } ?>
    <ul id="error_list">
    </ul>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
      <?php osc_prepare_user_info(); ?>
      <input type="hidden" name="action" value="contact_post" />
      <input type="hidden" name="page" value="item" />
      <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
      <div class="form-group">
        <label class="control-label" for="yourName">
          <?php _e('Your name', raito_teema_THEME_FOLDER); ?>
          :</label>
        <div class="controls">
          <?php ContactForm::your_name(); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="yourEmail">
          <?php _e('Your e-mail address', raito_teema_THEME_FOLDER); ?>
          :</label>
        <div class="controls">
          <?php ContactForm::your_email(); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="phoneNumber">
          <?php _e('Phone number', raito_teema_THEME_FOLDER); ?>
          (
          <?php _e('optional', raito_teema_THEME_FOLDER); ?>
          ):</label>
        <div class="controls">
          <?php ContactForm::your_phone_number(); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="message">
          <?php _e('Message', raito_teema_THEME_FOLDER); ?>
          :</label>
        <div class="controls textarea">
          <?php ContactForm::your_message(); ?>
        </div>
      </div>
      <?php if(osc_item_attachment()) { ?>
      <div class="form-group">
        <label class="control-label" for="attachment">
          <?php _e('Attachment', raito_teema_THEME_FOLDER); ?>
          :</label>
        <div class="controls">
          <?php ContactForm::your_attachment(); ?>
        </div>
      </div>
      <?php }; ?>
	  
      <div class="form-group">
        <div class="controls">
          <?php
    		osc_run_hook('item_contact_form', osc_item_id());		  
			osc_current_web_theme_path('google-recaptcha.php');
		  ?>
			
          <button type="submit" class="btn btn-success">
          <?php _e("Send", raito_teema_THEME_FOLDER);?>
          </button>
        </div>
      </div>
    </form>

    <?php ContactForm::js_validation(); ?>
    <?php } ?>
  </div>
  
</div>

<script>
$(document).ready(function() {
    console.log("ready!");

	$( "body" ).click(function() {
	  console.log("test");
	});

});
</script>
