<?php

$_view['m_product_structure'] = select_m_product_structure(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['m_product_structure'],
        ),
    ),
));
