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
            <h2>Home Page</h2>       
            Link to <a href="{{route('admin.index')}}">Admin Page</a>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Film Name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Poster</th>                                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishedfilms as $film)
                        <tr>
                            <td>{{$film->name}}</td>
                            <td>
                            @foreach($film->genres()->orderByDesc('created_at')->get() as $genre)
                                {{ $genre->name }};<br>
                            @endforeach
                            </td>
                                                
                            <td><img src="{{asset('posters')}}/{{$film->link}}"style="max-width:150px"></td>
                            
                        </tr>                
                    @endforeach
                </tbody>
            </table>
        
        </div>
    </body>
</html>