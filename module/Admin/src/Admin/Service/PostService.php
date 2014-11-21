<?php

namespace Admin\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class PostService extends AbstractService
{
	public function __construct(EntityManager $em)
	{
		$this->entity = 'Admin\Entity\Post';
		parent::__construct($em);
	}
}