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
    osc_add_hook('header','raito_teema_follow_construct');
	
	osc_enqueue_script('jquery-validate');

    raito_teema_add_body_class('user-public-profile');
	
	osc_current_web_theme_path('header.php');
	
	$loop_template = './loops/loop-user-public-list.php';	
	
    $address = '';
	
    if(osc_user_address()!='') {
     
        $address = osc_user_address();        
    } 
	
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    #if(osc_user_country()!='') {
        #$location_array[] = osc_user_country();
    #}
    $location = implode(", ", $location_array);
    unset($location_array);

?>

<div class="row">
<div class="col-sm-8 col-md-9">
  
    <div class="user-card">	
	  
      <ul id="user_data">
        <li class="name">        
		    
			<h3>
			<i class="fa fa-user"></i>
			<?php echo osc_user_name(); ?>
			</h3>
			<?php profile_picture_show(); ?>
			<br><br>
			<p><?php echo nl2br(osc_user_info());?> </p>
		
        </li>
		<hr>
		
		<?php if( osc_user_email() !== '' ) { ?>
        <li class="email"><i class="fa fa-envelope"></i> <strong><a target="_blank" href="<?php echo osc_user_email(); ?>"> <?php echo osc_user_email() ; ?></a></strong> 
        <?php } ?>
		
		<?php if( osc_user_phone_mobile() !== '' ) { ?>
        &bull; <i class="fa fa-phone-square"></i> <strong><a target="_blank" href="<?php echo osc_user_phone_mobile(); ?>"> <?php echo osc_user_phone_mobile(); ?></a></strong></li>
        <?php } ?>
		
        <?php if( osc_user_website() !== '' ) { ?>
        <li class="website"><i class="fa fa-external-link"></i> <strong><a target="_blank" href="<?php echo osc_user_website(); ?>"><?php echo osc_user_website(); ?></a></strong></li>
        <?php } ?>
		
		<br>
        <?php if( $address !== '' ) { ?>
        <li class="adress"> <i class="fa fa-map-marker"></i> <strong><?php _e('Address', raito_teema_THEME_FOLDER);?>:</strong><br><?php echo $address; ?></li>
        <?php } ?>
        <?php if( $location !== '' ) { ?>
        <li class="location"><i class="fa fa-location-arrow"></i> <strong><?php _e('Location', raito_teema_THEME_FOLDER);?>:</strong><br><?php echo  $location; ?></li>
        <?php } ?>
      </ul>
    </div> 
    <br>
	
      <?php     
	  
	  osc_current_web_theme_path('user-public-contact-form.php'); 
	  
	  ?>	
	  
  </div>  
  
  <div class="col-sm-4 col-md-3">
    <?php if( osc_count_items() > 0 ) { ?>
    <div class="similar_ad">
      <div class="title">
        <h1>
          <?php _e('Latest listings', raito_teema_THEME_FOLDER); ?>
        </h1>
      </div>
      <?php osc_current_web_theme_path($loop_template); ?>
      <div class="pagination"><?php echo osc_pagination_items(); ?></div>
    </div>
    <?php } ?>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
