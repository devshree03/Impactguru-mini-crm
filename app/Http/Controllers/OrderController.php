<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\User;
use App\Notifications\NewOrderNotification;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $query = Order::with('customer');

    if ($status = request('status')) {
        $query->where('status', $status);
    }

    $orders = $query->paginate(10)->withQueryString();

    $statuses = ['pending', 'completed', 'cancelled'];

    return view('orders.index', compact('orders', 'statuses', 'status'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Only admin can create orders
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $customers = Customer::all();

        return view('orders.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if (!auth()->user() || !auth()->user()->isAdmin()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'customer_id'  => 'required|exists:customers,id',
        'order_number' => 'required|string|max:50',
        'amount'       => 'required|numeric|min:0',
        'order_date'   => 'required|date',
        'status'       => 'required|string|max:50',
        'description'  => 'nullable|string',
    ]);

    $data = $request->only([
        'customer_id',
        'order_number',
        'amount',
        'order_date',
        'status',
        'description',
    ]);

    $order = Order::create($data);

    // 🔔 send notification to all admins
    $admins = User::where('role', 'admin')->get();
    foreach ($admins as $admin) {
        $admin->notify(new NewOrderNotification($order));
    }

    return redirect()->route('orders.index')->with('success', 'Order created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
public function exportCsv(): StreamedResponse
{
    // Only admin can export
    if (!auth()->user() || !auth()->user()->isAdmin()) {
        abort(403);
    }

    $fileName = 'orders_' . now()->format('Ymd_His') . '.csv';

    $headers = [
        'Content-Type'        => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$fileName\"",
    ];

    $callback = function () {
        $handle = fopen('php://output', 'w');

        // Header row
        fputcsv($handle, ['ID', 'Order Number', 'Customer', 'Amount', 'Status', 'Order Date', 'Created At']);

        Order::with('customer')->chunk(200, function ($orders) use ($handle) {
            foreach ($orders as $order) {
                fputcsv($handle, [
                    $order->id,
                    $order->order_number,
                    $order->customer->name ?? '',
                    $order->amount,
                    $order->status,
                    $order->order_date,
                    $order->created_at,
                ]);
            }
        });

        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}

}
