@extends('layout.main')
@include('common.errors')

@section('content')
    <div class="container">
        <div class="col-large-8">
            <div class="panel panel-default">
                {{-- change to bootstrap accordian --}}
                <div class="panel-heading">
                    Add A New Book For Review
                    <a href="#" class="btn btn-xs"></a>
                </div>

                <div class="panel-body">

                    {{-- todo move to its own blade --}}
                    <!-- New book Form -->
                    <form action="/bookAdd" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- book Name -->
                        <div class="form-group">
                            <div class=row>
                                <label for="name" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" >
                                </div>
                            </div>

                            <div class=row>
                                <label for="author" class="col-sm-3 control-label">Author</label>
                                <div class="col-sm-6">
                                    <input type="text" name="author" id="author" class="form-control">
                                </div>
                            </div>

                            <div class=row>
                                <label for="date_published" class="col-sm-3 control-label">Date Published</label>
                                <div class="col-sm-6">
                                    <input type="date" name="date_published" id="date_published" class="form-control">
                                </div>
                            </div>

                            <div class=row>
                                <label for="photo" class="col-sm-3 control-label">Photo</label>
                                <div class="col-sm-6">
                                    <input type="text" name="photo" id="photo" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Add book Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add book
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @yield('bookList');
        </div>
    </div>
@endsection