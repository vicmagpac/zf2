<?php

namespace Admin\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class CategoriaService extends AbstractService
{
	public function __construct(EntityManager $em)
	{
		$this->entity = 'Admin\Entity\Categoria';
		parent::__construct($em);
	}
}