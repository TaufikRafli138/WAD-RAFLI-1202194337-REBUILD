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
            margin-bottom: 100px;
        }
    </style>
</head>
<body>
@include('Base.YunitaMarsindiituNamaCewekkuBang')
@include('Base.navbaratas')
<br><br>
    <h1 style="text-align: center;">Daftar Vaksin Yang Tersedia</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ url('CIEVAKSIN/TambahDataVaksin') }}" class="btn btn-md btn-outline-secondary mb-3">Tambah Data Vaksin</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($vaccine as $vaccinez)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $vaccinez->name }}</td>
                                <td>@Sayasukauang($vaccinez->price)</td>
                                <td>{{ $vaccinez->description }}</td>
                                 <td class="text-center">
                                        <img src="{{ Storage::url('/vaccines/'.$vaccinez->image) }}" class="rounded" style="width: 100px">
                                </td>
                                <td class="text-center">
                                        <form onsubmit="return confirm('Data Vaksin akan Dihapus. Tetap Lanjutkan?');" action="{{ route('CIEVAKSIN.destroy', $vaccinez->id) }}" method="POST">
                                            <a href="{{ route('CIEVAKSIN.edit', $vaccinez->id) }}" class="btn btn-sm btn-primary btn-block mb-2">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-block">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      <marquee scrollamount='25'><center><h4>Tidak Ada Data Vaksin Yang Tersedia</h4></center></marquee>
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $vaccine->links() }}
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
            toastr.success('{{ session('success') }}', 'DATA Telah Dihapus !'); 
        @elseif(session()-> has('error'))
            toastr.error('{{ session('error') }}', 'Contact Your Administrator!'); 
        @endif
    </script>
</body>
</html>