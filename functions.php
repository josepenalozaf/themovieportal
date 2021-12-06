<?php
// Environment variables
require_once get_template_directory() . '/env.php';

// Core functions
require_once get_template_directory() . '/core/actions.php';
require_once get_template_directory() . '/core/templates.php';

// Models
require_once get_template_directory() . '/models/Actor.php';
require_once get_template_directory() . '/models/Genre.php';
require_once get_template_directory() . '/models/Movie.php';

// Controllers
require_once get_template_directory() . '/controllers/actors.php';
require_once get_template_directory() . '/controllers/genres.php';
require_once get_template_directory() . '/controllers/movies.php';
