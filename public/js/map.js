function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
    });
    
    const infoWindow = new google.maps.InfoWindow();
    
    var autocomplete;
    var map;
    let allPlaces = [];
    var markers = [];


    const inputStart = document.getElementById("pac-input-start");
    const inputEnd = document.getElementById("pac-input-end");
    const inputPlace1 = document.getElementById("pac-input-place1");
    const inputPlace2 = document.getElementById("pac-input-place2");
    const inputPlace3 = document.getElementById("pac-input-place3");
    const inputPlace4 = document.getElementById("pac-input-place4");
    const inputPlace5 = document.getElementById("pac-input-place5");
    var inputArr = [inputStart, inputEnd, inputPlace1, inputPlace2, inputPlace3, inputPlace4, inputPlace5];

    const walkIcon = document.getElementById("walk");
    const driveIcon = document.getElementById("drive"); 

    driveIcon.addEventListener('click', function() {
        driveIcon.classList.toggle('drive-choice');
        if(walkIcon.classList.contains('walk-choice') == true) {
            walkIcon.classList.remove('walk-choice');
            calcRoute(allPlaces);
        }
    }, {passive: true});

    walkIcon.addEventListener('click', function() {
        walkIcon.classList.toggle('walk-choice');
        if(driveIcon.classList.contains('drive-choice') == true) {
            driveIcon.classList.remove('drive-choice');
        }

        if (allPlaces.length >= 2) {
            calcRoute(allPlaces);
        }

    }, {passive: true});


    var NagoyaStation = new google.maps.LatLng(35.17115177407281, 136.8815368980061);
    var mapDefault = {
    zoom: 5,
    center: NagoyaStation,
    mapTypeId: 'roadmap',
    };
    map = new google.maps.Map(document.getElementById('map'), mapDefault);

    var options = {
        componentRestrictions: { country: "jp" },
        fields: ["geometry", "formatted_address"],
        strictBounds: false,
        types: ["establishment"],
    };

    autocomplete = new google.maps.places.Autocomplete(inputStart, options);
    autocomplete.addListener("place_changed", function() {
        const firstPlace = this.getPlace();
        if (firstPlace.geometry) {
            codeAddress(firstPlace);
        }
    });


    function codeAddress(firstPlace) {

        inputEnd.disabled = false;
        inputEnd.placeholder = "終着場所を入力";

        const firstLatLang = firstPlace.geometry.location;
        const firstLocation = inputStart.value;
        allPlaces.push({
            name: "S",
            location: firstLocation,
            latLng: firstLatLang,
        });


        var mapOptions = {
            zoom: 16,
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        map.setCenter(firstLatLang);

        addMarker(firstLatLang, "S", map, infoWindow, firstLocation);


        var center = { lat: firstLatLang.lat(), lng: firstLatLang.lng() };
        var defaultBounds = {
            north: center.lat + 0.1,
            south: center.lat - 0.1,
            east: center.lng + 0.1,
            west: center.lng - 0.1,
        };
        var newOptions = {
            bounds: defaultBounds,
            componentRestrictions: { country: "jp" },
            fields: ["geometry", "formatted_address"],
            strictBounds: false,
            types: ["establishment"],
        };
        inputArr.forEach((input) => {
            autocomplete = new google.maps.places.Autocomplete(input, newOptions);
            autocomplete.addListener("place_changed", function() {
                const place = this.getPlace();
                if (place.geometry) {
                    const latLng = place.geometry.location;
                    const placeValue = input.value;
                    let isFound = false;

                    waypointCheck();

                    switch (input.name) {
                        case "start":
                            for (let obj of allPlaces) {
                                if (obj.name == "S") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "S",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;


                        case "end":
                            for (let obj of allPlaces) {
                                if (obj.name == "E") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "E",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;


                        case "place1":
                            for (let obj of allPlaces) {
                                if (obj.name == "1") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "1",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;


                        case "place2":
                            for (let obj of allPlaces) {
                                if (obj.name == "2") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "2",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;


                        case "place3":
                            for (let obj of allPlaces) {
                                if (obj.name == "3") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "3",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;


                        case "place4":
                            for (let obj of allPlaces) {
                                if (obj.name == "4") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "4",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;


                        case "place5":
                            for (let obj of allPlaces) {
                                if (obj.name == "5") {
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: "5",
                                    location: placeValue,
                                    latLng: latLng,
                                });
                            }
                            break;
                    }
                } else {
                    switch (input.name) {
                        case "start":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "S") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                        case "end":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "E") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place1":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "1") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place2":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "2") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place3":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "3") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place4":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "4") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place5":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].name == "5") {
                                    removeMarkers(allPlaces[i].name);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                    }
                }

                calcRoute(allPlaces);

            })
        })
    }


    function calcRoute(allPlaces) {
        const places = allPlaces;
        var request = {
            origin: places[0].location,
            destination: places[1].location,
            travelMode: 'DRIVING',
        }

        if(walkIcon.classList.contains('walk-choice') == true) {
            request.travelMode = 'WALKING';
        }


        const waypointsArr = [];
        for (let obj of places) {
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
                const durationRes = response.routes[0].legs;

                let durationSum = 0;
                for (obj of durationRes) {
                    let durationTime = obj.duration.value;
                    durationSum += durationTime;
                }

                const durationHours = Math.floor(durationSum / 3600);
                const durationMin = Math.floor((durationSum % 3600) / 60);

                const eleDuration = document.getElementById("duration");
                if (durationHours >= 1) {
                    let durationFormatted = `${durationHours}時間 ${durationMin}分`;
                    eleDuration.textContent = "移動時間 " + durationFormatted;
                } else {
                    let durationFormatted = `${durationMin}分`;
                    eleDuration.textContent = "移動時間 " + durationFormatted;
                }

                for (obj of places) {
                    addMarker(obj.latLng, obj.name, map, infoWindow, obj.location);
                }
            }
        });
    }


    function addMarker(location, label, map, info, content) {

        removeMarkers(label);

        var marker = new google.maps.Marker({
            position: location,
            label: label,
            map: map,
        });

        marker.addListener('click', function() {
            info.setContent(content);
            info.open(map, this);
        }, {passive: true});

        markers.push(marker);
        directionsRenderer.setMap(map);
    }


    function removeMarkers(label) {
        for (var i = 0; i < markers.length; i++) {
            if (markers[i].label == label) {
                markers[i].setMap(null);
                markers.splice(i, 1);
            }
        }
    }
}