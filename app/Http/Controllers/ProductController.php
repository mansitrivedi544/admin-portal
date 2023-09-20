<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;
use App\Http\Requests\ProductStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('id', 'name', 'mrp', 'price')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('editProduct', base64_encode($row->id)) . '" class="btn btn-primary btn-sm  mr-1 "><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Load index view
        return view('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->company_id = auth()->guard('company')->user()->id;
        $product->save();

        return redirect()->route('productList')
            ->with('success', 'Product has been created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find(base64_decode($id));
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request)
    {

        $product = Product::find($request->id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->company_id = auth()->guard('company')->user()->id;

        $product->save();

        return redirect()->route('productList')
            ->with('success', 'Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Product::where('id', $request->id)->delete();
        return response()->json(['success' => 'Product has been deleted successfully.']);
    }


    public function importView(Request $request)
    {
        return view('importFile');
    }

    public function import(Request $request)
    {
        $fileType = explode('.', $request->file('file')->getClientOriginalName());
        if (!empty($request->file('file'))) {
            if (!empty($fileType[1]) &&  $fileType[1] == "csv") {
                Excel::import(new ImportProduct, $request->file('file')->store('files'));
                return redirect()->back();
            }
            return redirect()->route('productList')
            ->with('error', 'Please select csv file');
        }
        return redirect()->route('productList')
            ->with('error', 'Please select file before import');
    }
}
