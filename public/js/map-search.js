function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
    });

    var infoWindow = new google.maps.InfoWindow();
    var geocoder = new google.maps.Geocoder();

    var map;
    var allPlaces = [];

    const mapData = window.mapData;
    const mapDataParsed = JSON.parse(mapData);
    const dataShaping = mapDataParsed[0];
    const mapDataKeep = ["start", "end", "place1", "place2", "place3", "place4", "place5",];

    for (let key in dataShaping) {
        if (!mapDataKeep.includes(key)) {
            delete dataShaping[key];
        }
    }

    for (let key in dataShaping) {
        if (dataShaping[key] !== null) {
            geocoder.geocode({ 'address': dataShaping[key] }, function(result, status) {
                if (status == 'OK') {
                    let latLng = result[0].geometry.location;

                    switch (key) {
                        case "start":
                            allPlaces.push({
                                name: "S", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                        case "end":
                            allPlaces.push({
                                name: "E", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                        case "place1":
                            allPlaces.push({
                                name: "1", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                        case "place2":
                            allPlaces.push({
                                name: "2", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                        case "place3":
                            allPlaces.push({
                                name: "3", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                        case "place4":
                            allPlaces.push({
                                name: "4", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                        case "place5":
                            allPlaces.push({
                                name: "5", location: dataShaping[key], latLng: latLng,
                            });
                            break;
                    }
                }
            });
        }
    }

    var request = {
        travelMode: 'DRIVING',
    }

    for (let obj of allPlaces) {
        console.log(obj);

        switch (obj.name) {
            case "S":
                request.origin = obj.location;
                break;
            case "E":
                request.destination = obj.location;
                break;
        }
    }

    /*var waypointsArr = [];
    for (let obj of allPlaces) {
        if (obj.name !== "S" && obj.name !== "E") {
            waypointsArr.push({
                location: obj.location,
                stopover: true,
            });
        }
    }

    request.waypoints = waypointsArr;


    directionsService.route(request, function(response, status) {
        if (status == 'OK') {
            directionsRenderer.setDirections(response);

            for (obj of allPlaces) {
                addMarker(obj.latLng, obj.name, map, infoWindow, obj.location);
            }
        }
    });

    function addMarker(location, label, map, info, content) {
        var marker = new google.maps.Marker({
            position: location,
            label: label,
            map: map,
        });

        marker.addListener('click', function() {
            info.setContent(content);
            info.open(map, this);
        }, {passive: true});

        directionsRenderer.setMap(map);
    }*/
}