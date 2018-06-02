<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['offres/create']='offres/create';
$route['offres']='offres/index';
$route['default_controller'] = 'Accueil/connexion';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
