@extends('layouts.user-frontend.user-dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">

    <style>
        input[type="text"] {
            width: 100%;
        }

    </style>
@endsection
@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="page_title">{!! $page_title  !!} </h3>
            <hr>
        </div>
    </div>


    {!! Form::open(['method'=>'post','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
    <div class="form-body full_input_types">

        <div class="row">
            
                               
                                    
            <div class="col-md-10 col-md-offset-1">

                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;"> Bitcoin Wallet :</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" name="" id="" value="" class="form-control input-lg" placeholder="">
                    </div>
                </div>
</div>

                
                                
                                    </div>
                        </div>
                    
                    <!--- BANK ACCOUNT -->
                    
                       <div class="form-body full_input_types">

        <div class="row">
            
                               
                                    
            <div class="col-md-10 col-md-offset-1">

                <div class="form-group">
                    <label class="col-md-8  col-md-offset-2"><strong style="text-transform: uppercase;"> Bank :</strong></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" name="" id="" value="" class="form-control input-lg" placeholder="">
                    </div>
                </div>
</div>

                
                                
                                    </div>
                        </div>
                    
                    <!---END -->

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn blue btn-block btn-lg bold"><i class="fa fa-send"></i> UPDATE WALLET</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    {!! Form::close() !!}

@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>

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
