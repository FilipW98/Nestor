window.addEventListener('load', function () {

    const tag = document.createElement("script");
    tag.src =
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBTw5E7dVbIrVtibXwXhCSMzwv089_FeQ&callback=initMap&libraries=&v=weekly";
    document.getElementsByTagName("head")[0].appendChild(tag);
    // Initialize and add the map 
})
console.log('map');
function initMap() {


    /* Style do chrome
     .gm-style-iw.gm-style-iw-c {
        padding: 0;
    }

    .gm-style-iw-d {
        overflow: auto !important;
        background-color: white;
    }

    .gm-style-iw.gm-style-iw-c[role="dialog"] {
        padding: 0;
    }
    */

    const mapStyles = [{
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#004b8b"
            }]
        },
        {
            "elementType": "labels.icon",
            "stylers": [{
                    "visibility": "simplified"
                },
                {
                    "weight": 0.5
                }
            ]
        },
        {
            "elementType": "labels.text",
            "stylers": [{
                    "color": "#ffffff"
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "poi.attraction",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "poi.business",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#281713"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#e30613"
            }]
        }
    ];

    const pinPoint = {
        lat: 50.70417,
        lng: 18.71493
    };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16.1,
        center: pinPoint,
        disableDefaultUI: true,
        styles: mapStyles,
    });

    const icon = {
        url: "/wp-content/uploads/2023/03/map-pin-icon-2.svg", // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        // origin: new google.maps.Point(0,0), // origin
        // anchor: new google.maps.Point(0, 0) // anchor
    };

    const marker = new google.maps.Marker({
        position: pinPoint,
        map: map,
        icon: icon,
        // icon: '/wp-content/uploads/2022/12/gps-pin.png',
        // fillOpacity: 1,
        // fillColor: 'yellow',
        // strokeWeight: 2,
        // strokeColor: "white",
    });

    const contentString =
        '<div class="info-window">' +
        '<span class="info-window__name info-window__text">ALHAR sp. z o. o.  Henryk Klink</span>' +
        '<div class="info-window__adres">' +
        '<span class="info-window__adres-line info-window__text">Kochanowicka 89a</span>' +
        '<span class="info-window__adres-line info-window__text">42-713 Kochcice</span>' +
        '</div>' +
        '<a href="https://goo.gl/maps/Ukzb1JkmCBgUg5G48" target="_blank" class="info-window__trace">wyznacz trasę</a>' +
        '</div>';


    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        optimized: false,
        zIndex: 1500,
    });

    // let mainInfoWindow = infowindow;

    marker.addListener("click", () => {
        infowindow.open(map, marker);
    });


    // marker_lw.addListener("load", () => {
    //     mainInfoWindow = infowindow_lw;
    //     mainInfoWindow.open(map, marker_lw);
    // });


    // marker_lw.addListener("click", () => {
    //     mainInfoWindow = infowindow_lw;
    //     mainInfoWindow.open(map, marker_lw);
    // });

}