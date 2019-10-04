<?php

$config = [
    'user/create' => [
            [
            'field' => 'lastname',
            'label' => 'Nom de famille',
            'rules' => 'trim|required|max_length[50]|alpha'
        ],
            [
            'field' => 'firstname',
            'label' => 'Prénom',
            'rules' => 'trim|required|max_length[50]|alpha'
        ],
            [
            'field' => 'birthdate',
            'label' => 'date de naissance',
            'rules' => ['trim', 'required', 'max_length[10]', 'regex_match[/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/]']
        ],
            [
            'field' => 'address',
            'label' => 'Adresse',
            'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces'
        ],
            [
            'field' => 'zipcode',
            'label' => 'Code postal',
            'rules' => 'trim|required|max_length[5]|integer'
        ],
            [
            'field' => 'phone',
            'label' => 'Téléphone',
            'rules' => 'trim|required|max_length[10]|integer'
        ],
            [
            'field' => 'id_Marital_Status',
            'label' => 'Statut',
            'rules' => 'trim|required|max_length[1]|integer'
        ]
    ],
    'credits/create' =>
        [
            [
            'field' => 'company',
            'label' => 'Compagnie',
            'rules' => 'trim|required|max_length[50]|alpha'
        ],
            [
            'field' => 'rate',
            'label' => 'Taux',
            'rules' => 'trim|required|max_length[5]|numeric'
        ],
            [
            'field' => 'total',
            'label' => 'Total',
            'rules' => 'trim|required|max_length[50]|numeric'
        ],
            [
            'field' => 'negotiable',
            'label' => 'Negociable',
            'rules' => ['trim', 'required', 'max_length[1]', 'regex_match[/^(0|1)$/]']
        ],
            [
            'field' => 'credit_Type',
            'label' => 'Type de crédit',
            'rules' => ['trim', 'required', 'max_length[1]', 'regex_match[/^(1|2|3|4)$/]']
        ]
    ],
    'credits/edit' =>
        [
            [
            'field' => 'company',
            'label' => 'Compagnie',
            'rules' => 'trim|required|max_length[50]|alpha'
        ],
            [
            'field' => 'rate',
            'label' => 'Taux',
            'rules' => 'trim|required|max_length[5]|numeric'
        ],
            [
            'field' => 'total',
            'label' => 'Total',
            'rules' => 'trim|required|max_length[50]|numeric'
        ],
            [
            'field' => 'negotiable',
            'label' => 'Negociable',
            'rules' => ['trim', 'required', 'max_length[1]', 'regex_match[/^(0|1)$/]']
        ],
            [
            'field' => 'credit_Type',
            'label' => 'Type de crédit',
            'rules' => ['trim', 'required', 'max_length[1]', 'regex_match[/^(1|2|3|4)$/]']
        ]
    ]
];
