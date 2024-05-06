// function myMap(){
//   var mapProp = {
//     center: new google.maps.LatLng(51.508742, -0.12085),
//     zoom: 5,
//   };
//   var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
// }

// let autocomplete;
// function initAutoComplete(){
//     autocomplete = new google.maps.places.Autocomplete(
//         document.getElementById('autocomplete'),{
//             types:['establishment'],
//             componentRestrictions:{
//                 'country':['AU']
//             },
//             fields:['place_id', 'geometry','name']
//         }

//     );
//     autocomplete.addListener('place_changed',onPlaceChanged);
// }

// function onPlaceChanged(){
//     var place = autocomplete.getPlace();

//     if(place.geometry){
//         document.getElementById('autocomplete').placeholder = 'Enter a place';
//     }
//     else{
//         document.getElementById('details').innerHTML = place.name;
//     }
// }

 // Function to initialize the map
 function initMap() {
    // Initial coordinates (centered on a default location)
    var initialLocation = { lat: 40.7128, lng: -74.0060 };
    var map = new google.maps.Map(document.getElementById('map'), {
        center: initialLocation,
        zoom: 12 // Adjust the zoom level as needed
    });

    // Function to add a marker to the map
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    // Function to geocode an address and display it on the map
    function geocodeAddress(address) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                addMarker(results[0].geometry.location);
            } else {
                // alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    // Function to display a location based on latitude and longitude
    function displayLocation(latitude, longitude) {
        var location = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
        map.setCenter(location);
        addMarker(location);
    }

    // Example usage:
    // You can call either geocodeAddress or displayLocation based on your input data

    // Example 1: Input is a full address
    var addressInput = "1600 Amphitheatre Parkway, Mountain View, CA";
    geocodeAddress(addressInput);

    // Example 2: Input is a pair of latitude and longitude
    var latitudeInput = 37.4221;
    var longitudeInput = -122.0841;
    displayLocation(latitudeInput, longitudeInput);
}

// Call the initMap function when the page loads
initMap();