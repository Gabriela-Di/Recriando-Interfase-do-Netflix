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

    public function saveUser($usuario)
    {

        $usuario['id'] = create_guid();
        $usuario['ativo'] = 1;
        $usuario['deletado'] = 0;
        $usuario['is_admin'] = 0;

        
        // dd($usuario);
        $save = $this->db->table($this->table)->insert($usuario);

        

        if($save){
            return TRUE; 
        } else{
            echo $this->db->getLastQuery();
        }
        return false;

    }
}