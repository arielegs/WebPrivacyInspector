<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Privacy Recommendations</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .good { color: #28a745; }
        .bad { color: #dc3545; }
        .okay { color: #ffc107; }
        .recommendation-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .info-box h3 {
            margin-top: 25px;
            border-left: 4px solid #e8491d;
            padding-left: 10px;
        }
        .info-box ul {
            list-style-position: inside;
            padding-left: 10px;
        }
        @media (max-width: 768px) {
            .recommendation-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('guides/privacy_recommendations.php', true); ?>

    <div class="container">
        <h1>Actionable Guide to Digital Privacy & Fingerprint Prevention</h1>
        <p>Based on the tests on the other pages, here is a practical guide to protecting your digital identity. The core principle is <strong>blending in with a crowd</strong>, not standing out with a unique disguise.</p>

        <div class="info-box">
            <h2>Privacy-Focused Alternatives to Popular Services</h2>
            <div class="recommendation-grid">
                <div>
                    <h3><span class="bad">YouTube</span> and Its Tracking</h3>
                    <p>Yes, YouTube uses extensive fingerprinting and tracking techniques including:</p>
                    <ul>
                        <li>Browser fingerprinting</li>
                        <li>Canvas fingerprinting</li>
                        <li>Audio fingerprinting</li>
                        <li>Device information collection</li>
                        <li>Viewing habits tracking</li>
                    </ul>
                    <h4>Privacy-Focused Alternatives:</h4>
                    <ul>
                        <li><strong>Invidious (invidious.io)</strong>: Open-source YouTube front-end with no tracking</li>
                        <li><strong>PeerTube (joinpeertube.org)</strong>: Decentralized video platform</li>
                    </ul>
                </div>
                <div>
                    <h3><span class="bad">Google Search</span> Alternatives</h3>
                    <ul>
                        <li><strong>DuckDuckGo</strong>: No tracking, no search history collection</li>
                        <li><strong>Startpage</strong>: Google results delivered privately</li>
                        <li><strong>Brave Search</strong>: Independent search index with privacy focus</li>
                    </ul>
                </div>
            </div>

            <h3>Other Privacy-Respecting Services</h3>
            <div class="recommendation-grid">
                <div>
                    <h4>Email</h4>
                    <ul>
                        <li>ProtonMail (proton.me/mail)</li>
                        <li>Tutanota (tutanota.com)</li>
                    </ul>
                    <h4>Maps</h4>
                    <ul>
                        <li>OpenStreetMap (openstreetmap.org)</li>
                        <li>Maps.me (maps.me)</li>
                    </ul>
                </div>
                <div>
                    <h4>Cloud Storage</h4>
                    <ul>
                        <li>Proton Drive (proton.me/drive)</li>
                        <li>Nextcloud (nextcloud.com)</li>
                    </ul>
                    <h4>Social Media</h4>
                    <ul>
                        <li>Mastodon (joinmastodon.org)</li>
                        <li>Pixelfed (pixelfed.org)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-box">
            <h2>Layer 1: Your Browser - The First Line of Defense</h2>
            <p>Your choice of browser is the single most important decision for preventing script-based fingerprinting. For a detailed comparison of browsers, please see our <a href="browser_recommendations.php">Browser Recommendations</a> page.</p>
        </div>

        <div class="info-box">
            <h2>Layer 2: Your Network - DNS, VPNs, and Tor</h2>
            <p>Your browser can't hide your IP address or your DNS queries. For a detailed guide on network-level protection, please see our <a href="network_recommendations.php">Network Recommendations</a> page.</p>
        </div>

        <div class="info-box">
            <h2>Layer 3: Mobile Privacy - iOS & Android</h2>
            <div class="recommendation-grid">
                <div>
                    <h3>Android</h3>
                    <p>The open nature of Android is both a strength and a weakness. For maximum privacy, consider:</p>
                    <ul>
                        <li><strong>Privacy-Focused ROMs:</strong> Installing an alternative OS like <strong>GrapheneOS</strong> or <strong>CalyxOS</strong> on a supported Google Pixel phone provides immense security and privacy benefits, removing Google's deep-level tracking.</li>
                        <li><strong>App Stores:</strong> Use alternative app stores like <strong>F-Droid</strong> for open-source software.</li>
                    </ul>
                </div>
                <div>
                    <h3>iOS</h3>
                    <p>While generally more private out-of-the-box than stock Android, it's still a closed ecosystem.</p>
                    <ul>
                        <li><strong>App Tracking Transparency:</strong> Always choose "Ask App Not to Track" when prompted.</li>
                        <li><strong>Default Browser:</strong> iOS allows you to change your default browser; use a privacy-focused one like Brave or Firefox.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-box">
            <h2>Layer 4: Your Behavior - The Human Element</h2>
            <p>The best tools can be undermined by behavior.</p>
            <ul>
                <li><strong>Compartmentalize:</strong> Use different browsers or browser profiles for different activities. For example, keep your work/school accounts in one browser, and do your general browsing in a separate, more private browser.</li>
                <li><strong>Beware of Extensions:</strong> Every browser extension you add can slightly change your browser's fingerprint. A browser with 50 extensions is more unique than one with 5. Stick to a few essential, trusted extensions.</li>
                <li><strong>Don't Try to Lie:</strong> As we saw, faking your User-Agent or OS often creates a contradictory and highly unique fingerprint. It's better to use the default settings of a privacy-focused browser and blend into their user base.</li>
            </ul>
        </div>

        <div class="info-box">
            <h2>Layer 5: Advanced Strategies & The Human Element</h2>
            
            <h3>The JavaScript "Nuclear Option"</h3>
            <p>The most aggressive client-side privacy technique is to disable JavaScript entirely. Many of the fingerprinting methods demonstrated on this site rely on JavaScript to run.</p>
            <ul>
                <li><strong class="good">The Pro:</strong> Disabling JavaScript completely stops almost all forms of <strong>active fingerprinting</strong>. The scripts simply cannot run.</li>
                <li><strong class="bad">The Con:</strong> The modern web is built on JavaScript. Disabling it will break most websites, making them unusable or severely limiting their functionality.</li>
                <li><strong class="okay">The Catch-22:</strong> The very act of having JavaScript disabled is itself a highly unique characteristic. While trackers can't get your canvas hash, they can instantly see that you are one of the very few users who has it turned off, which ironically becomes a powerful fingerprint.</li>
            </ul>
            
            <h3>A Better Approach: Selective Script Blocking</h3>
            <p>Instead of disabling all JavaScript, a more practical and effective strategy is to use a high-quality content blocker extension to block third-party scripts and trackers, while allowing the site's own essential scripts to run.</p>
            <ul>
                <li><strong>Recommended Tool:</strong> <strong>uBlock Origin</strong> is the gold standard for this. It's not just an "ad blocker"; it's a wide-spectrum content blocker that stops tracking scripts, fingerprinting scripts, and malware domains.</li>
                <li><strong>Why it Works:</strong> It blocks the connection to the tracking domains, so their scripts never even load on your browser. This prevents active fingerprinting without breaking the core functionality of the website you are trying to visit. This is a much better balance of privacy and usability.</li>
            </ul>
        </div>
    </div>
</body>
</html>
