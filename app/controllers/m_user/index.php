<?php

$_view['m_user'] = select_m_user(array(
    'limit' => array(
        ':limit',
        array(
            'limit' => $GLOBALS['config']['limits']['m_user'],
        ),
    ),
));
