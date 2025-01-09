<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // バリデーションルールを定義
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|confirmed',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'inquiry_type' => 'required|in:business,audition,other',
            'message' => 'required|string',
            'privacy_policy' => 'required|accepted',
        ]);

        // ここでメール送信やデータベースへの保存などの処理を行います

        return redirect()->route('contact')->with('success', 'お問い合わせありがとうございます。内容を確認の上、回答させていただきます。');
    }
}
