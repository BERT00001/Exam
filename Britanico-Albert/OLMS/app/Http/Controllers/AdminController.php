<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /** Fetch Data to Admin Page | Users **/
    public function AdminDashboard()
    {
        $Fetchdata = User::all();
        return view('Dashboard', ['Fetch' => $Fetchdata]);
    }

    public function updateStatus(Request $request, $id)
    {
        $checkdb = User::findOrFail($id);

        // Check to the db if status is Active | Inactive
        if ($checkdb->status == 'Active') {
            $checkdb->status = 'Deactive';
        } else {
            $checkdb->status = 'Active';
        }

        $checkdb->save();
        return redirect()->route('Dashboard');
    }

}