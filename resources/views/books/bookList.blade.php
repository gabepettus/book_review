@extends('books.bookAdd')

@section('bookList')
    <div class="col-large-8">
        <!-- Current books -->
        @if (count($books) > 0)

            <div class="panel panel-default">
                <div class="panel-heading">
                    Reviewed Books
                </div>

                <div class="panel-body">
                    <table class="table book-table">
                        <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publish Data</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="table-text"><div>{{ $book->name }}</div></td>
                                    <td class="table-text"><div>{{ $book->author }}</div></td>
                                    <td class="table-text"><div>{{ $book->date_published }}</div></td>

                                    <!-- book details Button -->
                                    <td>
                                        <form action="{{url('bookDetail/' . $book->id)}}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" id="book-{{ $book->id }}" class="btn">
                                                <i class="fa fa-btn"></i>Details
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection