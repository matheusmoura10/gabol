var geocoder;
var map;
var marker;
var infowindow = new google.maps.InfoWindow({
  size: new google.maps.Size(1500, 500),
});
var div = document.getElementById('box');
var div_manual = document.getElementById('box_manual');

function fecharbox(){ 
  document.getElementById("box").style.display = "none"; 
} 

function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-22.873604, -47.055788);
  var mapOptions = {
    zoom: 16,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title: 'Hello World!'
  });

  
  var input = document.getElementById('address');
  var autocomplete = new google.maps.places.Autocomplete(input);

  map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
  google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center); 
  });

  google.maps.event.addListener(map, 'click', function() {
    infowindow.close();
  });
}


function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      marker.formatted_address = responses[0].formatted_address;
    } else {
      marker.formatted_address = 'Cannot determine address at this location.';
    }
    infowindow.setContent(marker.formatted_address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
    
    var panoramaOptions = {
      position: marker.getPosition(),
      pov: {
        heading: 90,
        pitch: 0,
        zoom: 0
      }
    };
    console.log(responses);
    document.getElementById("numero").innerHTML = responses[0].address_components[0]['long_name'];
    document.getElementById("endereco").innerHTML = responses[0].address_components[1]['long_name'];
    document.getElementById("bairro").innerHTML = responses[0].address_components[2]['long_name'];
    document.getElementById("cidade").innerHTML = responses[0].address_components[3]['long_name'];

    document.getElementById('numero_text').value = responses[0].address_components[0]['long_name'];
    document.getElementById('endereco_text').value = responses[0].address_components[1]['long_name'];
    document.getElementById('bairro_text').value = responses[0].address_components[2]['long_name'];
    document.getElementById('cidade_text').value = responses[0].address_components[3]['long_name'];
    document.getElementById('latlon').value = marker.getPosition();

    var panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);
    
    //console.log(panorama)

    map.setStreetView(panorama);

    //div.style.display = "block";
    div_manual.style.display = 'none';
    div.style.display = 'block';
     div.style.opacity = '1';

  });
}

function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode({
    'address': address
  }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      if (marker) {
        marker.setMap(null);
        if (infowindow) infowindow.close();
      }
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: results[0].geometry.location
      });

      google.maps.event.addListener(marker, 'dragend', function() {
        geocodePosition(marker.getPosition());
      });
      google.maps.event.addListener(marker, 'click', function() {
        if (marker.formatted_address) {
          infowindow.setContent(marker.formatted_address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
        } else {
          infowindow.setContent(address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
        }
        var panoramaOptions = {
          position: marker.getPosition(),
          pov: {
            heading: 90,
            pitch: 0,
            zoom: 0
          }
        };
    //console.log(marker);
    var panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);
    console.log(panorama);


    div.style.display = "block";
  });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}



google.maps.event.addDomListener(window, "load", initialize);