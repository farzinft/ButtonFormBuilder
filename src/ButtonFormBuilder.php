<?php

namespace Farzin\BtnFormBuilder;

class ButtonFormBuilder
{
    protected $inputAttr;
    protected $method;
    protected $text;
    protected $fa;
    protected $action;

    public function post(array $data)
    {
        $this->setData($data);
        return $this->generateButtonForm('post', $this->action, $this->inputAttr, $this->fa, $this->text);
    }

    public function delete(array $data)
    {
        $this->setData($data);
        return $this->generateButtonForm('delete', $this->action, $this->inputAttr, $this->fa, $this->text);
    }

    protected function generateButtonForm($method, $action, $attr, $fa, $text)
    {
        $form = '<form class="btn-form" action="' . $action . '" method="' . $method . '">' . csrf_field();
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


}