<?
session_start();


error_reporting(-1);

require_once "../vendor/autoload.php";


$path = $_SERVER["QUERY_STRING"];
ini_set('display_errors', '1');


require_once CORE."/libs/functions.php"; 


$router = new vendor\core\Router();

$router->add("/^$/", ['controller' => "Main", "action" => 'index']);
$router->add("/(?P<controller>[a-zA-Z?\-|\_]+)?\/(?P<action>[a-zA-Z?\-|\_]+)/");

$router->dispath($path);
