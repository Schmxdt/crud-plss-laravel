<?php

return [

    'title' => 'Sistema de Chamados',
    'title_prefix' => '',
    'title_postfix' => '',

    'use_ico_only' => false,
    'use_full_favicon' => false,

    'google_fonts' => [
        'allowed' => true,
    ],

    // Removendo o logo da barra de navegação
    'logo' => '<b>Sistema</b> Chamados',

    // Configuração de Login e Registro
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xl img-circle elevation-3',
    'logo_img_class' => 'brand-image img-circle elevation-3',

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => false,

    'classes_auth_card' => 'card-outline card-primary',
    'classes_sidebar' => 'sidebar-dark-primary',

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => true,
    'sidebar_img' => false, // Remover a imagem do sidebar

    'right_sidebar' => false,

    'use_route_url' => false,
    'dashboard_url' => 'admin/chamados',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'profile_url' => false,

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    'menu' => [
        [
            'text' => 'Dashboard',
            'url'  => 'admin/dashboard',
            'icon' => 'fas fa-home',
        ],
        [
            'text' => 'Chamados',
            'url'  => 'admin/chamados',
            'icon' => 'fas fa-ticket-alt',
        ],
        [
            'text' => 'Categorias',
            'url'  => 'admin/categorias',
            'icon' => 'fas fa-list',
        ],
        [
            'text' => 'Situações',
            'url'  => 'admin/situacoes',
            'icon' => 'fas fa-ticket-alt',
        ]
    ],

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
    ],

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
    ],

    'livewire' => false,
];
