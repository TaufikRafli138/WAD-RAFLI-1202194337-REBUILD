<!-- ########################
###########################################
Nama :TAUFIK RAFLI MARGOCAHYO
Kelas : SI4303
NIM : 1202194337
!IMPORTANT DONT COPY THIS CODE WITHOUT PERMISSION 
HAVE A NICE DAY

###########################################
######################## -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
         <link rel = "icon" href = 
"https://kkpyogyakarta.com/img/logo-kemenkes.png" 
        type = "image/x-icon">
    <style>
        .container{
            margin-bottom: 120px;
        }
    </style>
</head>
<body>
@include('Base.YunitaMarsindiituNamaCewekkuBang')
@include('Base.NavbarAtas')
<br><br>
    <h1 style="text-align: center;">List Pasien</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('PasienKopid.suntik') }}" class="btn btn-md btn-outline-secondary mb-3">Tambah Data Pasien</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">ID_Vaksin</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Image KTP</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($patient as $patientz)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $patientz->vaccine_id }}</td>
                                <td>{{ $patientz->name }}</td>
                                <td>{{ $patientz->nik }}</td>
                                <td>{{ $patientz->alamat }}</td>
                                <td>{{ $patientz->no_hp }}</td>
                                 <td class="text-center">
                                        <img src="{{ Storage::url('/patients/'.$patientz->image_ktp) }}" class="rounded" style="width: 150px">
                                </td>
                                <td class="text-center">
                                        <form onsubmit="return confirm('Pasien Akan Di Kick Dari Data, Tega ?');" action="{{ route('PasienKopid.destroy', $patientz->id) }}" method="POST">
                                            <a href="{{ route('PasienKopid.edit', $patientz->id) }}" class="btn btn-sm btn-primary btn-block">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-block mt-2">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                       <marquee scrollamount='25'><center><h4>Tidak Ada Data Pasien Yang Terdaftar</h4></center></marquee>
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $patient->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session()-> has('success'))
            toastr.success('{{ session('success') }}', 'Berhasil Melakukan Perintah !!'); 
        @elseif(session()-> has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>
</body>
</html>