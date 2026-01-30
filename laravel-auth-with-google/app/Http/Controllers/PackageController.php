<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use App\Models\User;
use App\Notifications\PackageApprovalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PackageController extends Controller
{
    // show package
    public function create()
    {
        return view('packages.create');
    }

    // pacjage save
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        // save package as pending
        $package = TourPackage::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => 0, // Pending
            'user_id' => Auth()->user()->id,
        ]);

        // notification make
        $details = [
            'package_name' => $package->title,
            'editor_name' => auth()->user()->name,
            'action_url' => url('/admin/packages/' . $package->id),
        ];

        // send notification to all admins
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new PackageApprovalNotification($details));

        return back()->with('success', 'package created and pending approval.');
    }
}
