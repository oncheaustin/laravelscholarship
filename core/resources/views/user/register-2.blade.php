@extends('layouts.user-frontend.user-dashboard')
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
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!!  $error !!}
                                </div>
                            @endforeach
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('register-2') }}">
                            {{ csrf_field() }}
                           
                           

        <div class="form-group">
            <label for="description">Upload passport</label>
            <input type="file" {{ (!empty($register->passportImg)) ? "disabled" : ''}} class="form-control-file" name="passportimg" id="passportimg" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>

          <div class="form-group">
            <label for="description">Upload Admission Letter</label>
            <input type="file" {{ (!empty($register->letterImg)) ? "disabled" : ''}} class="form-control-file" name="letterimg" id="letterimg" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>

            <div class="form-group">
            <label for="description">Upload ID(Optional)</label>
            <input type="file" {{ (!empty($register->idImg)) ? "disabled" : ''}} class="form-control-file" name="idimg" id="idimg" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>

                <div align="center">
                    <h4> Bank Details </h4>
                </div>           


                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Full Name:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="fname" id="fname" required placeholder="Enter your Full name"/>
                                    </div>
                                </div>
                            </div>
              <div class="form-group">
            <label for="description">Bank Name:</label>
            <select class="form-control" name="level">
                <option {{{ (isset($register->bank) && $register->bank == 'Access Bank') ? "selected=\"selected\"" : "" }}}>Access Bank</option>
                <option {{{ (isset($register->bank) && $register->bank == 'First Bank') ? "selected=\"selected\"" : "" }}}>First Bank</option>
                <option {{{ (isset($register->bank) && $register->bank == 'Mi') ? "selected=\"selected\"" : "" }}}>Mi</option>
                <option {{{ (isset($register->bank) && $register->bank == 'Samsung') ? "selected=\"selected\"" : "" }}}>Samsung</option>
            </select>
        </div>   

                                <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Account No:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bank fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="accountno" id="accountno" required placeholder="Enter your Account No"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Submit/Make Payment</button>
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
