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
$routes->get('/logout', [LoginController::class, 'logout']);

$routes->get('/dashboard', [Dashboard::class, 'index']);

$routes->get('/dashboard/create', [Dashboard::class, 'create']);
$routes->post('/dashboard/store', [Dashboard::class, 'store']);

$routes->get('/dashboard/edit', [Dashboard::class, 'edit']);
$routes->post('/dashboard/update', [Dashboard::class, 'update']);

$routes->get('/dashboard/delete', [Dashboard::class, 'destroy']);
$routes->get('/dashboard/eliminados', [Dashboard::class, 'eliminados']);

$routes->get('/dashboard/ver', [Dashboard::class, 'ver']);



//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
