<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductGallery;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    private $errMes = [
        'name.required'  => 'Tên sản phẩm không được để trống',
        'name.unique' => 'Sản phẩm đã tồn tại',
        'image.image' => 'Ảnh không đúng định dạng',
        'price.required' => 'Không được để trống giá sản phẩm',
        'price.numeric' => 'Giá sản phẩm phải là số',
        'short_desc.required' => 'Mô tả ngắn không được để trống',
        'detail.required' => 'Thông tin sản phẩm không được để trống'
    ];

    public function index(){
        $prods = Product::paginate(5);
        return view('product.index',compact('prods'));
    }

    public function insertForm(){
        $cates = Category::all();
        return view('product.insert', compact('cates'));
    }

    public function saveInsert(Request $request){
        $prod = new Product();

        $data = $request->validate([
            'name' => 'required|unique:App\Product,name',
            'image' => 'image',
            'price' => 'required|numeric',
            'short_desc' => 'required',
            'detail' => 'required'
        ],$this->errMes);

        if (file_exists($request->file('image'))){
            $prod->image = $request->file('image')->store('image_prod','public');
        }

        $prod->fill($request->all());
        $prod->save();

        return redirect()->route('prod-index')->with('msg','Thêm mới sản phẩm thành công');
    }

    public function delete($id){
        $prodDelete = Product::findOrFail($id);

        if ($prodDelete->image != ""){
            unlink("storage/".$prodDelete->image);
        }

        $prodDelete->delete();

        return redirect()->route('prod-index')->with('msg','Xóa sản phẩm thành công');
    }

    public function editForm($id){
        $cates = Category::all();
        $prodEdit = Product::findOrFail($id);
        return view('product.edit', compact('cates','prodEdit'));
    }

    public function saveEdit(Request $request){
        $prodEdit = Product::findOrFail($request->id);

        $data = $request->validate([
            'name' => 'required|unique:App\Product,name,'.$request->id,
            'image' => 'image',
            'price' => 'required|numeric',
            'short_desc' => 'required',
            'detail' => 'required'
        ],$this->errMes);

        if (file_exists($request->file('image'))){
            if ($prodEdit->image != ""){
                unlink("storage/".$prodEdit->image);
            }
            $prodEdit->image = $request->file('image')->store('image_prod','public');
        }

        $prodEdit->fill($request->all());
        $prodEdit->save();
        return redirect()->route('prod-index')->with('msg','Sửa sản phẩm thành công');
    }

    public function detail($id){
        $cates = Category::all();
        $prodEdit = Product::findOrFail($id);
        return view('product.detail', compact('cates','prodEdit'));
    }
}
