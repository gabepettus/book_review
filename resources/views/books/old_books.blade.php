@extends('books.landingPage')
@include('common.errors')

@section('booklist')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Books -->
        dd($books)
        {{-- @if (count($books) > 0) --}}
        @if (-1 > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current books
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Book</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="table-text"><div>{{ $book->name }}</div></td>

                                <!-- Book Delete Button -->
                                <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <p> Please add a book to review </p>

        @endif

    </div>
</div>
@endsection