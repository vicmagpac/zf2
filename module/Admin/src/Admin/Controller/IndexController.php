<?php

namespace Admin\Controller;

use Base\Controller\AbstractController;

class IndexController extends AbstractController
{
	public function __construct()
	{
        $this->form = '\Admin\Form\CategoriaForm';
        $this->controller = 'categoria';
        $this->route = 'categoria/default';
        $this->service = 'Admin\Service\CategoriaService';
        $this->entity = 'Admin\Entity\Categoria';
	}
}