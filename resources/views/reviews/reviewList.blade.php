@extends('reviews.reviewAdd')

@section('reviews')
    <div class="col-large-8">
        @if (count($reviews) > 0)

            <div class="panel panel-default">
                <div class="panel-heading">
                    Existing Reviews
                </div>
                <div class="panel-body">
                    <table class="table table-striped book-table">
                        <thead>
                            <th>Reviewer</th>
                            <th>Rating</th>
                            <th>Title</th>
                            <th>Review</th>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td><div>{{ $review-> reviewer }}<div></td>
                                    <td class="table-text">
                                        <div>
                                            @for ($i=0;$i < $review-> rating; $i=$i+1)
                                            ☆
                                            @endfor
                                        </div>
                                    </td>
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