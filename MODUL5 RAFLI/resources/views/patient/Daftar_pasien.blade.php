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
    <title>Tambah Data Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel = "icon" href = 
"https://kkpyogyakarta.com/img/logo-kemenkes.png" 
        type = "image/x-icon">
</head>
<body>
@include('Base.YunitaMarsindiituNamaCewekkuBang')
@include('Base.Navbaratas')
<br><br>
    <h1 style="text-align: center;">Create Patient</h1>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('PasienKopid.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Vaccine ID</label>
                                <input type="text" readonly class="form-control @error('vaccine_id') is-invalid @enderror" name="vaccine_id" value="{{ old('vaccine_id',$id) }}" placeholder="Enter Vaccine ID">
                                @error('vaccine_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group mb-2">
                                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="inlineFormInputGroup" placeholder="Input Name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div>
                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <div class="input-group mb-2">
                                    <input name="nik" type="text" class="form-control  @error('nik') is-invalid @enderror" id="inlineFormInputGroup" placeholder="Input NIK" value="{{ old('nik') }}">
                                </div>
                                @error('nik')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                           <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Patient Alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <div class="input-group mb-2">
                                    <input name="no_hp" type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="inlineFormInputGroup" placeholder="081xxxxx" value="{{ old('no_hp') }}">
                                </div>
                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Image KTP</label>
                                <input type="file" class="form-control @error('image_ktp') is-invalid @enderror" name="image_ktp">
                                @error('image_ktp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <center>
                            <button type="submit" class="btn btn-md btn-outline-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-outline-secondary">RESET</button>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>