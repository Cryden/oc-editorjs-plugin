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

    // This array becomes available on the page as {{ component.posts }}
    public function posts()
    {
        return ['First Post', 'Second Post', 'Third Post'];
    }
}
