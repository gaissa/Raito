<?php # PARENT LINE 276
	if( !function_exists('osclasswizards_draw_categories_list') ) {
        function osclasswizards_draw_categories_list(){ ?>
<?php if(!osc_is_home_page()){ echo '<div class="resp-wrapper">'; } ?>

<h1 class="title"><?php _e('Categories', 'osclasswizards_child');?></h1>
<div class="row">
<?php

	$total_categories   = osc_count_categories();
	$col1_max_cat       = ceil($total_categories/1);
	osc_goto_first_category();
	$catcount	=	0;
	while ( osc_has_categories() ) {
?>
<ul class="col-sm-6 col-md-3 grid_list">
  <li>
    <section class="listings">
     <h2><i class="fa fa-<?php echo osclasswizards_category_icon( osc_category_id() ); ?>"></i>
      <?php
			$_slug      = osc_category_slug();
			$_url       = osc_search_category_url();
			$_name      = osc_category_name();
			$_total_items = osc_category_total_items();
			if ( osc_count_subcategories() > 0 ) { ?>
      <?php } ?>
      <?php if($_total_items > 0) { ?>
      <a class="category <?php echo $_slug; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?></a> <span><?php echo $_total_items ; ?></span>
      <?php } else { ?>
      <a class="category <?php echo $_slug; ?>" href="#"><?php echo $_name ; ?></a> <span><?php echo $_total_items ; ?></span>
      <?php } ?>
    </h2>
    <?php if ( osc_count_subcategories() > 0 ) { $m=1; ?>
    <ul>
      <?php while ( osc_has_subcategories() ) { if( $m<=(osc_get_preference('sub_cat_limit', 'osclasswizards_theme'))){?>
      <li>
        <?php if( osc_category_total_items() > 0 ) { ?>
        <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
        <?php } else { ?>
        <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="#"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
        <?php } ?>
      </li>
      <?php } $m++; } if($m>(osc_get_preference('sub_cat_limit', 'osclasswizards_theme'))+1) {?>
      <li class="last"><a href="<?php echo $_url; ?>"><strong><?php _e('See more listings...', 'osclasswizards_child');?></strong></a></li>
      <?php } ?>
    </ul>
    <?php } ?>
    </section>
  </li>
</ul>
<?php
		$catcount++;
		if($catcount%4==0)
		{
			echo '</div><div class="row">';
		}
    }
 ?>
 </div>
<?php
        }
    }	
?><!-- END OF OVERRIDE 276-->

<?php # PARENT LINE 424	
	if( !function_exists('get_breadcrumb_lang') ) {
        function get_breadcrumb_lang() {
            $lang = array();
            $lang['item_add']               = __('Publish a listing', 'osclasswizards_child');
            $lang['item_edit']              = __('Edit your listing', 'osclasswizards_child');
            $lang['item_send_friend']       = __('Send to a friend', 'osclasswizards_child');
            $lang['item_contact']           = __('Contact publisher', 'osclasswizards_child');
            $lang['search']                 = __('Search results', 'osclasswizards_child');
            $lang['search_pattern']         = __('Search results: %s', 'osclasswizards_child');
            $lang['user_dashboard']         = __('Dashboard', 'osclasswizards_child');
            $lang['user_dashboard_profile'] = __("%s's profile", 'osclasswizards_child');
            $lang['user_account']           = __('Account', 'osclasswizards_child');
            $lang['user_items']             = __('Listings', 'osclasswizards_child');
            $lang['user_alerts']            = __('Alerts', 'osclasswizards_child');
            $lang['user_profile']           = __('Update account', 'osclasswizards_child');
            $lang['user_change_email']      = __('Change email', 'osclasswizards_child');
            $lang['user_change_username']   = __('Change username', 'osclasswizards_child');
            $lang['user_change_password']   = __('Change password', 'osclasswizards_child');
            $lang['login']                  = __('Login', 'osclasswizards_child');
            $lang['login_recover']          = __('Recover password', 'osclasswizards_child');
            $lang['login_forgot']           = __('Change password', 'osclasswizards_child');
            $lang['register']               = __('Create a new account', 'osclasswizards_child');
            $lang['contact']                = __('Contact', 'osclasswizards_child');
            return $lang;
        }
    }
?> <!-- END OF OVERRIDE 424-->