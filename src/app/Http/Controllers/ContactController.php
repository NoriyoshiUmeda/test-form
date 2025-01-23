<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    /**
     * お問い合わせフォームの表示
     */
    public function index()
    {
        $categories = Category::all(); // カテゴリーを取得
        return view('index', compact('categories'));
    }

    /**
     * 確認画面を表示
     */
   public function confirm(ContactFormRequest $request)
   {   


    // バリデーション
    $validated = $request->validated();

    // 電話番号を結合
    $phone = $validated['phone1'] . '-' . $validated['phone2'] . '-' . $validated['phone3'];

    // 不要なデータを削除
    unset($validated['phone1'], $validated['phone2'], $validated['phone3']);

    $validated['phone'] = $phone;

    // 確認画面にデータを渡す
    return view('confirm', ['input' => $validated]);

    }


    public function store(ContactFormRequest $request)
{
    $validated = $request->validated();

    // データを保存
    Contact::create($validated);

    // サンクスページへリダイレクト
    return redirect()->route('contacts.thanks');
}


    /**
     * サンクスページを表示
     */
    public function thanks()
    {
        return view('thanks');
    }
}
