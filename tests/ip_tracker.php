<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IP Address Tracker</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('tests/ip_tracker.php', true); ?>

    <div class="container">
        <h1>IP Address Tracker</h1>
        <p>Your IP address is the most fundamental piece of information you broadcast on the internet. It's required for any connection to work. This tool shows what a service can learn about you from your IP address alone.</p>

        <div class="info-box">
            <h2>Your Raw IP Information</h2>
            <?php
                $local_ip = $_SERVER['REMOTE_ADDR'];
                // Call the API without an IP. The service will report the IP of the machine making the request.
                $api_url = "http://ip-api.com/json/";

                // Use cURL to fetch data
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // Add a user-agent to be a good internet citizen
                curl_setopt($ch, CURLOPT_USERAGENT, 'My-IP-Tracker-Demo/1.0');
                $response = curl_exec($ch);
                curl_close($ch);

                $data = json_decode($response, true);

                echo "<pre>";
                echo "Request initiated from local address: " . htmlspecialchars($local_ip) . "\n\n";

                if ($data && $data['status'] == 'success') {
                    echo "Your Public IP Address: " . htmlspecialchars($data['query']) . "\n\n";
                    echo "--- Geolocation Data ---\n";
                    echo "Country: " . htmlspecialchars($data['country']) . "\n";
                    echo "Region: " . htmlspecialchars($data['regionName']) . "\n";
                    echo "City: " . htmlspecialchars($data['city']) . "\n";
                    echo "ZIP Code: " . htmlspecialchars($data['zip']) . "\n";
                    echo "Latitude: " . htmlspecialchars($data['lat']) . "\n";
                    echo "Longitude: " . htmlspecialchars($data['lon']) . "\n\n";
                    echo "--- Network Information ---\n";
                    echo "ISP (Internet Service Provider): " . htmlspecialchars($data['isp']) . "\n";
                    echo "Organization: " . htmlspecialchars($data['org']) . "\n";
                    echo "ASN (Autonomous System Number): " . htmlspecialchars($data['as']) . "\n";
                } else {
                    echo "Could not retrieve public IP and geolocation data.";
                }
                echo "</pre>";
            ?>
        </div>
        <div class="info-box">
            <h2>How This is Used for Tracking</h2>
            <p><strong>Location Pinpointing:</strong> While it often points to your ISP's local hub, it can be surprisingly accurate, especially when cross-referenced with other data.</p>
            <p><strong>Consistent Identifier:</strong> Your IP address may not change for days, weeks, or even months, making it a reliable way to identify your household's network over time.</p>
            <p><strong>Blocking Content:</strong> Services use your IP to enforce geographic restrictions (geo-blocking).</p>
            <p><strong>The Solution:</strong> A trusted VPN or the Tor network is the primary way to mask your true IP address.</p>
        </div>
    </div>
</body>
</html>
