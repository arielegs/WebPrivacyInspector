<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Geolocation & Wi-Fi Positioning Test</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        #map { height: 400px; margin-top: 20px; border-radius: 5px; }
        .info-box { text-align: left; }
        .button { 
            background-color: #e8491d;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 15px;
        }
        .button:hover {
            background-color: #f96a38;
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('tests/wifi_location_test.php', true); ?>

    <div class="container">
        <h1>Geolocation & Wi-Fi Positioning Test</h1>
        <div class="info-box">
            <h2>How Websites Can Find Your Physical Location</h2>
            <p>This test demonstrates the <strong>W3C Geolocation API</strong>. While a website cannot directly scan your Wi-Fi networks, it can ask the browser for your location. Your browser then uses the most accurate method available to find you, which often includes:</p>
            <ul>
                <li><strong>GPS:</strong> The most accurate method, typically on mobile devices.</li>
                <li><strong>Wi-Fi Positioning:</strong> By scanning nearby Wi-Fi networks (their MAC addresses and signal strength), your device can determine your location with surprising accuracy, often within a few meters. This is how you can be located indoors where GPS doesn't work.</li>
                <li><strong>Cell Tower Triangulation:</strong> Using nearby cell towers to approximate your location.</li>
                <li><strong>IP Address Geolocation:</strong> A last resort, which is highly inaccurate and only provides a general area (city/region).</li>
            </ul>
            <p>Click the button below. Your browser will ask for permission. If you grant it, we will display the location your browser provides.</p>
        </div>

        <button class="button" onclick="getLocation()">Start Location Test</button>

        <div id="result" class="info-box" style="display:none; margin-top: 20px;">
            <h2>Your Location</h2>
            <p>Latitude: <span id="lat"></span></p>
            <p>Longitude: <span id="lon"></span></p>
            <p>Accuracy: <span id="acc"></span> meters</p>
            <div id="map"></div>
            <h3 style="margin-top: 20px;">Analysis</h3>
            <p>If you are indoors or on a device without GPS, your browser likely used <strong>Wi-Fi Positioning</strong> to find you with this level of accuracy. This demonstrates that even without GPS, your physical location can be pinpointed just by the Wi-Fi signals around you.</p>
        </div>
    </div>

    <script>
        let map;
        let marker;
        let circle;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            const acc = position.coords.accuracy;

            document.getElementById('result').style.display = 'block';
            document.getElementById('lat').textContent = lat.toFixed(6);
            document.getElementById('lon').textContent = lon.toFixed(6);
            document.getElementById('acc').textContent = acc.toFixed(0);

            if (!map) {
                map = L.map('map').setView([lat, lon], 16);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            } else {
                map.setView([lat, lon], 16);
            }

            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lon]).addTo(map)
                .bindPopup(`You are within ${acc.toFixed(0)} meters of this point.`)
                .openPopup();
            
            if (circle) {
                map.removeLayer(circle);
            }
            circle = L.circle([lat, lon], {
                color: '#e8491d',
                fillColor: '#e8491d',
                fillOpacity: 0.2,
                radius: acc
            }).addTo(map);
        }

        function showError(error) {
            let message = "";
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    message = "You denied the request for Geolocation. This is the correct choice for privacy."
                    break;
                case error.POSITION_UNAVAILABLE:
                    message = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    message = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    message = "An unknown error occurred."
                    break;
            }
            alert(message);
        }
    </script>
</body>
</html>
