<?php
if (!function_exists('render_navbar')) {
    function render_navbar($active_page, $is_in_subdirectory = false) {
        $prefix = $is_in_subdirectory ? '../' : '';

        $pages = [
            // Test Pages
            'tests/ip_tracker.php' => 'IP',
            'tests/passive_fingerprint.php' => 'Passive',
            'tests/active_fingerprint.php' => 'Active',
            'tests/behavioral_tracker.php' => 'Behavior',
            'tests/vm_detector.php' => 'VM',
            'tests/wifi_location_test.php' => 'Location',

            // Guide Pages
            'guides/privacy_recommendations.php' => 'Guide',
            'guides/browser_recommendations.php' => 'Browsers',
            'guides/network_recommendations.php' => 'Network',
            'guides/system_recommendations.php' => 'System',
            'guides/essential_security.php' => 'Essentials',
            'guides/privacy_tricks.php' => 'Tricks',
        ];

        echo '<nav class="navbar"><ul>';
        foreach ($pages as $url => $title) {
            // Adjust the active page check for subdirectories
            $current_page_path = $is_in_subdirectory ? substr($active_page, 3) : $active_page;
            $class = ($url === $current_page_path) ? 'active' : '';

            // Add a separator between tests and guides
            if ($url === 'guides/privacy_recommendations.php') {
                echo '<li class="separator">|</li>';
            }

            echo '<li><a href="' . $prefix . $url . '" class="' . $class . '">' . $title . '</a></li>';
        }
        echo '</ul></nav>';
    }
}
?>
