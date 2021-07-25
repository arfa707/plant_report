<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Registration_Header;

class TransaksiWBController extends Controller
{
    public function index()
    {
        $reg_header = Registration_Header::latest()->when(request()->q, function($reg_header) {
            $reg_header = $reg_header->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);

        return view('transaksiwb.index', compact('reg_header'));
    }
}
