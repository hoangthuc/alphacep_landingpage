<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\WorkOrder;
use App\Models\Vendor;
use App\Models\Invoice;
use App\Models\User;
use Exception;


class PdfController extends Controller
{
    public function index($id,$public_id){
        try {
            $order =  WorkOrder::with('template')
            ->where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            $user = User::with('profile')->findOrFail($order->user_id);
            return view('pdf', compact('order','user'));
            
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid'], 401);
        }
    }

    public function showVendor($id,$public_id){
        try {
            $vendor =  Vendor::where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            return view('pdf-vendor', compact('vendor'));
            
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid'], 401);
        }
    }

    public function exportPdf($id,$public_id) {
        $order =  WorkOrder::with('template')
            ->where('id',$id)
            ->where('public_id',$public_id)
            ->first();
        $pdf = PDF::loadView("pdf",compact('order')); // <--- load your view into theDOM wrapper;
        $path = public_path('orders'); // <--- folder to store the pdf documents into the server;
        $fileName =  "{$public_id}{$id}". '.pdf' ; // <--giving the random filename,
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link = url('orders/'.$fileName);
       return response($generated_pdf_link,200);
    }

    public function exportPdfVendor($id,$public_id) {
        $vendor =  Vendor::where('id',$id)
            ->where('public_id',$public_id)
            ->first();
        $pdf = PDF::loadView("pdf-vendor",compact('vendor')); // <--- load your view into theDOM wrapper;
        $path = public_path('vendors'); // <--- folder to store the pdf documents into the server;
        $fileName =  "{$public_id}{$id}". '.pdf' ; // <--giving the random filename,
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link = url('vendors/'.$fileName);
       return response($generated_pdf_link,200);
    }


    public function showInvoice($id,$public_id){
        try {
            $invoice =  Invoice::with('user')->with('location')->with('product_items')->with('line_items')->where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            $user = User::with('profile')->findOrFail($invoice->user_id);
            $invoice['files'] = json_decode($invoice['files']);
            return view('pdf-invoice', compact('invoice', 'user'));
            
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function exportPdfInvoice($id,$public_id) {
        $invoice =  Invoice::with('user')->where('id',$id)
            ->where('public_id',$public_id)
            ->first();
        $invoice['product_items'] = json_decode($invoice['product_items']);
        $invoice['line_items'] = json_decode($invoice['line_items']);
        $invoice['files'] = json_decode($invoice['files']);
        $pdf = PDF::loadView("pdf-invoice",compact('invoice')); // <--- load your view into theDOM wrapper;
        $path = public_path('invoices'); // <--- folder to store the pdf documents into the server;
        $fileName =  "{$public_id}{$id}". '.pdf' ; // <--giving the random filename,
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link = url('invoices/'.$fileName);
       return response($generated_pdf_link,200);
    }


}
