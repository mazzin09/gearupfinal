var hamMenu = $('.hamburger-menu');
var sideMenu = $('.side-navigation');
var topMenu = $('.top-navigation');
var mainContent = $('.main-content');
hamMenu.click(function(e){
        // toggle side nav width to 275px and 75px
        sideMenu.toggleClass('toggle-side');
        topMenu.toggleClass('toggle-section');
        mainContent.toggleClass('toggle-section');
    }
);

$('#mainCategory').change(function(){
	 var category_id = $('#mainCategory').val()
	 $.get('/subcategory/purchase/'+category_id, function(data, status){
		$(".subcategory").remove();
		$.each(data, function(index, value){
			var row = "<option class='subcategory' value='"+value.id+"'>"+value.name+"</option>";
			$("#child_category").append(row);
		});
	 })
  })

  $('#child_category').change(function(){
	var cat = $('#mainCategory').val();
	var child_id = $('#child_category').val()
	$.get('/item/purchase/'+cat+'/'+child_id, function(data, status){
	   $(".item").remove();
	   $.each(data, function(index, value){
		   var row = "<option class='item' value='"+value.id+"'>"+value.name+"</option>";
		   $("#item").append(row);
	   });
	})
 })