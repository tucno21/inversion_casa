<?php
require_once dirname(__DIR__) . '/System/Autoload.php';

use App\System\Router;
use App\Controller\Dashboard;
use App\Controller\LoginController;

$routes = new Router();

//crear rutas get y post
$routes->get('/', [LoginController::class, 'index']);
$routes->post('/login', [LoginController::class, 'login']);
$routes->get('/login', [LoginController::class, 'login']);

$routes->get('/dashboard', [Dashboard::class, 'index']);



//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
