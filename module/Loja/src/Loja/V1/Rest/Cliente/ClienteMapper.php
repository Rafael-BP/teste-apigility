<?php
namespace Loja\V1\Rest\Cliente;

use Zend\Db\TableGateway\TableGateway;

class ClienteMapper
{
	protected $tableGateway;
	
	/**
	 * Construtor da classe mapeadora de Cliente
	 * @param TableGateway $tableGateway
	 */
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	/**
	 * Metodo para fazer listagem
	 * @return type
	 */
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	
	/**
	 * Metodo para listar apenas um objeto
	 * @param integer $id
	 * @return type
	 * @throws \Exception
	 */
	public function fetchOne($id)
	{
		$id = (int) $id;
		$rowSet = $this->tableGateway->select(array("id"=>$id));
		
		$row = $rowSet->current();
		if(!$row) {
			throw new \Exception("Cliente com o id ($id), n'ao encontrado");
		}
		
		return $row;
	}
	
	/*
	 * Metodo responsavel por inserir e atualizar objetos
	 * @param Loja\V1\Rest\Cliente\ClienteEntity $cliente
	 * @return type
	 */
	public function save(ClienteEntity $cliente)
	{
		$data = $cliente->getArrayCopy();
		
		$id = (int) $cliente->id;
		
		if ($id == 0) {
			$res = $this->tableGateway->insert($data);
			$cliente->id = $this->tableGateway->lastInsertValue;
			return $cliente;
		} else {
			if ($this->fetchOne( $id )) {
				$this->tableGateway->update($data, array("id" => $id));
				return $cliente;
			}
		}
	}
	
	public function delete($id)
	{
		return $this->tableGateway->delete( array( "id" => (int) $id ) );
	}
}