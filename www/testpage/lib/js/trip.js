var map, places, infoWindow,markerLetter,marker,i,addSpotDateId;
var markers = [];
var autocomplete;
var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
var regular_marker = 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png';
var hostnameRegexp = new RegExp('^https?://.+?/');
var timepicker_option = {
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
};
function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow({
           content: document.getElementById('info-content')
         });
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(pos);
            map.setZoom(14);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        var searchBar = document.getElementById('searchBar');
        var closeMapIcon = document.getElementById('closeMapIcon');
        var input = document.getElementById('autocomplete');
         places = new google.maps.places.PlacesService(map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchBar);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(closeMapIcon);
        var searchBox = new google.maps.places.SearchBox(input);
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
              if (places.length == 0) {
                return;
              }
              // Clear out the old markers.
              if (marker) {
                  marker.setMap(null);
              }
              markers.forEach(function(marker) {
                marker.setMap(null);
              });
              markers = [];
              // For each place, get the icon, name and location.
              i = 0;
              var bounds = new google.maps.LatLngBounds();
              $('#results').empty();
              places.forEach(function(place) {
                if (!place.geometry) {
                  console.log("Returned place contains no geometry");
                  return;
                }
                markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
                var markerIcon = MARKER_PATH + markerLetter + '.png';
                if (places.length == 1) {
                    markerIcon = regular_marker;
                }
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                  map: map,
                  icon: markerIcon,
                  title: place.name,
                  position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                  // Only geocodes have viewport.
                  bounds.union(place.geometry.viewport);
                } else {
                  bounds.extend(place.geometry.location);
                }
                addResult(places[i], i);
                markers[i].placeResult = places[i];
                markers[i].addListener('click',showInfoWindow);
                i++;
              });
              map.fitBounds(bounds);
        });
        var clickHandler = new ClickEventHandler(map, origin);
      }

  /**
* @constructor
*/
var ClickEventHandler = function(map, origin) {
 this.origin = origin;
 this.map = map;
 this.directionsService = new google.maps.DirectionsService;
 this.directionsDisplay = new google.maps.DirectionsRenderer;
 this.directionsDisplay.setMap(map);
 this.placesService = new google.maps.places.PlacesService(map);
 this.infowindow = new google.maps.InfoWindow;
 this.infowindowContent = document.getElementById('infowindow-content');
 this.infowindow.setContent(this.infowindowContent);

 // Listen for clicks on the map.
 this.map.addListener('click', this.handleClick.bind(this));
 // this.map.addListener('rightclick', this.handleRightClick.bind(this));
};
// ClickEventHandler.prototype.handleRightClick = function(event) {
//     console.log(event);
// }

ClickEventHandler.prototype.handleClick = function(event) {
 // console.log('You clicked on: ' + event.latLng);
 // If the event has a placeId, use it.

 if (event.placeId) {
     $('#results').empty();
   // Calling e.stop() on the event prevents the default info window from
   // showing.
   // If you call stop here when there is no placeId you will prevent some
   // other map click event handlers from receiving the event.
   event.stop();
   var request = {
      placeId: event.placeId
    };
    //use placeId to get place info
    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, callback);
    function callback(place, status) {

      if (status == google.maps.places.PlacesServiceStatus.OK) {
          if(marker){
              marker.setMap(null);
          }
          if (markers){
              markers.forEach(function(marker) {
                marker.setMap(null);
              });
          }
           marker = new google.maps.Marker({
              position: event.latLng,
              map: map,
              title: place.name
            });
          addResult(place, 1);
          marker.placeResult = place;
          marker.addListener('click',showInfoWindow);
          infoWindow.open(map, marker);
          buildIWContent(place);

      }
    }
 }
};
function addResult(result, i) {
  var results = document.getElementById('results');
  var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
  var markerIcon = MARKER_PATH + markerLetter + '.png';
  var tr = document.createElement('tr');
  tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
  // tr.onclick = function() {
  //   google.maps.event.trigger(markers[i], 'click');
  //   google.maps.event.trigger(marker, 'click');
  // };
  var iconTd = document.createElement('td');
  var nameTd = document.createElement('td');
  var addressTd = document.createElement('td');
  var placeIdTd = document.createElement('td');
  var photoUrlTd = document.createElement('td');
  var icon = document.createElement('img');
  var addbtn = document.createElement('button');
  nameTd.onclick = function() {
    google.maps.event.trigger(markers[i], 'click');
    google.maps.event.trigger(marker, 'click');
  };
  icon.src = markerIcon;
  icon.setAttribute('class', 'placeIcon');
  icon.setAttribute('className', 'placeIcon');
  addressTd.style.display = 'none';
  placeIdTd.style.display = 'none';
  photoUrlTd.style.display = 'none';
  addbtn.setAttribute('class','btn btn-primary addSpotBtn');
  addbtn.style.marginLeft = '5px';
  addbtn.innerHTML = 'add';
  var name = document.createTextNode(result.name);
  var address = document.createTextNode(result.formatted_address);
  var placeId = document.createTextNode(result.place_id);
  var photoUrl = document.createTextNode(result.photos[0].getUrl({'maxWidth': 200, 'maxHeight': 200}));
  iconTd.appendChild(icon);
  nameTd.appendChild(name);
  addressTd.appendChild(address);
  placeIdTd.appendChild(placeId);
  photoUrlTd.appendChild(photoUrl);
  tr.appendChild(iconTd);
  tr.appendChild(nameTd);
  tr.appendChild(addressTd);
  tr.appendChild(placeIdTd);
  tr.appendChild(photoUrlTd);
  tr.appendChild(addbtn);
  results.appendChild(tr);
}

// Get the place details for a hotel. Show the information in an info window,
// anchored on the marker for the hotel that the user selected.
function showInfoWindow(place) {
  var marker = this;
  places.getDetails({placeId: marker.placeResult.place_id},
      function(place, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        }
        infoWindow.open(map, marker);
        buildIWContent(place);
      });
}
// Load the place information into the HTML elements used by the info window.
function buildIWContent(place) {
  // document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
  //     'src="' + place.icon + '"/>';
  document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon"' +
      'src="' + place.photos[0].getUrl({'maxWidth': 100, 'maxHeight': 100}) + '"/>';
  document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
      '">' + place.name + '</a></b>';
  document.getElementById('iw-address').textContent = place.vicinity;

  if (place.formatted_phone_number) {
    document.getElementById('iw-phone-row').style.display = '';
    document.getElementById('iw-phone').textContent =
        place.formatted_phone_number;
  } else {
    document.getElementById('iw-phone-row').style.display = 'none';
  }

  // Assign a five-star rating to the hotel, using a black star ('&#10029;')
  // to indicate the rating the hotel has earned, and a white star ('&#10025;')
  // for the rating points not achieved.
  if (place.rating) {
    var ratingHtml = '';
    for (var i = 0; i < 5; i++) {
      if (place.rating < (i + 0.5)) {
        ratingHtml += '&#10025;';
      } else {
        ratingHtml += '&#10029;';
      }
    document.getElementById('iw-rating-row').style.display = '';
    document.getElementById('iw-rating').innerHTML = ratingHtml;
    }
  } else {
    document.getElementById('iw-rating-row').style.display = 'none';
  }

  // The regexp isolates the first part of the URL (domain plus subdomain)
  // to give a short URL for displaying in the info window.
  if (place.website) {
    var fullUrl = place.website;
    var website = hostnameRegexp.exec(place.website);
    if (website === null) {
      website = 'http://' + place.website + '/';
      fullUrl = website;
    }
    document.getElementById('iw-website-row').style.display = '';
    document.getElementById('iw-website').textContent = website;
  } else {
    document.getElementById('iw-website-row').style.display = 'none';
  }
}
 function addSpot(name,addr,placeId,photoUrl){
     var spotHtml = '<p class="trip-list-title-name">'+name+'<br>' +
       '<p class="trip-list-title-addr">'+addr+'</p>' +'</p>';
     var $img = $('#trip-cell-comp').find('img');
     var $dummy = $('#trip-cell-comp').find('dummy');
     $img.attr('src',photoUrl);
     // $('#trip-cell-comp').find('p').html('<p class="trip-list-title-name">'+name+'<br>' +
     //   '<span class="trip-list-title-addr">'+addr+'</span>' +'</p>');
     console.log($dummy);
     // $(spotHtml).insertAfter($img);
     $dummy.html(spotHtml);
     $('#trip-cell-comp').find('small').html(placeId);
     $('#'+ addSpotDateId).append($('#trip-cell-comp').html());
     $('.timepicker').timepicker(timepicker_option);
     $('#dialog').css({'display':'none'});
     $('.overlay').fadeOut();
     // $( ".trip-list" ).sortable();
     // $( ".trip-list" ).disableSelection();
 }
 function deleteSpot(button){
     button.parentElement.removeChild(button)

 }
 function moveUp(element) {
     var before = $(element).prev();
     $(element).insertBefore(before);
 }

 function moveDown(element) {
     var after = $(element).next();
     $(element).insertAfter(after);
 }
$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('#trip-container').on('click','.trip-list-addbtn',function (){
        // console.log($(this).siblings().attr('id'));
        $('.overlay').fadeIn();
        $('#dialog').css({'display':'inherit'});
        google.maps.event.trigger(map, 'resize');
        addSpotDateId = $(this).siblings().attr('id');
    });
    $('.timepicker').timepicker(timepicker_option);
    $('#results').on('click','.addSpotBtn', function (){
        var name = $(this).siblings()[1].innerText;
        var addr = $(this).siblings()[2].innerText;
        var placeId = $(this).siblings()[3].innerText;
        var photoUrl = $(this).siblings()[4].innerText;
        addSpot(name,addr,placeId,photoUrl);
    });
    $('#closeMapIcon').on('click',function () {
        $('#dialog').css({'display':'none'});
        $('.overlay').fadeOut();
    });
    // $('.has-clear input[type="text"]').on('input propertychange', function() {
    //   var $this = $(this);
    //   var visible = Boolean($this.val());
    //   $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
    // }).trigger('propertychange');

    $('.form-control-clear').click(function() {
      $(this).siblings('input[type="text"]').val('')
        .trigger('propertychange').focus();
    });
    $('.input-group').css({'width':'50%'});
    $( '#trip-title-dep-day' ).datepicker();
    $('#addDayBtn').tooltip();
    $('#addDayBtn').on('click',function () {
        var $comp = $('#trip-day-comp');
        var $a = $comp.find('a');
        var $collapse = $comp.find('.collapse');
        var $ul = $comp.find('ul');
        var $dayFlag = $comp.find('span');
        var $dayList = $('#trip-day-list').find('.day-flag');
        var dayNumber = $dayList.length;
        var prevDay,nextDay;
        var nextDayStr = '';
        var depDay = $('#trip-title-dep-day').val();
        var depDayStr = depDay.replace(/\//g,'-');
        if(depDay === ''){
            alert('請輸入出發日期!');
            $('#trip-title-dep-day').focus();
            return;
        }
        if(dayNumber === 0){
            $dayFlag.html(depDay);
            $a.attr('href','#'+depDayStr+'-collapse');
            $dayFlag.attr('id',depDayStr+'-flag');;
            $collapse.attr('id',depDayStr+'-collapse');
            $ul.attr('id',depDayStr +'-li');
        }else {
            prevDay = moment($($dayList[dayNumber -1]).html(),'MM-DD-YYYY');
            nextDay = prevDay.add(1,'d');
            nextDayStr = nextDay.format('MM-DD-YYYY');
            $dayFlag.html(nextDayStr.replace(/-/g,'/'));
            $a.attr('href','#'+nextDayStr+'-collapse');
            $dayFlag.attr('id',nextDayStr+'-flag');;
            $collapse.attr('id',nextDayStr+'-collapse');
            $ul.attr('id',nextDayStr +'-li');
        }
        $('#trip-day-list').append($comp.html());
        $('#trip-title-back-day').html(nextDayStr.replace(/-/g,'/'));
    });
});
