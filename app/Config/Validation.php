<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
		
	];

	//--------------------------------------------------------------------
	public $adminregistervalidate = [
		'username' => [
			'label' => 'Username',
			'rules' => 'required|min_length[3]|max_length[30]',
			'errors' => [
				'required' => 'Käyttäjänimi on pakollinen.',
				'min_length' => ' Käyttäjänimi on liian lyhyt.'
			],
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => ' Salasana on liian lyhyt.'
			]
		 
		],
		'passconfirm' => [
			'label' => 'passconfirm',
			'rules' => 'required|matches[password]',
			'errors' => [
				'required' => 'Salasana pitää syöttää uudestaan.',
				'matches' => 'Salasanojen pitää vastata toisiaan.'
			]
		],
	];
	

	
	public $adminloginvalidate = [
		'username' => [
			'label' => 'Username',
			'rules' => 'required|min_length[3]|max_length[30]',
			'errors' => [
				'required' => 'Käyttäjänimi on pakollinen.',
				'min_length' => ' Käyttäjänimi on liian lyhyt.'
			],
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => ' Salasana on liian lyhyt.'
			]
		 
		],
	];

	/*
	public $admin = [
		'username' => 'required|min_length[8]|max_length[30]',
		'password' => 'required|min_length[8]|max_length[30]',
	];


	// public $adminvalidate_errors = [
    //     'username' => [
    //         'required'    => 'You must choose a username.',
    //     ],
    //     'password'    => [
    //         'min_length[8]' => 'Salasanassa pitää olla vähintään 8 merkkiä',
	// 	],
	// 	'password'    => [
    //         'max_length[30]' => 'Salasanassa ei voi olla yli 30 merkkiä',
	// 	],
	// 	'password'    => [
    //         'matches[password]' => 'Salasanat eivät ole samat'
	// 	]
		
	// ];
	*/
	// public $adminvalidate = [
    //     'username'     => 'required|is_unique[adminuser.username]',
    //     'password'     => 'required|min_length[8]|max_length[30]',
    //     'pass_confirm' => 'required|matches[password]'
        
	// ];

	//--------------------------------------------------------------------
}
