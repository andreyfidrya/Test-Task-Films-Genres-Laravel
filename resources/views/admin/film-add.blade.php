<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add a Film</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script language=javascript>
            function previewFile(){
                var preview = document.querySelector('img');
                var file  = document.querySelector('input[type=file]').files [0];
                var reader = new FileReader();
                reader.onloadend = function () {
                preview.src = reader.result;
                }
                if (file) {
                reader.readAsDataURL(file);
                } else {
                preview.src = "";
                }
            }
        </script>
    </head>
    <body class="antialiased">       
            <h2>Add a Film</h2>
            Link to <a href="{{route('admin.index')}}">Admin Page</a>
            <form class="form-new-product form-style-1" action="{{route('admin.film.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Film Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Film Name" name="name">
                </fieldset>
                @error('name') <span class="alert alert-danger text-center">{{$message}} </span> @enderror
                
                <fieldset class="genre">
                    <div class="body-title mb-10">Genre <span class="tf-color-1">*</span>
                    </div>
                    <select name="genres[]" multiple many-relation>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach                                                 
                    </select>                        
                </fieldset>
                @error('genres') <span class="alert alert-danger text-center">{{$message}} </span> @enderror
                    
                <fieldset>
                    <div>
                        <label for="file">Select film's poster</label>
                        <input name="file" class="form-control" type="file" onchange="previewFile()">
                        <img src="" alt="Image preview" style="max-width:150px;margin-top:20px;" id="img"/>
                    </div>
                </fieldset>
                                       
                <div class="bot">
                    <div></div>
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
    </body>
</html>

