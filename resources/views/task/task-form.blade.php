@extends('layouts.login-index')
@section('content')
<div class="container">
<form action="/task/create" method="POST">
    @csrf
<div class="mb-3">
  <label for="exampleTitle1" class="form-label">Title</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleTitle1" placeholder=" Task title" name="title">
  @error('title') <p class="alert alert-danger">{{$message}}</p>  @enderror

</div>
<div class="mb-3">
  <label for="exampleFormControlDescription1" class="form-label" placeholder="description">Description</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlDescription1" rows="3" name="description"></textarea>
  @error('description') <p class="alert alert-danger">{{$message}}</p>  @enderror

</div>
<div class="mb-3">
  <label for="exampleFormControlDate1" class="form-label">Due date</label>
  <input type="date" class="form-control @error('date') is-invalid @enderror" id="exampleFormControlDate1" name="due_date">
  @error('due_date') <p class="alert alert-danger">{{$message}}</p>  @enderror

</div>
<div class="mb-3">
  <label for="exampleFormControlCategory1" class="form-label">Category</label>
  <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" name="category">
  <option value="0">Select</option>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->category}}</option>
  @endforeach 
</select></div>
@error('category') <p class="alert alert-danger">{{$message}}</p>  @enderror

<br>
<div style="text-align:center">
<button class="btn btn-info" type="submit">Submit</button>
</div>
</form>
</div>
@endsection