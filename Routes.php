<?php

Route::post('editorjs/handler/file', function() {

   if (Request::ajax()) {
        // trace_log(Input::all());
        $file = new \System\Models\File;
        $file->data = Input::file('image');
        $file->is_public = true;
        $file->save();

        return Response::json(['success' => 1, 'file' => [ 'url' => $file->getPath()]]);
    }
});