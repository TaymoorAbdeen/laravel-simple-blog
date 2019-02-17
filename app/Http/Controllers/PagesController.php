<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        $title = 'Index pgae';
        return view('pages.index', compact('title'));
    }
    public function about () {
        return view('pages.about');
    }

    public function services () {
        $data = [
            'title'=> 'The following services are provided:',
            'services' => [
                'programming',
                'automation',
                'web design'
                ]
            ];
        return view('pages.services')->with($data);
    }
}
