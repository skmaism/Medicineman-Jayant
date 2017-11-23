<!-- BEGIN PAGE HEADER-->
<?php
	$user = $this->Session->read("Auth.User");
	
?>

<?php if($user['role_id'] == 8){?> 
<script>
	//var latitude;	
	//var longitude;	

if(!navigator.geolocation){
		
			alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
		}
	else{
		navigator.geolocation.getCurrentPosition(success, error);		
	}
	
	function success(position){
		
		
		latitude = position.coords.latitude;	
		longitude = position.coords.longitude;	
			
		$('#currentLat').val(latitude);
		$('#currentLong').val(longitude);
		
		}
	function error(err){
		alert('ERROR(' + err.code + '): ' + err.message);
	}
	function setlatlong(url,id){
		
		var lat = document.getElementById("currentLat").value;
		var lng = document.getElementById("currentLong").value;
		var newurl = url+"&lat="+lat+"&long="+lng;
		$("#"+id).attr('href', newurl);
	}
</script>
<input type="hidden" name="currentLat" id="currentLat" value="100.8893055" >
<input type="hidden" name="currentLong" id="currentLong" value="200.80384719999999" >
<?php } ?>
<?php if($user['role_id'] == 1){?> 
<div class="row">
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $Users; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Registered users</h3>
			
		</div>
		
	</div>
	
	
</div>
<?php } ?>

<?php if($user['role_id'] == 2){?> 
<div id="map" style="height:300px;"></div>


<script>

      function initMap() {

		  var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 5,
			center: {
			  lat: 26.9124,
			  lng: 75.7873
			},
			fullscreenControl: false,
			
			
		  });
		  var infoWin = new google.maps.InfoWindow();
		  
		  
		
		
		  // Add some markers to the map.
		  // Note: The code uses the JavaScript Array.prototype.map() method to
		  // create an array of markers based on a given "locations" array.
		  // The map() method here has nothing to do with the Google Maps API.
		  var markers = locations.map(function(location, i) {
			var marker = new google.maps.Marker({
			  position: location
			});
			google.maps.event.addListener(marker, 'click', function(evt) {
			  infoWin.setContent(location.info);
			  infoWin.open(map, marker);
			})
			return marker;
		  });

		  // Add a marker clusterer to manage the markers.
		  var markerCluster = new MarkerClusterer(map, markers, {
			imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
		  });
		  
		  

		}
		var locations = [
		<?php if(isset($Drivers) && !empty($Drivers)){
			foreach($Drivers as $key => $driver){
		?>		
		

		{
		  lat: <?php echo $driver['User']['current_lat']; ?>,
		  lng:  <?php echo $driver['User']['current_long']; ?>,
		  info: "<?php echo $driver['User']['name_code']; ?>"
		}, 
		
		<?php 
				
			}
			
		}?>
		];
		
		

		google.maps.event.addDomListener(window, "load", initMap);
    </script>

	<script type="" src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdWSKNtYxQaeOlAg_drgJooLgRB9E6kg8&callback=initMap">
    </script>
<?php } ?>

