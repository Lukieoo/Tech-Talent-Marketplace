function initMap() {
    {
        // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        const styledMapType = new google.maps.StyledMapType(
            [
                {
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "weight": "2.00"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#9c9c9c"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#7b7b7b"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#46bcec"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#b5dae1"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#070707"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                }
            ],
            {name: "Styled Map"}
        );
        // Create a map object, and include the MapTypeId to add
        // to the map type control.
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: 51.2, lng: 10.54},
            zoom: 5,
            streetViewControl: false,
            mapTypeControlOptions: {
                mapTypeIds: ["styled_map"],
            },
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set("styled_map", styledMapType);
        map.setMapTypeId("styled_map");

        for (let i = 0; i < locations.length; i++) {
            const location = locations[i].location;
            const name = locations[i].name;
            console.log()
            const marker = new google.maps.Marker({
                position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                map: map,
                title: name,
                icon: {
                    url: "public/uploads/"+locations[i].photo, // URL do obrazka
                    scaledSize: new google.maps.Size(50, 50), // rozmiar ikony, możesz go dostosować do swoich potrzeb
                    origin: new google.maps.Point(0, 0), // punkt początkowy (zwykle 0, 0)
                    anchor: new google.maps.Point(25, 25), // punkt, na który wskazuje marker (zwykle środek ikony)
                },
            });
            var myoverlay = new google.maps.OverlayView();
            myoverlay.draw = function () {
                this.getPanes().markerLayer.id = 'myMarker';
            };
            myoverlay.setMap(map);
            marker.addListener('click', function () {
                window.location.href = "http://localhost:8080/profile?id=" + locations[i].id;
            });
        }
    }
}

window.initMap = initMap;