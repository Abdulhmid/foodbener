@extends('layouts.app')
 
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <!-- <div class="pull-left">
                <h2>Laravel 5.8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div> -->
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($news as $new)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $new->title }}</td>
            <td>{{ $new->slug }}</td>
            <td>{{ $new->content }}</td>
            <td>
                <form action="{{ route('news.destroy',$new->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('news.show',$new->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('news.edit',$new->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $news->links() !!}
  </div>
</section>
      
@endsection