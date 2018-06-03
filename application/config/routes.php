<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route=['profil/(:any)']='profil/view/$1'
$route['offres/create']='offres/create';
$route['offres']='offres/index';
$route['default_controller'] = 'Accueil/connexion';
$route['home']='pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
