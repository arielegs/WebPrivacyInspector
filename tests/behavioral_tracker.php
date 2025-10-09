<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Behavioral Tracker</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('tests/behavioral_tracker.php', true); ?>

    <div class="container">
        <h1>Behavioral Fingerprinting</h1>
        <p>This is a more subtle form of tracking. Instead of what your browser *is*, it analyzes what you *do*. Your patterns of movement and typing can be surprisingly unique. This demo captures some of this data.</p>

        <div class="info-box">
            <h2>Mouse Movement Analysis</h2>
            <p>Move your mouse over the canvas below. The path is being recorded. A real tracker would analyze the speed, curvature, and acceleration of your movements.</p>
            <canvas id="mouse-canvas" width="860" height="300"></canvas>
            <pre id="mouse-data">Mouse data will appear here...</pre>
        </div>

        <div class="info-box">
            <h2>Typing Cadence (Keystroke Dynamics)</h2>
            <p>Type in the box below. The time between each key press and how long you hold down each key is being measured.</p>
            <input type="text" id="typing-box" placeholder="Type here to see your typing dynamics...">
            <pre id="typing-data">Typing event data will appear here...</pre>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Mouse Movement Tracking
        const canvas = document.getElementById('mouse-canvas');
        const ctx = canvas.getContext('2d');
        let mousePath = [];
        let isDrawing = false;

        ctx.strokeStyle = '#e8491d';
        ctx.lineWidth = 2;

        $(canvas).on('mousedown', function(e) {
            isDrawing = true;
            const rect = canvas.getBoundingClientRect();
            ctx.beginPath();
            ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
            mousePath.push({ x: e.clientX, y: e.clientY, t: Date.now(), type: 'down' });
        });

        $(canvas).on('mousemove', function(e) {
            if (isDrawing) {
                const rect = canvas.getBoundingClientRect();
                ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
                ctx.stroke();
                mousePath.push({ x: e.clientX, y: e.clientY, t: Date.now(), type: 'move' });
                if (mousePath.length > 100) mousePath.shift(); // Keep it from getting too big
                $('#mouse-data').text(JSON.stringify(mousePath.slice(-5), null, 2));
            }
        });

        $(canvas).on('mouseup', function(e) {
            isDrawing = false;
            mousePath.push({ t: Date.now(), type: 'up' });
        });

        // Typing Cadence Tracking
        let typingEvents = [];
        let lastKeyTime = Date.now();

        $('#typing-box').on('keydown', function(e) {
            let now = Date.now();
            typingEvents.push({
                key: e.key,
                time_since_last: now - lastKeyTime,
                type: 'down'
            });
            lastKeyTime = now;
            if (typingEvents.length > 10) typingEvents.shift();
            $('#typing-data').text(JSON.stringify(typingEvents, null, 2));
        });

        $('#typing-box').on('keyup', function(e) {
            // In a real scenario, you'd also measure the duration of the keypress
        });
    });
    </script>
</body>
</html>
