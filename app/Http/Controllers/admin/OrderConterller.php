<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\ConstantService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class OrderConterller extends Controller
{
    protected $orderService, $order;

    public function __construct(OrderService $orderService, Order $order)
    {
        $this->orderService = $orderService;
        $this->order = $order;
    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function show(Request $request)
    {

        if ($request->ajax()) {
            $data = $this->order->with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_st', function ($row) {
                    if ($row->order_status == 1) {
                        return '<span class="badge badge-warning">' . Order::$orderStatus[$row->order_status] . '</span>';
                    } elseif ($row->order_status == 2) {
                        return '<span class="badge badge-success">' . Order::$orderStatus[$row->order_status] . '</span>';
                    } elseif ($row->order_status == 3) {
                        return '<span class="badge badge-primary">' . Order::$orderStatus[$row->order_status] . '</span>';
                    } else {
                        return '<span class="badge badge-danger">' . Order::$orderStatus[$row->order_status] . '</span>';
                    }

                })
                ->addColumn('payment_st', function ($row) {
                    if ($row->payment_status == 3) {
                        return '<span class="badge badge-warning">' . Order::$paymentStatus[$row->payment_status] . '</span>';
                    } elseif ($row->order_status == 1) {
                        return '<span class="badge badge-success">' . Order::$paymentStatus[$row->payment_status] . '</span>';
                    } elseif ($row->order_status == 4) {
                        return '<span class="badge badge-primary">' . Order::$paymentStatus[$row->payment_status] . '</span>';
                    } else {
                        return '<span class="badge badge-danger">' . Order::$paymentStatus[$row->payment_status] . '</span>';
                    }

                })
                ->addColumn('total', function ($row) {
                    return ConstantService::moneyFormat($row->total_payment);
                })
                ->addColumn('action', function ($row) {
//                    $actionBtn = '<a href="order/' . $row->id . '"><i class="icofont-eye icofont-2x text-primary"></i></a>';
                    return '';
                })
                ->rawColumns(['action', 'order_st','payment_st'])
                ->make(true);
        }
        return view('admin.order.index');
    }


    public function orderSuccess($orderId,$status)
    {
        
       return view('theme.order-success', compact('orderId','status'));
    }

}
