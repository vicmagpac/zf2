<?php

namespace Admin\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Admin\Form\CategoriaFilter;

class CategoriaForm extends Form
{
    public function __construct()
    {
         // input nome
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new CategoriaFilter());

        $nome = new Text('nome');
        $nome->setLabel('Nome')
             ->setAttributes(array(
                 'maxlenght' => 60
             ));

        $this->Add($nome);

        // botão
        $button = new Button('submit');
        $button->setLabel('Salvar')
               ->setAttributes(array(
                   'type'  => 'submit',
                   'class' => 'btn'
               ));

        $this->add($button);
    }
}