<?php

namespace Masfahri\Nutech\App\Request;

use Illuminate\Foundation\Http\FormRequest;


class ItemsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        // $rules = [
        //     'nama_barang' => 'required|string|unique:items|max:255',
        //     'harga_beli' => 'required|numeric',
        //     'harga_jual' => 'required|numeric',
        //     'stok' => 'required|numeric',
        //     'foto_item' => 'required|mimetypes:image/jpg,image/png|max:100',
        // ];
        // if (in_array($this->method(), ['PUT', 'PATCH'])) {

            
        // }

        // return $rules;
    }
}
