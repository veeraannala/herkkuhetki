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
			'rules' => 'required|min_length[3]|max_length[30]|is_unique[adminuser.username]',
			'errors' => [
				'required' => 'Käyttäjänimi on pakollinen.',
				'min_length' => 'Käyttäjänimi on liian lyhyt.',
				'is_unique' => 'Käyttäjä on jo olemassa.'
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

	public $customerValidate = [
		'firstname' => 'required|min_length[2]|max_length[50]',
		'lastname' =>  'required|min_length[2]|max_length[100]',
		'address' =>  'required|min_length[2]|max_length[100]',
		'postcode' =>  'required|min_length[5]',
		'town' =>  'required|min_length[2]|max_length[100]',
		'email' =>  'required|min_length[2]|max_length[255]|valid_email|is_unique[customer.email]'

	];

	public $customerRegisterValidate = [
		'username' => 'required|min_length[3]|max_length[30]|is_unique[registeredcustomer.username]',
		'password' => 'required|min_length[8]|max_length[30]',
		'passconfirm' => 'required|min_length[8]|max_length[30]|required|matches[password]'
	];

	

	//--------------------------------------------------------------------
}
