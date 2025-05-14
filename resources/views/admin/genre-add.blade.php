<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        
    </head>
    <body class="antialiased">       
            <h2>Add a Genre</h2>
            Link to <a href="{{route('admin.index')}}">Admin Page</a>
            <form class="form-new-product form-style-1" action="{{route('admin.genre.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <fieldset class="name">
                        <div class="body-title">Genre Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Genre Name" name="name">
                    </fieldset>
                    @error('name') <span class="alert alert-danger text-center">{{$message}} </span> @enderror
                                        
                    <div class="bot">
                        <div></div>
                        <button class="btn btn-success" type="submit">Add</button>
                    </div>
                </form>
    </body>
</html>

