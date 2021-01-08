<div>
    <input type="text" value="歴史を刻め 六甲道" id="address">
    <button type="button" value="検索" id="map_button">検索</button>
</div>

<!-- 地図を表示させる要素 -->
<div class="map_box01"><div id="map-canvas" style="width: 500px;height: 350px;"></div></div>

<span style="display:none">
  緯度 <input type="text" id="lat" name="latitude" value="">
  経度 <input type="text" id="lng" name="longitude" value="">
</span>
<p>地図上をクリックするとマーカーを移動できます。</p>

<head>
<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyBTWq7JSg8HKhDShFyGLDo8FN9XbIoS1-Y"></script>
<script>
var getMap = (function() {
  function codeAddress(address) {
    var geocoder = new /*global google*/google.maps.Geocoder();

    var mapOptions = {
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    
    var marker;
    
    geocoder.geocode( { 'address': address}, function(results, status) {
      
      if (status == google.maps.GeocoderStatus.OK) {
        
        map.setCenter(results[0].geometry.location);
        
        document.getElementById('lat').value=results[0].geometry.location.lat();
        document.getElementById('lng').value=results[0].geometry.location.lng();
        
        marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
        });
      
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
    
    });
    
    map.addListener('click', function(e) {
      getClickLatLng(e.latLng, map);
    });
    function getClickLatLng(lat_lng, map) {
      
      document.getElementById('lat').value=lat_lng.lat();
      document.getElementById('lng').value=lat_lng.lng();
        
      marker.setMap(null);
      marker = new google.maps.Marker({
        position: lat_lng,
        map: map
      });
    
      map.panTo(lat_lng);
    }
  
  }
  
  return {
    getAddress: function() {
      var button = document.getElementById("map_button");
      
      button.onclick = function() {
        var address = document.getElementById("address").value;
        codeAddress(address);
      }
      
      window.onload = function(){
        var address = document.getElementById("address").value;
        codeAddress(address);
      }
    }
  
  };

})();
getMap.getAddress();
</script>
</head>