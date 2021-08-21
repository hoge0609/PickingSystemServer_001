<?php

$_view['m_device'] = select_m_device(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['m_device'],
        ),
    ),
));
