<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index'
        // , [
        //     'dashboard' => Dashboard::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        // ]
    );
    }
}
