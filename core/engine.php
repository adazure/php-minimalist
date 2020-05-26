<?php
$loader = new Twig_Loader_Filesystem('views');
$this->twig = new Twig_Environment($loader);
