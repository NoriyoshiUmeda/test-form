<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 認証が必要な場合は変更
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:男性,女性,その他',
            'email' => 'required|email|max:255',
            'phone1' => 'required|digits:3',
            'phone2' => 'required|digits:4',
            'phone3' => 'required|digits:4',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください。',
            'first_name.required' => '名を入力してください。',
            'gender.required' => '性別を選択してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスはメール形式で入力してください。',
            'phone1.required' => '電話番号1を入力してください。',
            'phone2.required' => '電話番号2を入力してください。',
            'phone3.required' => '電話番号3を入力してください。',
            'address.required' => '住所を入力してください。',
            'content.required' => 'お問い合わせ内容を入力してください。',
            'content.max' => 'お問い合わせ内容は120文字以内で入力してください。',
        ];
    }
}
