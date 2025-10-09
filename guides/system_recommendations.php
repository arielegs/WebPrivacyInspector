<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ultimate Privacy System Recommendations</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .good { color: #28a745; }
        .bad { color: #dc3545; }
        .okay { color: #ffc107; }
        .info-box h3 {
            margin-top: 25px;
            border-left: 4px solid #e8491d;
            padding-left: 10px;
        }
        .info-box ul {
            list-style-position: inside;
            padding-left: 10px;
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('guides/system_recommendations.php', true); ?>
    <div class="container">
        <h1>Building the Ultimate Privacy-Focused System</h1>
        <p>This guide outlines the components for building a desktop system with privacy and security as the highest priority. This setup is for users who want a persistent, daily-driver OS, not a temporary amnesic system like Tails.</p>

        <div class="info-box">
            <h2>Layer 1: The Operating System - The Foundation</h2>
            <p>The OS is the foundation of your digital privacy. An OS with built-in tracking at its core cannot be fully trusted.</p>
            
            <h3><span class="good">Gold Standard:</span> GrapheneOS or CalyxOS (on supported hardware)</h3>
            <ul>
                <li><strong>Why:</strong> These are hardened, privacy-focused versions of Android. While mobile-first, they offer the most secure and private consumer-level OS available today. They are designed to minimize the attack surface and remove Google's deep-level tracking.</li>
                <li><strong>Hardware:</strong> Requires a Google Pixel phone. This is the best option for mobile privacy.</li>
            </ul>

            <h3><span class="good">Excellent Desktop Choice:</span> Hardened Linux (e.g., Arch Linux with security flags)</h3>
            <ul>
                <li><strong>Why:</strong> A minimal Linux installation gives you complete control. You install only what you need, drastically reducing the attack surface. You can compile your kernel with security-focused flags (like `grsecurity`/`pax`).</li>
                <li><strong>Best For:</strong> Technical users who are comfortable with the command line and want to build a system from the ground up.</li>
                <li><strong>Downside:</strong> Requires significant time, research, and maintenance.</li>
            </ul>

            <h3><span class="okay">Good for Most Users:</span> Fedora or a minimal Debian</h3>
            <ul>
                <li><strong>Why:</strong> These are mainstream Linux distributions with strong security postures and large communities. They don't have the corporate tracking of Windows or macOS.</li>
                <li><strong>Best For:</strong> Users who want a good balance of privacy, security, and usability without the extreme learning curve of a hardened Arch build.</li>
            </ul>

            <h3><span class="bad">Not Recommended:</span> Windows & macOS</h3>
            <ul>
                <li><strong>Why:</strong> Both operating systems have extensive telemetry and data collection baked in. While some of it can be disabled, the closed-source nature means you can never be certain what data is being sent. Their business models involve user data.</li>
            </ul>
        </div>

        <div class="info-box">
            <h2>Layer 2: The Browser & Network</h2>
            <p>Once the OS is solid, focus on how you interact with the internet.</p>
            
            <h3>The Browser Setup</h3>
            <p>Refer to our <a href="browser_recommendations.php">Browser Recommendations</a> page for a full breakdown. The best setup for this system would be:</p>
            <ul>
                <li><strong>Primary Browser:</strong> Mullvad Browser (for the best anti-fingerprinting without the Tor network).</li>
                <li><strong>For Anonymity:</strong> Tor Browser.</li>
                <li><strong>Essential Extension:</strong> uBlock Origin on any browser that doesn't have it built-in.</li>
            </ul>

            <h3>Network-Level Protection</h3>
            <ul>
                <li><strong>VPN:</strong> A high-quality, audited, no-logs VPN is essential. Use a provider like <strong>Mullvad</strong> or <strong>Proton VPN</strong>. The VPN should be configured to run at system startup.</li>
                <li><strong>DNS:</strong> Use a private DNS service like <strong>NextDNS</strong> to block trackers at the network level, or run your own <strong>Pi-hole</strong> on your local network.</li>
            </ul>
        </div>

        <div class="info-box">
            <h2>Layer 3: Software & Practices</h2>
            <p>The tools and habits you use daily matter.</p>
            
            <h3>Software Choices</h3>
            <ul>
                <li><strong>Password Manager:</strong> Use a local, open-source password manager like <strong>KeePassXC</strong>.</li>
                <li><strong>Email:</strong> Use a privacy-respecting email provider like <strong>ProtonMail</strong>.</li>
                <li><strong>Messaging:</strong> Use <strong>Signal</strong> for encrypted communication.</li>
                <li><strong>Office Suite:</strong> Use <strong>LibreOffice</strong> instead of Microsoft Office or Google Docs.</li>
            </ul>

            <h3>System Hardening & Practices</h3>
            <ul>
                <li><strong>Full Disk Encryption:</strong> This is non-negotiable. Ensure your entire hard drive is encrypted.</li>
                <li><strong>Firewall:</strong> Configure a strict firewall to block all incoming connections by default.</li>
                <li><strong>Minimize Software:</strong> Only install software you absolutely need. Every program is a potential attack vector.</li>
                <li><strong>Virtualization:</strong> Use virtual machines (e.g., using KVM/QEMU) to isolate risky software or browsing activities from your main system.</li>
            </ul>
        </div>
    </div>
</body>
</html>
