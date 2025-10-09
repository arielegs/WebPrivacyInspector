# Web Privacy Inspector

The Web Privacy Inspector is a tool to help you understand what information your browser is revealing about you. It includes a series of tests to check for common privacy-related issues, as well as a set of guides to help you improve your online privacy.

## Requirements

The project is a PHP-based site and requires PHP to run. Recommended minimums:

* PHP 7.4 or newer (PHP 8.0+ recommended)
* (Optional) Composer if you want to manage PHP dependencies

Quick install notes:

* macOS (Homebrew): `brew install php`
* Ubuntu/Debian: `sudo apt update && sudo apt install php`

If you prefer not to install PHP system-wide, see the Docker example in "Running the project" to start the app in a container.

## Running the project

See the "Requirements" section above for the PHP requirement. To run the project locally using PHP's built-in web server, run the following command in your terminal from the project root:

```bash
php -S localhost:8000
```

You can then access the project in your browser at `http://localhost:8000`.

Alternatively you can run the project in a container (useful if you don't want to install PHP locally):

```bash
docker run --rm -v "$PWD":/var/www/html -p 8000:80 php:8.1-apache
```

## Features

The Web Privacy Inspector includes the following tests:

*   **Active Fingerprinting:** Checks for browser fingerprinting techniques that actively probe your browser for information.
*   **Behavioral Tracking:** Demonstrates how your behavior can be tracked across different websites.
*   **IP Tracking:** Shows what information can be gathered from your IP address.
*   **Passive Fingerprinting:** Checks for browser fingerprinting techniques that do not require active probing.
*   **VM Detection:** Attempts to detect if you are running in a virtual machine.
*   **WiFi Location Test:** Shows how your location can be determined from your WiFi network.

The project also includes the following guides:

*   **Browser Recommendations:** Recommends privacy-focused web browsers.
*   **Essential Security:** Provides essential security tips for protecting your online privacy.
*   **Network Recommendations:** Recommends privacy-focused network configurations.
*   **Privacy Recommendations:** Provides general privacy recommendations.
*   **Privacy Tricks:** Provides advanced privacy-enhancing tricks.
*   **System Recommendations:** Recommends privacy-focused operating systems and system configurations.