function initMap() {
    // Latitude and Longitude
    var myLatLng = {lat: 17.282621706819896, lng: -96.89125631104359};

    var map = new google.maps.Map(document.getElementById('google-maps'), {
        zoom: 17,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'South Jakarta, INA' // Title Location
    });
}
