@extends('books.book')

@section('reviews')
    <div class="container">
        
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Reviews
            </div>
    
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')
    
                <!-- New Review Form -->
                <form action="/review" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
    
                    <!-- book Name -->
                    <div class="form-group">
                        <div class=row>
                            <label for="review" class="col-sm-3 control-label">Add your own review</label>
                            <div class="col-sm-6">
                            <input type="text" name="review" id="review" class="form-control" >
                            </div>
                        </div>
                    </div>
    
                    <!-- Add review Button -->
                    <div class="form-group">
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
@endsection