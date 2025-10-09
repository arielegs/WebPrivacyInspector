<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Network Privacy Recommendations</title>
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
        .recommendation-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .recommendation-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar(basename(__DIR__) . '/network_recommendations.php', true); ?>
    <div class="container">
        <h1>Network Recommendations: Protecting Your Connection</h1>
        <p>Your browser can't hide your IP address or your DNS queries. For that, you need network-level solutions to protect your data in transit and prevent your Internet Service Provider (ISP) from monitoring your activity.</p>

        <div class="info-box">
            <h2>How Your Physical Location is Exposed (Without Your IP)</h2>
            <h3>Wi-Fi Positioning Systems (WPS)</h3>
            <p>Even if you hide your IP address, your physical location can be found with high accuracy through Wi-Fi scanning. This is how services like Google Maps can find you indoors, where GPS doesn't work.</p>
            <ul>
                <li><strong>How it works:</strong> Your device (phone or laptop) scans for all nearby Wi-Fi networks. It sends a list of these networks' unique MAC addresses (BSSIDs) and their signal strengths to a provider like Google or Apple.</li>
                <li><strong>The Database:</strong> These companies have massive, global databases that map Wi-Fi BSSIDs to precise geographic coordinates, built over years by data from Android phones and Street View cars.</li>
                <li><strong>The Result:</strong> By comparing the networks you can see to their database, they can "triangulate" your position, often to within a few meters.</li>
            </ul>
            <p>You can see this in action on our <a href="wifi_location_test.php">Geolocation Test</a> page.</p>
            
            <h3>How to Prevent Wi-Fi Location Tracking</h3>
            <p>Preventing this form of tracking involves controlling what your devices share. Here are the most effective methods, from simplest to most robust:</p>
            
            <h4>1. Deny Browser & App Permissions</h4>
            <p>The easiest step is to deny location requests. When a website or application asks to see your location, simply click "Deny" or "Block". Modern browsers and mobile OSes will remember this choice for the specific site or app.</p>
            <ul>
                <li><strong>Pros:</strong> Simple, granular control.</li>
                <li><strong>Cons:</strong> You must remember to deny it each time for new apps/sites. A single mistake can reveal your location.</li>
            </ul>

            <h4>2. Disable Operating System Location Services</h4>
            <p>A much stronger approach is to disable location services at the operating system level. This prevents your browser and other applications from ever being able to ask for it.</p>
            <ul>
                <li><strong>On Windows:</strong> Go to `Settings > Privacy & security > Location` and turn off "Location services".</li>
                <li><strong>On macOS:</strong> Go to `System Settings > Privacy & Security > Location Services` and toggle the main switch off, or disable it for specific apps like your browser.</li>
                <li><strong>On iOS (iPhone/iPad):</strong> Go to `Settings > Privacy & Security > Location Services` and turn it off.</li>
                <li><strong>On Android:</strong> Swipe down from the top of the screen and tap the "Location" icon in your quick settings panel to turn it off.</li>
            </ul>
            <p>This is the most recommended method for privacy-conscious users who do not need location-based services like maps.</p>

            <h4>3. Turn Off Wi-Fi</h4>
            <p>If your device's Wi-Fi radio is off, it cannot scan for nearby networks. This completely defeats Wi-Fi positioning. You can still use mobile data for internet connectivity.</p>
            <ul>
                <li><strong>Pros:</strong> The most effective, foolproof method.</li>
                <li><strong>Cons:</strong> Impractical if you need Wi-Fi for internet access.</li>
            </ul>

            <h4>What Doesn't Work (Or Has Limited Effect)</h4>
            <ul>
                <li><strong>VPNs:</strong> A VPN hides your IP address but does nothing to stop your device's radio from scanning local Wi-Fi networks. Geolocation APIs do not use your IP address.</li>
                <li><strong>MAC Address Randomization:</strong> While a great privacy feature for preventing tracking across different locations, it doesn't stop a location request from working in the moment. Your device will still scan networks and report them to the OS when asked.</li>
                <li><strong>Using `_nomap`:</strong> Some suggest renaming your Wi-Fi network's SSID to include `_nomap` (e.g., "MyNetwork_nomap"). This signals to Google that you want your network excluded from their database. While a good "digital citizen" practice, it doesn't protect *you*, as your location can be determined from your neighbors' networks.</li>
            </ul>
        </div>

        <div class="info-box">
            <h2>Reputable VPN Providers</h2>
            <p>Choosing a VPN is a critical decision. A VPN encrypts your internet traffic and hides your IP address from the websites you visit. Many heavily advertised VPNs have questionable privacy practices. The following are widely respected in the security community for their commitment to privacy, transparency, and technical security. <strong>Disclaimer:</strong> This is not an exhaustive list. Always do your own research.</p>
            <ul>
                <li><strong>Mullvad VPN:</strong> Often considered the gold standard. Based in Sweden, they have a proven no-logs policy, open-source clients, and allow for anonymous sign-ups (no email required) and cash payments.</li>
                <li><strong>Proton VPN:</strong> From the creators of ProtonMail. Based in Switzerland, they have high-security "Secure Core" servers, open-source apps, and a strong focus on transparency and legal protection.</li>
                <li><strong>IVPN:</strong> A highly transparent provider that focuses on security and has undergone public audits. They offer advanced features like anti-tracking and multi-hop connections.</li>
            </ul>
        </div>

        <div class="info-box">
            <div class="recommendation-grid">
                <div>
                    <h3>Private DNS & Network Blocking</h3>
                    <p>Every time you visit a site, your device makes a DNS query. By default, this is handled by your ISP, who can log your browsing history. Using a private DNS service can prevent this and even block trackers before they load.</p>
                    <ul>
                        <li><strong>Cloud Services:</strong> Services like <strong>NextDNS</strong> allow you to create custom blocklists that work on all your devices, anywhere. They offer encrypted DNS protocols (DNS-over-HTTPS, DNS-over-TLS).</li>
                        <li><strong>Local Solutions:</strong> A <strong>Pi-hole</strong> is a device you run on your home network to block ads and trackers for every device connected to your Wi-Fi. This acts as a local DNS server that filters out unwanted domains.</li>
                    </ul>
                </div>
                <div>
                    <h3>The Tor Network</h3>
                    <p>For the highest level of anonymity, the Tor network routes your connection through multiple volunteer-operated servers, making it virtually impossible to trace the connection back to you. The Tor Browser uses this by default, but you can also route your entire system's traffic through Tor for advanced use cases (though this can be slow and complex).</p>
                </div>
            </div>
        </div>

        <div class="info-box">
            <h2>Advanced: Securing Your Entire Home Network at the Router</h2>
            <p>For comprehensive protection, you can configure privacy tools directly on your router. This covers every device on your network, including smart TVs, IoT gadgets, and guest devices.</p>

            <h3>Step 1: Upgrade Your Router's Firmware</h3>
            <p>The default firmware on most consumer routers is often insecure, lacks features, and may have backdoors. Flashing it with open-source firmware gives you full control.</p>
            <ul>
                <li><strong>OpenWrt:</strong> A highly flexible and powerful Linux-based firmware. It's modular and has a huge library of packages you can install. Best for users who want maximum customizability.</li>
                <li><strong>pfSense/OPNsense:</strong> More powerful than a typical router firmware, these turn your hardware into an enterprise-grade firewall and router. They require more advanced hardware (like a dedicated mini-PC) but offer unparalleled control and security features.</li>
            </ul>

            <h3>Step 2: Configure a Whole-Network VPN</h3>
            <p>Instead of running a VPN client on each device, you can configure the VPN directly on your router. This forces all traffic from every device on your network through the VPN tunnel.</p>
            <ul>
                <li><strong>How it Works:</strong> Using your new firmware (like OpenWrt), you can install an OpenVPN or WireGuard client and configure it with the credentials from your VPN provider (e.g., Mullvad, Proton VPN).</li>
                <li><strong>Benefit:</strong> Every device, including those that don't support VPNs natively (like Apple TV or game consoles), is protected. You no longer have to remember to turn the VPN on.</li>
            </ul>

            <h3>Step 3: Network-Wide DNS Filtering & Segmentation</h3>
            <p>With custom firmware, you can control your entire network's DNS and create separate, isolated networks for different device types.</p>
            <ul>
                <li><strong>Router-Level DNS:</strong> Force all devices to use your chosen private DNS (like NextDNS) or your local Pi-hole, preventing them from using hard-coded DNS servers.</li>
                <li><strong>VLANs (Virtual LANs):</strong> Create separate Wi-Fi networks for different purposes. For example:
                    <ul>
                        <li>A "Trusted" network for your personal laptops and phones.</li>
                        <li>An "IoT" network for insecure devices like smart plugs and cameras. These devices can be given internet access but blocked from communicating with your trusted devices.</li>
                        <li>A "Guest" network for visitors.</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
