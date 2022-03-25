<?php

namespace Masfahri\Nutech\Controllers;

use DB;
use File;
use Session;
use Alert;

use DataTables;
use App\Models\Media;
use Illuminate\Http\Request;
use Masfahri\Nutech\Models\Items;
use App\Http\Controllers\Controller;
use Masfahri\Nutech\App\Request\ItemsRequest;
use Masfahri\Nutech\App\Exceptions\CustomException;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Items::with('media')->latest()->get();
            return Datatables::of($data)
            ->addColumn('image', function ($item)
            {
                $html = '<img class="img-thumbnail" src="'.asset($item->Media->path.'/'.$item->Media->file_name).'" alt="" />';
                return $html;
            })
            ->editColumn('harga_beli', function ($item)
            {
                return 'Rp. '.number_format($item->harga_beli, 2, ',', '.');
            })
            ->editColumn('harga_jual', function ($item)
            {
                return 'Rp. '.number_format($item->harga_jual, 2, ',', '.');
            })
            ->addIndexColumn()
            ->addColumn('stok_alert', function ($item)
            {
                $stok = $item->stok;
                switch ($stok) {
                    case $stok < 30:
                        $span ='<span class="alert alert-danger" >Stok Menipis Kurang Dari 30 ('.$item->stok.')</span>';
                        break;
                    case $stok < 50:
                        $span ='<span class="alert alert-warning" >Kurang Dari 50 ('.$item->stok.')</span>';
                        break;
                    default:
                        $span ='<span class="alert alert-success" >Stok Aman '.$item->stok.'</span>';
                        break;
                }
                return $span;
            })
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-pen text-white"></i></a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
                return $btn;
            })
            ->rawColumns(['action', 'stok_alert', 'image'])->make(true);
        }
        return view('nutech::pages.items.index', [
            'route' => [
                'index' => route('items.index'),
                'store' => route('items.store'),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemsRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $image = $request->file('foto_item');
            if (!in_array($image->getClientOriginalExtension(), array('jpg', 'png'))) {
                throw new CustomException('Foto harus JPG atau PNG');          
            }
            $items = Items::updateOrCreate($request->except('foto_item', 'product_id'));        

            // File Upload
            $tujuan_upload = 'data_file';
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move($tujuan_upload, $fileName);

            $media = new Media();
            $media->item_id = $items->id;
            $media->path = $tujuan_upload;
            $media->file_name = $fileName;
            $media->extention = $image->getClientOriginalExtension();
            $media->save();
            DB::commit();
            return response()->json(['success'=>'Product saved successfully.']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Items::with('media')->find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $image = $request->file('foto_item');
            $item = Items::with('media')->find($id);
            $item->nama_barang = $request->nama_barang;
            $item->harga_beli = $request->harga_beli;
            $item->harga_jual = $request->harga_jual;
            $item->stok = $request->stok;
            $item->save();

            File::delete($item->media->path.'/'.$item->media->file_name);

            // File Upload
            $tujuan_upload = 'data_file';
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move($tujuan_upload, $fileName);

            $item->media->item_id = $item->id;
            $item->media->path = $tujuan_upload;
            $item->media->file_name = $fileName;
            $item->media->extention = $image->getClientOriginalExtension();
            $item->media->save();
            
            DB::commit();
            Alert::success('Congrats', 'Data has been Updated');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();

        }
        // $input = $request->validated();
        // $items = $items::updateOrCreate(['nama_barang' => $input['nama_barang']], $input);
        // dd($items->Media);
        // return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Items::with('media')->find($id);

        File::delete($items->media->path.'/'.$items->media->file_name);
        $items->delete();

        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
