<?php
	// Global Variable
	$message = '';
	$SubCategory_Array = Array();
	
	// url get contents
	function get_page_content($url)
	{ 
		$ch = curl_init($url); 
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
		$page = curl_exec($ch); 
		curl_close($ch); 
		
		return $page; 
	}
?>

<?php
	// Import XML
	function ImportXML($filename)
	{
		global $message;
		
		if (file_exists($filename)) 
		{
			$xml = simplexml_load_file($filename);
			funcCategory($xml);
			
			$message = $message." Import Category to be successful.";
		}
		else
		{
			$message = "Error: open fails, File XML not found.";
		}	
	}	
	
	function funcCategory($xml)
	{
		$position_cat = 0;
		foreach ($xml->Category as $itemCategory)
		{
			$parent = insertCategory($itemCategory->Name, $position_cat++, NULL);
			
			$position_sub_cat = 0;
			foreach ($itemCategory->SubCategory as $itemSubCategory)
			{
				if(count($itemSubCategory->children()) > 0)
				{
					funcSubCategory($itemSubCategory->children(), $parent);
				}
				else
				{
					insertCategory($itemSubCategory, $position_sub_cat++, $parent);
				}				
			}
		}
	}

	function funcSubCategory($SubCategory, $parent)
	{	
		$parent = insertCategory($SubCategory->Name, 0, $parent);
		
		foreach ($SubCategory->SubCategory as $itemSubCategory)
		{
			if(count($itemSubCategory->children()) > 0)
			{
				funcSubCategory($itemSubCategory->children(), $parent);
			}
			else
			{
				insertCategory($itemSubCategory, 0, $parent);
			}
		}
	}
	
	function insertCategory($item, $position, $parent)
	{		
		// Create Category or SubCategory
		$default_locale = osc_language();
		$fields['i_expiration_days'] = 0;
		$fields['b_enabled'] = 1;
		$fields['i_position'] = $position;
		$fields['fk_i_parent_id'] = $parent;
		$aFieldsDescription[$default_locale]['s_name'] = (string)$item;
		
		$CAC = Category::newInstance();
		$categoryId = $CAC->insert($fields, $aFieldsDescription);		
		
		return $categoryId;
	}
?>	

<?php	
	// Export to XML
	function ExportXML()
	{		
		// XML	
		$xml = new DomDocument('1.0', 'UTF-8');
		
		$root = $xml->createElement('Categories');
		$root = $xml->appendChild($root);
		
		$categories = NULL;

		if(View::newInstance()->_exists('categories')) 
		{
			$categories = View::newInstance()->_get('categories') ;
		}
		else 
		{
			$categories = osc_get_categories() ;
		}
		
		global $SubCategory_Array;
		foreach($categories as $c) 
		{
			$Category = $xml->createElement('Category');
			$Category =$root->appendChild($Category);
			
			$Name = $xml->createElement('Name', $c['s_name']);
			$Name = $Category->appendChild($Name);
			
			if(isset($c['categories']) && is_array($c['categories']))
			{
				CreateCategory($c['categories'], $xml, $Category);
			}
		}
		
		$xml->formatOutput = true;
		$xml->saveXML();
		
		$xml->save('outCategory.xml');
		
		global $message;
		$message = "Successful Category export. '/oc-admin/outCategory.xml'";
	}	
	
	function CreateCategory($categories, $xml, $node)
	{
		if(is_array($categories))
		{
			foreach($categories as $c)
			{
				if(count($c['categories']) == 0)
				{
					$SubCat = $xml->createElement('SubCategory', $c['s_name']);
					$SubCat = $node->appendChild($SubCat);			
				}
				else
				{
					$SubCat = $xml->createElement('SubCategory');
					$SubCat = $node->appendChild($SubCat);
					
					$Name = $xml->createElement('Name', $c['s_name']);
					$Name = $SubCat->appendChild($Name);
					
					CreateCategory($c['categories'], $xml, $SubCat);					
				}
			}
		}
	}
?>

<?php
	
	global $message;
	
	// Delete Categories
	if(Params::getParam('del') != null)
	{
		if(Params::getParam('del') == 1)
		{
			$categoryManager = Category::newInstance();
			
			$categories = NULL;
			
			if(View::newInstance()->_exists('categories')) 
			{
				$categories = View::newInstance()->_get('categories');
			}
			else 
			{
				$categories = osc_get_categories();
			}
			
			foreach($categories as $c)
			{
				$res = $categoryManager->deleteByPrimaryKey($c['pk_i_id']); // fk_i_category_id
				
				if($res <= 0) {
					$message = 'An error occurred while deleting';
					return;
				}	
			}
		}
	}
	
	// Import from URL
	if(Params::getParam('from_url') != null)
	{
		try
		{
			// Get Contents URL
			$contents = get_page_content(Params::getParam('from_url'));
			
			$pos_i = strpos($contents, '<select name="sCategory" id="sCategory">');
			$pos_f = strpos($contents, '</option></select>') + 18;
			
			$cad = explode('</option>', substr($contents, $pos_i, $pos_f-$pos_i));

			for($i = 1; $i < count($cad)-1; $i++)
			{
				for($j = 0; $j < strlen($cad[$i]); $j++)
				{
					if($cad[$i][$j] == '>')
					{
						$j++;
						$cad[$i] = str_replace('&nbsp;', '#', substr($cad[$i], $j));
						$message = $message.$cad[$i].';';
					}
				}
			}
			
			$position_cat = 0;
			$parents = Array();
			
			for($i = 1; $i < count($cad)-1; $i++)
			{
				$k = 0;
				$nivel = 0;
				while (substr($cad[$i], $k, 2) == "##")
				{
					$k += 2;
					$nivel++;
				}
				
				if($nivel == 0)
				{
					$parents[0] = insertCategory(str_replace('#', '', $cad[$i]), $position_cat++, NULL);
				}
				else
				{
					$parents[$nivel] = insertCategory(str_replace('#', '', $cad[$i]), 0, $parents[$nivel-1]);
				}
			}
			
			$message = " Import Category to be successful.";
		}
		catch(Exception $ex)
		{    
			$message = $ex->getMessage();
		}
	}
	else if(Params::getParam('func') != null)
	{
		if(Params::getParam('func') == 'import')
		{
			$uploaddir = getcwd().'/';
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
			
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
			{
			  ImportXML($_FILES['userfile']['name']);
			} 
			else 
			{
			   $message = "Upload failed.";
			}
		}
		
		if(Params::getParam('func') == 'export')
		{
			try
			{
				ExportXML();
			}
			catch(Exception $ex)
			{    
				$message = $ex->getMessage();
			}
		}
	}
?>

<div style="border: 1px solid #ccc; background: #f3f3f3;">
	<div style="padding: 20px; height: 240px">
		<div style="float: left; width: 50%;">
			<fieldset>
				<legend style="margin: 0; padding: 0;"><?php _e('XML Import Export Category: <br /><br />', 'xml_import_export_category'); ?></legend>
				
				<div>
					<input type="radio" name="group1" value="XML" id="XML" checked>
					<label for="XML">XML</label>
					<input type="radio" name="group1" value="URL" id="URL">
					<label for="URL">URL</label>
					<div id="divDelCategory" style="margin: 5px;"><input name="DelCategory" id="DelCategory" type="checkbox" value="1"/>Deleting all category before import.</div>
				</div>
				
				<div>
					<form id="importform" enctype="multipart/form-data" action="<?php echo osc_admin_base_url(true).'?page=plugins&action=renderplugin&file=xml_import_export_category/functions.php?func=import';?>"" method="post">
						<p>Import XML:</p>
						<div id="divuserfile"><input name="userfile" id="userfile" type="file"/></div>
						<div style="margin-top: 5px;"><input id="importformsubmit" type="submit" value="Import"/></div>
					</form>
				</div>

				<div>
					<form style="display: none;" id="importformurl" enctype="multipart/form-data" action="" method="post">
						<p>Import from URL: <strong>http://Osclass Site/</strong></p>
						<div id="divinput"><input id="iURL" size="35" type="text" value="http://"></div>
						<div style="margin-top: 5px;"><input id="importformurlsubmit" type="submit" value="Import" /></div>
					</form>
				</div>
				
				<div style="margin-top: 20px;">
					<form id="exportform" enctype="multipart/form-data" action="" method="post">
						<p>Export XML: </p>
						<div><input type="submit" value="Exporto to XML" /></div>
					</form>
				</div>
			</fieldset>
        </div>
		
		<div style="float: left; width: 50%;">
			<fieldset>
				<legend><?php _e('Help: <br /><br />', 'xml_import_export_category'); ?></legend>
				<p>
					<label>
						<?php _e('Select XML file to import and create Category.<br />Click \'Export to XML\' for export Category to XML.', 'xml_import_export_category'); ?>
					</label>
				</p>
			</fieldset>
		</div>

		<div style="float: right; margin: 100px 5px 5px 0px;">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="JM3NWYL8LFUF4">
				<input type="image" src="https://www.paypalobjects.com/en_US/ES/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
		
		<div style="margin: 120px 0 20px 0;">
			<img style="display: none;" id="wait" src="<?php echo osc_base_url().'oc-content/plugins/xml_import_export_category/img/ajax-loader.gif'?>" alt="Loading" />
			<p><strong id="message"><?php global $message; echo $message;?></strong></p>
		</div>		
		
		<div style="clear: both;"></div>
    </div>
</div>

<script src="<?php echo osc_base_url().'oc-content/plugins/xml_import_export_category/js/jquery.form.min.js'?>" type="text/javascript" ></script>

<script type="text/javascript">
	
	$("#DelCategory").click(function() {
		
		var _url = '<?php echo osc_admin_base_url(true).'?page=plugins&action=renderplugin&file=xml_import_export_category/functions.php?func=import';?>';
		
		if($('#DelCategory').prop('checked')) 
		{
			_url = _url + '&del=1';
		}
		else
		{
			_url = _url + '&del=0';
		}
		$('#importform').attr('action', _url);
	});
	

	$("input[type=text]").click(function() {
	   $(this).select();
	});
	
	// Disable function
	/*jQuery.fn.extend({
		disable: function(state) {
			return this.each(function() {
				this.disabled = state;
			});
		}
	});

	$('input[type="submit"], input[type="button"], button').disable(true);
	
	$("#userfile").change(function() {
		
		if($("#userfile").val() == "") 
		{
			// Disabled with:
			$('input[type="submit"], input[type="button"], button').disable(true);
		}
		else 
		{
			// Enabled with:
			$('input[type="submit"], input[type="button"], button').disable(false);
		}
	});
	*/
	
	$("input[type=radio]").click(function() 
	{
	   if($(":checked").val() == "URL")
	   {
			$('#importform').hide();
			$('#importformurl').show();
	   }
	   else
	   {
			$('#importformurl').hide();
			$('#importform').show();
	   }
	});

	$("#importform").ajaxForm({
		type: "POST",
		beforeSubmit: function()
		{
			$('#message').html('');
			if($('#userfile').val() != '')
			{
				$('#wait').show();
			}
		},
		success: function(data)
		{
			$('#wait').hide();
			
			var msg = '';
			pos = data.indexOf("id=\"message\"");
			for(var i = pos+13; i < data.length && data[i] != '<'; i++)
			{
				msg = msg + data[i];
			}
			
			var tmp = $('#userfile').clone();
			$('#userfile').remove();
			$('#divuserfile').html(tmp);

			$('#message').html(msg);
		}
	});	
	
	$(document).ready(function(){
	
		$("#importformurl").submit(function(){
			$('#message').html('');
			
			if($(":checked").val() == "URL")
			{
				var regexp = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
				
				if(!regexp.test($('#iURL').val()))
				{
					alert('Invalid URL');
					return false;
				}
			}
			
			$('#wait').show();
			
			var url_importformurl = '<?php echo osc_admin_base_url(true).'?page=plugins&action=renderplugin&file=xml_import_export_category/functions.php?from_url=';?>' + encodeURIComponent($('#iURL').val());
			
			if($('#DelCategory').prop('checked')) 
			{
				url_importformurl = url_importformurl + '&del=1';
			}
			else
			{
				url_importformurl = url_importformurl + '&del=0';
			}
			
			$.ajax({
				type: "POST",
				url: url_importformurl,
				
				success: function(data){
					$('#wait').hide();
					
					var msg = '';
					pos = data.indexOf("id=\"message\"");
					for(var i = pos+13; i < data.length && data[i] != '<'; i++)
					{
						msg = msg + data[i];
					}
					
					$('#message').html(msg);		
				},  
				error: function(e){  
					var err = eval("(" + e.responseText + ")");
					alert(err.Message);
				}
			});
			
			return false;
		});
	  
		$("#exportform").submit(function(){
			$('#message').html('');		
			$('#wait').show();
			$.ajax({  
				type: "POST",  
				url: '<?php echo osc_admin_base_url(true).'?page=plugins&action=renderplugin&file=xml_import_export_category/functions.php';?>',  
				data: {func : 'export'},
				
				success: function(data){
					$('#wait').hide();
					
					var msg = '';
					pos = data.indexOf("id=\"message\"");
					for(var i = pos+13; i < data.length && data[i] != '<'; i++)
					{
						msg = msg + data[i];
					}
					
					$('#message').html(msg);
				},  
				error: function(e){  
					var err = eval("(" + e.responseText + ")");
					alert(err.Message);
				}
			});
			
			return false;
		});
	});
</script>
