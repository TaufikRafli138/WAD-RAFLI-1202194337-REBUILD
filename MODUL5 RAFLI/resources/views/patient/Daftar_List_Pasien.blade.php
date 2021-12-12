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
@include('Base.Navbaratas')
<br><br>
    <h1 style="text-align: center;">Pilih Vaksin Yang Di inginkan</h1>
    <div class="container mt-5"> <center>   
        <div class="row">          
                              @foreach($vaccine as $vaccinez)
                              <div class="col-sm">
                                <div class="card1" style="width: 250px;">
                                <img src="{{ Storage::url('/vaccines/'.$vaccinez->image) }}" class="card-img-top" alt="{{ $vaccinez->name }}" width="70%" height="100px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $vaccinez->name }}</h5><hr>
                                    <h6 class="card-title">{{ $vaccinez->price }}</h6>
                                    <p class="card-text mb-5"> {{ $vaccinez->description }}</p>
                                    <a href="{{ url('PasienKopid/Tambah_Data_Pasien/'.$vaccinez->id) }}" class="btn btn-light btn-block">Pilih Vaksin</a>
                                </div>
                                </div>
                            </div>
                              @endforeach                    
        </div> </center>   
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session()-> has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()-> has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');  
        @endif
    </script>
</body>
</html>