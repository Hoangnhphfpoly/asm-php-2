<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $errMes = [
        'cate_name.required' => 'Không được để trống trường này',
        'cate_name.unique'  => 'Category đã tồn tại'
    ];

    public function index(){
        $cates = Category::paginate(5);
        return view('category.index', compact('cates'));
    }

    public function insertForm(){
        $users = User::where('role_id','<=',2)->get();
        return view('category.insert', compact('users'));
    }

    public function saveInsert(Request $request){
            $cate = new Category();

            $data = $request->validate([
                'cate_name' => 'required|unique:App\Category,cate_name',
            ],$this->errMes);

            $cate->fill($request->all());
            $cate->save();

            return redirect()->route('cate-index')->with('msg','Thêm mới thành công');
    }

    public function delete($id){
        $cateDel = Category::findOrFail($id);

//        $prod = Product::where('cate_id',$cateDel->id);

        $cateDel->delete();
        return redirect()->route('cate-index')->with('msg','Xóa thành công');
    }

    public function editForm($id){
        $users = User::where('role_id','<=',2)->get();
        $cateEdit = Category::findOrFail($id);
        return view('category.edit', compact('users','cateEdit'));
    }

    public function saveEdit(Request $request){
        $cateEdit = Category::findOrFail($request->id);

        $data = $request->validate([
            'cate_name' => 'required|unique:App\Category,cate_name,'.$request->id,
        ],$this->errMes);

        $cateEdit->fill($request->all());
        $cateEdit->save();

        return redirect()->route('cate-index')->with('msg','Sửa danh mục thành công');
    }
}
