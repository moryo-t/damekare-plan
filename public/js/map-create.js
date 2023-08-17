function initMap() {
    const mapsDataContainer = document.getElementById('mapsDataContainer');
    const mapsSettingContainer = document.getElementById('mapsSettingContainer');
    const mapsData = JSON.parse(mapsDataContainer.dataset.mapsArray);
    const mapsSetting = JSON.parse(mapsSettingContainer.dataset.mapsArray)

    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
    });

    var infoWindow = new google.maps.InfoWindow();
    var map = new google.maps.Map(document.getElementById('map'));

    var request = {
        travelMode: mapsSetting['travelMode'],
    }

    var waypointsArr = [];
    for (let obj of mapsData) {
        if (obj.pinName == "S") {
            request.origin = obj.location;
        }
        if (obj.pinName == "E") {
            request.destination = obj.location;
        }
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

            let durationSum = mapsSetting['duration'];

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

            for (obj of mapsData) {
                addMarker(obj.name, obj.latLng, obj.pinName, map, infoWindow, obj.location, obj.openingHours);
            }
        }
    });

    function addMarker(name, location, label, map, info, content, opening) {
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

        directionsRenderer.setMap(map);
    }
}