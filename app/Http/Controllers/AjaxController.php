<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //this method to handle your ajax request.
    public function ajaxAction(Request $request)
    {
        // Process your AJAX request
        return response()->json(['message' => 'Success'], 200);
    }
}
