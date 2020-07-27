<?php
return[
    '' => [
        'controller' => 'main',
        'action' => 'index',
        'title' => 'HOME',
        'message'=> 'Check out this Meet-up with SoCal AngularJS!',
        'link' => ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . "allmembers/show",
    ],

    'allmembers/show' => [
        'controller' => 'allmembers',
        'action' => 'show',
        'title' => 'All members',
    ],

    'main/register' =>[
        'controller' => 'main',
        'action' => 'register',
        'title' => 'Add members',
    ],

    'main/register_next' =>[
        'controller' => 'main',
        'action' => 'register_next',
        'title' => 'Add members',
    ],

    'main/register_img' =>[
        'controller' => 'main',
        'action' => 'register_next',
        'title' => 'Add members',
    ],

];