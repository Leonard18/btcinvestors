<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $plans = Plan::all();
        return view('pages.home', compact('plans'));
    }

    public function about() {
        return view('pages.about');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function plans() {
        $plans = Plan::orderBy('id', 'desc')->get();
        return view('pages.plans', compact('plans'));
    }

    public function terms() {
        return view('pages.terms');
    }

    public function policy() {
        return view('pages.privacy');
    }

    public function faq() {
        return view('pages.faq');
    }

    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function forgotPassword() {
        return view('auth.password.forgot-password');
    }
}
