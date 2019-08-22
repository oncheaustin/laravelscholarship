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
                        <form class="form-horizontal" method="POST" action="{{ route('/auth/register') }}">
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
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email" required placeholder="Enter your Email"/>
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
            <label for="gender">Gender</label><br/>
            <label class="radio-inline"><input type="radio" name="gender" value="1" {{{ (isset($register->gender) && $register->gender == '1') ? "checked" : "" }}}> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="0" {{{ (isset($register->gender) && $register->gender == '0') ? "checked" : "" }}}> Female</label>
        </div>
  <div class="form-group">
            <label for="description">State</label>
            <select class="form-control" name="state">
                <option {{{ (isset($register->state) && $register->state == 'Apple') ? "selected=\"selected\"" : "" }}}>Apple</option>
                <option {{{ (isset($register->state) && $register->state == 'Google') ? "selected=\"selected\"" : "" }}}>Google</option>
                <option {{{ (isset($register->state) && $register->state == 'Mi') ? "selected=\"selected\"" : "" }}}>Mi</option>
                <option {{{ (isset($register->state) && $register->state == 'Samsung') ? "selected=\"selected\"" : "" }}}>Samsung</option>
            </select>
        </div>

          <div class="form-group">
            <label for="description">Local Government</label>
            <select class="form-control" name="state">
                <option {{{ (isset($register->lg) && $register->lg == 'Apple') ? "selected=\"selected\"" : "" }}}>Apple</option>
                <option {{{ (isset($register->lg) && $register->lg == 'Google') ? "selected=\"selected\"" : "" }}}>Google</option>
                <option {{{ (isset($register->lg) && $register->lg == 'Mi') ? "selected=\"selected\"" : "" }}}>Mi</option>
                <option {{{ (isset($register->lg) && $register->lg == 'Samsung') ? "selected=\"selected\"" : "" }}}>Samsung</option>
            </select>
        </div>

            <div class="form-group">
            <label for="description">Course of Study</label>
            <select class="form-control" name="state">
                <option {{{ (isset($register->course) && $register->course == 'Apple') ? "selected=\"selected\"" : "" }}}>Apple</option>
                <option {{{ (isset($register->course) && $register->course == 'Google') ? "selected=\"selected\"" : "" }}}>Google</option>
                <option {{{ (isset($register->course) && $register->course == 'Mi') ? "selected=\"selected\"" : "" }}}>Mi</option>
                <option {{{ (isset($register->lg) && $register->course == 'Samsung') ? "selected=\"selected\"" : "" }}}>Samsung</option>
            </select>
        </div>
                  
                       <div class="form-group">
            <label for="description">Level</label>
            <select class="form-control" name="state">
                <option {{{ (isset($register->level) && $register->level == 'Apple') ? "selected=\"selected\"" : "" }}}>Apple</option>
                <option {{{ (isset($register->level) && $register->level == 'Google') ? "selected=\"selected\"" : "" }}}>Google</option>
                <option {{{ (isset($register->level) && $register->level == 'Mi') ? "selected=\"selected\"" : "" }}}>Mi</option>
                <option {{{ (isset($register->level) && $register->level == 'Samsung') ? "selected=\"selected\"" : "" }}}>Samsung</option>
            </select>
        </div>          
                          
                          <div class="form-group">
            <label for="description">About Yourself</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="description">{{{ $register->description or '' }}}</textarea>
        </div>      

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

                            @if($basic->google_recap == 1)
                            <div class="form-group">
                                <div class="cols-sm-10">
                                    {!! app('captcha')->display() !!}
                                </div>
                            </div>
                            @endif

                            <div class="form-group ">
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Next</button>
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
