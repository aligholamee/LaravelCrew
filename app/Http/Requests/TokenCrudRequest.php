<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TokenCrudRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    

}