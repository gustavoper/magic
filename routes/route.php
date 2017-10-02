<?php

$router->map('GET', '/[a:name]', 'Controller@hello');
$router->map('GET', '/', 'Controller@hello');
$router->map('POST', '/', 'Controller@postTest');