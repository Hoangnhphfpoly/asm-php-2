<?php

namespace App\Http\Controllers;

use App\Category;
use App\Invoice;
use App\InvoiceDetail;
use App\Product;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DashboardController extends Controller
{
    public function index(){
        $user = count(User::all());
        $role = count(Role::where('status',1)->get());
        $cate = count(Category::all());
        $invoice = count(Invoice::all());
        $invoiceDetail = count(InvoiceDetail::all());
        $prod = count(Product::all());

        return view('dashboard.index', compact('user','role','cate','invoice','invoiceDetail','prod'));
    }
}
