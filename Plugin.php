<?php namespace Crydesign\Editorjs;

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

    public function registerComponents()
    {
        return [
            'Crydesign\Editorjs\Components\Editor' => 'editor'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'editable' => [$this, 'editable'],
                'json_decode' => [$this, 'jsonDecode'],
            ]
        ];
    }

    public function editable($text)
    {
        $data = json_decode($text);

        $inner_html = '';

        foreach ($data->blocks as $block) {
            $inner_html = $inner_html.$block->type;
        }

        $html = '
        <div id="'.$data->time.'" class="editorjs">
            <h1> Editor </h1>'
            .$inner_html.
        '</div>';

        return $html;
    }

    public function jsonDecode($str) {
        return json_decode($str);
    }
}
