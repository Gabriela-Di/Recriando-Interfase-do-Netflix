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


    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function saveUser($usuario)
    {
        $existEmail = $this->getByEmail($usuario['email']);

        if(!$existEmail){
            $usuario['id'] = create_guid();
            $usuario['ativo'] = 1;
            $usuario['deletado'] = 0;
            $usuario['is_admin'] = 0;
            $usuario['senha'] = md5($usuario['senha']);
    
            
            $save = $this->db->table($this->table)->insert($usuario);
    
            if($save){
                return $usuario; 
            }
        }
        
        return false;

    }

    public function SearchLogin($login){
		$this->select('id, nome, email');
		$this->where('ativo', '1');
		$this->where('email', $login['email']);
		$this->where('senha', md5($login['senha']));
		$query = $this->get(1);
		if($query){
			if($query->resultID->num_rows > 0){
				return $query->getResult('array')[0];
			}		
		}else{
			// $this->RegisterLastError("Query search login failed: ");	
		}
		return false;
	}
}