<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Core Security Essentials</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../includes/navbar.php'; render_navbar('guides/essential_security.php', true); ?>
    <div class="container">
        <h1>Core Security Essentials: The Most Important Habits</h1>
        <p>While this site covers many advanced tracking techniques, some of the biggest threats to your digital life are more direct: having your accounts stolen, your computer infected with malware, or being tricked into giving away your information. Mastering a few fundamental security habits provides the strongest defense against these common attacks.</p>

        <div class="recommendation-block">
            <h3>1. Use a Strong, Unique Password for Every Account (with a Password Manager)</h3>
            <p><strong>The Problem:</strong> Using simple or reused passwords is the #1 reason accounts get compromised. If a single website you use has a data breach, attackers will use that password to try to log into your email, banking, and social media accounts.</p>
            <p><strong>The Solution:</strong> A password manager is an application that generates, stores, and fills in long, random, unique passwords for every site you use. You only need to remember one master password to unlock the manager.</p>
            <ul>
                <li><strong>Why it's Essential:</strong> It makes it effortless to have a virtually un-guessable password for every single account, completely neutralizing the threat of password reuse.</li>
                <li><strong>Recommended Tool:</strong> <strong>Bitwarden</strong> is a free, open-source, and highly respected password manager. It syncs across all your devices (desktop and mobile) and can be self-hosted by advanced users for ultimate control.</li>
            </ul>
        </div>

        <div class="recommendation-block">
            <h3>2. Enable Two-Factor Authentication (2FA) Everywhere Possible</h3>
            <p><strong>The Problem:</strong> A stolen password is a single point of failure. If someone gets your password, they have full access to your account.</p>
            <p><strong>The Solution:</strong> 2FA adds a second step to logging in, proving it's really you. Even if an attacker steals your password, they cannot log in without access to your second factor.</p>
            <h4>Types of 2FA (from good to best):</h4>
            <ul>
                <li><strong>SMS (Text Message):</strong> A code is sent to your phone. (Good, but vulnerable to SIM-swapping attacks).</li>
                <li><strong>Authenticator App (TOTP):</strong> An app on your phone (like Authy, Google Authenticator, or Bitwarden's built-in authenticator) generates a constantly changing code. (Better, not vulnerable to SIM-swapping).</li>
                <li><strong>Hardware Security Key (FIDO2/WebAuthn):</strong> A physical USB or NFC device (like a YubiKey) that you tap to approve a login. (Best, provides the strongest protection against phishing and is nearly impossible to intercept).</li>
            </ul>
            <p>Enable 2FA on all critical accounts, especially email, financial services, and social media.</p>
        </div>

        <div class="recommendation-block">
            <h3>3. Keep Your Software and Devices Updated</h3>
            <p><strong>The Problem:</strong> Hackers and malware often exploit security holes (vulnerabilities) in outdated software—browsers, operating systems, and other applications.</p>
            <p><strong>The Solution:</strong> Install software updates as soon as they are available. These updates frequently contain critical patches that fix vulnerabilities before they can be widely abused.</p>
            <ul>
                <li><strong>Make it Easy:</strong> Enable automatic updates on your operating system (Windows, macOS), phone (iOS, Android), and browser.</li>
                <li><strong>Don't Ignore Updates:</strong> That "Update Available" notification is one of your most important security tools. Don't delay it.</li>
            </ul>
        </div>

        <div class="recommendation-block">
            <h3>4. Learn to Recognize Phishing Attacks</h3>
            <p><strong>The Problem:</strong> Phishing is when an attacker tries to trick you into giving them your password, financial information, or other sensitive data by pretending to be a legitimate company or person in an email, text, or direct message.</p>
            <p><strong>The Solution:</strong> Be skeptical of unsolicited communications. Look for these red flags:</p>
            <ul>
                <li><strong>A Sense of Urgency:</strong> "Your account will be suspended!" or "Suspicious activity detected!" are common tactics to make you act without thinking.</li>
                <li><strong>Generic Greetings:</strong> "Dear Customer" instead of your actual name.</li>
                <li><strong>Mismatched Links:</strong> Hover your mouse over a link before clicking. Does the URL that pops up look suspicious or different from the legitimate website's URL?</li>
                <li><strong>Spelling and Grammar Mistakes:</strong> Professional companies usually have high standards for their communications.</li>
                <li><strong>Unusual Sender Address:</strong> Check the sender's email address. It might be a close imitation of a real one (e.g., `support@microsft.com`).</li>
            </ul>
            <p><strong>The Golden Rule:</strong> If you receive a suspicious email from a service, do not click any links in it. Instead, open your browser and manually type in the website's address to log in and check for any real notifications.</p>
        </div>

    </div>
</body>
</html>
