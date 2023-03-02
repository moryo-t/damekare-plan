const directionsService = new google.maps.DirectionsService();
const directionsRenderer = new google.maps.DirectionsRenderer({
    suppressMarkers: true,
});
const inputStart = document.getElementById("pac-input-start");
const inputEnd = document.getElementById("pac-input-end");
const inputPlace1 = document.getElementById("pac-input-place1");
const inputPlace2 = document.getElementById("pac-input-place2");
const inputPlace3 = document.getElementById("pac-input-place3");
const inputPlace4 = document.getElementById("pac-input-place4");
const inputPlace5 = document.getElementById("pac-input-place5");
var inputArr = [inputStart, inputEnd, inputPlace1, inputPlace2, inputPlace3, inputPlace4, inputPlace5];
var placeArr = [inputPlace1, inputPlace2, inputPlace3, inputPlace4, inputPlace5];

const walkIcon = document.getElementById("walk");
const driveIcon = document.getElementById("drive"); 
const duration_text = document.getElementById("duration");


driveIcon.addEventListener('click', function() {
    driveIcon.classList.toggle('drive-choice');
    if(walkIcon.classList.contains('walk-choice') == true) {
        walkIcon.classList.remove('walk-choice');
        calcRoute();
    }
});

walkIcon.addEventListener('click', function() {
    walkIcon.classList.toggle('walk-choice');
    if(driveIcon.classList.contains('drive-choice') == true) {
        driveIcon.classList.remove('drive-choice')
    }
    calcRoute();
});




function initMap() {
    var NagoyaStation = new google.maps.LatLng(35.17115177407281, 136.8815368980061);
    var mapDefault = {
    zoom: 5,
    center: NagoyaStation,
    mapTypeId: 'roadmap',
    };
    var map = new google.maps.Map(document.getElementById('map'), mapDefault);


    const options = {
        componentRestrictions: { country: "jp" },
        fields: ["geometry", "formatted_address"],
        strictBounds: false,
        types: ["establishment"],
    };

    inputArr.forEach(element => {
        var autocomplete = new google.maps.places.Autocomplete(element, options);
        autocomplete.addListener("place_changed", function() {
            const place = autocomplete.getPlace().formatted_address;
            codeAddress(place);
        });        
    });

    directionsRenderer.setMap(map);        
}
window.initMap = initMap();


function codeAddress(place) {
    const geocoder = new google.maps.Geocoder();
    var address = place;
    geocoder.geocode( {'address': address}, function(result, status) {
        if(status == 'OK') {
            var myLatLng = result[0]["geometry"]["location"];
            const center = { lat: myLatLng.lat(), lng: myLatLng.lng() };
            const defaultBounds = {
                north: center.lat + 0.1,
                south: center.lat - 0.1,
                east: center.lng + 0.1,
                west: center.lng - 0.1,
            };

            var options = {
                bounds: defaultBounds,
                componentRestrictions: { country: "jp" },
                fields: ["name"],
                strictBounds: false,
                types: ["establishment"],
            };

            inputArr.forEach(element => {
                var autocomplete = new google.maps.places.Autocomplete(element, options);
                autocomplete.addListener("place_changed", function() {
                    calcRoute();
                });
            });
        }
    });
}


function calcRoute() {
    var request = {
        origin: inputArr[0].value,
        destination: inputArr[1].value,
        travelMode: 'DRIVING',
    };

    if(walkIcon.classList.contains('walk-choice') == true) {
        request.travelMode = 'WALKING';
    }    

    const waypointsArr = [];
    for (let i = 0; i < placeArr.length; i++) {
        if(!placeArr[i].value == "") {
            waypointsArr.push({
                location: placeArr[i].value,
                stopover: false,
            });
        }
    }
    request.waypoints = waypointsArr;

    directionsService.route(request, function(response, status) {
        if (status == 'OK') {
            var map = new google.maps.Map(document.getElementById('map'));
            var infoWindow = new google.maps.InfoWindow();
            directionsRenderer.setDirections(response);

            let duration = response.routes[0].legs[0].duration.text;
            duration_text.textContent = "移動時間 " + duration;

            addMarker(response.routes[0].legs[0].start_location, "S", map, infoWindow, response.request.origin.query);
            addMarker(response.routes[0].legs[0].end_location, "E", map, infoWindow, response.request.destination.query);
            if(!inputArr[2].value == "") {
                addMarker(response.routes[0].legs[0].via_waypoints[0], "1", map, infoWindow, response.request.waypoints[0].location.query);
            }
            if(!inputArr[3].value == "") {
                addMarker(response.routes[0].legs[0].via_waypoints[1], "2", map, infoWindow, response.request.waypoints[1].location.query);
            }
            if(!inputArr[4].value == "") {
                addMarker(response.routes[0].legs[0].via_waypoints[2], "3", map, infoWindow, response.request.waypoints[2].location.query);
            }
            if(!inputArr[5].value == "") {
                addMarker(response.routes[0].legs[0].via_waypoints[3], "4", map, infoWindow, response.request.waypoints[3].location.query);
            }
            if(!inputArr[6].value == "") {
                addMarker(response.routes[0].legs[0].via_waypoints[4], "5", map, infoWindow, response.request.waypoints[4].location.query);
            }
        } else {
            alert("ルートを作成できませんでした。");
        }
    });
}


function addMarker(location, label, map, info, content) {
    var marker = new google.maps.Marker({
        position: location,
        label: label,
        map: map,
    });
    marker.addListener('click', function() {
        info.setContent(content);
        info.open(map, this);
    })
    directionsRenderer.setMap(map);
}