<?php

require_once 'generateSQL.php';

$generateSQL = new generateSQL('logfiles/test.log');
$generateSQL->execute();