<?php
require_once __DIR__ . '/SMap.php';
require_once $argv[1];

SMap::toTsv();
