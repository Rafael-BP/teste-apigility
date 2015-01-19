<?php
return array(
    'db' => array(
        'adapters' => array(
            'DB\\Cliente' => array(),
        ),
    ),
    'zf-mvc-auth' => array(
        'authentication' => array(
            'http' => array(
                'accept_schemes' => array(
                    0 => 'basic',
                ),
                'realm' => 'Auth API LOja',
            ),
        ),
    ),
);
