<?php

namespace Farzin\BtnFormBuilder;

class ButtonFormBuilder
{
    protected $inputAttr;
    protected $method;
    protected $text;
    protected $fa;
    protected $action;


    protected function generateButtonForm($method, $action = '', $attr = '', $fa = '', $text = '', $putMethod = false, $deleteMethod = false)
    {
        $methodField = '';
        if ($putMethod) {
            $methodField = method_field('put');
        }elseif ($deleteMethod) {
            $methodField = method_field('delete');
        }
        $form = '<form class="btn-form" action="' . $action . '" method="' . $method . '">' . csrf_field() . $methodField;
        $fa = '<i class="fa fa-' . $fa . '" aria-hidden="true"></i>';
        $form .= '<button ' . $attr . '>' . $fa . $text . '</button></form>';
        return $form;
    }

    protected function setInputAttr(array $data)
    {
        $this->inputAttr = collect($data)->map(function ($v, $k) {
            return sprintf("%s = \"%s\"", $k, $v);
        })->values()->toArray();
        $this->inputAttr = join(' ', $this->inputAttr);
    }

    protected function setData(array $data)
    {
        $this->setInputAttr(array_except($data, ['text', 'fa', 'action']));
        if (isset($data['text'])) $this->text = $data['text'];
        if (isset($data['fa'])) $this->fa = $data['fa'];
        if (isset($data['action'])) $this->action = $data['action'];
    }

    public function __call($name, $arguments)
    {
        $this->setData(...$arguments);

        switch ($name) {
            case 'post' :
                return $this->generateButtonForm('post', $this->action, $this->inputAttr, $this->fa, $this->text);
            case 'get' :
                return '<a href="' . $this->action . '" ' . $this->inputAttr . '><i class="fa fa-' . $this->fa . '" aria-hidden="true"></i>' . $this->text . '</a>';
            case 'delete' :
                return $this->generateButtonForm('post', $this->action, $this->inputAttr, $this->fa, $this->text, false, true);
            case 'put' :
                return $this->generateButtonForm('post', $this->action, $this->inputAttr, $this->fa, $this->text, true);
        }
    }


}