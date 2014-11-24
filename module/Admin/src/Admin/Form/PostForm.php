<?php

namespace Admin\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Zend\Form\Element\Text;
use Admin\Form\PostFilter;

class PostForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {

        $this->setObjectManager($objectManager);

        parent::__construct(null);
        $this->setAttribute('method', 'POST');

        $titulo = new Text('titulo');
        $titulo->setLabel('Titulo')
               ->setAttributes(array(
                    'maxlenght' => 45
               ));
        $this->add($titulo);

        $descricao = new Textarea('descricao');
        $descricao->setLabel('Descrição')
                  ->setAttributes(array(
                     'maxlenght' => 255
                  ));
        $this->add($descricao);

        $texto = new Textarea('texto');
        $texto->setLabel('Texto');
        $this->add($texto);

        $ativo = new Checkbox('ativo');
        $ativo->setLabel('Ativo');
        $this->add($ativo);

        $categoria = new ObjectSelect('categoria');
        $categoria->setLabel('Categoria')
                  ->setOptions(array(
                      'object_manager'  => $this->getObjectManager(),
                      'target_class'    => 'Admin\Entity\Categoria',
                      'property'        => 'nome',
                      'empty_option'    => '-- Selecione --',
                      'is_method'       => true,
                      'find_method'     => array(
                          'name'   => 'findBy',
                          'params' => array(
                              'criteria'    => array(),
                              'orderBy'     => array('nome' => 'ASC')
                          )
                      )
                  ));
        $this->add($categoria);

        $botao = new Button('submit');
        $botao->setLabel('Salvar')
              ->setAttributes(array(
                  'type' => 'submit',
                  'class' => 'btn'
              ));
        $this->add($botao);

        $this->setInputFilter(new PostFilter($categoria->getValueOptions()));
    }

    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }
}