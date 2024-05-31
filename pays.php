 <?php /**
 * Package Pays
 * Version 1.0.0
 */
/*
Plugin name: Mika-api-rest
Plugin uri: https://github.com/Mikaiwnl/API-REST
Version: 1.0.0
Description: Permet d'afficher les destinations qui répondent à certains critères
*/
function mika_pays_enqueue()
{
// filemtime // retourne en milliseconde le temps de la dernière modification
// plugin_dir_path // retourne le chemin du répertoire du plugin
// __FILE__ // le fichier en train de s'exécuter
// wp_enqueue_style() // Intègre le link:css dans la page
// wp_enqueue_script() // intègre le script dans la page
// wp_enqueue_scripts // le hook

$version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
$version_js = filemtime(plugin_dir_path(__FILE__) . "js/pays.js");
wp_enqueue_style(   'em_plugin_pays_css',

                     plugin_dir_url(__FILE__) . "style.css",
                     array(),
                     $version_css);

wp_enqueue_script(  'em_plugin_pays_js',
                    plugin_dir_url(__FILE__) ."js/pays.js",
                    array(),
                    $version_js,
                    true);
}
add_action('wp_enqueue_scripts', 'mika_pays_enqueue');
/* Création de la liste des destinations en HTML */
function creation_destinations(){
    $contenu = 
    '<div class="country-buttons">
    <button class="country-button" data-country="France">France</button>
    <button class="country-button" data-country="États-Unis">États-Unis</button>
    <button class="country-button" data-country="Canada">Canada</button>
    <button class="country-button" data-country="Argentine">Argentine</button>
    <button class="country-button" data-country="Chili">Chili</button>
    <button class="country-button" data-country="Belgique">Belgique</button>
    <button class="country-button" data-country="Maroc">Maroc</button>
    <button class="country-button" data-country="Mexique">Mexique</button>
    <button class="country-button" data-country="Japon">Japon</button>
    <button class="country-button" data-country="Italie">Italie</button>
    <button class="country-button" data-country="Islande">Islande</button>
    <button class="country-button" data-country="Chine">Chine</button>
    <button class="country-button" data-country="Grèce">Grèce</button>
    <button class="country-button" data-country="Suisse">Suisse</button>
</div><div class="contenu__restapi"></div>';

    return $contenu;
}

add_shortcode('mikaiwnl_destination', 'creation_destinations');  ?>