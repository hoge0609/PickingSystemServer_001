<?php

$_view['t_parts_inventory'] = select_t_parts_inventory(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['t_parts_inventory'],
        ),
    ),
));
