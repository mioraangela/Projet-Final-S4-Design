<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'ClientController::login');
$routes->post('/login', 'ClientController::login');
$routes->get('/accueil', 'ClientController::accueil');
$routes->get('/solde', 'ClientController::solde');

$routes->get('/depot', 'OperationController::depot');
$routes->post('/depot', 'OperationController::depot');
$routes->get('/retrait', 'OperationController::retrait');
$routes->post('/retrait', 'OperationController::retrait');
$routes->get('/transfert', 'OperationController::transfert');
$routes->post('/transfert', 'OperationController::transfert');
$routes->get('/historique', 'OperationController::historique');
$routes->get('/gains', 'OperationController::gains');

$routes->get('/prefixes', 'PrefixeController::index');
$routes->post('/prefixes/ajouter', 'PrefixeController::ajouter');
$routes->post('/prefixes/modifier/(:num)', 'PrefixeController::modifier/$1');
$routes->get('/prefixes/supprimer/(:num)', 'PrefixeController::supprimer/$1');

$routes->get('/types-operations', 'TypeOperationController::index');
$routes->post('/types-operations/ajouter', 'TypeOperationController::ajouter');
$routes->post('/types-operations/modifier/(:num)', 'TypeOperationController::modifier/$1');
$routes->get('/types-operations/supprimer/(:num)', 'TypeOperationController::supprimer/$1');

$routes->get('/baremes-frais', 'BaremeFraisController::index');
$routes->post('/baremes-frais/ajouter', 'BaremeFraisController::ajouter');
$routes->post('/baremes-frais/modifier/(:num)', 'BaremeFraisController::modifier/$1');
$routes->get('/baremes-frais/supprimer/(:num)', 'BaremeFraisController::supprimer/$1');

$routes->get('/operator/login', 'OperatorController::login');
$routes->post('/operator/login', 'OperatorController::login');
$routes->get('/operator/dashboard', 'OperatorController::dashboard');
$routes->get('/operator/gains', 'OperatorController::gains');
$routes->get('/operator/comptes', 'OperatorController::comptes');
$routes->get('/operator/logout', 'OperatorController::logout');
