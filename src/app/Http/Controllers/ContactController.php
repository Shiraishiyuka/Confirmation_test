<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest; 
use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse; 

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

      //問い合わせフォーム確認ページの表示//
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell1', 'tell2', 'tell3',  'address', 'building', 'inquiry','content']);
        return view('confirm',compact('contact'));
    }

    public function create(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell1', 'tell2', 'tell3',  'address', 'building', 'inquiry','content']);
        Contact::create($contact);
        return redirect('/thanks');
    }

    /*adminの検索機能*/
    public function admin(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->search . '%')
              ->orWhere('last_name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

            if ($request->filled('gender') && $request->gender !== '全て') {
                $query->where('gender', $request->gender);
            }

            if ($request->filled('inquiry')) {
                $query->where('inquiry', $request->inquiry);
            }

            if ($request->filled('create_date')) {
                $query->whereDate('created_at' , $request->create_date);
            }

            /*ページネーション*/
            $contacts = $query->paginate(7)->onEachSide(5);

            return view('admin', [
                'contacts' => $contacts,
                'search' => $request->search,
                'gender' => $request->gender,
                'inquiry' => $request->inquiry,
                'create_date' => $request->create_date,
            ]);
        }

        /*エクポート機能*/
        public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('gender') && $request->gender !== '全て') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('inquiry')) {
            $query->where('inquiry', $request->inquiry);
        }

        if ($request->filled('create_date')) {
            $query->whereDate('created_at', $request->create_date);
        }

        $contacts = $query->get();

        $response = new StreamedResponse(function() use ($contacts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問合せの種類', 'お問合せ内容']);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->first_name . ' ' . $contact->last_name,
                    $contact->gender,
                    $contact->email,
                    $contact->tell1,
                    $contact->address,
                    $contact->building,
                    $contact->inquiry,
                    $contact->content
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }
       
        /*モーダブルウィンドウ*/
        public function show($id)
        {
            $contact = Contact::findOrFail($id);
            return view('admin_show', compact('contact'));
        }

        public function delete($id)
        {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect('/admin')->with('success', '削除に成功しました');
        }
    }

