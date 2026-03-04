<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\portofolio;
use App\Models\Project;
use App\Models\Contact;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portofolios = Portofolio::latest()->get();
        $projects = Project::latest()->get();
        return view('admin.portofolio.index', compact('portofolios', 'projects'));
    }


    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jps,png,jpeg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portofolio','public');
        }

        Portofolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link
        ]);

        return redirect()->route('portofolio.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        return view ('admin.portofolio.edit', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portofolio', 'public');
            $portofolio->image = $imagePath;
        }

        $portofolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect()->route('portofolio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(portofolio $portofolio)
    {
        $portofolio->delete();
        return back();
    }
}
