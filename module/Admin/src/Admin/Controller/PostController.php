<?php 

namespace Admin\Controller;

use Base\Controller\AbstractController;

class PostController extends AbstractController
{
	public function __construct()
	{
		$this->form = 'Admin\Form\PostForm';
		$this->controller = 'post';
		$this->route = 'post/default';
		$this->service = 'Admin\Service\PostService';
		$this->entity = 'Admin\Entity\Post';
	}
}