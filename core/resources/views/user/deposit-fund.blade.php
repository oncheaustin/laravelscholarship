@extends('layouts.user-frontend.user-dashboard')
@section('content')



    <div class="row">
        <div class="col-md-12">
            <h3 class="page_title">{!! $page_title  !!} </h3>
            <hr>
        </div>
    </div>

@if($balance->balance >= 1000)
                            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Your Exam Access Code is:<strong> {!!$exam_code!!}</strong></h1><br>
                     <div class="input-group mb15">
                    <input type="text" class="form-control input-lg" id="ref" value="{!!$exam_code!!}"/><br>
                    <span class="input-group-btn">
                        <button data-copytarget="#ref" class="btn btn-success btn-lg">COPY CODE</button>
                    </span>
                </div>
                    <h2>Click on this link below to write your exam</h2><br>
                    <div><h3 class="text-color-5"><strong><a href="/exam/login" title="" target="">Write Exam</a></strong></h3><br>

</div>
                    
                </div>
            </div>
            
                            @else
                                <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Choose any payment method Below to Pay for your Scholarship Exam</h1></br>
                </div>
            </div>
                            @endif

    <div class="row">
        @if($paypal->status == 1)
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-paypal"></i> <strong>{{ $paypal->name }}</strong></div>

                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <img width="100%" class="image-responsive" src="{{ asset('assets/images') }}/{{ $paypal->image }}" alt="">
                    </div>
                    <div class="panel-footer">
                        <a href="javascript:;" onclick="jQuery('#modal-1').modal('show');" class="btn btn-primary btn-block btn-icon icon-lef bold uppercaset"><i class="fa fa-money"></i> ADD FUND</a>
                    </div>
                </div>
            </div>
        @endif
        @if($perfect->status == 1)
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-money"></i> <strong>{{ $perfect->name }}</strong></div>

                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <img width="100%" class="image-responsive" src="{{ asset('assets/images') }}/{{ $perfect->image }}" alt="">
                    </div>
                    <div class="panel-footer">
                        <a href="javascript:;" onclick="jQuery('#modal-2').modal('show');" class="btn btn-primary btn-block btn-icon icon-left bold uppercase"><i class="fa fa-money"></i> ADD FUND</a>
                    </div>
                </div>
            </div>
        @endif
        @if($btc->status == 1)
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-btc"></i> <strong>{{ $btc->name }}</strong></div>

                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <img width="100%" class="image-responsive" src="{{ asset('assets/images') }}/{{ $btc->image }}" alt="">
                    </div>
                    <div class="panel-footer">
                        <a href="javascript:;" onclick="jQuery('#modal-3').modal('show');" class="btn btn-primary btn-block btn-icon icon-left"><i class="fa fa-money"></i> ADD FUND</a>
                    </div>
                </div>
            </div>
        @endif
        @if($stripe->status == 1)
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-credit-card"></i> <strong>{{ $stripe->name }}</strong></div>

                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <img width="100%" class="image-responsive" src="{{ asset('assets/images') }}/{{ $stripe->image }}" alt="">
                    </div>
                    <div class="panel-footer">
                        <a href="javascript:;" onclick="jQuery('#modal-4').modal('show');" class="btn btn-primary btn-block btn-icon icon-left"><i class="fa fa-money"></i> PAY</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <hr>
    <div class="row">
        @foreach($bank as $b)
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-bank"></i> <strong>{{ $b->name }}</strong></div>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <img width="100%" class="image-responsive" src="{{ asset('assets/images') }}/{{ $b->image }}" alt="">
                    </div>
                    <div class="panel-footer">
                        <a href="javascript:;" onclick="jQuery('#modal-{{ $b->id }}').modal('show');" class="btn btn-primary btn-block btn-icon icon-left"><i class="fa fa-money"></i> PAY</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold uppercase"><i class="fa fa-cloud-download"></i> Add Fund via Paypal</h4>
                </div>
                {{ Form::open() }}
                <input type="hidden" name="payment_type" value="1">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <label style="font-size: 14px;margin-top: 30px;" class="col-sm-2 col-sm-offset-1 control-label"><strong>Amount : </strong></label>
                            <div class="col-sm-9">
                                <span style="margin-bottom: 10px;"><code>Deposit Charge : ({{ $paypal->fix }} + {{ $paypal->percent }} %) - {{ $basic->currency }}</code></span>
                                <div class="input-group" style="margin-top: 10px;margin-bottom: 10px;">
                                        <input type="number" value="" id="amount" name="amount" class="form-control" required />
                                        <span class="input-group-addon">&nbsp;<strong>{{ $basic->currency }}</strong></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button class="btn btn-primary btn-block bold uppercase"><i class="fa fa-send"></i> Add Fund</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-2">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold uppercase"><i class="fa fa-cloud-download"></i> Add Fund via Perfect Money</h4>
                </div>
                {{ Form::open() }}
                <input type="hidden" name="payment_type" value="2">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <label style="font-size: 14px;margin-top: 30px;" class="col-sm-2 col-sm-offset-1 control-label"><strong>Amount : </strong></label>
                            <div class="col-sm-9">
                                <span style="margin-bottom: 10px;"><code>Deposit Charge : ({{ $perfect->fix }} + {{ $perfect->percent }} %) - {{ $basic->currency }}</code></span>
                                <div class="input-group" style="margin-top: 10px;margin-bottom: 10px;">
                                        <input type="number" value="" id="amount" name="amount" class="form-control" required />
                                        <span class="input-group-addon">&nbsp;<strong>{{ $basic->currency }}</strong></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button class="btn btn-primary btn-block bold uppercase"><i class="fa fa-send"></i> Add Fund</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-3">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold uppercase"><i class="fa fa-cloud-download"></i> Add Fund via BTC - BlockChain</h4>
                </div>
                {{ Form::open() }}
                <input type="hidden" name="payment_type" value="3">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-size: 14px;margin-top: 30px;" class="col-sm-2 col-sm-offset-1 control-label"><strong>Amount : </strong></label>
                                <div class="col-sm-9">
                                    <span style="margin-bottom: 10px;"><code>Deposit Charge : ({{ $btc->fix }} + {{ $btc->percent }} %) - {{ $basic->currency }}</code></span>
                                    <div class="input-group" style="margin-top: 10px;margin-bottom: 10px;">
                                        <input type="number" value="" id="amount" name="amount" class="form-control" required />
                                        <span class="input-group-addon">&nbsp;<strong>{{ $basic->currency }}</strong></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button class="btn btn-primary btn-block bold uppercase"><i class="fa fa-send"></i> Add Fund</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold uppercase"><i class="fa fa-cloud-download"></i> Add Fund via Credit Card</h4>
                </div>
                {{ Form::open() }}
                <input type="hidden" name="payment_type" value="4">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-size: 14px;margin-top: 30px;" class="col-sm-2 col-sm-offset-1 control-label"><strong>Amount : </strong></label>
                                <div class="col-sm-9">
                                    <span style="margin-bottom: 10px;"><code>Deposit Charge : ({{ $stripe->fix }} + {{ $stripe->percent }} %) - {{ $basic->currency }}</code></span>
                                    <div class="input-group" style="margin-top: 10px;margin-bottom: 10px;">
                                        <input type="number" value="1000" id="amount" name="amount" class="form-control" readonly  required />
                                        <span class="input-group-addon">&nbsp;<strong>{{ $basic->currency }}</strong></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button class="btn btn-primary btn-block bold uppercase"><i class="fa fa-send"></i> Add Fund</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @foreach($bank as $b)


        <div class="modal fade" id="modal-{{ $b->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title bold"><i class="fa fa-cloud-download"></i> <strong>Add Fund via {{ $b->name }}</strong> </h4>
                    </div>
                    {{ Form::open() }}
                    <input type="hidden" name="payment_type" value="{{ $b->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-size: 14px;margin-top: 30px;" class="col-sm-2 col-sm-offset-1 control-label"><strong>Amount : </strong></label>
                                    <div class="col-sm-9">
                                        <span style="margin-bottom: 10px;"><code>Deposit Charge : ({{ $b->fix }} + {{ $b->percent }}%) - {{ $basic->currency }}</code></span>
                                        <div class="input-group" style="margin-top: 10px;margin-bottom: 10px;">
                                            <input type="number" value="1000" id="amount" name="amount" readonly class="form-control" required />
                                            <span class="input-group-addon">&nbsp;<strong>{{ $basic->currency }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button class="btn btn-primary btn-block bold uppercase"><i class="fa fa-send"></i> Add Fund</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    @endforeach

@endsection


@section('script')
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

                swal("Sorry!", "{{ session('alert') }}", "error");

            });

        </script>

    @endif
     <script src="{{ asset('assets/admin/js/clipboard.min.js') }}"></script>
     
      <script>
        (function() {

            'use strict';

            // click events
            document.body.addEventListener('click', copy, true);

            // event handler
            function copy(e) {

                // find target element
                var
                        t = e.target,
                        c = t.dataset.copytarget,
                        inp = (c ? document.querySelector(c) : null);

                // is element selectable?
                if (inp && inp.select) {

                    // select text
                    inp.select();

                    try {
                        // copy text
                        document.execCommand('copy');
                        inp.blur();

                        // copied animation
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }
                    catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }

                }

            }

        })();

    </script>
@endsection
