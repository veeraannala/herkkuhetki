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
			'rules' => 'required|min_length[3]|max_length[30]|is_unique[adminuser.username]|alpha_space',
			'errors' => [
				'required' => 'Käyttäjänimi on pakollinen.',
				'min_length' => 'Käyttäjänimi on liian lyhyt.',
				'is_unique' => 'Käyttäjä on jo olemassa.',
				'alpha_space' => 'Käyttäjänimi ei voi sisältää erikoismerkkejä'
			]
		],
		'password' => [
			'label' => 'password',
			'rules' => 'required|min_length[8]|max_length[30]|alpha_numeric_punct',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.',
				'alpha_numeric_punct' => 'Salasana voi sisältää vain tiettyjä erikoismerkkejä'
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
			'rules' => 'required|min_length[2]|max_length[50]|alpha_dash',
			'errors' => [
				'required' => 'Etunimi on pakollinen.',
				'min_length' => 'Etunimi on liian lyhyt.',
				'max_length' => 'Etunimi on liian pitkä.',
				'alpha_dash' => 'Etunimi ei voi sisältää erikoismerkkejä',
			]
		],
		'lastname' => 	[
			'label' => 'lastname',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_dash',
			'errors' => [
				'required' => 'Sukunimi on pakollinen.',
				'min_length' => 'Sukunimi on liian lyhyt.',
				'max_length' => 'Sukunimi on liian pitkä.',
				'alpha_dash' => 'Sukunimi ei voi sisältää erikoismerkkejä',
			]
		],
		'address' => 	[
			'label' => 'address',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_numeric_space',
			'errors' => [
				'required' => 'Osoite on pakollinen.',
				'min_length' => 'Osoite on liian lyhyt.',
				'max_length' => 'Osoite on liian pitkä.',
				'alpha_numeric_space' => 'Osoite ei voi sisältää erikoismerkkejä',
			]
		],
		'postcode' =>  [
			'label' => 'postcode',
			'rules' => 'required|min_length[5]|max_length[5]|is_natural',
			'errors' => [
				'required' => 'Postinumero on pakollinen.',
				'min_length' => 'Postinumero on liian lyhyt.',
				'max_length' => 'Postinumero on liian pitkä.',
				'is_natural' => 'Postinumero voi sisältää vain numeroita'
			]
		],
		'town' =>  [
			'label' => 'town',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_dash',
			'errors' => [
				'required' => 'Postitoimipaikka on pakollinen.',
				'min_length' => 'Postitoimipaikka on liian lyhyt.',
				'max_length' => 'Postitoimipaikka on liian pitkä.',
				'alpha_dash' => 'Postitoimipaikka ei voi sisältää erikoismerkkejä',
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
		],
		'phone' =>  [
			'label' => 'phone',
			'rules' => 'numeric|min_length[2]|max_length[30]',
			'errors' => [
				'numeric' => 'Syötä puhelinnumero numeromuodossa.',
				'min_length' => 'Puhelinnumero on liian lyhyt.',
				'max_length' => 'Puhelinnumero on liian pitkä.',
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
			'rules' => 'required|min_length[8]|max_length[30]|alpha_numeric_punct',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.',
				'alpha_numeric_punct' => 'Salasana voi sisältää vain tiettyjä erikoismerkkejä'
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
			'rules' => 'required|min_length[2]|max_length[50]|alpha_dash',
			'errors' => [
				'required' => 'Etunimi on pakollinen.',
				'min_length' => 'Etunimi on liian lyhyt.',
				'max_length' => 'Etunimi on liian pitkä.',
				'alpha_dash' => 'Etunimi ei voi sisältää erikoismerkkejä',
			]
		],
		'lastname' => 	[
			'label' => 'lastname',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_dash',
			'errors' => [
				'required' => 'Sukunimi on pakollinen.',
				'min_length' => 'Sukunimi on liian lyhyt.',
				'max_length' => 'Sukunimi on liian pitkä.',
				'alpha_dash' => 'Sukunimi ei voi sisältää erikoismerkkejä',
			]
		],
		'address' => 	[
			'label' => 'address',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_numeric_space',
			'errors' => [
				'required' => 'Osoite on pakollinen.',
				'min_length' => 'Osoite on liian lyhyt.',
				'max_length' => 'Osoite on liian pitkä.',
				'alpha_numeric_space' => 'Osoite ei voi sisältää erikoismerkkejä'
			]
		],
		'postcode' =>  [
			'label' => 'postcode',
			'rules' => 'required|min_length[5]|max_length[5]|is_natural',
			'errors' => [
				'required' => 'Postinumero on pakollinen.',
				'min_length' => 'Postinumero on liian lyhyt.',
				'max_length' => 'Postinumero on liian pitkä.',
				'is_natural' => 'Postinumero voi sisältää vain numeroita'
			]
		],
		'town' =>  [
			'label' => 'town',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_dash',
			'errors' => [
				'required' => 'Postitoimipaikka on pakollinen.',
				'min_length' => 'Postitoimipaikka on liian lyhyt.',
				'max_length' => 'Postitoimipaikka on liian pitkä.',
				'alpha_dash' => 'Postitoimipaikka ei voi sisältää erikoismerkkejä',
			]
		],
		'phone' =>  [
			'label' => 'phone',
			'rules' => 'numeric|min_length[2]|max_length[30]',
			'errors' => [
				'numeric' => 'Syötä puhelinnumero numeromuodossa.',
				'min_length' => 'Puhelinnumero on liian lyhyt.',
				'max_length' => 'Puhelinnumero on liian pitkä.',
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

	public $customerEmailValidate = [
		'newemail' =>  [
			'label' => 'newemail',
			'rules' => 'required|min_length[2]|max_length[100]|valid_email',
			'errors' => [
				'required' => 'Sähköpostiosoite on pakollinen.',
				'min_length' => 'Sähköpostiosoite on liian lyhyt.',
				'max_length' => 'Sähköpostiosoite on liian pitkä.',
				'valid_email' => 'Syötä sähköposti oikeassa muodossa.'
			]
		],
		'emailconfirm' =>  [
			'label' => 'emailconfirm',
			'rules' => 'required|min_length[2]|max_length[100]|valid_email|required|matches[newemail]',
			'errors' => [
				'required' => 'Sähköpostin vahvistus on pakollinen.',
				'min_length' => 'Sähköpostiosoite on liian lyhyt.',
				'max_length' => 'Sähköpostiosoite on liian pitkä.',
				'valid_email' => 'Syötä sähköposti oikeassa muodossa.',
				'matches' => 'Sähköpostien pitää vastata toisiaan.'
			]
		],
	];

	public $customerPasswordValidate = [
		'newpassword' => [
			'label' => 'newpassword',
			'rules' => 'required|min_length[8]|max_length[30]|alpha_numeric_punct',
			'errors' => [
				'required' => 'Salasana on pakollinen.',
				'min_length' => 'Salasana on liian lyhyt.',
				'alpha_numeric_punct' => 'Salasana voi sisältää vain tiettyjä erikoismerkkejä'
			]
		],
		'passconfirm' => [
			'label' => 'passconfirm',
			'rules' => 'required|matches[newpassword]',
			'errors' => [
				'required' => 'Salasana pitää syöttää uudestaan.',
				'matches' => 'Salasanojen pitää vastata toisiaan.'
			]
		]
	];

	public $customerDetailValidate = [
		'firstname' => 	[
			'label' => 'firstname',
			'rules' => 'required|min_length[2]|max_length[50]|alpha_dash',
			'errors' => [
				'required' => 'Etunimi on pakollinen.',
				'min_length' => 'Etunimi on liian lyhyt.',
				'max_length' => 'Etunimi on liian pitkä.',
				'alpha_dash' => 'Etunimi ei voi sisältää erikoismerkkejä',
			]
		],
		'lastname' => 	[
			'label' => 'lastname',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_dash',
			'errors' => [
				'required' => 'Sukunimi on pakollinen.',
				'min_length' => 'Sukunimi on liian lyhyt.',
				'max_length' => 'Sukunimi on liian pitkä.',
				'alpha_dash' => 'Sukunimi ei voi sisältää erikoismerkkejä'
			]
		],
		'address' => 	[
			'label' => 'address',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_numeric_space',
			'errors' => [
				'required' => 'Osoite on pakollinen.',
				'min_length' => 'Osoite on liian lyhyt.',
				'max_length' => 'Osoite on liian pitkä.',
				'alpha_numeric_space' => 'Osoite ei voi sisältää erikoismerkkejä'
			]
		],
		'postcode' =>  [
			'label' => 'postcode',
			'rules' => 'required|min_length[5]|max_length[5]|is_natural',
			'errors' => [
				'required' => 'Postinumero on pakollinen.',
				'min_length' => 'Postinumero on liian lyhyt.',
				'max_length' => 'Postinumero on liian pitkä.',
				'is_natural' => 'Postinumero voi sisältää vain numeroita'
			]
		],
		'town' =>  [
			'label' => 'town',
			'rules' => 'required|min_length[2]|max_length[100]|alpha_dash',
			'errors' => [
				'required' => 'Postitoimipaikka on pakollinen.',
				'min_length' => 'Postitoimipaikka on liian lyhyt.',
				'max_length' => 'Postitoimipaikka on liian pitkä.',
				'alpha_dash' => 'Postitoimipaikka ei voi sisältää erikoismerkkejä'
			]
		],
		'phone' =>  [
			'label' => 'phone',
			'rules' => 'numeric|min_length[2]|max_length[30]',
			'errors' => [
				'numeric' => 'Syötä puhelinnumero numeromuodossa.',
				'min_length' => 'Puhelinnumero on liian lyhyt.',
				'max_length' => 'Puhelinnumero on liian pitkä.',
			]
		]
	];






	//--------------------------------------------------------------------//
}
