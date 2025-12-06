<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalOrders    = Order::count();
        $totalRevenue   = Order::sum('amount');

        $recentCustomers = Customer::latest()->take(5)->get();

        $user  = auth()->user();
        $isAdmin = $user && $user->isAdmin();

        return view('dashboard', compact(
            'totalCustomers',
            'totalOrders',
            'totalRevenue',
            'recentCustomers',
            'isAdmin'
        ));
    }
}
