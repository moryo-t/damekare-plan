function initMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
    });

    var infoWindow = new google.maps.InfoWindow();
    var geocoder = new google.maps.Geocoder();
    var map = new google.maps.Map(document.getElementById('map'));


    var allPlaces = [];

    const mapData = window.mapData;
    const mapDataParsed = JSON.parse(mapData);
    const dataShaping = mapDataParsed[0];
    const mapDataKeep = ["start", "end", "place1", "place2", "place3", "place4", "place5"];


    function geocodeAddress(address) {
        return new Promise((resolve, reject) => {
            geocoder.geocode({address: address}, function(result, status) {
                if (status == 'OK') {
                    resolve(result[0].geometry.location);
                } else {
                    reject(new Error("ジオコーディングに失敗しました。"));
                }
            })
        })
    }

    async function processPlaces() {
        for (let key in dataShaping) {
            if (mapDataKeep.includes(key) && dataShaping[key] !== null) {
                try {
                    const latLng = await geocodeAddress(dataShaping[key]);
                    let name;

                    switch (key) {
                        case "start":
                            name = "S";
                            break;
                        case "end":
                            name = "E";
                            break;
                        case "place1":
                            name = "1";
                            break;
                        case "place2":
                            name = "2";
                            break;
                        case "place3":
                            name = "3";
                            break;
                        case "place4":
                            name = "4";
                            break;
                        case "place5":
                            name = "5";
                            break;
                    }

                    allPlaces.push({
                        name: name,
                        location: dataShaping[key],
                        latLng: latLng,
                    });
                } catch (e) {
                }
            }
        }
    }

    async function main() {
        await processPlaces();

        var request = {
            travelMode: 'DRIVING',
        }

        var waypointsArr = [];
        for (let obj of allPlaces) {
            if (obj.name == "S") {
                request.origin = obj.location;
            }
            if (obj.name == "E") {
                request.destination = obj.location;
            }
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
        }
    }

    main();
}