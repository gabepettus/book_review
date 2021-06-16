{{-- {{ dd($books) }} --}}


@extends('bookList')
@include('common.errors')

@section('addbooks')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Book
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    {{--  New Book Form --}}
                    <form action="/book" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="book" class="col-sm-3 control-label">Book</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="book-name" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="author" id="book-author" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                {{-- TODO fix type --}}
                                <input type="text" name="datePublished" id="book-datePublished" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Book
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection