@extends('layouts.fontEnd')
@section('style')

    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ranger-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinFlat.css') }}">
    <style>
        .price-table {
            margin-bottom: 45px;
        }
        

    </style>

@endsection
@section('content')
<section class="header-section ">
    <div class="head-slider">


        @foreach($slider as $s)
            <div class="single-header slider header-bg" style="background-image: url('{{ asset('assets/images/slider') }}/{{ $s->image }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="header-slider-wrapper">
                                <h1>{{ $s->title }}</h1>
                                <p>{{ $s->subtitle }}</p>
                                
           
                            </div>
      
                        </div>
                    </div>
                </div>

            </div>

        @endforeach
                                          
    </div>
</section><!--Header section end-->
                
<!--About community Section Start-->
<section class="section-padding about-community">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    
                    <h2>about - {{ $site_title }}</h2>
                    <p>{!! $page->about_subtitle !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                
                <p class="about-community-text text-right">
                    {!! $page->about_leftText !!}
                </p>
            </div>
            <div class="col-md-6">
                <p class="about-community-text">
                    {!! $page->about_rightText !!}
                </p>
            </div>
        </div>
    </div>
</section><!--About community Section end-->

<!--service section start-->
<section class="section-padding service-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="section-title text-center section-padding padding-bottom-0">
                    <h2>Services - {{ $site_title }}</h2>
                    <p>{!! $page->service_subtitle !!}</p>
                </div>
            </div>
        </div>
       <!-- <div class="row">
            @foreach($service as $s)
            <div class="col-md-3 col-sm-6">
                <div class="service-wrapper text-center">
                    <div class="service-icon ">
                        {!! $s->code !!}
                    </div>
                    <div class="service-title">
                        <p>{{ $s->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div> -->
    </div>
    

    
</section><!--service section end-->


<!--Our Plan section start-->
<section class="section-padding our-plan">



        
        <div class="row">
            
          


<div class="col-sm-4">
                    <div class="price-table text-center">
                        <div class="price-table-header">
                            <h4>About</h4>
                             <!-- panel body -->
                    <div style="font-size: 18px;padding: 18px;" class="panel-body text-center">
                            <img class="" style="width: 100%;border-radius: 5px" src="{{ asset('assets/images/scholarship-300x200.jpg') }}" alt="">
                        </div>
                            <p>we look for ways to encourage and reward high academic standards in our students. Our Priority is the ultimate provision of educational assistance to the needy for the development of Africa </p>
                        </div>
                        
                                    </div>
                                </div>

                                <div class="col-sm-4">
                    <div class="price-table text-center">
                        <div class="price-table-header">
                            <h4>Before you Apply</h4>
                             <!-- panel body -->
                    <div style="font-size: 18px;padding: 18px;" class="panel-body text-center">
                            <img class="" style="width: 100%;border-radius: 5px" src="{{ asset('assets/images/beforeyouapply-300x200.jpg') }}" alt="">
                        </div>
                            <p>There are a few criteria that are considered in selecting successful applicants who will be shortlisted as beneficiaries. Candidates should familiarise themselves with all the requirements and various processes to greatly increase their chances.</p>
                        </div>
                        
                                    </div>
                                </div>
                                <div class="col-sm-4">
                    <div class="price-table text-center">
                        <div class="price-table-header">
                            <h4>Success Stories</h4>
                             <!-- panel body -->
                    <div style="font-size: 18px;padding: 18px;" class="panel-body text-center">
                            <img class="" style="width: 100%;border-radius: 5px" src="{{ asset('assets/images/successstories-300x200.jpg') }}" alt="">
                        </div>
                            <p>We showcase various beneficiaries at different levels, from those who have benefited several years ago to those who are still in school. They tell us the impact these scholarships have had on their respective careers. </p>
                        </div>
                        
                                    </div>
                                </div>
                            </div>
  

   
        <div class="row section-padding padding-bottom-0">
            <div class="col-md-6 col-sm-6">
                <div class="contact-info">
                    <div class="contact-title">
                        <h4>Have a question <span>we are here to help!</span></h4>
                    </div>
                    <div class="contact-details">
                        <p><i class="fa fa-phone"></i> {{ $basic->phone }}</p>
                        <p><i class="fa fa-envelope"></i> {{ $basic->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="discunt-text">
                          <h4>
                        SCHOLARSHIP APPLICATION </h4>
                        
                        <a href="{{ route('register') }}"><img src="{{ asset('assets/images/applyicon.png') }}" alt="Logo Image Will Be Here" style="max-width: 80px;"></a><br>
                        <p>Application for 2019 Scholarship is currently open, click to apply </p> 
                                <a href="/register" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Apply</a>
                            </div>
                
            
                
            </div>
        </div>

    </div>
</section><!--Our Plan section end-->




<!--testimonial section start-->
<section class="section-padding  testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="color-text">What People Say</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="slider-activation">
                    @foreach($testimonial as $tes)
                    <div class="testimonial-carousel">
                        <div class="single-testimonial-wrapper">
                            <div class="single-testimonial-top">
                                <div class="testimoanial-top-text">
                                    <div class="profile-pic">
                                        <img src="{{ asset('assets/images') }}/{{ $tes->image }}" class="img-circle img-responsive" alt="Client's Profile Pic">
                                    </div>
                                    <h4>{{ $tes->name }}<span>{{ $tes->position }}</span></h4>
                                </div>
                                <div class="testimonial-bottom">
                                    <p>{!! $tes->message !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section><!--testimonial section end-->



@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/ion.rangeSlider.js') }}"></script>
    <script>
        $.each($('.slider-input'), function() {
            var $t = $(this),

                    from = $t.data('from'),
                    to = $t.data('to'),

                    $dailyProfit = $($t.data('dailyprofit')),
                    $totalProfit = $($t.data('totalprofit')),

                    $val = $($t.data('valuetag')),

                    perDay = $t.data('perday'),
                    perYear = $t.data('peryear');


            $t.ionRangeSlider({
                input_values_separator: ";",
                prefix: '{{ $basic->symbol }} ',
                hide_min_max: true,
                force_edges: true,
                onChange: function(val) {
                    $val.val( '{{ $basic->symbol }} ' + val.from);

                    var profit = (val.from * perDay / 100).toFixed(1);
                    profit  = '{{ $basic->symbol }} ' + profit.replace('.', '.') ;
                    $dailyProfit.text(profit) ;

                    profit = ( (val.from * perDay / 100)* perYear ).toFixed(1);
                    profit  =  '{{ $basic->symbol }} ' + profit.replace('.', '.');
                    $totalProfit.text(profit);

                }
            });
        });
        $('.invest-type__profit--val').on('change', function(e) {

            var slider = $($(this).data('slider')).data("ionRangeSlider");

            slider.update({
                from: $(this).val().replace('{{ $basic->symbol }} ', "")
            });
        })
    </script>
@endsection

