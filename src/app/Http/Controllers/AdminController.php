<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    /**
     * 管理画面のお問い合わせ一覧を表示
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // 検索条件を追加
       if ($request->filled('name')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->name . '%')
              ->orWhere('last_name', 'like', '%' . $request->name . '%');
        });
    }
        if ($request->gender && $request->gender != '全て') {
            $query->where('gender', $request->gender);
        }


        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        // データを取得し、ページネーションを適用
        $contacts = $query->paginate(10);

        return view('admin.index', [
            'contacts' => $contacts,
            'inquiryTypes' => Contact::distinct()->pluck('category_id'),
        ]);
    }

    /**
     * 詳細画面を表示
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.show', compact('contact'));
    }

    /**
     * お問い合わせを削除
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'データを削除しました');
    }

    public function export(Request $request)
{
    $contacts = Contact::all();
    $csv = "名前,性別,メールアドレス,お問い合わせ内容\n";

    foreach ($contacts as $contact) {
        $csv .= "{$contact->first_name} {$contact->last_name},{$contact->gender},{$contact->email},{$contact->content}\n";
    }

    return response($csv)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', 'attachment; filename="contacts.csv"');
}

}
