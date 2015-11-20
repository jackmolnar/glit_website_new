<?php

$assets_depth = base_url().'assets/';

?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    
    <script>
		function initialize() {
		  var myLatlng = new google.maps.LatLng(42.071548,-80.100653);
		  var mapOptions = {
			zoom: 12,
			center: myLatlng
		  }
		  var map = new google.maps.Map(document.getElementById('eit_map'), mapOptions);
		  
		  var image = '<?php echo $assets_depth.'images/eit_marker.png' ; ?>';
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  icon: image
		  });
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);

    </script>



<div class="row program_page_header">

	
	<div class="row" id="eit_map" style="width:100%; height:300px;">
		
	</div>
	

</div>

    <div class="container">

      <div class="row content_container_row">
      
        <div class="col-md-8">
          <h2>Contact Erie Institute of Technology</h2>
          <hr>
          <h4>Phone: 814-868-9900</h4>
          <h4>Toll Free: 866-868-3743</h4>
          <h4>Fax: 814-868-9977</h4>
          <h4>Email: info@erieit.edu</h4>
          <hr>
          <h4>940 Millcreek Mall<br/>
          Erie, Pennsylvania 16565</h4>
          <hr>
         
          <p><?php if(isset($primary_text)) { echo $primary_text; } ?></p>

  	<hr>
    
  		</div>
  
        <div class="col-md-4 side_form_column">

         <!-- <div class="side_form "><?php //include('assets/includes/side_form.php'); ?></div>-->
          
        </div>
        
    </div>
    
      <!-- /END THE FEATURETTES -->
      
</div>