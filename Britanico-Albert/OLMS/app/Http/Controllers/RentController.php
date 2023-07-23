<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userlibrary;


class RentController extends Controller
{
    /** User | Rent Show **/
    protected function RentBooks()
    {
        $books = Userlibrary::all();
        return view('User.RentBooks', ['Fetch' => $books]);
    }

    /** User | Borrowed Show **/
    protected function BorrowedBooks()
    {
        $user = Auth::user();
        $libraryIds = Userlibrary::pluck('id')->toArray();
        $currentBooksbr = json_decode($user->Booksbr, true) ?: [];
        $commonValues = array_intersect($currentBooksbr, $libraryIds);
        $commonBooks = Userlibrary::whereIn('id', $commonValues)->get();
        return view('User.Index', ['commonBooks' => $commonBooks]);
    }

    /** User | Borrow Books **/
    protected function BorrowAdd($id)
    {
         $userlibrary = Userlibrary::findOrFail($id);
         $user = Auth::user();
         $currentBooksbr = json_decode($user->Booksbr, true) ?: [];


      if (!in_array($userlibrary->id, $currentBooksbr)) 
      {
          $currentBooksbr[] = $userlibrary->id;
          $user->Booksbr = json_encode($currentBooksbr);
          $user->save();

          return redirect()->route('User.BorrowedBooks')->with('success', 'Book added successfully!');
    
      }else {
        return 'Duplicated Books';
      }   
    }

    /** User | Return Books **/
    protected function Return($id)
    {
      
        $user = Auth::user();
        $FindId = Userlibrary::findOrFail($id);
        $currentBooksbr = json_decode($user->Booksbr, true) ?: [];
        $index = array_search($FindId->id, $currentBooksbr);

      if ($index !== false) 
      {
          unset($currentBooksbr[$index]);
          $currentBooksbr = array_values($currentBooksbr);
          $user->Booksbr = json_encode($currentBooksbr);

          $user->save();

          return redirect()->route('User.BorrowedBooks')->with('success', 'Book returned successfully!');
        
      } else { 
          return 'Book not found';
      }      
    }

    /** User | Setting **/
    protected function Settings()
    {
        $Id = Auth::id();
        $user = User::find($Id);
        return view('User.Setting', ['usr' => $user]);
    }

    protected function USave(Request $request, $id)
    {
      $Change = User::findOrFail($id);
        $request->validate([
            'Name' => 'required|string',
            'Email' => 'required|string',
            'Password' => 'string|nullable',
        ]);

        $Change->Name = $request->input('Name');
        $Change->Email = $request->input('Email');
        $newPassword = $request->input('Password');

    if (!empty($newPassword)) 
    {
        $Change->Password = Hash::make($newPassword);
        $Change->save();   
    }        
      return View('Welcome');
    }

    protected function Disable(Request $request, $id)
    {
      $FindId = User::FindorFail($id);

      // Check to the db if status is Active | Inactive
        if ($FindId->status == 'Active') {
            $FindId->status = 'Deactive';
            $FindId->save();
            return ('Account is Deactivated!');
        } else {
            return ('Account is Active');
        }

    }
    
}