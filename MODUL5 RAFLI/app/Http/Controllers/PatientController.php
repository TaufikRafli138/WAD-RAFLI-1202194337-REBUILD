<?php

namespace App\Http\Controllers;


use Database;
use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PatientController extends Controller
{
      /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $patient = Patient::latest()->paginate(10);
        return view('patient.index', compact('patient'));
    }
    public function Daftar_Vaksin()
    {
        $vaccine = Vaccine::latest()->paginate(20);
        return view('patient.Daftar_List_pasien', compact('vaccine'));
    }
    public function history()
    {
        $patient = Patient::with('vaccine')->get();
        $vaccine = Vaccine::all();
        return view('patient.patient_history', compact('patient'), compact('vaccine'));
    }
        /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'vaccine_id'   => 'required',
           'name'   => 'required',
           'nik'   => 'required',
           'alamat' => 'required',
           'image_ktp' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $image = $request->file('image_ktp');
        $image->storeAs('public/patients', $image->hashName());
        $patient = Patient::create([
            'vaccine_id'     => $request->vaccine_id,
            'name'     => $request->name,
            'nik'     => $request->nik,
            'alamat'     => $request->alamat,
            'no_hp'    => $request->no_hp,
            'image_ktp'    => $image->hashName()
        ]);
        if ($patient) {
            return redirect()->route('PasienKopid.index')->with(['success' => 'Berhasil Menambahkan Patient']);
        } else {
            return redirect()->route('PasienKopid.index')->with(['error' => 'Gagal Menambahkan Patient']);
        }
    }
        
    public function edit(Patient $PasienKopid)
    {
        return view('patient.Update_Pasien', compact('PasienKopid'));
    }

    public function destroy(Patient $PasienKopid)
    {
        $patient = Patient::findOrFail($PasienKopid->id);
        Storage::disk('local')->delete('public/storage/patients/' . $PasienKopid->image_ktp);
        $patient->delete();

        if ($patient) {
            return redirect()->route('PasienKopid.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('PasienKopid.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function update(Request $request, Patient $PasienKopid)
    {
       $this->validate($request, [
           'vaccine_id'   => 'required',
           'name'   => 'required',
           'nik'   => 'required',
           'alamat' => 'required',
           'image_ktp' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $patient = Patient::findOrFail($PasienKopid->id);
        if ($request->file('image_ktp') == "") {
            $patient->update([
                'vaccine_id'     => $request->vaccine_id,
                'name'     => $request->name,
                'nik'     => $request->nik,
                'alamat'     => $request->alamat,
                'no_hp'    => $request->no_hp
            ]);
        } else {
            Storage::disk('local')->delete('public/storage/patients/' . $PasienKopid->image_ktp);
            $image = $request->file('image_ktp');
            $image->storeAs('public/patients', $image->hashName());
            $patient->update([
                'vaccine_id'     => $request->vaccine_id,
                'name'     => $request->name,
                'nik'     => $request->nik,
                'alamat'     => $request->alamat,
                'no_hp'    => $request->no_hp,
                'image_ktp' => $image->hashName()
            ]);
        }

        if ($patient) {
            return redirect()->route('PasienKopid.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('PasienKopid.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
