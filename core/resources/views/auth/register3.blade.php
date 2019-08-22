@extends('layouts.fontEnd')
@section('content')

    <!--header section start-->
    <section style="background-image: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}')" class="breadcrumb-section contact-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>{{ $page_title}}</h1>
                </div>
            </div>
        </div>
    </section><!--Header section end-->


    <!--login section start-->
    <div class="login-section section-padding login-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="main-login main-center">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo Image Will Be Here" style="max-width: 266px;"></a>
                        <br>
                        <h1>Preview & Create Profile - Step 3</h1>
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!!  $error !!}
                                </div>
                            @endforeach
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                           
                            <table class="table">
            <tr>
                <td>Full Name:</td>
                <td><strong>{{$register->name}}</strong></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><strong>{{$register->email}}</strong></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><strong>{{$register->phone}}</strong></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><strong>{{$register->gender ? 'Male' : 'Female'}}</strong></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><strong>{{$register->state}}</strong></td>
            </tr>
            <tr>
                <td>Local Government:</td>
                <td><strong>{{$register->lg}}</strong></td>
            </tr>
            <tr>
                <td>Course of Study:</td>
                <td><strong>{{$register->course}}</strong></td>
            </tr>
              <tr>
                <td>Level:</td>
                <td><strong>{{$register->level}}</strong></td>
            </tr>
             <tr>
                <td>About Yourself:</td>
                <td><strong>{{$register->description}}</strong></td>
            </tr>
            <tr>
                <td>Passport:</td>
                <td><strong><img alt="Passport Image" src="/storage/productimg/{{$register->passportImg}}"/></strong></td>
            </tr>
            <tr>
                <td>Admission Letter:</td>
                <td><strong><img alt="Letter Image" src="/storage/letterimg/{{$register->letterImg}}"/></strong></td>
            </tr>
            
        </table>
        <a type="button" href="/products/create-step1" class="btn btn-warning">Back to Step 1</a>
        <a type="button" href="/products/create-step2" class="btn btn-warning">Back to Step 2</a>
        <button type="submit" class="btn btn-primary">Create Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login section end-->
  
@endsection

  @section('script')
    
    <script language="javascript">
$("a").click(function() {
    $("#termview").toggle();
});
</script>
<style type="text/css">
.panel.panel-body.register-form {
    width: 600px !important;
    margin: 0 auto !important;
}
</style>
@endsection
