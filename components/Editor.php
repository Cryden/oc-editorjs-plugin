<?php

namespace Crydesign\Editorjs\Components;

class Editor extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Editor JS',
            'description' => 'Display editor.'
        ];
    }

    public function defineProperties()
    {
        return [
            'data' => [
                 'title'             => 'Max items',
                 'description'       => 'The most amount of todo items allowed',
                 'default'           => '',
                 'type'              => 'string',
            ]
        ];
    }

    public function onRun()
    {
        $this->addJs('assets/js/editorjs.js');
        $this->addCss('assets/css/editorjs.css');
    }

    public function onEditorSave()
    {
        $this->page['result'] = $value1 + $value2;
    }
}
