<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'IMEDCHI',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Sistema</b>IMEDCHI',

    'logo_mini' => '<b>SIS</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'green',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '/',

    'logout_url' => 'admin/login',

    'logout_method' => null,

    'login_url' => 'login',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */
    'menuAdmin' => [
        'Administrador',
        [
            'text' => '',
            'url'  => '',
            'can'  => '',
        ],
        [
            'text'    => 'Dashboard',
            'icon'    => 'tachometer',
            'url'  => '#',
        ],        
        [
            'text'    => 'Mantenimiento',
            'icon'    => 'wrench',
            'submenu' => [
                [
                'text' => 'Profesion',
                'url'  => '/mantenimiento/profesion',
                'icon_color' => 'red',
                ],
                [
                'text' => 'Tipo Persona',
                'url'  => '/mantenimiento/tipopersona',
                'icon_color' => 'red',
                ], 
                [
                'text' => 'Genero',
                'url'  => '/mantenimiento/genero',
                'icon_color' => 'red',
                ],   
                [
                'text' => 'Tipo Email',
                'url'  => '/mantenimiento/tipoemail',
                'icon_color' => 'red',
                ],   
                [
                'text' => 'Compania',
                'url'  => '/mantenimiento/compania',
                'icon_color' => 'red',
                ],  
                [
                'text' => 'Persona',
                'url'  => '/sistema/imedchi/persona',
                'icon_color' => 'red',
                ],  
                [
                'text' => 'Usuario',
                'url'  => '/sistema/imedchi/usuario',
                'icon_color' => 'red',
                ],                                                                                                
            ],
        ],
    ],
    'menuBlackboard' => [
        'Blckboard',
        [
            'text' => '',
            'url'  => '',
            'can'  => '',
        ],
        [
            'text'    => 'Dashboard',
            'icon'    => 'tachometer',
            'url'  => '#',
        ],        
        [
            'text'    => 'Administración',
            'icon'    => 'folder',
            'submenu' => [
                [
                'text'    => 'Admin2',
                'url'     => '#',
                'icon_color' => 'yellow',
                'submenu' => [
                    [
                        'text' => 'Admin2.1',
                        'url'  => '#',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text'    => 'Admin2.1',
                        'url'     => '#',
                        'icon_color' => 'yellow',
                    ],
                ],
                ],
            ],
        ],
        [
            'text'    => 'Gestión',
            'icon'    => 'graduation-cap',
            'submenu' => [
                [
                'text' => 'Gestión1',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Gestión2',
                'url'     => '#',
                'icon_color' => 'yellow',
                'submenu' => [
                    [
                        'text' => 'Gestión2.1',
                        'url'  => '#',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text'    => 'Gestión2.1',
                        'url'     => '#',
                        'icon_color' => 'yellow',
                    ],
                ],
                ],
            ],
        ],  
        [
            'text'    => 'Evaluación',
            'icon'    => 'file',
            'submenu' => [
                [
                'text' => 'Evaluación1',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Evaluación2',
                'url'     => '#',
                'icon_color' => 'yellow',
                'submenu' => [
                    [
                        'text' => 'Evaluación2.1',
                        'url'  => '#',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text'    => 'Evaluación2.1',
                        'url'     => '#',
                        'icon_color' => 'yellow',
                    ],
                ],
                ],
                [
                'text' => 'Evaluación3',
                'url'  => '#',
                'icon_color' => 'aqua',
                ],
            ],                       
        ],
    ],

    'menuGestionAcademica' => [
        'Gestion Académica',
        [
            'text' => '',
            'url'  => '',
            'can'  => '',
        ],
        [
            'text'    => 'Dashboard',
            'icon'    => 'tachometer',
            'url'  => '#',
        ],        
        [
            'text'    => 'Administración de Alumnos',
            'icon'    => 'archive',
            'submenu' => [
                [
                'text' => 'Ingreso de Alumnos',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Encargados',
                'url'     => '#',
                'icon_color' => 'yellow',
                ],
            ],
        ],
        [
            'text'    => 'Administración Académica',
            'icon'    => 'suitcase',
            'submenu' => [
                [
                'text' => 'Inscripción de Alumnos',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text' => 'Planificación de Actividades',
                'url'  => '#',
                'icon_color' => 'yellow',
                ],      
                [
                'text' => 'Administración de Notas',
                'url'  => '#',
                'icon_color' => 'aqua',
                'submenu' => [
                    [
                        'text' => 'Control de Notas',
                        'url'  => '#',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text' => 'Grado',
                        'url'  => '/mantenimiento/grado',
                        'icon_color' => 'aqua',
                    ],
                     [
                        'text'    => 'Carreras',
                        'url'     => 'mantenimiento/carrera',
                        'icon_color' => 'aqua',
                    ],
                    [
                    'text' => 'Materias',
                    'url'  => '/mantenimiento/curso',
                    'icon_color' => 'aqua',
                    ],                     
                ],                
                ],                           
            ],
        ],
        [  
            'text'    => 'Rendimiento Académico',
            'icon'    => 'line-chart',
            'submenu' => [
                [
                'text' => 'Desempeño de Docente',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Rendimiento Académico',
                'url'     => '#',
                'icon_color' => 'yellow',
                ],
            ],                      
        ],        
    ],    

    'menuSistemaAdministrativo' => [
        'Administrativo',
        [
            'text' => '',
            'url'  => '',
            'can'  => '',
        ], 
        [
            'text'    => 'Dashboard',
            'icon'    => 'tachometer',
            'url'  => '#',
        ],                 
        [
            'text'    => 'Solvencia Alumno',
            'icon'    => 'book',
            'submenu' => [
                [
                'text' => 'Consulta de Estado',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Generar Solvencia',
                'url'     => '#',
                'icon_color' => 'yellow',
                ],
            ],  
        ],        
        [             
            'text'    => 'Pagos',
            'icon'    => 'cc',
            'submenu' => [
            [    
                'text' => 'Planilla',
                'url'  => '#',
                'icon_color' => 'red',
                'submenu' => [
                    [
                        'text' => 'Salario',
                        'url'  => '#',
                        'icon_color' => 'red',
                    ],
                    [
                        'text'    => 'Descuento',
                        'url'     => '#',
                        'icon_color' => 'red',
                    ],                                     
                ],
            ],
            [
                'text'    => 'Académico',
                'url'     => '#',
                'icon_color' => 'yellow',
                'submenu' => [
                    [
                        'text' => 'Mensualidad',
                        'url'  => '#',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'text'    => 'Descuento',
                        'url'     => '#',
                        'icon_color' => 'yellow',
                    ],                    
                ],                 
            ],
            ], 
        ],        
        [              
            'text'    => 'Caja Chica',
            'icon'    => 'fax',
            'submenu' => [
                [
                'text' => 'Saldo',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Movimiento',
                'url'     => '#',
                'icon_color' => 'yellow',
                ],
                [
                'text'    => 'Ajuste',
                'url'     => '#',
                'icon_color' => 'aqua',
                ],                
            ], 
        ],
        [
            'text'    => 'Reportería',
            'icon'    => 'folder-open',
            'submenu' => [
                [
                'text' => 'Ver Stock',
                'url'  => '#',
                'icon_color' => 'red',
                ],
                [
                'text'    => 'Solvencias',
                'url'     => '#',
                'icon_color' => 'yellow',
                ],
                [
                'text'    => 'Pagos',
                'url'     => '#',
                'icon_color' => 'aqua',
                ],                
            ],                                                       
        ], 
    ],    

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
