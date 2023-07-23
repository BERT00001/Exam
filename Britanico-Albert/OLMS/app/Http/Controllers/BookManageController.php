<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\AdminBook;

class BookManageController extends Controller
{
    public function AdminBook()
    {

        $Fetchdata = AdminBook::all();
        return view('BookManage',['Fetch' => $Fetchdata]);
    }

    /** Validate | Delete **/  
    protected function addBooks(Request $request)
    {
        $data = $request->validate([
            'Title' => 'required|string',
            'Author' => 'required|string',
            'Copies' => 'required|integer',
            "Borrowed" => 'required|integer',
        ]);

        $create = AdminBook::create($data);
        return redirect()->route('book.manage');
    
    }

    /** Delete | Books **/  
    protected function delete($id)
    {
        $FindId = AdminBook::findOrFail($id);

        if($FindId)
        {
          $FindId -> delete();
        }
          return redirect()->route('book.manage');
    }
   
    /** Check id | Edit **/   
    protected function check($id)
    {
        $FindId = AdminBook::findOrFail($id);
        session(['edited_book' => $FindId]);
        return View('EditBooks');
    }

    /** Validation | Input **/
    protected function update(Request $request, $id)
    {
        $Findbook = AdminBook::findOrFail($id);
        $request->validate([
            'Title' => 'required|string',
            'Author' => 'required|string',
            'Copies' => 'required|integer',
            "Borrowed" => 'required|integer',
        ]);

        /** Update | New Input **/
        $Findbook->Title = $request->input('Title');
        $Findbook->Author = $request->input('Author');
        $Findbook->Copies = $request->input('Copies');
        $Findbook->Borrowed = $request->input('Borrowed');
        $Findbook->save();
        return "Successful";
    }

}