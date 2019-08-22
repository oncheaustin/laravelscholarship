@extends('layouts.user-frontend.user-dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">

    <style>
        input[type="text"] {
            width: 100%;
        }

        input[type="email"] {
            wi
        }
    </style>
@endsection
@section('content')


     <!--header section start-->
    <section style="background-image: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}')" class="breadcrumb-section contact-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>{{ $page_title}}</h2>
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

    {!! Form::open(['method'=>'post','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
    <div class="form-body full_input_types">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;"></strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" name="name" id="" value="{{ $user->name }}" class="form-control input-lg" required readonly="" placeholder="Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;"></strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" name="username" id="" value="{{ $user->username }}" class="form-control input-lg" required readonly hidden placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;">Upload Passport :</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                <img style="width: 200px" src="{{ asset('assets/images') }}/{{ $user->image }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;">Upload Admission Letter :</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                <img style="width: 200px" src="" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image2" accept="image2/*">
                                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;"></strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" name="email" id="" value="{{ $user->email }}" class="form-control input-lg" required  hidden>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;"></strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" name="phone" id="" value="{{ $user->phone }}" class="form-control input-lg" required hidden placeholder="Phone">
                    </div>
                </div>
                
                
                    
                <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="page_title">{!! $page_title2  !!} </h3>
            <hr>
        </div>
    </div>
                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;">
                        Bank:</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" name="bank" id="" value="{{ $user->bank }}" class="form-control input-lg" required placeholder="Bank">
                    </div>
                </div>

    <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;">
                        Account No :</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" name="account_no" id="" value="{{ $user->account_no }}" class="form-control input-lg" required placeholder="Account Number">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;">
                        Account Name :</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" name="account_name" id="" value="{{ $user->account_name }}" class="form-control input-lg" required placeholder="Account Name">
                    </div>
                </div>
                
                
                
                
                
                
                 <div class="form-group ">
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Next>></button>
                            </div>

         
            </div>
        </div>

    </div>
    {!! Form::close() !!}

       </div>
                </div>
            </div>
        </div>
    </div>

    <!--login section end-->
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>

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

    @if (session('message'))

        <script type="text/javascript">

            $(document).ready(function(){

                swal("Success!", "{{ session('message') }}", "success");

            });

        </script>

    @endif



    @if (session('alert'))

        <script type="text/javascript">

            $(document).ready(function(){

                swal("Sorry!", "{!! session('alert') !!}", "error");

            });

        </script>

    @endif
@endsection
