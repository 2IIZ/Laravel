<?php
// php artisan make:request CreatePostRequest


namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // we can authorize this functionallity to some user.
        return true; // true to everybody
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

          'title'=> 'required'
            //
        ];
    }
}
