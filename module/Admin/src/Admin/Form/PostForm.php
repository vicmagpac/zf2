<?php

namespace Admin\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Zend\Form\Element\Text;
use Admin\Form\PostFilter;

class PostForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new PostFilter());

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

        $botao = new Button('submit');
        $botao->setLabel('Salvar')
              ->setAttributes(array(
                  'type' => 'submit',
                  'class' => 'btn'
              ));
        $this->add($botao);

    }
}