<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array('components' => array(
                'db' => array(
                    'connectionString' => 'mysql:host=localhost;dbname=myName',
                    'emulatePrepare' => true,
                    'username' => 'myUserName',
                    'password' => 'myPassword',
                    'charset' => 'utf8',
                ),
            ),
            'params' => array(
                
            ),
                )
);