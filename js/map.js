var map;
var markers = [];
var latarray = [];
var lngarray = [];
function initMap() {

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center:new google.maps.LatLng(3.1090662,101.6646966),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

  // This event listener will call addMarker() when the map is clicked.
  //map.addListener('click', function(event) {
    //addMarker(event.latLng);
  //});

    heatmap = new google.maps.visualization.HeatmapLayer({
    data: getPoints(),
    map: map
  });
  // Adds a marker at the center of the map.

}


// Adds a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
  latarray.push(location.lat());
  lngarray.push(location.lng());
  
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function toggleHeatmap() {
  heatmap.setMap(heatmap.getMap() ? null : map);
}


function changeRadius() {
  heatmap.set('radius', heatmap.get('radius') ? null : 20);
}

function changeOpacity() {
  heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
}

// Heatmap data: 500 Points
function getPoints() {
  return [
    new google.maps.LatLng(3.115022,101.678453),
    new google.maps.LatLng(3.109216,101.651381)
  ];
}