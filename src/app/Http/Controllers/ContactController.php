<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    // 入力画面の処理
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }

    // 確認画面の処理
    public function confirm(ContactRequest $request)
    {
        $request->flash();
        
        $contact = $request->all();

        $contact['tell'] = $contact['phone1'] . '-' . $contact['phone2'] . '-' . $contact['phone3'];

        return view('confirm', compact('contact'));
    }

    // 完了画面の処理
    public function thanks(Request $request)
    {
        // 修正ボタンをクリックされた場合
        if($request->input('correction') == 'correction') {
            return redirect('/')->withInput();
        }

        $contactData = $request->all();

        $contact = [
            'last_name' => $contactData['last_name'],
            'first_name' => $contactData['first_name'],
            'gender' => $contactData['gender'],
            'email' => $contactData['email'],
            'tell' => $contactData['tell'],
            'address' => $contactData['address'],
            'building' => $contactData['building'],
            'category_id' => $contactData['category_id'],
            'detail' => $contactData['detail']
        ];

        // データ保存
        Contact::create($contact);
        
        return view('thanks');
    }
}
