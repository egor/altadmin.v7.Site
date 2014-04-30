<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array('components' => array(
                'db' => array(
                    'connectionString' => 'mysql:host=localhost;dbname=alt_new',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => '',
                    'charset' => 'utf8',
                ),
            ),
            'params' => array(
            ),
                )
);