<?php

namespace Crydesign\Editorjs\Components;

class Editor extends \Cms\Classes\ComponentBase
{
    public $data = '';

    public function componentDetails()
    {
        return [
            'name' => 'Editor JS',
            'description' => 'Display editor.'
        ];
    }

    public function onRun()
    {
        $this->addJs('assets/js/editorjs.js');
        $this->addCss('assets/css/editorjs.css');
        // dump($this);

    }
    
    public function onEditorSave()
    {
        // $this->property('data') = input('data');
        //trace_log($_POST);
    }
}
