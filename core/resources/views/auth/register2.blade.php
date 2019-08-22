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
                        <h1>Bank Details - Step 2</h1>
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
                           
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Full Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your Full Name"/>
                                    </div>
                                </div>
                            </div>
<div class="form-group">
            <label for="description">Bank Name</label>
            <select class="form-control" name="bank">
                <option {{{ (isset($register->bank) && $register->bank == 'Apple') ? "selected=\"selected\"" : "" }}}>Apple</option>
                <option {{{ (isset($register->bank) && $register->bank == 'Google') ? "selected=\"selected\"" : "" }}}>Google</option>
                <option {{{ (isset($register->bank) && $register->bank == 'Mi') ? "selected=\"selected\"" : "" }}}>Mi</option>
                <option {{{ (isset($register->bank) && $register->bank == 'Samsung') ? "selected=\"selected\"" : "" }}}>Samsung</option>
            </select>
        </div>
                            
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Account Number</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email" required placeholder="Enter your Account No:"/>
                                    </div>
                                </div>
                            </div>

                           
  

         
                            @if($basic->google_recap == 1)
                            <div class="form-group">
                                <div class="cols-sm-10">
                                    {!! app('captcha')->display() !!}
                                </div>
                            </div>
                            @endif

                            <div class="form-group ">
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Preview Details</button>
                            </div>
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
