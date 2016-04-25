function invokeScript() {
	
	var e = $("#plugin-hook select");"undefined"!=typeof e.html()&&e.each(function() {		
		$(this).next().is("a")||selectUi($(this))
	});
	
	var i = $("");$("input").on("ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed",	
	function() {		
		i.prepend("")
	}).iCheck({checkboxClass:"square",radioClass:"circle",increaseArea:"20%"})
}

$(document).ready(function() {

	$(".toggle").click(function() {
		
		return $(".links").slideToggle(400),!1
	})
	,$(".language span").click(function(){
			
		return $(".language ul").slideToggle(400),!1			
	}),
	$("#show_filters").click(function() {
				
		return $("#filters_shown").slideToggle(400),!1
	}),
	invokeScript(),	
	$("#mask_as_form select").on("change",function() {
		$("#mask_as_form").submit()
	}),
	$(".item-post, #plugin-hook").on("mouseover hover click", function(){					
		invokeScript()
	}),
	$("#sCountry").on("change",function() {
		var e = $("#sRegionSelect").text(),i=$("#sCitySelect").text();
		
		$("#sRegion").next().children(".select-box-label").text(e),
		$("#sCity").next().children(".select-box-label").text(i);
		
		var t = $(this).val(),s=raito_teema.base_url+"?page=ajax&action=regions&countryId="+t,o='<option value="" id="sRegionSelect">'+e+"</option>";""!=t&&$.ajax({
			
			type:"POST",url:s,dataType:"json",success:function(e) {			
				var i=e.length;
				if(i>0){
					for(key in e)o+='<option value="'+e[key].pk_i_id+'">'+e[key].s_name+"</option>";$("#sRegion").html(o)
				}
			}
		})
	}),
	$("#sRegion").on("change", function() {
		var e = $("#sCitySelect").text();$("#sCity").next().children(".select-box-label").text(e);
		
		var i = $(this).val(),t=raito_teema.base_url+"?page=ajax&action=cities&regionId="+i,s='<option value="" id="sCitySelect">'+e+"</option>";""!=i&&$.ajax({
			type:"POST",url:t,dataType:"json",success:function(e){
			var i = e.length;
		
			if(i>0) {
				for(key in e)s+='<option value="'+e[key].s_name+'">'+e[key].s_name+"</option>";$("#sCity").empty().html(s)
			}

		}})
	})
});