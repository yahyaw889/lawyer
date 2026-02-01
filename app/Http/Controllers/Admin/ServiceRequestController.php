<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ServiceRequest::latest()->paginate(10);
        return view('admin.pages.requests.index', compact('requests'));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        // Optional: Implement show details modal or page
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ServiceRequest::destroy($id);
        return back()->with('success', 'Request deleted successfully');
    }
}
