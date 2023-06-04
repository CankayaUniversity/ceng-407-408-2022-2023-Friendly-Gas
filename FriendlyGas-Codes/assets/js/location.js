//google api key: AIzaSyCxg3xSWMnHfCzALJa8I9et_QhFrkA85gc
//google nearbt "https://maps.googleapis.com/maps/api/place/nearbysearch/json"+
//                     "?location="+currentlat+","+currentlong+
//                     "&radius="+radius+
//                     "&types=benzin_istasyon" +
//                     "&name="+places_array[i]+
//                     "&key=AIzaSyDEEISUqJC-eJfNq_nvf1_P5n-qvjLh20E";
const google_api_key = "AIzaSyCxg3xSWMnHfCzALJa8I9et_QhFrkA85gc";
const collect_api_key = "apikey 3zZNR9ranGaqJSyt6ysUSe:69eREieJENYyuqkM3kwbrl";
var google_map = document.querySelector(".google_map")
let map;
var current_latitude;
var current_longitude;

var places = {
    "places": [
        {
            "latitude": null,
            "longitude": null,
            "name": null
        }
    ]
};
var gasTypeUrl = "turkeyLpg";

getLocation();
let markers = [];
async function initMap() {


    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: {lat: parseFloat(current_latitude), lng: parseFloat(current_longitude)},
        zoom: 15,
    });

    new google.maps.Marker({
        position: {lat: current_latitude, lng: current_longitude},
        map: map,
        icon: window.location.origin +'/media/images/map_user_icon.png',
    });

    for (let i = 1; i < places.places.length; i++) {
        console.log(i);
        const marker = new google.maps.Marker({
            position: {lat: places.places[i].latitude, lng: places.places[i].longitude},
            map: map,
            icon: window.location.origin + '/media/images/map_station_icon.png',
            title: places.places[i].name,
        });
        markers.push(marker);


        marker.addListener("click", () => {
            map.setZoom(18);
            map.setCenter(marker.getPosition());
        });
    }

    $('.loader-container').css("display", "none");



}
// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function hideMarkers() {
    setMapOnAll(null);
}
function deleteMarkers() {
    hideMarkers();
    markers = [];
}

function getLocation(){
    $('.loader-container').css("display", "flex");
    navigator.permissions.query({ name: "geolocation" }).then((result) => {
        if (result.state === "granted") {
            //console.log("granted");
            navigator.geolocation.getCurrentPosition(success, error);
        } else if (result.state === "prompt") {
            //console.log("prompt");
            navigator.geolocation.getCurrentPosition(success, error);
        } else if (result.state === "denied") {
            alert("access denied")
        }
        result.addEventListener("change", () => {
            console.log(result.state);
        });
    });

    const success = (position) => {
        console.log(position)
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        current_latitude = latitude;
        current_longitude = longitude;
        google_map.style.display = "block";
        getNearby(current_latitude, current_longitude);
    };
     const error = () => {
         alert("error happened")
     };

}

function googleMapTwoPoint(latitude_origin, longitude_origin, latitude_destination, longitude_destination){
    google_map.style.display = "block"
    google_map.src = "https://www.google.com/maps/embed/v1/directions" +
        "?key="+ api_key +
        "&origin=" + latitude_origin + "," + longitude_origin +
        "&destination=konya+alaaddin";
}
function googleMapPlace(latitude, longitude){
    google_map.src="https://www.google.com/maps/embed/v1/place" +
        "?key="+ api_key +
        "&q=" + latitude + "," + longitude;
}

var prices;
async function getNearby(lat, lng){
    const proxyurl = "https://arcane-refuge-96337.herokuapp.com/";
    const url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="+ lat + ","+ lng+"&types=gas_station&radius=500&key=" + google_api_key; // site that doesn’t send Access-Control-*


    $.ajax({
        url: proxyurl + url,
        type: "GET",
        success: async function (response) {
            if (response) {
                if (response.status.includes("OK")) {
                    console.log(response);


                    await $.ajax({
                        url: 'https://api.collectapi.com/gasPrice/'+ gasTypeUrl +'?city=ankara',
                        headers: {
                            "authorization": collect_api_key,
                            "Content-Type": "application/json"
                        },
                        success: function (data) {
                            if (data.success === true) {
                                prices = data.result;
                                console.log(data);
                                "<option value=''>Select a brand</option>"
                                for (let i = 0; i < prices.length; i++) {
                                    $('.filter-side #brand').append(
                                        "<option value='"+ prices[i].marka +"'>"+ prices[i].marka +"</option>"
                                    );
                                }

                            }
                        },
                        error: function (xhr){
                            console.log(xhr);
                        }
                    });

                    var result = response.results;

                    for (let i = 0; i < result.length; i++) {

                        for (let j = 0; j < prices.length; j++) {
                            var brand = prices[j].marka.toLowerCase();
                            if (brand.includes(result[i].name.toLowerCase())) {
                                var currentPrice;
                                if (gasTypeUrl === "turkeyGasoline"){
                                    currentPrice = prices[j].benzin
                                }else if(gasTypeUrl === "turkeyLpg"){
                                    currentPrice = prices[j].lpg
                                }else if(gasTypeUrl === "turkeyDiesel"){
                                    currentPrice = prices[j].dizel
                                }

                                window.places["places"].push({
                                    "name": result[i].name,
                                    "latitude": result[i].geometry.location.lat,
                                    "longitude": result[i].geometry.location.lng,
                                });
                                let destinationUrl = "https://www.google.com/maps/embed/v1/directions<key="+google_api_key+">origin="+current_latitude+","+current_longitude+">destination="+result[i].geometry.location.lat+","+result[i].geometry.location.lng;
                                var brandName = result[i].name.toLowerCase().replace(' ','');
                                console.log("foo1: ",brandName);
                                $('.section-2 .row').append(
                                    '<div class="col-lg-2 '+ brandName +'" onclick="goRide(this.id)" id="'+ destinationUrl +'">'+
                                        '<div class="box">' +
                                        '<img src="media/images/shell.jpeg" alt="">' +
                                            '<div class="text-box">' +
                                                '<h6>' + result[i].name + '</h6>' +
                                                '<i class="fa-solid fa-sack-dollar"></i>' +
                                                '<p class="h6">₺' + currentPrice + '</p>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>'
                                );
                            }
                        }

                        if (i === (result.length - 1)) {
                            initMap()
                        }
                    }

                }
            }
        },
        error: function (xhr){
            console.log(xhr);
            return null
        }
    });
}

function getCity(lat, lng){
    $.ajax({ url:'https://maps.googleapis.com/maps/api/geocode/json?latlng='+ lat +','+ lng +'&sensor=true&key=' + google_api_key,
        success: function(data){
            var city = data.results[0].address_components[4].long_name;
            console.log(city)
        }
    });
}

function goRide(url){
    window.location.replace("ride.html?q=" + url);
}



$('.filter-button').click(function (){
    $('.filter-side').slideToggle().css("display", "flex");
});

function onChangeBrand(selectedObject){
    for (let i = 0; i < prices.length; i++) {
        if (selectedObject.value !== prices[i].marka){
            $('.section-2 .row .col-lg-2.' + prices[i].marka.toLowerCase().replace(' ', '')).css("display", "none");
        }else{
            $('.section-2 .row .col-lg-2.' + prices[i].marka.toLowerCase().replace(' ', '')).css("display", "block");
        }
    }
}

function onChangeType(selectedObject){
    deleteMarkers()
    $('.section-2 .row .col-lg-2').remove();
    if (selectedObject.value === "benzin"){
        gasTypeUrl = "turkeyGasoline";
    }else if(selectedObject.value === "gas"){
        gasTypeUrl = "turkeyLpg";
    }else if(selectedObject.value === "dizel"){
        gasTypeUrl = "turkeyDiesel";
    }
    getLocation();
}

window.addEventListener('load', function() {
    var loaderContainer = document.querySelector('.loader-container');
    loaderContainer.style.display = 'none';
});




