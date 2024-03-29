@extends('layouts.user-frontend.user-dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="page_title">{!! $page_title  !!} </h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="col-sm-12 text-center">
                <div class="panel panel-primary panel-pricing">
                    <div style="padding: 10px" class="panel-heading">
                        <h3 style="font-size: 28px;"><b>{{ $plan->name }}</b></h3>
                    </div>
                    <div style="font-size: 18px;padding: 18px;" class="panel-body text-center">
                        <p><strong>{{ $plan->minimum }} {{ $basic->currency }} - {{ $plan->maximum }} {{ $basic->currency }}</strong></p>
                    </div>
                    <ul style='font-size: 15px;' class="list-group text-center bold">
                        <li class="list-group-item"><i class="fa fa-check"></i> Commission - {{ $plan->percent }} <i class="fa fa-percent"></i> </li>
                        <li class="list-group-item"><i class="fa fa-check"></i> Repeat - {{ $plan->time }} Cycle </li>
                        <li class="list-group-item"><i class="fa fa-check"></i> Compound - <span class="aaaa">{{ $plan->compound->name }}</span></li>
                    </ul>
                    <div class="panel-footer" style="overflow: hidden">
                        <div class="col-sm-12">
                            <a href="{{ route('investment-new') }}" class="btn btn-primary bold uppercase btn-block btn-icon icon-left">
                                <i class="fa fa-arrow-left"></i> Go Back Product Page
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->

                <!-- panel head -->
                <div class="panel-heading">
                    <div class="panel-title bold uppercase"><i class="fa fa-eye"></i> <strong>{{ $page_title }}</strong></div>
                </div>
                <!-- panel body -->
                <div class="panel-body">
                    <div class="text-center">
                        <h3 class="bold uppercase">Current Balance : <strong>{{ round(Auth::user()->balance, $basic->deci) }} - {{ $basic->currency }}</strong></h3>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="form-group">
                            <label style="margin-top: 5px;font-size: 14px;" class="col-sm-4 text-right col-sm-offset-1 bold uppercase">Investment Amount : </label>

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" value="" name="amount" id="amount" class="form-control bold" placeholder="Enter Invest Amount" required>
                                    <span class="input-group-addon">&nbsp;<strong>{{ $basic->currency }}</strong></span>
                                    <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <div id="result"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold uppercase" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i> Confirmation..!</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Sponsor this Product.?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('investment-submit') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="amount" class="abir_id" value="0">
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="button" class="btn btn-default bold uppercase" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-success bold uppercase"><i class="fa fa-check"></i> Yes I'm Sure..!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('script')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });
        });
    </script>

    <script type='text/javascript'>

        jQuery(document).ready(function(){
            $('#amount').on('input', function() {
                var amount = $("#amount").val();
                var plan = $("#plan").val();
                $.post(
                        '{{ url('/user/invest-amount-chk') }}',
                        {
                            _token: '{{ csrf_token() }}',
                            amount : amount,
                            plan : plan
                        },
                        function(data) {
                            $("#result").html(data);
                        }
                );
            });
        });
    </script>

@endsection

