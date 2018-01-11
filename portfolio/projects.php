<?php

//appel des données projets
require_once __DIR__.'/models/works.php';

//appel des données réseaux sociaux
require_once __DIR__.'/models/socials.php';

//appel des données commentaires
require_once __DIR__.'/models/comments.php';


$template = 'projects';
include 'layout.phtml';
