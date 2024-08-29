<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tell1' => 'required|max:5',
            'tell2' => 'required|max:5',
            'tell3' => 'required|max:5',
            'address' => 'required',
            'inquiry' => 'required',
            'content' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell1.required' => '電話番号を入力してください',
            'tell1.max' =>'電話番号は5桁までの数字で入力してください',
            'tell2.required' => '電話番号を入力してください',
            'tell2.max' =>'電話番号は5桁までの数字で入力してください',
            'tell3.required' => '電話番号を入力してください',
            'tell3.max' =>'電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'inquiry.required' => 'お問合せの種類を入力してください',
            'content.required' => 'お問合せ内容を入力してください',
            'content.max' => 'お問合せ内容は120文字以内で入力してください',



        ];
    }

}
