<div>
    <label>店名や地名の検索ができます　　</label>
    <input type="text" value="歴史を刻め 六甲道" id="address">
    <button type="button" value="検索" id="map_button">検索</button>
</div>
<br>
<!-- 地図を表示させる要素 -->
<div class="map_box01"><div id="map-canvas" style="width:100%;height:400px"></div>

<span style="display:none">
  緯度 <input type="text" id="lat" name="latitude" value="">
  経度 <input type="text" id="lng" name="longitude" value="">
</span>
<p>地図上をクリックするとマーカーを移動できます</p>

<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyBTWq7JSg8HKhDShFyGLDo8FN9XbIoS1-Y"></script>
<script src="{{ asset('/js/mapForm.js') }}"></script>