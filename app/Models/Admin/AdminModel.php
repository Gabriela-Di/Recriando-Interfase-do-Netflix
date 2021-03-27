<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'user_adm';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'nome',
        'email',
        'senha',
        'nivel',
        'deletado'
    ];

    protected $beforeInsert = ['hashPassword'];

    protected $validationRules = [
        'nome' => [
            'label' => 'Nome',
            'rules' => 'required'
        ],
        'email' => [
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ],
        'senha' => [
            'label' => 'Senha',
            'rules' => 'required'
        ],
        'repita_senha' => [
            'label' => 'Repita a Senha',
            'rules' => 'required|matches[senha]'
        ],
        'nivel' => [
            'label' => 'Nível de acesso',
            'rules'=> 'required',
        ],
        'deletado' => [
            'label' => 'Deletar',
        ]

    ];
}