<?php

$_view['m_inventory_regist_type'] = select_m_inventory_regist_type(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['m_inventory_regist_type'],
        ),
    ),
));
