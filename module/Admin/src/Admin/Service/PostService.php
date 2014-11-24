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

    public function save(Array $data = array())
    {
        $data['categoria'] = $this->em->getRepository('Admin\Entity\Categoria')->find($data['categoria']);

        return parent::save($data);
    }
}