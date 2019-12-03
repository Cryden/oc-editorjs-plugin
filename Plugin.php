<?php namespace Crydesign\Editorjs;

use Backend;
use Event;
use System\Classes\PluginBase;

/**
 * Editorjs Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Editorjs',
            'description' => 'No description provided yet...',
            'author'      => 'Crydesign',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::listen('backend.form.extendFields', function($controlLibrary) {
            $controlLibrary->AddJs([
                '$/crydesign/editorjs/assets/js/editorjs.js',
            ]);
            $controlLibrary->AddCss([
                '$/crydesign/editorjs/assets/css/editorjs.css',
            ]);
        });
    }

    public function registerFormWidgets()
    {
        return [
            'Crydesign\Editorjs\FormWidgets\Editorjs' => [
                'label' => 'Editor.js',
                'code'  => 'editorjs',
            ],
        ];
    }
}
