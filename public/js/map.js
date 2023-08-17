let allPlaces = [];
let allSetting = {};

function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
    });
    
    const infoWindow = new google.maps.InfoWindow();
    
    var autocomplete;
    var map;
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
        fields: ["name", "geometry", "formatted_address", "opening_hours"],
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

        const firstName = firstPlace.name;
        const firstLatLang = firstPlace.geometry.location;
        if (firstPlace.opening_hours) {
            var firstOpening = firstPlace.opening_hours.weekday_text;
        } else {
            var firstOpening = null;
        }

        const firstLocation = inputStart.value;

        allPlaces.push({
            name: firstName,
            pinName: "S",
            location: firstLocation,
            latLng: firstLatLang,
            openingHours: firstOpening,
        });

        var mapOptions = {
            zoom: 16,
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        map.setCenter(firstLatLang);

        addMarker(firstName, firstLatLang, "S", map, infoWindow, firstLocation, firstOpening);


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
            fields: ["name", "geometry", "formatted_address", "opening_hours"],
            strictBounds: false,
            types: ["establishment"],
        };
        inputArr.forEach((input) => {
            autocomplete = new google.maps.places.Autocomplete(input, newOptions);
            autocomplete.addListener("place_changed", function() {
                const place = this.getPlace();
                if (place.geometry) {
                    const placeName = place.name;
                    const latLng = place.geometry.location;
                    const placeValue = input.value; 
                    if (place.opening_hours) {
                        var opening = place.opening_hours.weekday_text;
                    } else {
                        var opening = null;
                    }
                    
                    let isFound = false;

                    waypointCheck();

                    switch (input.name) {
                        case "start":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "S") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "S",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;


                        case "end":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "E") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "E",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;


                        case "place1":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "1") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "1",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;


                        case "place2":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "2") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "2",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;


                        case "place3":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "3") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "3",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;


                        case "place4":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "4") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "4",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;


                        case "place5":
                            for (let obj of allPlaces) {
                                if (obj.pinName == "5") {
                                    obj.name = placeName;
                                    obj.location = placeValue;
                                    obj.latLng = latLng;
                                    obj.openingHours = opening,
                                    isFound = true;
                                    break;
                                }
                            }

                            if (!isFound) {
                                allPlaces.push({
                                    name: placeName,
                                    pinName: "5",
                                    location: placeValue,
                                    latLng: latLng,
                                    openingHours: opening,
                                });
                            }
                            break;
                    }
                } else {
                    switch (input.name) {
                        case "start":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "S") {
                                    removeMarkers(allPlaces[i].pinName);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                        case "end":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "E") {
                                    removeMarkers(allPlaces[i].pinName);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place1":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "1") {
                                    removeMarkers(allPlaces[i].pinName);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place2":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "2") {
                                    removeMarkers(allPlaces[i].pinName);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place3":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "3") {
                                    removeMarkers(allPlaces[i].pinName);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place4":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "4") {
                                    removeMarkers(allPlaces[i].pinName);
                                    allPlaces.splice(i, 1);
                                    break;
                                }
                            }
                            break;
                        case "place5":
                            for (let i = 0; i < allPlaces.length; i++) {
                                if (allPlaces[i].pinName == "5") {
                                    removeMarkers(allPlaces[i].pinName);
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
            if (obj.pinName !== "S" && obj.pinName !== "E") {
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

                allSetting.duration = durationSum;
                allSetting.travelMode = request['travelMode'];
                
                for (obj of places) {
                    addMarker(obj.name, obj.latLng, obj.pinName, map, infoWindow, obj.location, obj.openingHours);
                }
            }
        });
    }


    function addMarker(name, location, label, map, info, content, opening) {

        removeMarkers(label);

        let location_content = `
            <h5>${name}</h5>
            <div class="d-flex align-items-center">
                ${content}
            </div>
        `;

        if (opening !== null) {
            let openingWeek = opening.join('<br>');
            location_content += `
                <div class="pt-3">営業時間</div>
                <div>${openingWeek}</div>
            `;
        }

        var marker = new google.maps.Marker({
            position: location,
            label: label,
            map: map,
        });

        marker.addListener('click', function() {
            info.setContent(location_content);
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