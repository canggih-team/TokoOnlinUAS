<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class ExportController extends Controller
{
    public function exportTransaction(Request $request)
    {
        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');

        // Fetch transaction data based on dates (replace this with actual data fetching logic)
        $transactions = []; // Your logic to get transactions between $dateStart and $dateEnd

        // Load the view and pass the data
        $html = view('exports.transaksi', compact('transaksi'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Stream the PDF back to the browser
        return $dompdf->stream('transaksi.pdf');
    }

    public function exportProduct(Request $request)
    {
        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');

        // Fetch product data based on dates (replace this with actual data fetching logic)
        $products = []; // Your logic to get products between $dateStart and $dateEnd

        // Load the view and pass the data
        $html = view('exports.product', compact('product'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Stream the PDF back to the browser
        return $dompdf->stream('product.pdf');
    }
}
