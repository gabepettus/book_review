@extends('reviews.review')

@section('reviews')
    <div class="container">
        @if (count($reviews) > 0)

            <div class="panel panel-default">
                <div class="panel-heading">
                    Existing Reviews
                </div>
                <div class="panel-body">
                    <table class="table table-striped book-table">
                        <thead>
                            <th>Existing Reviews</th>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review-> reviewer }}<td>
                                    <td class="table-text"><div>{{ $review-> rating }}</div></td>
                                    <td class="table-text"><div>{{ $review-> title}}</div></td>
                                    <td class="table-text"><div>{{ $review-> review}}</div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p> Be the first to review </p>
        @endif
    </div>
@endsection