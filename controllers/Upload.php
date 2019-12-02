<?php namespace Crydesign\Editorjs\Controllers;

use Backend\Classes\Controller;
use Request;
use Response;
use Input;
/**
 * Articles Back-end Controller
 */
class Upload extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function File() {
        if (Request::ajax()) {
            // trace_log(Input::all());
            $file = new \System\Models\File;
            $file->data = Input::file('image');
            $file->is_public = true;
            $file->save();

            return Response::json(['success' => 1, 'file' => [ 'url' => $file->getPath()]]);
        }
    }

    public function Url() {
        if (Request::ajax()) {
            trace_log(Input::all());
            return;
        }
    }
}
