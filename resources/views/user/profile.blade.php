@extends('layouts.login-index')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<section class="vh-100" style="background-color: #f4f5f7;">
 <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://th.bing.com/th?id=OIP.0CZd1ESLnyWIHdO38nyJDAAAAA&w=275&h=226&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2"
                alt="Avatar" class="img-fluid my-5" style="width: 160px; height;200px" />
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-12">
              <div class="card-body p-4">
                <h6>ABOUT ME</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>User ID</h6>
                    <p class="text-muted">{{auth()->user()->id}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Name</h6>
                    <p class="text-muted">{{auth()->user()->name}}</p>
                  </div>
                </div>
              
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{auth()->user()->email}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection