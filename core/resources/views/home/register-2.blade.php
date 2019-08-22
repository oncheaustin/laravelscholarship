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
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!!  $error !!}
                                </div>
                            @endforeach
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('contact1') }}">
                            {{ csrf_field() }}
                           
                             <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your Name"/>
                                    </div>
                                </div>
                            </div>

                    

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email" required placeholder="Enter your Email"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Phone</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="phone" id="phone" required placeholder="Enter your Phone Number"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password" required placeholder="Enter your Password"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="Confirm your Password"/>
                                    </div>
                                </div>


                                 <div class="col-sm-offset-3 col-sm-9">
     
         <label for="accept"> </label>
          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            <input type="checkbox" id="accept" name="accept" value="1" checked > I Agree With <a href="javascript:void(0)" id="vie" style="font-size:12px">Terms And Conditions</a>
                                  
    </div>
    
      <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <div id="termview" style=" display:none; ">
      <textarea cols='30'  rows='5' readonly>
        Rules &amp; Agreements
        
            This is an agreement between AgroMonth, Division of Northlander Global Services , 
            which operates «AgroMonth» a "crowdfunding" platform online (hereinafter referred to as AgroMonth or "Platform")        
        
            In using this website, you are deemed to have read and agreed to the 
following terms and conditions: The following terminology applies to 
these Terms and Conditions, Privacy Statement and Disclaimer Notice and 
any or all Agreements: "Client", “You” and “Your” refers to you, the 
person accessing this website and accepting the Company’s terms and 
conditions. "The Company", “Ourselves”, “We” and "Us", refers to our 
Company. “Party”, “Parties”, or “Us”, refers to both the Client and 
ourselves, or either the Client or ourselves.       
        
            As a private transaction, we are not a licensed bank or a security firm.        
        
            You agree to hold all principals and members harmless of any 
liability. You are investing at your own risk and you agree that a past 
performance is not an explicit guarantee for the same future 
performance. You agree that all information, communications and 
materials you will find on this site are intended to be regarded as an 
informational and educational matter and not an investment advice.      
        
            AGROMONTH is not responsible or liable for any damages, losses
 and costs resulting from any violation of the conditions and terms 
and/or use of our website by a member. You guarantee to AGROMONTH 
            that you will not use this site in any illegal way and you agree to respect your local, national and international laws.        
        
        
        Confidentiality
        
            We are committed to protecting your privacy. Authorized employees 
within the company on a need to know basis only use any information 
collected from individual customers. We constantly review our systems 
and data to ensure the best possible service to our customers. We will 
not sell, share, or rent your personal information to any third party or
 use your e-mail address for unsolicited mail. Any emails sent by this 
Company will only be in connection with the provision of agreed services
 and products. All the data giving by a member to AGROMONTH 
            will be only privately used and not disclosed to any third parties. AGROMONTH 
            is not responsible or liable for any loss of data.

Under no circumstances, Agromonth will disclose personal 
information of its users or send it to any third parties. Also, we send 
zero bytes of information regarding your profile (Secure Area), profits 
or purchased digital funds, to local fiscal authorities of your country 
even having the official request from them (we can do it only if the 
user himself decides to provide such a disclosure). The only information
 that is displayed openly is platform's live-deposit statistics (through bank or bitcoin), which includes 
deposit's time and date, amount and username of the 
investor.
Investor's real name or address is never shown publicly and is never 
displayed on the website (Besides his own personal profile, aka. "Dashboard
 Area"). The investor is allowed to pick any username except for 
restricted or used ones. If you want to get an ultimate level of 
confidentiality, we recommend you using cryptocurrencies as the main 
payment method and trusted VPN provider for logging your personal 
account. Search FAQ to know more.       

        
        Multiple accounts
        
            It is strictly prohibited to register multiple accounts in your team.
 All new investor ‘s profiles constantly being moderated on affiliate 
fraud attempts. In the case of a confirmed affiliate fraud case, all 
accounts (including referrer) will be permanently blocked without any 
deposits or available balance refunds. Use only one account for your 
needs only, if you break this rule and create multiple accounts, the 
whole chain of users will be blocked.       

        
        Responsibilities &amp; General Terms
        
            AgroMonth, is not available to the general public and is 
opened only to the members of the site. You agree to be of legal age in 
your country to join this site and in all the cases your minimum age 
must be 18 years. The use of this site is restricted to our members. 
Every deposit is considered to be a private transaction between AgroMonth and its member.       

        
        Customer Satisfaction
        
            Commitment to quality and customer satisfaction remains a cornerstone
 of our business. As such, we design and put in place structures for continuous profit and members training.    
    

        
        Disclaimer &amp; Limitation of liability
        
            We reserve the right to change the rules, commissions and rates of 
the program at any time and at our sole discretion without notice, 
especially in order to respect the integrity and security of the 
members' interests as a whole. You agree that it is your sole 
responsibility to review the current terms.     

        
            AGROMONTH, reserves the right to accept or decline any member for membership without explanation.       

        
        REFUND POLICY &amp; RISK DISCLOSURE
        
            Area of high profit investments always implies having certain risks 
involved. It is important to understand that 
investing any funds at AgroMonth Platform 
involves reasonable risks. Your deposit refund is not guaranteed and in 
some rare cases may even be not returned or lost.


All refund requests are honored and carefully investigated if made in a 
timely fashioned, and no more than 24 hours after the member's deposit 
transaction was completed. The just made investment can't be refunded to
 Customer’s personal cabinet under any circumstances. If the Customer 
decides to forcibly reverse his payment regardless the current Refund 
Policy with their reversible payment processors,
            account will be immediately suspended. The Customer must contact us 
for a proper solution before contacting his payment processor’s customer
 support for assistance.        
        
            We will not tolerate SPAM. SPAM 
violators will be immediately and permanently removed from the program. 
If you do not agree with the above disclaimer, please do not go any 
further.    

These Terms of Use were last updated on March 2, 2018.
    
                                    
                                    </textarea>
    </div>
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
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Register</button>
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
