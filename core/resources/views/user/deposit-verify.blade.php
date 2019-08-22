@extends('layouts.user-frontend.user-dashboard')
@section('style')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="page_title">Deposit Fund  </h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12 text-center">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 style="font-size: 28px;"><b>
                         
                        </b></h3>
                </div>
                

                <!-- panel head -->
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-money"></i> <strong>{{ $page_title }}</strong></div>
                </div>
               

                 
                </div>
            </div>
        </div>
    </div>


@endsection
