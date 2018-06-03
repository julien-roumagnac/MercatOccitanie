<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['profil/view/(:num)']='profil/$1';
$route['offres/create']='offres/create';
$route['offres']='offres/index';
$route['default_controller'] = 'Accueil/connexion';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
