<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Active Fingerprint</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="fingerprint2.js"></script>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('tests/active_fingerprint.php', true); ?>

    <div class="container">
        <h1>Active JavaScript Fingerprint</h1>
        <p>This is the "classic" fingerprinting we've been testing. It uses JavaScript to actively query the browser for a wide range of attributes. Brave Shield is primarily designed to combat this type of tracking by blocking or randomizing the results.</p>

        <div class="info-box">
            <h2>Your Active Fingerprint</h2>
            <div id="fingerprint">Generating...</div>
        </div>

        <div class="info-box">
            <h2>Collected Data Points</h2>
            <pre id="components">Gathering data...</pre>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        var options = {
            // Use aggressive settings to test the shield
            fonts: { extendedJsFonts: true },
            excludes: {} // Include everything
        };

        var fingerprintReport = function () {
            try {
                Fingerprint2.get(options, function (components) {
                    var values = components.map(function (c) { return c.value });
                    var murmur = Fingerprint2.x64hash128(values.join(''), 31);
                    $('#fingerprint').text(murmur);

                    var componentDetails = '';
                    components.forEach(function(component) {
                        var value = JSON.stringify(component.value);
                        if (['canvas', 'webgl', 'audio', 'fonts'].includes(component.key)) {
                            value += ' (Value likely randomized by Brave Shield)';
                        }
                        componentDetails += component.key + ': ' + value + '\\n\\n';
                    });
                    $('#components').text(componentDetails);
                });
            } catch (error) {
                $('#fingerprint').text('Fingerprinting script blocked.');
                $('#components').text('The script was blocked from running, likely by browser protections.');
            }
        };

        if (window.requestIdleCallback) {
            requestIdleCallback(fingerprintReport);
        } else {
            setTimeout(fingerprintReport, 500);
        }
    });
    </script>
</body>
</html>
