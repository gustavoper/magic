<?php

// liga os logs de erros do pacote Whoops!
$whoops = new Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();