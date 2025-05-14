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
            <h2>Admin Page</h2>
            Link to <a href="{{route('home')}}">Home Page</a>
            <h4>All Films</h4>
            <a href="#" class="btn btn-success">Add a Film</a>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Film Name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Publication Status</th>
                        <th scope="col">Poster</th> 
                        <th scope="col">Action</th>                                   
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
                            <td>{{$film->publication_status}}</td>
                            @if($film->link)                    
                            <td><img src="{{asset('posters')}}/{{$film->link}}"style="max-width:150px"></td>
                            @else
                            <td><img src="{{asset('posters')}}/default-image.jpg"style="max-width:150px"></td>
                            @endif
                            <td>
                                <a href="#" class="btn btn-info">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>                                
                                @if($film->publication_status == 'unpublished')
                                    <a href="#" class="btn btn-success">Publish</a>  
                                @endif
                            </td>
                        </tr>                
                    @endforeach
                </tbody>
            </table>
            <h4>All Genres</h4>
            <a href="{{route('admin.genre.add')}}" class="btn btn-success">Add a Genre</a>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Genre Name</th>                         
                        <th scope="col">Action</th>                                   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allgenres as $genre)
                        <tr>
                            <td>{{$genre->name}}</td>                            
                            <td>
                                <a href="{{route('admin.genre.edit', ['id'=>$genre->id])}}" class="btn btn-info">Edit</a>
                                <form method="post" action="{{ route('admin.genre.delete', [ $genre->id ]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>                      
                            </td>
                        </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
