<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ordersReport(Request $request)
    {
        $sql = OrderDetails::with('product', 'order')->orderBy('created_at', 'desc');

        if (isset($request->from)) {
            $sql->whereDate('created_at', '>=', $request->from);
        }
        if (isset($request->to)) {
            $sql->whereDate('created_at', '<=', $request->to);
        }

        $ordersReports = $sql->paginate(10);
        return view('admin.customer.report', compact('ordersReports'));
    }
}
