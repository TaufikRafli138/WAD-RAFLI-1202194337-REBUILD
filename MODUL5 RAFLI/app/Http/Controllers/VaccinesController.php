<?php

namespace App\Http\Controllers;

use Database;
use App\Models\Vaccine; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VaccinesController extends Controller
{
    public function index()
    {
        $vaccine = Vaccine::latest()->paginate(10);
        return view('vaccine.index', compact('vaccine'));
    }
    public function TambahDataVaksin(){
        return view('vaccine.insert');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
           'name'   => 'required',
           'price'   => 'required',
           'description'   => 'required',
           'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $image = $request->file('image');
        $image->storeAs('public/vaccines', $image->hashName());
        $vaccine = Vaccine::create([
            'name'     => $request->name,
            'price'     => $request->price,
            'description'     => $request->description,
            'image'    => $image->hashName()
        ]);

        if ($vaccine) {
            return redirect()->route('CIEVAKSIN.index')->with(['success' => 'Berhasil Menambahkan Data Vaksin ']);
        } else {
            return redirect()->route('CIEVAKSIN.index')->with(['error' => 'ERROR 400 | Bad Request ']);
        }
    }
    
    public function edit($id)
    {
        $vaccine = Vaccine::FindOrFail($id);
        return view('vaccine.Update', compact('vaccine'));
    }


    public function destroy($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        Storage::disk('local')->delete('public/storage/vaccines/' . $vaccine->image);
        $vaccine->delete();

        if ($vaccine) {
            return redirect()->route('CIEVAKSIN.index')->with(['success' => 'Data Vaksin Dihapus!']);
        } else {
            return redirect()->route('CIEVAKSIN.index')->with(['error' => 'ERROR 400 | Bad Request']);
        }
    }


    public function update(Request $request, $id) 
    {
       $this->validate($request, [
            'name'   => 'required',
            'price'   => 'required',
            'description'   => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $vaccine = Vaccine::findOrFail($id);
        if ($request->file('image') == "") {
            $vaccine->update([
                'name'     => $request->name,
                'price'     => $request->price,
                'description'     => $request->description,
            ]);

        } else {
            Storage::disk('local')->delete('public/storage/vaccines/' . $vaccine->image);
            $image = $request->file('image');
            $image->storeAs('public/vaccines', $image->hashName());
            $vaccine->update([
                'name'     => $request->name,
                'price'     => $request->price,
                'description'     => $request->description,
                'image'    => $image->hashName()
            ]);
        }
        if ($vaccine) {
            return redirect()->route('CIEVAKSIN.index')->with(['success' => 'Data Vaksin Diupdate!']);
        } else {
            return redirect()->route('CIEVAKSIN.index')->with(['error' => 'ERROR 400 | Bad Request']);
        }
    }
}
