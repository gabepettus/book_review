@extends('layout.main')

@section('content')
    <div class="container">
        
        <!-- Current books -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Book Details
            </div>

            <div class="panel-body">
            {{--add image infront of panel  --}}
                {{-- <img src="{{URL::asset( $book->photo) }}" alt="Picture of Book Cover" height="200" width="200"> --}}
                <img src="/{{$book->photo}}" alt="Picture of Book Cover" height="200" width="200">

                <table class="table table-striped book-table">
                    <tbody>
                        <tr>
                            <td class="table-text"><div>Author</div></td>
                            <td class="table-text"><div>{{ $book->author }}</div></td>
                        </tr>
                        <tr>
                            <td class="table-text"><div>Name</div></td>
                            <td class="table-text"><div>{{ $book->name }}</div></td>
                        </tr>
                        <tr>
                            <td class="table-text"><div>Date</div></td>
                            <td class="table-text"><div>{{ $book->date_published }}</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @yield('reviewAdd')
</div>
@endsection