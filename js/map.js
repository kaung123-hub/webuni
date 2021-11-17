function initMap() {
    //The location of uluru
    const uluru = { lat: -25.344, lng: 131.036 };
    //The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: uluru,
    });
    //The marker,positioned at uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}