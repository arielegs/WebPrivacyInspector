<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VM Detector</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('tests/vm_detector.php', true); ?>

    <div class="container">
        <h1>Virtual Machine (VM) Detector</h1>
        <p>This page runs several tests to determine if you are browsing from within a Virtual Machine. While not foolproof, these are common techniques used by advanced fingerprinting scripts.</p>

        <div class="info-box">
            <h2>Overall Conclusion</h2>
            <pre id="conclusion">Analyzing...</pre>
        </div>

        <div class="info-box">
            <h2>1. WebGL Graphics Renderer (Primary Indicator)</h2>
            <p>The name of your graphics renderer is the most reliable way to detect a VM. Virtual machines use virtual GPUs, which have distinct names.</p>
            <pre id="webgl-renderer">Fetching...</pre>
        </div>

        <div class="info-box">
            <h2>2. Performance Benchmark</h2>
            <p>This test measures the time taken to perform a series of calculations. VMs often have a slight performance overhead or timing jitter compared to bare-metal machines.</p>
            <pre id="performance">Running test...</pre>
        </div>
        
        <div class="info-box">
            <h2>3. Hardware & Screen Analysis</h2>
            <p>This checks for hardware and screen properties that can be unusual in VM environments.</p>
            <pre id="hardware-screen">Fetching...</pre>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        let isVM = false;
        let vmClues = [];

        // 1. WebGL Check
        try {
            const canvas = document.createElement('canvas');
            const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
            if (gl) {
                const debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
                const renderer = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);
                $('#webgl-renderer').text('Renderer: ' + renderer);

                const vmGpuKeywords = ['vmware', 'virtualbox', 'parallels', 'llvmpipe', 'swrast', 'hyper-v'];
                for (const keyword of vmGpuKeywords) {
                    if (renderer.toLowerCase().includes(keyword)) {
                        isVM = true;
                        vmClues.push('WebGL renderer name (' + renderer + ') is a strong indicator of a VM.');
                        break;
                    }
                }
            } else {
                 $('#webgl-renderer').text('WebGL not supported or blocked.');
            }
        } catch (e) {
            $('#webgl-renderer').text('Could not get WebGL information. It might be blocked.');
        }

        // 2. Performance Benchmark
        const startTime = performance.now();
        let result = 0;
        for (let i = 0; i < 10000000; i++) {
            result += Math.sqrt(i) * Math.sin(i);
        }
        const endTime = performance.now();
        const duration = (endTime - startTime).toFixed(2);
        $('#performance').text('Benchmark completed in: ' + duration + ' ms');
        if (duration > 300) { // Arbitrary threshold, slower might indicate VM overhead
            vmClues.push('Performance benchmark was slower than average, which can be a weak indicator of a VM.');
        }

        // 3. Hardware & Screen
        let hardwareScreenInfo = '';
        const cores = navigator.hardwareConcurrency;
        const memory = navigator.deviceMemory;
        hardwareScreenInfo += 'CPU Cores: ' + (cores || 'N/A') + '\n';
        hardwareScreenInfo += 'Device Memory (RAM): ' + (memory ? memory + ' GB' : 'N/A') + '\n';
        hardwareScreenInfo += 'Screen Resolution: ' + screen.width + 'x' + screen.height;
        $('#hardware-screen').text(hardwareScreenInfo);
        
        // Check for common default VM resolutions
        const commonVmResolutions = ['1024x768', '800x600'];
        if (commonVmResolutions.includes(screen.width + 'x' + screen.height)) {
             vmClues.push('Screen resolution matches a common default VM resolution.');
        }


        // Final Conclusion
        if (isVM) {
            $('#conclusion').text('VM DETECTED (High Confidence)\n\nReasons:\n- ' + vmClues.join('\n- '));
        } else if (vmClues.length > 0) {
            $('#conclusion').text('VM POSSIBLE (Low Confidence)\n\nReasons:\n- ' + vmClues.join('\n- '));
        } else {
            $('#conclusion').text('Likely a Physical Machine.\n\nNo clear indicators of a VM were found.');
        }
    });
    </script>
</body>
</html>
