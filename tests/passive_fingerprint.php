<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passive Fingerprint</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('tests/passive_fingerprint.php', true); ?>

    <div class="container">
        <h1>Passive Network Fingerprint</h1>
        <p>This type of fingerprinting analyzes how your browser communicates, not what it says. It's "passive" because it can be done on the server-side without any JavaScript. This page shows the information your browser sends in its initial request headers.</p>

        <div class="info-box">
            <h2>Your HTTP Request Headers</h2>
            <pre>
<?php
$headers = getallheaders();
foreach ($headers as $key => $value) {
    echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "\n";
}
?>
            </pre>
        </div>

        <div class="info-box">
            <h2>How This is Used for Tracking</h2>
            <p>While Brave and other browsers try to standardize these headers, subtle differences can still create a fingerprint:</p>
            <p><strong>User-Agent:</strong> While less unique now, it still reveals your browser, version, and OS. Small variations can be identifying.</p>
            <p><strong>Accept-Language:</strong> The specific order and weighting of your preferred languages can be quite unique.</p>
            <p><strong>Accept-Encoding:</strong> The compression algorithms your browser supports.</p>
            <p><strong>Order of Headers:</strong> The exact order in which your browser sends these headers can be a surprisingly stable identifier for some browser versions.</p>
            <p><strong>Advanced Passive Techniques (Not shown here):</strong> Trackers can also analyze the underlying TCP/IP packets (e.g., MTU size, TCP window size) and TLS handshake to create an even more robust passive fingerprint. These are beyond what PHP can show but are used in the wild.</p>
        </div>
    </div>
</body>
</html>
