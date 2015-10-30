<?php

class Form {

    protected $form;
    protected $conteudoForm;
    protected $inicioForm;
    protected $elementos = array();
    protected $controller;
    protected $action;
    protected $nomeForm;

    public function criarForm() { //controller/AlunosController.php?action=insert
        $this->nomeForm = $this->controller.'_'.$this->action;
        $this->inicioForm = '<form method="post" class="form-horizontal" role="form" name="'.$this->nomeForm.'" id="'.$this->nomeForm.'" action="/controller/FormController.php?controller='.$this->controller.'&action='.$this->action.'">';
        foreach ($this->elementos as $elemento) {
            $this->conteudoForm .= $this->criarElemento($elemento);
        }
        $this->form = $this->inicioForm . $this->conteudoForm . '</form>';
    }
    
    protected function add($elemento){
        array_push($this->elementos, $elemento);
    }

    public function __toString() {
        return $this->form;
    }

    public function getDataPorId($id){
       $controller = new $this->controller;
       $dados = $controller->getPorId($id);
       $data = $controller->toJSon($dados);

       return $data;
    }

    public function addJQuery($data){
        echo "<script type='text/javascript'>$(document).ready(function(){var data = ".$data."; populateForm('#".$this->nomeForm."', $.parseJSON(data));});</script>";
    }

    public function popularForm($id){
        $data = $this->getDataPorId($id);
        $this->addJQuery($data);
    }

    private function criarElemento($elemento) {
        $elementoHtml = '<div class="form-group">';

        if (isset($elemento['label'])) {
            $elementoHtml .= '<label class="control-label col-sm-2" for="' . $elemento['id'] . '">' . $elemento['label'] . '</label>';
        }

        $elementoHtml .= '<div class="col-sm-10">';
        
        if ($elemento['element'] == 'input') {
            $elementoHtml .= '<input class="form-control" ';
            foreach ($elemento as $key => $value) {
                if ($key != 'element' && $key != 'label') {
                    if ($key == 'checked' && $value == 'true') {
                        $elementoHtml .= 'checked ';
                    } else {
                        $elementoHtml .= $key . '="' . $value . '" ';
                    }
                }
            }
            $elementoHtml .= '>';
        }

        if ($elemento['element'] == 'select') {
            $elementoHtml .= '<select class="form-control" ';
            foreach ($elemento as $key => $value) {
                if ($key != 'element' && $key != 'label' && $key != 'opitions') {
                    $elementoHtml .= $key . '="' . $value . '" ';
                }
            }
            $elementoHtml .= '>';
            $elementoHtml .= '<option value=""> - selecione - </option>';
            foreach ($elemento['opitions'] as $key => $value) {
                $elementoHtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
            $elementoHtml .= '</select>';
        }

        if ($elemento['element'] == 'textarea') {
            $elementoHtml .= '<textarea class="form-control" ';
            foreach ($elemento as $key => $value) {
                if ($key != 'element' && $key != 'label' && $key != 'opitions') {
                    $elementoHtml .= $key . '="' . $value . '" ';
                }
            }
            $elementoHtml .= '>';
            if (isset($elemento['texto'])) {
                $elementoHtml = $elemento['texto'];
            }
            $elementoHtml .= '</textarea >';
        }

        $elementoHtml .= '</div></div>';

        return $elementoHtml;
    }

}
