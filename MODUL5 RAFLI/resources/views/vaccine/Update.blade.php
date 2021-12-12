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
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <link rel = "icon" href = 
"https://kkpyogyakarta.com/img/logo-kemenkes.png" 
        type = "image/x-icon">
</head>

<body>
@include('Base.YunitaMarsindiituNamaCewekkuBang')
@include('Base.navbaratas')
<br><br>
    <h1 style="text-align: center;">Update Data Vaksin {{ old('name',$vaccine->name) }}</h1>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ url('CIEVAKSIN/update/'.$vaccine->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                             <div class="form-group">
                                <label>Name</label>
                                <div class="input-group mb-2">
                                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="inlineFormInputGroup" placeholder="Input Name" value="{{ old('name',$vaccine->name) }}">
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
                                <label>Harga</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input name="price" type="number" class="form-control  @error('price') is-invalid @enderror" id="inlineFormInputGroup" placeholder="Input Vaccine Price" value="{{ old('price',$vaccine->price) }}">
                                </div>
                            </div>
                            <div>
                                @error('price')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>                            
                           <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Description">{{ old('description', $vaccine->description) }}</textarea>
                                <!-- error message untuk content -->
                                @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>                       
                            <div class="form-group">
                                <label class="font-weight-bold">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
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