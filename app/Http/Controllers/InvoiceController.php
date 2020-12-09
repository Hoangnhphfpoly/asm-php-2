<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceDetail;
use App\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $errMes = [
        'customer_name.required' => 'Tên khách hàng ko đc để trống',
        'customer_phone_number.required' => 'Số điện thoại ko đc để trống',
        'customer_phone_number.numeric' => 'Số điện thoại phải là số',
        'customer_email.required' => 'Email không đc để trống',
        'customer_email.email' => 'Email ko đúng định dạng',
        'customer_address' => 'Địa chỉ ko đc để trống'
    ];

    public function index(){
        $invoices = Invoice::paginate(5);
        return view('invoice.index', compact('invoices'));
    }

    public function insertForm(){
        $prods = Product::all();
        return view('invoice.insert',compact('prods'));
    }

    public function getPrice($id){
        $prod = Product::where('id',$id)->first();
        return $prod->price;
    }

    public function saveInsert(Request $request){
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required|numeric',
            'customer_email' => 'required|email:rfc,dns',
            'customer_address' => 'required'
        ],$this->errMes);

        $invoice = new Invoice();
        $invoice->fill($request->all());

        $amount = count($request->product);
        $prods = $request->product;
        $price = 0;
        for ($j = 0;$j<$amount;$j++){
            $price += $this->getPrice($prods["$j"]);
        }
        $invoice->total_price = $price;
        $invoice->save();

        for ($i = 0;$i<$amount;$i++){
            $invoiceDetail = new InvoiceDetail();
            $invoiceDetail->invoice_id = $invoice->id;
            $invoiceDetail->product_id = $prods["$i"];
            $invoiceDetail->quantity = 1;
            $invoiceDetail->unit_price = $this->getPrice($prods["$i"]);
            $invoiceDetail->save();
        }

        return redirect()->route('invoice-index')->with('msg','Thêm hóa đơn thành công');
    }

    public function delete($id){
        $invoiceDel = Invoice::findOrFail($id);
        $invoiceDel->delete();
        $invoiceDetailDel = InvoiceDetail::where('invoice_id',$id)->delete();
        return redirect()->route('invoice-index')->with('msg','Xóa thành công');
    }

    public function editForm($id){
        $invoice = Invoice::findOrFail($id);
        $prods = Product::all();
        $invoiceDetail = InvoiceDetail::where('invoice_id',$id)->get();
        $arr = [];
        foreach ($invoiceDetail as $key =>$inv) :
            array_push($arr,$inv->product_id);
        endforeach;
        return view('invoice.edit', compact('invoice','arr','prods'));
    }

    public function saveEdit(Request $request){
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required|numeric',
            'customer_email' => 'required|email:rfc,dns',
            'customer_address' => 'required'
        ],$this->errMes);

        $invoice = Invoice::findOrFail($request->id);
        $invoice->fill($request->all());
        $invoiceDetailDel = InvoiceDetail::where('invoice_id',$request->id)->delete();

        $amount = count($request->product);
        $prods = $request->product;
        $price = 0;
        for ($j = 0;$j<$amount;$j++){
            $price += $this->getPrice($prods["$j"]);
        }
        $invoice->total_price = $price;
        $invoice->save();

        for ($i = 0;$i<$amount;$i++){
            $invoiceDetail = new InvoiceDetail();
            $invoiceDetail->invoice_id = $invoice->id;
            $invoiceDetail->product_id = $prods["$i"];
            $invoiceDetail->quantity = 1;
            $invoiceDetail->unit_price = $this->getPrice($prods["$i"]);
            $invoiceDetail->save();
        }

        return redirect()->route('invoice-index')->with('msg','Sửa hóa đơn thành công');

    }
}
