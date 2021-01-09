<head>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTWq7JSg8HKhDShFyGLDo8FN9XbIoS1-Y&callback=initMap&libraries=&v=weekly"
    defer
  ></script>
  <script>
  　var latitude = <?php echo $review->latitude ?>;
    var longitude = <?php echo $review->longitude ?>;
    
    function initMap() {
      const shop = { lat: latitude, lng: longitude };
      const map = new /*global google*/google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: shop,
      });
      
      const marker = new google.maps.Marker({
        position: shop,
        map: map,
      });
    }
  </script>
</head>    
<body>
  <div id="map"></div>
</body>