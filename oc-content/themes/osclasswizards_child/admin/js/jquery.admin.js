$(function(){
	$("#tabs").tabs(),$("input[type=checkbox]"),
	$(".cats, .sub-cats").accordion({
		active:!1,collapsible:!0,heightStyle:"content"
	});	
	
	$("#categories-icons input").keyup(function(){
										var t=$(this).attr("cat-id"),
										i=$(this).val();
										$("#icon-"+t).attr("class","fa fa-"+i.toLowerCase())}
)});