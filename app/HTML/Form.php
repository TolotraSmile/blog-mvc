<?php
namespace App\HTML;

/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 21/04/2016
 * Time: 20:54
 */
class Form
{
    private $data;
    public $surround = 'p';

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    public function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name)
    {
        return $this->surround('<input type="text" name="' . $name . '" value ="' . $this->getValue($name) . '">');
    }

    public function submit()
    {
        return $this->surround('<button type="submit"> Envoyer </button>');
    }
}