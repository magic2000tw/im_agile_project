// "use strict";
var map, places, infoWindow,markerLetter,marker,i,$addSpotDate,directionsDisplay,directionsService;
var markers = [];
var autocomplete;
var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
var regular_marker = 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png';
var hostnameRegexp = new RegExp('^https?://.+?/');
var timepicker_option = {
    timeFormat: 'HH:mm',
    interval: 30,
    minTime: '4:00',
    maxTime: '23:59',
    defaultTime: '11',
    startTime: '4:00',
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
         directionsDisplay = new google.maps.DirectionsRenderer();
         directionsService = new google.maps.DirectionsService();
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
         directionsDisplay.setMap(map);
         directionsDisplay.setPanel(document.getElementById('side-panel'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchBar);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(closeMapIcon);
        var searchBox = new google.maps.places.SearchBox(input);
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
              if (places.length == 0) {
                return;
              }
              // Clear out the old markers.
              clearMap();
              // if (marker) {
              //     marker.setMap(null);
              // }
              // markers.forEach(function(marker) {
              //   marker.setMap(null);
              // });
              markers = [];
              // For each place, get the icon, name and location.
              i = 0;
              var bounds = new google.maps.LatLngBounds();
              $('#results').empty();
              places.forEach(function(place) {
                if (!place.geometry) {
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
function clearMap(){
    if (marker) {
        marker.setMap(null);
    }
    if (markers.length > 0){
        markers.forEach(function(marker) {
          marker.setMap(null);
        });
    }
    if (infoWindow){
        infoWindow.close();
    }
    $('#side-panel').html('');
    directionsDisplay.setMap(null);
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
ClickEventHandler.prototype.handleClick = function(event) {
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
    /*
      <table id="resultsTable"><tbody id="results"></tbody></table>
    */
  $('#side-panel').html('<table id="resultsTable"><tbody id="results"></tbody></table>');
  var results = document.getElementById('results');
  var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
  var markerIcon = MARKER_PATH + markerLetter + '.png';
  var tr = document.createElement('tr');
  tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
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
  var photoUrl = document.createTextNode(result.photos[0].getUrl({'maxWidth': 300, 'maxHeight': 300}));
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
     var spotHtml = '<p class="trip-list-title-name">'+name+
       '</p>'+ '<p class="trip-list-title-addr">'+addr+'</p>';
     var $img = $('#trip-cell-comp').find('img');
     var $dummy = $('#trip-cell-comp').find('dummy');
     $img.attr('src',photoUrl);
     $dummy.html(spotHtml);
     $('#trip-cell-comp').find('small').html(placeId);
     // $('#'+ addSpotDateId).append($('#trip-cell-comp').html());
     $addSpotDate.append($('#trip-cell-comp').html());
     $('.timepicker').timepicker(timepicker_option);
     $('#dialog').css({'display':'none'});
     $('.overlay').fadeOut();
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
 function re_arrange_date() {
     var lastday;
     var $dayList = $('#trip-day-list').find('.day-flag');
     var depDay = moment($('#trip-title-dep-day').val(),'MM-DD-YYYY');
     var dayTemp = depDay;
     if($dayList.length > 1){
         $.each($dayList,function(index,day) {
             $(day).html(dayTemp.format('MM-DD-YYYY').replace(/-/g,'/'));
             dayTemp = dayTemp.add(1,'d');
         });
         $dayList = $('#trip-day-list').find('.day-flag');
         lastday = $dayList[$dayList.length - 1];
         $('#trip-title-back-day').html($(lastday).html());
     }
 }
 function buildSaveData (){
     var trip_title = $('#trip-title-font').val();
     var start_date = $('#trip-title-dep-day').val();
     var end_date = $('#trip-title-back-day').html();
     var user_id = '0001';
     var trip_id = '0001';
     var trip_d = {};
     var trip_d_array = [];
     var trip_d_i = 0;
     var data = {
         'user_id':user_id,
         'trip_id':trip_id,
         'trip_title':trip_title,
         'start_date':start_date,
         'end_date':end_date,
         'trip_detail':[]
     };
     var $dayList = $('#trip-day-list').children();
     var $spotList;
     var date,place_name,place_addr,place_info,no,start_time,end_time,img_url;
     var dataString;
     $.each($dayList,function(index,day){
          date = $(day).find('.day-flag').html();
          $spotList = $(day).find('.trip-list').children();
          // console.log($spotList);
          $.each($spotList,function(index, spot) {
              // console.log(spot);
              if(spot.innerText != ''){
                  place_info = $(spot).find('dummy').children();
                  place_id = $(spot).find('small').html();
                  no = index;
                  start_time = $(spot).find('input')[0].value;
                  end_time = $(spot).find('input')[1].value;
                  img_url = $(spot).find('img').attr('src');
                  trip_d.date = date;
                  trip_d.place_name = place_info[0].innerText;
                  trip_d.place_addr = place_info[1].innerText;
                  trip_d.place_id = place_id;
                  trip_d.no = no;
                  trip_d.start_time = start_time;
                  trip_d.end_time = end_time;
                  trip_d.img_url = img_url;
                  trip_d_array[trip_d_i] = trip_d;
                  trip_d_i += 1;
                  trip_d = {};
              }
          });
     });
     data.trip_detail = trip_d_array;
     dataString = JSON.stringify(data);
     $.ajax({
      url: "tripcontrol.php",
      method:'post',
      data: dataString
     }).done(function(data) {
         alert(data);
     });
 }
 //google map direction service test

 function calcRoute(start,end) {
  // var selectedMode = document.getElementById('mode').value;
  var request = {
      origin: start,
      destination: end,
      // Note that Javascript allows us to access the constant
      // using square brackets and a string value as its
      // "property."
      // travelMode: google.maps.TravelMode[selectedMode]
      travelMode:'DRIVING'
  };
  directionsService.route(request, function(response, status) {
    if (status == 'OK') {
      directionsDisplay.setDirections(response);
    }
  });
}
 //google map direction service test
$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('#trip-container').on('click','.trip-list-addbtn',function (){
        $('.overlay').fadeIn();
        $('#dialog').css({'display':'inherit'});
        google.maps.event.trigger(map, 'resize');
        $addSpotDate = $(this).siblings();
    });
    $('.timepicker').timepicker(timepicker_option);
    $('#side-panel').on('click','.addSpotBtn', function (){
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

    $('.form-control-clear').click(function() {
      $(this).siblings('input[type="text"]').val('')
        .trigger('propertychange').focus();
    });
    $('.input-group').css({'width':'50%'});
    $( '#trip-title-dep-day' ).datepicker();
    $('#addDayBtn').tooltip();
    $('#saveBtn').tooltip();
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
            // $.alert('請輸入出發日期!');
            $.alert({
                title: '注意!',
                content: '請輸入出發日期!'
            });
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
    $('#saveBtn').on('click', function () {
        $.confirm({
            title: '確認',
            content: '是否儲存行程?',
            buttons: {
                confirm: function () {
                    buildSaveData();
                },
                cancel: function () {
                    return;
                }
            }
        });
    });

    $('#trip-title-dep-day').on('change',function(){
        re_arrange_date();
    });

    $('#trip-container').on('click','.drive-dir-btn', function () {
        var des = $(this).parent().find('.trip-list-title-name').html();
        $('.overlay').fadeIn();
        $('#dialog').css({'display':'inherit'});
        clearMap();
        directionsDisplay.setMap(map);
        google.maps.event.trigger(map, 'resize');
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(pos);
            calcRoute(pos,des);

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
    });
});
