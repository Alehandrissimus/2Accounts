<?php
$methods = [
    'create' => [
        'params' => [
            [
                'name' => 'type',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
            [
                'name' => 'firstName',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            [
                'name' => 'middleName',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            [
                'name' => 'lastName',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            [
                'name' => 'group',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            [
                'name' => 'department',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            [
                'name' => 'guid',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            
        ]
    ],
    'list' => [
        'params' => [
            [
                'name' => 'user',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
            [
                'name' => 'type',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
            [
                'name' => 'filter',
				'source' => 'p',
                'required' => false,
                'default' => ''
            ],
        ]
    ],
    'edit' => [
        'params' => [
            [
                'name' => 'type',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
            [
                'name' => 'owner',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
            [
                'name' => 'data',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
        
        ]
    ],
    'link' => [
        'params' => [
            [
                'name' => 'person',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
            [
                'name' => 'guid',
				'source' => 'p',
                'required' => true,
                'default' => ''
            ],
        ]
    ],
    'groups' => [
        'params' => [
            
        ]
    ],
    'refresh' => [
        'params' => [
            
        ]
    ],
];