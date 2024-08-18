<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// application/config/routes.php

$route['default_controller'] = 'proyek'; // Jika Anda ingin controller default adalah Proyek
$route['proyek'] = 'proyek/index';
$route['proyek/create'] = 'proyek/create';
$route['lokasi'] = 'lokasi/index';
$route['lokasi/create'] = 'lokasi/create';


