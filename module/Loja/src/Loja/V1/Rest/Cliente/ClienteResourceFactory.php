<?php
namespace Loja\V1\Rest\Cliente;

class ClienteResourceFactory
{
    public function __invoke($services)
    {
		$mapper = $services->get('Loja\V1\Rest\Cliente\ClienteMapper');
        return new ClienteResource($mapper);
    }
}
