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
		'single' => 'CodeIgniter\Validation\Views\single'
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
			]
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.'
			]
		],
		'passconfirm' => [
			'label' => 'passconfirm',
			'rules' => 'required|matches[password]',
			'errors' => [
				'required' => 'Salasana pitää syöttää uudestaan.',
				'matches' => 'Salasanojen pitää vastata toisiaan.'
			]
		]
	];
	

	
	public $adminloginvalidate = [
		'username' => [
			'label' => 'Username',
			'rules' => 'required|min_length[3]|max_length[30]',
			'errors' => [
				'required' => 'Käyttäjänimi on pakollinen.',
				'min_length' => 'Käyttäjänimi on liian lyhyt.'
			]
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.'
			]
		],
	];

	public $customerValidate = [
		'firstname' => 	[
			'label' => 'firstname',
			'rules' => 'required|min_length[2]|max_length[50]',
			'errors' => [
				'required' => 'Etunimi on pakollinen.',
				'min_length' => 'Etunimi on liian lyhyt.',
				'max_length' => 'Etunimi on liian pitkä.',
			]
		],
		'lastname' => 	[
			'label' => 'lastname',
			'rules' => 'required|min_length[2]|max_length[100]',
			'errors' => [
				'required' => 'Sukunimi on pakollinen.',
				'min_length' => 'Sukunimi on liian lyhyt.',
				'max_length' => 'Sukunimi on liian pitkä.',
			]
		],
		'address' => 	[
			'label' => 'address',
			'rules' => 'required|min_length[2]|max_length[100]',
			'errors' => [
				'required' => 'Osoite on pakollinen.',
				'min_length' => 'Osoite on liian lyhyt.',
				'max_length' => 'Osoite on liian pitkä.',
			]
		],
		'postcode' =>  [
			'label' => 'postcode',
			'rules' => 'required|min_length[5]|max_length[5]',
			'errors' => [
				'required' => 'Postinumero on pakollinen.',
				'min_length' => 'Postinumero on liian lyhyt.',
				'max_length' => 'Postinumero on liian pitkä.',
			]
		],
		'town' =>  [
			'label' => 'town',
			'rules' => 'required|min_length[2]|max_length[100]',
			'errors' => [
				'required' => 'Postitoimipaikka on pakollinen.',
				'min_length' => 'Postitoimipaikka on liian lyhyt.',
				'max_length' => 'Postitoimipaikka on liian pitkä.',
			]
		],
		'email' =>  [
			'label' => 'email',
			'rules' => 'required|min_length[2]|max_length[100]|valid_email',
			'errors' => [
				'required' => 'Sähköpostiosoite on pakollinen.',
				'min_length' => 'Sähköpostiosoite on liian lyhyt.',
				'max_length' => 'Sähköpostiosoite on liian pitkä.',
				'valid_email' => 'Syötä sähköposti oikeassa muodossa.'
			]
		]
	];

	public $customerRegisterValidate = [
		'email' =>  [
			'label' => 'email',
			'rules' => 'required|min_length[2]|max_length[100]|valid_email',
			'errors' => [
				'required' => 'Sähköpostiosoite on pakollinen.',
				'min_length' => 'Sähköpostiosoite on liian lyhyt.',
				'max_length' => 'Sähköpostiosoite on liian pitkä.',
				'valid_email' => 'Syötä sähköposti oikeassa muodossa.'
			]
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.'
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
		'firstname' => 	[
			'label' => 'firstname',
			'rules' => 'required|min_length[2]|max_length[50]',
			'errors' => [
				'required' => 'Etunimi on pakollinen.',
				'min_length' => 'Etunimi on liian lyhyt.',
				'max_length' => 'Etunimi on liian pitkä.',
			]
		],
		'lastname' => 	[
			'label' => 'lastname',
			'rules' => 'required|min_length[2]|max_length[100]',
			'errors' => [
				'required' => 'Sukunimi on pakollinen.',
				'min_length' => 'Sukunimi on liian lyhyt.',
				'max_length' => 'Sukunimi on liian pitkä.',
			]
		],
		'address' => 	[
			'label' => 'address',
			'rules' => 'required|min_length[2]|max_length[100]',
			'errors' => [
				'required' => 'Osoite on pakollinen.',
				'min_length' => 'Osoite on liian lyhyt.',
				'max_length' => 'Osoite on liian pitkä.',
			]
		],
		'postcode' =>  [
			'label' => 'postcode',
			'rules' => 'required|min_length[5]|max_length[5]',
			'errors' => [
				'required' => 'Postinumero on pakollinen.',
				'min_length' => 'Postinumero on liian lyhyt.',
				'max_length' => 'Postinumero on liian pitkä.',
			]
		],
		'town' =>  [
			'label' => 'town',
			'rules' => 'required|min_length[2]|max_length[100]',
			'errors' => [
				'required' => 'Postitoimipaikka on pakollinen.',
				'min_length' => 'Postitoimipaikka on liian lyhyt.',
				'max_length' => 'Postitoimipaikka on liian pitkä.',
			]
		]
	];

	public $customerLoginValidate = [
		'email' =>  [
			'label' => 'email',
			'rules' => 'required|min_length[2]|max_length[100]|valid_email',
			'errors' => [
				'required' => 'Sähköpostiosoite on pakollinen.',
				'min_length' => 'Sähköpostiosoite on liian lyhyt.',
				'max_length' => 'Sähköpostiosoite on liian pitkä.',
				'valid_email' => 'Syötä sähköposti oikeassa muodossa.'
			]
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.'
			]
		]
	];

	

	//--------------------------------------------------------------------//
}
