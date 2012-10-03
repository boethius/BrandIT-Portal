var originalSearch = "";


var map;
var markers = new Array();
var locations = new Array();
var nolocations = new Array();
var customIndex = 0;
var bounds = new google.maps.LatLngBounds();
	//how much items per page to show
	var show_per_page = 5;
	//getting the amount of elements inside main div
	var number_of_items = 5;
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	
	var current_link = 0;
	
	var new_page = 0;
	
function initialize() {

	var mapOptions = {
	  zoom: 6,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
      minZoom: 2,
      maxZoom: 17
	};
	map = new google.maps.Map(document.getElementById('map_canvas'),
	    mapOptions);
	
	
	// Try HTML5 geolocation
	if(navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
	    var pos = new google.maps.LatLng(position.coords.latitude,
	                                     position.coords.longitude);
	                                     
	    var infowindow = new google.maps.InfoWindow({
	      map: map,
	      position: pos,
	      content: 'You are here.'
	    });
	    
	    //map.fitBounds(bounds);
	   // bounds = new google.maps.LatLngBounds(pos,pos);
	   
	  }, function() { 
	    handleNoGeolocation(true);
	  });
	} else {
	    var pos = new google.maps.LatLng(60, 105);
	   // bounds = new google.maps.LatLngBounds(pos,pos);
	  // Browser doesn't support Geolocation
	  handleNoGeolocation(false);
	}
}
	
	
	
$(document).ready(function(){
initialize();

	originalSearch = $('#main').html();
	resetSearch();
	$('#searchBar').autocomplete({
		close: function(event, ui){
			resetSearch();
		},
		source: function(request, response){
			$.ajax({
				url: "/index.php/search/"+request.term,
				dataType: "json",
				data: {region: $('#regions').val()},
				type: "POST",
				success: function(data){
					console.log("lalal");
					resetSearch();
					console.log("lalal2");
		//originalSearch = $('#main').html();
					$('#main').html((data.length > 0?"":"Kein resultat"));
					console.log("lalal3");
					response( $.map( data, function( item ) {
		//alert(item)
		
			        var lat = item.lat;
			        var lng = item.long;
			        console.log(lat);
			         if(lng != "NotFound" && lng != ""){
						//bounds.extend( pos );
			            var pos = new google.maps.LatLng( lat, lng ) ;
						//markers[parseInt(aData[0])].setIcon('#listeddocicon#');
						//markers[item.id].setZIndex(1000-customIndex);
						bounds.extend(pos);
					
						if(!locations[item.id]){
							locations[item.id] = {
								map: map,
								position: pos,
								title: item.name//,
							//	index: #index#,
							//	icon: '#listeddocicon#'
							};		
						}
						else{
							
						}
					}
			        var res = '<div class="list_entry" id="cid_'+item.company_id+'">';
			    	res += '<div class="list_image">'+(item.thumb != "null" && item.thumb != "" && item.thumb != undefined  && item.thumb != "undefined" ? '<img width="135" src="/uploads/'+item.thumb+'"/>': '')+'</div>';
			        res += '<div class="list_text_holder">';
			    	res += '<div class="list_title">'+item.name+'</div>';
			        res += '<div class="list_left_text">';
			        res += item.streetline1;
			        res += (item.streetline2 != "" ?  item.streetline2: "")+"<br />";       
			        res += item.zip+" "+item.city+'<br /><br />';
			        res += '<a href="'+item.website+'" target="_blank">'+item.website+'</a></div>';
			        res += '<div class="list_right_text_holder">';
			    	res += '<div class="list_right_text_top"></div>';
			        res += '<div class="list_right_text_center">'+item.description+'</div>';
			        res += '<div class="list_right_text_bottom"></div>';
			        res += '<div class="clear"></div>';
			        res += '</div>';
			        res += '<div class="clear"></div>';
			        res += '</div>';
			        res += '<div class="google_maps"></div>';
			        res += '<div class="clear"></div>';
			        res += '</div>';
			        
					$('#main').append(res);
					console.log("lalal int");
					return {
						label: item.name,
						value: item.name
		
					} 
					}));
					console.log("lalal4");
				}
			});	
		},
		select: function (event, ui){
			//alert(ui.item.value);
			
		}
	}).click(function(e){
		$(this).select();
	}).blur(function(event, ui){
		resetSearch();
	}).change(function(event, ui){
		resetSearch();
		//alert($(this).val());
	});
	
	
	paginate();
	
	$.ajax({
		url: "/index.php/search/"+"noop",
		dataType: "json",
		data: {region: $('#regions').val(), random: true},
		type: "POST",
		success: listit
	});
	
	
});





function listit(data){
	return $.map( data, function( item ) {
		//alert(item)
		
        var lat = item.lat;
        var lng = item.long;
        console.log(lat);
         if(lng != "NotFound" && lng != ""){
			//bounds.extend( pos );
            var pos = new google.maps.LatLng( lat, lng ) ;
			//markers[parseInt(aData[0])].setIcon('#listeddocicon#');
			//markers[item.id].setZIndex(1000-customIndex);
			bounds.extend(pos);
		
			if(!locations[item.id]){
				locations[item.id] = {
					map: map,
					position: pos,
					title: item.name//,
				//	index: #index#,
				//	icon: '#listeddocicon#'
				};		
			}
			else{
				
			}
		}
        var res = '<div class="list_entry" id="cid_'+item.company_id+'">';
    	res += '<div class="list_image">'+(item.thumb != "null" && item.thumb != "" && item.thumb != undefined  && item.thumb != "undefined" ? '<img width="135" src="/uploads/'+item.thumb+'"/>': '')+'</div>';
        res += '<div class="list_text_holder">';
    	res += '<div class="list_title">'+item.name+'</div>';
        res += '<div class="list_left_text">';
        res += item.streetline1;
        res += (item.streetline2 != "" ?  item.streetline2: "")+"<br />";       
        res += item.zip+" "+item.city+'<br /><br />';
        res += '<a href="'+item.website+'" target="_blank">'+item.website+'</a></div>';
        res += '<div class="list_right_text_holder">';
    	res += '<div class="list_right_text_top"></div>';
        res += '<div class="list_right_text_center">'+item.description+'</div>';
        res += '<div class="list_right_text_bottom"></div>';
        res += '<div class="clear"></div>';
        res += '</div>';
        res += '<div class="clear"></div>';
        res += '</div>';
        res += '<div class="google_maps"></div>';
        res += '<div class="clear"></div>';
        res += '</div>';
        
		/*
var res = '<div class="companyItem" id="cid_'+item.company_id+'">';
		   res += '<div class="companyTitle">'+item.name+'</div>';
		   res += '<div class="companyDesc">'+item.description+'</div>';
		   res += '<div class="companyCtrl"><a href="/index.php/companies/'+item.company_id+'">View company</a></div>';
		   res += '</div>';

*/
		$('#main').append(res);
		return {
			label: item.name,
			value: item.name
		}
	});
	
	
}


function paginate(){

	map.fitBounds(bounds);
	new_page = 0;
	current_link = 0;
	number_of_items = $('#main').children().size();
	number_of_pages = Math.ceil(number_of_items/show_per_page);
	var navigation_html = '';
	
	$('#infobar').html(number_of_items + " Ergebniss" + (number_of_items==1?"":"e"));
	
	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);

	//now when we got all we need for the navigation let's make it '

	while(number_of_pages > current_link){
		if(current_link == 0) navigation_html += '<a class="page_link" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		else navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	if (number_of_pages > 1) navigation_html += '<a class="next_link" href="javascript:next();">Weiter</a>';

	$('#page_navigation').html(navigation_html);

	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');

	//hide all the elements inside main div
	$('#main').children().css('display', 'none');

	//and show the first n (show_per_page) elements
	$('#main').children().slice(0, show_per_page).css('display', 'block');
	
}

function resetSearch(){
	if($('#searchBar').val() == "" || $('#main').html() == "Kein resultat"){
		//alert("orig search");
		$('#main').html(originalSearch);
		paginate();
	}

	
}




function previous(){
	
	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}

}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}

}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());

	//get the element number where to start the slice from
	start_from = page_num * show_per_page;

	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	var navigation_html = '';
	
	if(page_num > 0) navigation_html = '<a class="previous_link" href="javascript:previous();">Zurück</a>';
	
	current_link = 0;
	while(number_of_pages > current_link){
		if(current_link == page_num) navigation_html += '<a class="page_link" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		else navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	if(page_num < number_of_pages-1) navigation_html += '<a class="next_link" href="javascript:next();">Weiter</a>';
	$('#page_navigation').html(navigation_html);

	//hide all children elements of main div, get specific items and show them
	$('#main').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');

	//update the current page input field
	$('#current_page').val(page_num);
}
