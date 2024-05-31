<?php
// Register REST API route
add_action('rest_api_init', function () {
    register_rest_route('myplugin/v1', '/countries', array(
        'methods' => 'GET',
        'callback' => 'myplugin_get_countries',
    ));
});

function myplugin_get_countries() {
    return array(
        "France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"
    );
}

// Create shortcode
function myplugin_countries_shortcode() {
    ob_start();
    ?>
    <select id="country-select">
        <!-- Options will be populated with JavaScript -->
    </select>
    <script>
    jQuery(document).ready(function ($) {
        // Fetch countries from REST API
        $.get('/wp-json/myplugin/v1/countries', function (countries) {
            var select = $('#country-select');
            $.each(countries, function (i, country) {
                select.append($('<option>').text(country));
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('myplugin_countries', 'myplugin_countries_shortcode');
?>