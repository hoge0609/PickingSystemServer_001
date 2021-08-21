<?php

$_view['t_parts_inventory_history'] = select_t_parts_inventory_history(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['t_parts_inventory_history'],
        ),
    ),
));
