<?php

namespace App\Models\Usuarios;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'nome',
        'email',
        'telefone',
        'senha',
        'ativo',
        'is_admin',
        'hash_esqueci_senha',
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
        'telefone' => [
            'label' => 'Telefone',
            'rules' => 'required'
        ],
        'senha' => [
            'label' => 'Senha',
            'rules' => 'required'
        ],
        'repita_senha' => [
            'label' => 'Repita a Senha',
            'rules' => 'required|matches[senha]'
        ],
        'ativo' => [
            'label' => 'Ativo',
        ],
        'deletado' => [
            'label' => 'Deletar',
        ]

    ];

    protected function hashPassword($data)
    {
        if (!$data['data']['senha']) {
            return $data;
        }

        $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);

        return $data;
    }

    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}