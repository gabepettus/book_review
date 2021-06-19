@extends('books.book')

@section('review')
    <div class="container">
        
    <div class="col-large-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add Your Own Review
            </div>
    
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')
    
                <!-- New Review Form -->
                <form action="/review" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
    
                    <!-- Review Name -->
                    <div class="form-group colla">
                        <div class=row>
                            <label for="title" class="col-sm-3 control-label">Title Review</label>
                            <div class="col-sm-6">
                            <input type="text" name="title" id="title" class="form-control" >
                            </div>
                        </div>
                        <div class=row>
                            <label for="stars" class="col-sm-3 control-label">Rating</label>
                            <div class="col-sm-4">
                                <fieldset>
                                    <div class="rating effect">
                                        <input type="radio" id="rating-1" name="rating" value="1" /> <label class="stars" for="rating-1">☆</label>
                                        <input type="radio" id="rating-2" name="rating" value="2" /> <label class="stars" for="rating-2">☆</label>
                                        <input type="radio" id="rating-3" name="rating" value="3" checked="checked"/> <label class="stars" for="rating-3">☆</label>
                                        <input type="radio" id="rating-4" name="rating" value="4" /> <label class="stars" for="rating-4">☆</label>
                                        <input type="radio" id="rating-5" name="rating" value="5" /> <label class="stars" for="rating-5">☆</label> 
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class=row>
                            <label for="review" class="col-sm-3 control-label">Review</label>
                            <div class="col-sm-6">
                                <textarea name="review" id="review" class="form-control" placeholder="I loved it. It was better than cats."></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="book_id" id="book_id" for="book_id" value="{{ $book->id }}">

                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Review
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @yield('reviews');
@endsection