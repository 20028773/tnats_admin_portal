<?php
/*******************************************************
 * Project:     tnats_admin_portal-master
 * File:        StoreUserRequest.php
 * Author:      Hilary Soong
 * Date:        2020-08-29
 * Version:     1.0.0
 * Description:
 *******************************************************/

namespace App\Http\Middleware\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required',
            'email'=> 'required',
            'password'=>'required'
        ];
    }
}


