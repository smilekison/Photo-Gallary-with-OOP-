<?php 
	include('header.php');
	include('navigation.php');
?>
<div class="container-fluid" onload="getLocation()">
	<div class="row">
		<div class="col-sm-10 offset-sm-1">
			<div class="card">
			  	<div class="card-header text-sm-center">
				     <h2>Get in Touch</h2>
			  	</div>
			  	<div class="card-body">
				    <div class="mapContainer">
					    <a class="direction-link" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=37.422230,-122.084058&amp;hl=en"> Get Directions</a>
					    <div id="map"></div>
					    <p id="demo"></p>
					</div>
				</div>
				<div class="card-footer">
			    	<p align="justify">People tend to think that "About Us" pages have to sound formal to gain credibility and trust. But most people find it easier to trust real human beings, rather than a description that sounds like it came from an automaton. Trying to sound too professional on your "About Us" page results in stiff, “safe” copy and design -- the perfect way to make sure your company blends in with the masses.<br></p>

					<p align="justify">Instead, Eight Hour Day showcases the people behind the company and humanizes its brand. Introducing the founders by name and featuring the photos of them on the "About Us" page drives home the point that Nathan and Katie are -- as they so astutely put it -- "two individuals with a passion for creativity -- creativity makes us happy."</p>
				    </p>
			  	</div>
			</div>
		</div>
	</div>
</div>
<script>
var myCenter = new google.maps.LatLng(27.692228, 85.319434);
function initialize(){
    var mapProp = {
        center:myCenter,
        zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"),mapProp);

    var marker = new google.maps.Marker({
        position:myCenter,
    });

    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php include('footer.php'); ?>