<?php

$_view['m_parts'] = select_m_parts(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['m_parts'],
        ),
    ),
));
