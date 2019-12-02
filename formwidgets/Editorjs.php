<?php namespace Crydesign\Editorjs\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Backend;

class Editorjs extends FormWidgetBase
{
    protected $defaultAlias = 'editorjs';

    public function widgetDetails()
    {
        return [
            'name' => 'Editor.js',
            'description' => 'Add new form widget to backend'
        ];
    }

    public function render(){
        
        $this->prepareVars();
        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $data = $this->getLoadValue();
        if (strlen($data) == 0) {
            $data = '{}';
        }

        $this->vars['id'] = $this->getId();
        $this->vars['name'] = $this->getFieldName();
        $this->vars['data'] = $data;
        $this->vars['byFile'] = Backend::url('crydesign/editorjs/upload/file');
        $this->vars['byUrl'] = Backend::url('crydesign/editorjs/upload/url');
    }

    public function getSaveValue($value)
    {
        if ($this->formField->disabled) {
            return FormField::NO_SAVE_DATA;
        }
        if (!strlen($value)) {
            return null;
        }
        return $value;
    }
}