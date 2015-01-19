<?php
namespace Loja\V1\Rest\Cliente;

class ClienteEntity
{
	public $id;
	public $nome;
	public $email;
	
	/**
	 * Retorna o objeto convertido para um array
	 * @return array
	 */
	public function getArrayCopy()
	{
		return array(
			"id" => $this->id,
			"nome" => $this->nome,
			"email" => $this->email
		);
	}
	
	/**
	 * Passa os dados do array para o objeto
	 * @param array $array
	 */
	public function exchangeArray(array $array)
	{
		$this->id = $array['id'];
		$this->nome = $array['nome'];
		$this->email = $array['email'];
	}
	
}
