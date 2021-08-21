<?php

$_view['m_product'] = select_m_product(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['m_product'],
        ),
    ),
));
