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
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                           <!-- @if($reference == '0')
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Referral ID</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="under_reference" id="under_reference" value="@if($reference){{ $reference }}@endif" placeholder="Referral ID (If Any)"/>
                                    </div>
                                </div>
                            </div>
                            @else
                                <input type="hidden" class="form-control" name="under_reference" id="under_reference" value="@if($reference){{ $reference }}@endif" placeholder="Referral ID"/>
                            @endif

                              -->

                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your Name"/>
                                    </div>
                                </div>
                            </div>
                        
                                    <!--
                                      <div class="form-group">
                               
                                        <div class="input-group">
                                        
                                        <input type="hidden" class="form-control" name="login_enable" id="name" required />
                                    </div>
                                    </div> -->
                        
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
</div>
    
            <div class="form-group">
                   <div class="cols-sm-10">                                     
  
    <label for="gender">Gender</label><br/>
     <label class="radio-inline">
                        <input type="radio" id="gender" name="gender" value="Male">Male</label>
                    <label class="radio-inline">
                        <input type="radio" id="gender" name="gender" value="Female">Female</label>
  </div>

</div>

<div class="form-group">
                    <div class="cols-sm-10">                 
 
            <label for="description">State</label>
            <select class="form-control" name="state">
               
              <option value="Abuja FCT">Abuja FCT</option>
              <option value="Abia">Abia</option>
              <option value="Adamawa">Adamawa</option>
              <option value="Akwa Ibom">Akwa Ibom</option>
              <option value="Anambra">Anambra</option>
              <option value="Bauchi">Bauchi</option>
              <option value="Bayelsa">Bayelsa</option>
              <option value="Benue">Benue</option>
              <option value="Borno">Borno</option>
              <option value="Cross River">Cross River</option>
              <option value="Delta">Delta</option>
              <option value="Ebonyi">Ebonyi</option>
              <option value="Edo">Edo</option>
              <option value="Ekiti">Ekiti</option>
              <option value="Enugu">Enugu</option>
              <option value="Gombe">Gombe</option>
              <option value="Imo">Imo</option>
              <option value="Jigawa">Jigawa</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Kano">Kano</option>
              <option value="Katsina">Katsina</option>
              <option value="Kebbi">Kebbi</option>
              <option value="Kogi">Kogi</option>
              <option value="Kwara">Kwara</option>
              <option value="Lagos">Lagos</option>
              <option value="Nassarawa">Nassarawa</option>
              <option value="Niger">Niger</option>
              <option value="Ogun">Ogun</option>
              <option value="Ondo">Ondo</option>
              <option value="Osun">Osun</option>
              <option value="Oyo">Oyo</option>
              <option value="Plateau">Plateau</option>
              <option value="Rivers">Rivers</option>
              <option value="Sokoto">Sokoto</option>
              <option value="Taraba">Taraba</option>
              <option value="Yobe">Yobe</option>
              <option value="Zamfara">Zamfara</option>
     <option value="Outside Nigeria">Outside Nigeria</option>
            </select>
       
    </div>
</div>
<div class="form-group">
                    <div class="cols-sm-10">                 
 
            <label for="description">local Government</label>
            <select class="form-control" name="lg">
                <option value="Aba North">Aba North</option>
            <option value="Aba South">Aba South</option>
            <option value="Abadam">Abadam</option>
            <option value="Abaji">Abaji</option>
            <option value="Abak">Abak</option>
          <option value="Abakaliki">Abakaliki</option>
         <option value="Abeokuta North">Abeokuta North</option>
            <option value="Abeokuta South">Abeokuta South</option>
          <option value="Abi">Abi</option>
          <option value="Aboh Mbaise">Aboh Mbaise</option>
          <option value="Abua/Odual">Abua/Odual</option>
          <option value="Abuja Municipal">Abuja Municipal</option>
          <option value="Adavi">Adavi</option>
          <option value="Ado">Ado</option>
          <option value="Ado-Odo/Ota">Ado-Odo/Ota</option>
          <option value="Afijio">Afijio</option>
          <option value="Afikpo North">Afikpo North</option>
          <option value="Afikpo South">Afikpo South</option>
          <option value="Agaie">Agaie</option>
          <option value="Agatu">Agatu</option>
          <option value="Agege">Agege</option>
<option value="Aguata">Aguata</option>
<option value="Agwara">Agwara</option>
<option value="Ahiazu-Mbaise">Ahiazu-Mbaise</option>
<option value="Ahoada East">Ahoada East</option>
<option value="Ahoada West">Ahoada West</option>
<option value="Aiyedade">Aiyedade</option>
<option value="Ajaokuta">Ajaokuta</option>
<option value="Ajeromi-Ifelodun">Ajeromi-Ifelodun</option>
<option value="Akamkpa">Akamkpa</option>
<option value="Akinyele">Akinyele</option>
<option value="Akko">Akko</option>
         <option value="Aiyedire">Aiyedire</option>
            <option value="Aiyedire">Akoko North East</option>
            <option value="Aiyedire">Akoko North West</option>
            <option value="Aiyedire">Akoko South Akure East</option>
            <option value="Aiyedire">Akoko South West</option>
           <option value="Aiyedire"> Akpabuyo</option>
            <option value="Aiyedire">Akuku Toru</option>
            <option value="Aiyedire">Akure North</option>
            <option value="Aiyedire">Akure South</option>
            <option value="Aiyedire">Akwanga</option>
            <option value="Aiyedire">Albasu</option>
            <option value="Aiyedire">Aleiro</option>
            <option value="Aiyedire">Alimosho</option>
            <option value="Aiyedire">Alkaleri</option>
            <option value="Aiyedire">Amuwo-Odofin</option>
            <option value="Aiyedire">Anambra East</option>
            <option value="Aiyedire">Anambra West</option>
            <option value="Aiyedire">Anaocha</option>
           <option value="Aiyedire"> Andoni</option>
            <option value="Aiyedire">Aninri</option>
            <option value="Aiyedire">Aniocha South</option>
            <option value="Aiyedire">Aniocha</option>
           <option value="Aiyedire"> Anka</option>
            <option value="Aiyedire">Ankpa</option>
            <option value="Aiyedire">Apa</option>
            <option value="Aiyedire">Apapa</option>
            <option value="Aiyedire">Ardo-kola</option>
            <option value="Aiyedire">Arewa-Dandi</option>
            <option value="Aiyedire">Argungu</option>
            <option value="Aiyedire">Arochukwu</option>
            <option value="Aiyedire">Asa</option>
            <option value="Aiyedire">Asari-Toru</option>
            <option value="Aiyedire">Askira/Uba</option>
            <option value="Aiyedire">Atakumosa East</option>
            <option value="Aiyedire">Atakumosa West</option>
           <option value="Aiyedire"> Atiba</option>
            <option value="Aiyedire">Atiba</option>
            <option value="Aiyedire">Atigbo</option>
            <option value="Aiyedire">Augie</option>
            <option value="Aiyedire">Auyo</option>
            <option value="Aiyedire">Awe</option>
            <option value="Aiyedire">Awka North</option>
            <option value="Awka South"> Awka South </option>
            <option value="Aiyedire">Ayamelum</option>
            <option value="Aiyedire">Babura</option>
            <option value="Aiyedire">Badagry</option>
            <option value="Aiyedire">Bade</option>
            <option value="Aiyedire">Bagudo</option>
            <option value="Aiyedire">Bagwai</option>
            <option value="Aiyedire">Bakassi</option>
            <option value="Aiyedire">Bakori</option>
            <option value="Aiyedire">Bakori</option>
            <option value="Aiyedire">Bakura</option>
            <option value="Aiyedire">Balanga</option>
            <option value="Aiyedire">Bali</option>
            <option value="Aiyedire">Bama</option>
            <option value="Aiyedire">Barikin Ladi</option>
            <option value="Aiyedire">Baruten</option>
            <option value="Aiyedire">Bassa</option>
            <option value="Aiyedire">Bassa</option>
            <option value="Aiyedire">Batagarawa</option>
            <option value="Aiyedire">Batsari</option>
            <option value="Aiyedire">Bauchi</option>
            <option value="Aiyedire">Baure</option>
            <option value="Aiyedire">Bayo</option>
            <option value="Aiyedire">Bebeji</option>
            <option value="Aiyedire">Bekwara</option>
            <option value="Aiyedire">Bende</option>
            <option value="Aiyedire">Biase</option>
            <option value="Aiyedire">Bichi</option>
            <option value="Aiyedire">Bida</option>
            <option value="Aiyedire">Billiri</option>
            <option value="Aiyedire">Bindawa</option>
            <option value="Aiyedire">Binji</option>
            <option value="Aiyedire">Biriniwa</option>
            <option value="Aiyedire">Birni Kudu</option>
            <option value="Aiyedire">Birni-Gwari</option>
            <option value="Aiyedire">Birnin Kebbi</option>
            <option value="Aiyedire">Birnin Magaji</option>
            <option value="Aiyedire">Biu</option>
            <option value="Aiyedire">Bodinga</option>
            <option value="Aiyedire">Bogoro</option>
            <option value="Aiyedire">Boki</option>
            <option value="Aiyedire">Bokkos</option>
            <option value="Aiyedire">Boluwaduro</option>
            <option value="Aiyedire">Bomadi</option>
            <option value="Aiyedire">Bonny</option>
            <option value="Aiyedire">Borgu</option>
            <option value="Aiyedire">Boripe</option>
            <option value="Aiyedire">Bosso</option>
            <option value="Aiyedire">Brass</option>
            <option value="Aiyedire">Buji</option>
            <option value="Aiyedire">Bukkuyum</option>
            <option value="Aiyedire">Bungudu</option>
            <option value="Aiyedire">Bunkure</option>
            <option value="Aiyedire">Bunza</option>
            <option value="Aiyedire">Bursari</option>
            <option value="Aiyedire">Buruku</option>
            <option value="Aiyedire">Burutu</option>
            <option value="Aiyedire">Bwari</option>
            <option value="Aiyedire">Calabar Munici</option>pality
            <option value="Aiyedire">Calabar South</option>
            <option value="Aiyedire">Cassol</option>
            <option value="Aiyedire">Central</option>
            <option value="Aiyedire">Chanchaga</option>
            <option value="Aiyedire">Charanchi</option>
            <option value="Aiyedire">Chibok</option>
            <option value="Aiyedire">Chikun</option>
            <option value="Aiyedire">Dala </option>
            <option value="Aiyedire">Damaturu</option>
            <option value="Aiyedire">Damban</option>
            <option value="Aiyedire">Dambatta</option>
            <option value="Aiyedire">Damboa</option>
            <option value="Aiyedire">Dan Musa</option>
            <option value="Aiyedire">Dandi</option>
            <option value="Aiyedire">Dandume </option>
            <option value="Aiyedire">Dange-shnsi</option>
            <option value="Aiyedire">Danja</option>
            <option value="Aiyedire">Darazo</option>
            <option value="Aiyedire">Dass</option>
            <option value="Aiyedire">Daura</option>
            <option value="Aiyedire">Dawakin Kudu</option>
            <option value="Aiyedire">Dawakin Tofa</option>
            <option value="Aiyedire">Degema</option>
            <option value="Aiyedire">Dekina</option>
            <option value="Aiyedire">Demsa</option>
            <option value="Aiyedire">Dikwa</option>
            <option value="Aiyedire">Doguwa</option>
            <option value="Aiyedire">Doma</option>
            <option value="Aiyedire">Donga</option>
            <option value="Aiyedire">Dukku</option>
            <option value="Aiyedire">Dunukofia</option>
            <option value="Aiyedire">Dutse</option>
            <option value="Aiyedire">Dutsi</option>
            <option value="Aiyedire">Dutsin-Ma</option>
            <option value="Aiyedire">Eastern Obolo</option>
            <option value="Aiyedire">Ebonyi</option>
            <option value="Aiyedire">Edati</option>
            <option value="Aiyedire">Ede North</option>
            <option value="Aiyedire">Ede South</option>
            <option value="Aiyedire">Edu</option>
            <option value="Aiyedire">Efon</option>
            <option value="Aiyedire">Egbado North</option>
            <option value="Aiyedire">Egbado South</option>
            <option value="Aiyedire">Egbeda</option>
            <option value="Aiyedire">Egbedore</option>
            <option value="Aiyedire">Egor</option>
            <option value="Aiyedire">Ehime Mbano</option>
            <option value="Aiyedire">Ejigbo</option>
            <option value="Aiyedire">Ekeremor</option>
            <option value="Aiyedire">Eket</option>
            <option value="Aiyedire">Ekiti SouthWest</option>
            <option value="Aiyedire">Ekiti</option>
            <option value="Aiyedire">EkitiEast</option>
            <option value="Aiyedire">EkitiWest</option>
            <option value="Aiyedire">Ekwusigo</option>
            <option value="Aiyedire">Eleme</option>
            <option value="Aiyedire">Emohua</option>
            <option value="Aiyedire">Emure/Ise/Orun</option>
            <option value="Aiyedire">Enugu East</option>
            <option value="Aiyedire">Enugu North</option>
            <option value="Aiyedire">Enugu South</option>
            <option value="Aiyedire">Epe</option>
            <option value="Aiyedire">Esan Central</option>
            <option value="Aiyedire">Esan NorthEast</option>
            <option value="Aiyedire">Esan South-East</option>
            <option value="Aiyedire">Esan West</option>
            <option value="Aiyedire">Ese-Odo</option>
            <option value="Aiyedire">Esit Eket</option>
            <option value="Aiyedire">Essien Udim</option>
            <option value="Aiyedire">Etche</option>
            <option value="Aiyedire">Ethiope East</option>
            <option value="Aiyedire">Ethiope West</option>
            <option value="Aiyedire">Etim Ekpo</option>
            <option value="Aiyedire">Etinan</option>
            <option value="Aiyedire">Eti-Osa</option>
            <option value="Aiyedire">Etsako Central</option>
            <option value="Aiyedire">Etsako East</option>
            <option value="Aiyedire">Etung</option>
            <option value="Aiyedire">Ewekoro</option>
            <option value="Aiyedire">Ezeagu</option>
            <option value="Aiyedire">Ezinihitte</option>
            <option value="Aiyedire">Ezza South</option>
            <option value="Aiyedire">Ezza</option>
            <option value="Aiyedire">Fagge</option>
            <option value="Aiyedire">Fakai</option>
            <option value="Aiyedire">Faskari</option>
            <option value="Aiyedire">Fika</option>
            <option value="Aiyedire">Fufore</option>
            <option value="Aiyedire">Funakaye</option>
            <option value="Aiyedire">Fune</option>
            <option value="Aiyedire">Funtua</option>
            <option value="Aiyedire">Gabasawa</option>
            <option value="Aiyedire">Gada</option>
            <option value="Aiyedire">Gagarawa</option>
            <option value="Aiyedire">Ganaye</option>
            <option value="Aiyedire">Ganjuwa</option>
            <option value="Aiyedire">Garki</option>
            <option value="Aiyedire">Garko</option>
            <option value="Aiyedire">Garum</option>
            <option value="Aiyedire">Gashaka</option>
            <option value="Aiyedire">Gawabawa</option>
            <option value="Aiyedire">Gaya</option>
            <option value="Aiyedire">Gbako</option>
            <option value="Gboko">Gboko</option>
            <option value="Aiyedire">Gbonyin</option>
            <option value="Aiyedire">Geidam</option>
            <option value="Aiyedire">Gezawa</option>
            <option value="Aiyedire">Giade</option>
            <option value="Aiyedire">Gireri</option>
            <option value="Aiyedire">Giwa</option>
            <option value="Aiyedire">Gokana</option>
            <option value="Aiyedire">Gombe</option>
            <option value="Aiyedire">Gombi</option>
            <option value="Aiyedire">Goronyo</option>
            <option value="Aiyedire">Gubio</option>
            <option value="Aiyedire">Gudu</option>
            <option value="Aiyedire">Gujba</option>
            <option value="Aiyedire">Gulani</option>
            <option value="Aiyedire">Guma</option>
            <option value="Aiyedire">Gumel</option>
            <option value="Aiyedire">Gummi</option>
            <option value="Aiyedire">Gurara</option>
            <option value="Aiyedire">Guri</option>
            <option value="Aiyedire">Gusau</option>
            <option value="Aiyedire">Guyuk</option>
            <option value="Aiyedire">Guzamala</option>
            <option value="Aiyedire">Gwagwalada</option>
            <option value="Aiyedire">Gwale</option>
            <option value="Aiyedire">Gwandu</option>
            <option value="Aiyedire">Gwaram</option>
            <option value="Aiyedire">Gwarzo</option>
            <option value="Aiyedire">Gwer East</option>
            <option value="Aiyedire">Gwer West</option>
            <option value="Aiyedire">Gwiwa</option>
            <option value="Aiyedire">Gwoza</option>
            <option value="Aiyedire">Hadejia</option>
            <option value="Aiyedire">Hawul</option>
            <option value="Aiyedire">Hong</option>
            <option value="Aiyedire">Ibadan North West</option>
            <option value="Aiyedire">Ibadan North</option>
            <option value="Aiyedire">Ibadan South East</option>
            <option value="Aiyedire">Ibadan South West</option>
            <option value="Aiyedire">IbadanCentral</option>
            <option value="Aiyedire">Ibaji</option>
            <option value="Aiyedire">Ibarapa  North</option>
            <option value="Aiyedire">Ibarapa Central</option>
            <option value="Aiyedire">Ibarapa East</option>
            <option value="Aiyedire">Ibeju/Lekki</option>
            <option value="Aiyedire">Ibeno</option>
            <option value="Aiyedire">Ibesikpo Asuta</option>n
            <option value="Aiyedire">Ibi</option>
            <option value="Aiyedire">Ibiono Ibom</option>
            <option value="Aiyedire">Idah</option>
            <option value="Aiyedire">Idanre</option>
            <option value="Aiyedire">Ideato North</option>
            <option value="Aiyedire">Ideato South</option>
            <option value="Aiyedire">Idemili North</option>
            <option value="Aiyedire">Idemili south</option>
            <option value="Aiyedire">Ido</option>
            <option value="Aiyedire">Ido/Osi</option>
            <option value="Aiyedire">Ifako-Ijaye</option>
            <option value="Aiyedire">Ife Central</option>
            <option value="Aiyedire">Ife East</option>
            <option value="Aiyedire">Ife North</option>
            <option value="Aiyedire">Ife South</option>
            <option value="Aiyedire">Ifedayo</option>
            <option value="Aiyedire">Ifedore</option>
            <option value="Aiyedire">Ifelodun</option>
            <option value="Aiyedire">Ifelodun</option>
            <option value="Aiyedire">Ifo</option>
            <option value="Aiyedire">Igabi</option>
            <option value="Aiyedire">Igalamela-Odol</option>u
            <option value="Aiyedire">Igbo Ekiti</option>
            <option value="Aiyedire">Igbo Eze South</option>
            <option value="Aiyedire">IgboEze North</option>
            <option value="Aiyedire">Igueben</option>
            <option value="Aiyedire">Ihiala</option>
            <option value="Aiyedire">Ihitte/Uboma</option>
            <option value="Aiyedire">Ijebu East</option>
            <option value="Aiyedire">Ijebu North East</option>
            <option value="Aiyedire">Ijebu North</option>
            <option value="Aiyedire">Ijebu Ode</option>
            <option value="Aiyedire">Ijero</option>
            <option value="Aiyedire">Ijumu</option>
            <option value="Aiyedire">Ika North-East</option>
            <option value="Aiyedire">Ika South</option>
            <option value="Aiyedire">Ikara</option>
            <option value="Aiyedire">Ikare</option>
            <option value="Aiyedire">Ikeduru</option>
            <option value="Aiyedire">Ikeja</option>
            <option value="Aiyedire">Ikenne</option>
            <option value="Aiyedire">Ikole</option>
            <option value="Aiyedire">Ikom</option>
            <option value="Aiyedire">Ikono</option>
            <option value="Aiyedire">Ikorodu</option>
            <option value="Aiyedire">Ikot Abasi</option>
            <option value="Aiyedire">Ikot Ekpene</option>
            <option value="Aiyedire">Ikwerre</option>
            <option value="Aiyedire">Ikwuano</option>
            <option value="Aiyedire">Ila</option>
            <option value="Aiyedire">Ilaje</option>
            <option value="Aiyedire">Ilejemeje</option>
            <option value="Aiyedire">Ile-Oluji</option>
            <option value="Aiyedire">Ilesha East</option>
            <option value="Aiyedire">Ilesha West</option>
            <option value="Aiyedire">Illela</option>
            <option value="Aiyedire">Ilorin East</option>
            <option value="Aiyedire">Imeko-Afon</option>
            <option value="Aiyedire">Ingawa</option>
            <option value="Aiyedire">Ini</option>
            <option value="Aiyedire">Ipokia</option>
            <option value="Aiyedire">Irele</option>
            <option value="Aiyedire">Irepo</option>
            <option value="Aiyedire">Irepodun</option>
           <option value="Aiyedire">Irewole</option>
            <option value="Aiyedire">Isa</option>
            <option value="Aiyedire">Ise/Orun</option>
            <option value="Aiyedire">Iseyin</option>
            <option value="Aiyedire">Ishielu</option>
            <option value="Aiyedire">Isi Uzo</option>
            <option value="Aiyedire">Isiala Mbano</option>
            <option value="Aiyedire">Isiala-Ngwa North</option>
            <option value="Aiyedire">Isiala-Ngwa South</option>
            <option value="Aiyedire">Isin</option>
            <option value="Aiyedire">Isokan</option>
            <option value="Aiyedire">Isoko North</option>
            <option value="Aiyedire">Isoko south</option>
            <option value="Aiyedire">Isu</option>
            <option value="Aiyedire">Isuikwato</option>
            <option value="Aiyedire">Itas/Gadau</option>
            <option value="Aiyedire">Itesiwaju</option>
            <option value="Aiyedire">Itu</option>
            <option value="Aiyedire">Ivo</option>
            <option value="Aiyedire">Iwajowa</option>
            <option value="Aiyedire">Iwo</option>
            <option value="Aiyedire">jaba</option>
            <option value="Aiyedire">Jada</option>
            <option value="Aiyedire">Jahun</option>
            <option value="Aiyedire">Jakusko</option>
            <option value="Aiyedire">Jalingo</option>
            <option value="Aiyedire">Jamaare</option>
            <option value="Aiyedire">Jega</option>
            <option value="Aiyedire">Jemaa</option>
            <option value="Aiyedire">Jere</option>
            <option value="Aiyedire">Jibia</option>
            <option value="Aiyedire">Jos East</option>
            <option value="Aiyedire">Jos North</option>
            <option value="Aiyedire">Jos South</option>
            <option value="Aiyedire">Kabba/Bunu</option>
            <option value="Aiyedire">Kabo</option>
            <option value="Aiyedire">Kachia</option>
            <option value="Aiyedire">Kaduna North</option>
            <option value="Aiyedire">Kaduna South</option>
            <option value="Aiyedire">Kafin Hausa</option>
            <option value="Aiyedire">Kafur</option>
            <option value="Aiyedire">Kaga</option>
            <option value="Aiyedire">Kagarko</option>
            <option value="Aiyedire">Kaiama</option>
            <option value="Aiyedire">Kajola</option>
            <option value="Aiyedire">Kajuru</option>
            <option value="Aiyedire">Kala/Balge</option>
            <option value="Aiyedire">Kalgo</option>
            <option value="Aiyedire">Kaltungo</option>
            <option value="Aiyedire">Kanam</option>
            <option value="Aiyedire">Kankara</option>
            <option value="Aiyedire">Kanke</option>
            <option value="Aiyedire">Kankia</option>
            <option value="Aiyedire">Kano Municipal</option>
            <option value="Aiyedire">Karasuwa</option>
            <option value="Aiyedire">Karawa</option>
            <option value="Aiyedire">Karaye</option>
            <option value="Aiyedire">Karin-Lamido</option>
            <option value="Aiyedire">Karu</option>
            <option value="Aiyedire">Katagum</option>
            <option value="Aiyedire">Katcha</option>
            <option value="Aiyedire">Katsina</option>
            <option value="Aiyedire">Katsina-Ala</option>
            <option value="Aiyedire">Kaugama Kazaure </option>
            <option value="Aiyedire">Kaura</option>
            <option value="Aiyedire">Kaura</option>
            <option value="Aiyedire">Kauru</option>
            <option value="Aiyedire">Keana</option>
            <option value="Aiyedire">Kebbe</option>
            <option value="Aiyedire">Keffi</option>
            <option value="Aiyedire">Khana</option>
            <option value="Aiyedire">Kibiya</option>
            <option value="Aiyedire">Kirfi</option>
            <option value="Aiyedire">Kiri Kasamma</option>
            <option value="Aiyedire">Kiru</option>
            <option value="Aiyedire">Kiyawa</option>
            <option value="Aiyedire">Kogi</option>
            <option value="Aiyedire">Koko/Besse</option>
            <option value="Aiyedire">Kokona</option>
            <option value="Aiyedire">Kolokuma/Opokum</option>a
            <option value="Aiyedire">Konduga</option>
            <option value="Aiyedire">Konshisha</option>
            <option value="Aiyedire">Kontagora</option>
            <option value="Aiyedire">Kosofe</option>
            <option value="Aiyedire">Kubau</option>
            <option value="Aiyedire">Kudan</option>
            <option value="Aiyedire">Kuje</option>
            <option value="Aiyedire">Kukawa</option>
            <option value="Aiyedire">kumbotso</option>
            <option value="Aiyedire">Kunchi</option>
            <option value="Aiyedire">Kura</option>
            <option value="Aiyedire">Kurfi</option>
            <option value="Aiyedire">Kurmi</option>
            <option value="Aiyedire">Kusada</option>
            <option value="Aiyedire">Kwali</option>
            <option value="Aiyedire">Kwami</option>
            <option value="Kwande">Kwande</option>
            <option value="Aiyedire">Kware</option>
            <option value="Aiyedire">Lafia</option>
            <option value="Aiyedire">Lagelu Ogbomosho North</option>
            <option value="Aiyedire">Lagos Island</option>
            <option value="Aiyedire">Lagos Mainland</option>
            <option value="Aiyedire">Lamurde</option>
            <option value="Aiyedire">Langtang North</option>
            <option value="Aiyedire">Langtang South</option>
            <option value="Aiyedire">Lapai</option>
            <option value="Aiyedire">Lau</option>
            <option value="Aiyedire">Lavun</option>
            <option value="Aiyedire">Lere</option>
            <option value="Aiyedire">lkwo</option>
            <option value="Logo">Logo</option>
            <option value="Aiyedire">Lokoja</option>
            <option value="Aiyedire">Machina</option>
            <option value="Aiyedire">Madagali</option>
            <option value="Aiyedire">Madobi</option>
            <option value="Aiyedire">Mafa</option>
            <option value="Aiyedire">Magama</option>
            <option value="Aiyedire">Magumeri</option>
            <option value="Aiyedire">Mai Adua Maiduguri</option>
            <option value="Aiyedire">Maigatari</option>
            <option value="Aiyedire">Maiha</option>
            <option value="Aiyedire">Maiyama </option>
            <option value="Aiyedire">Makarfi</option>
            <option value="Aiyedire">Makoda</option>
            <option value="Makurdi">Makurdi</option>
            <option value="Aiyedire">Malam Madori</option>
            <option value="Aiyedire">Mallam</option>
            <option value="Aiyedire">Malumfashi</option>
            <option value="Aiyedire">Mangu</option>
            <option value="Aiyedire">Mani</option>
            <option value="Aiyedire">Mariga</option>
            <option value="Aiyedire">Marte</option>
            <option value="Aiyedire">Mashegu</option>
            <option value="Aiyedire">Mashi</option>
            <option value="Aiyedire">Matazuu</option>
            <option value="Aiyedire">Mayo-Belwa</option>
            <option value="Aiyedire">Mbaitoli</option>
            <option value="Aiyedire">Mbo</option>
            <option value="Aiyedire">Michika</option>
            <option value="Aiyedire">Miga</option>
            <option value="Aiyedire">Mikang</option>
            <option value="Aiyedire">Minjibir</option>
            <option value="Aiyedire">Misau</option>
            <option value="Aiyedire">Mkpat Enin</option>
            <option value="Aiyedire">Moba</option>
            <option value="Aiyedire">Mobbar</option>
            <option value="Aiyedire">Mokwa</option>
            <option value="Aiyedire">Monguno</option>
            <option value="Aiyedire">Mopa-Muro</option>
            <option value="Aiyedire">Moro</option>
            <option value="Aiyedire">Mubi North</option>
            <option value="Aiyedire">Mubi South</option>
            <option value="Aiyedire">Musawa</option>
            <option value="Aiyedire">Mushin</option>
            <option value="Aiyedire">Muya</option>
            <option value="Aiyedire">Nafada/Bajoga</option>
            <option value="Aiyedire">Nangere</option>
            <option value="Aiyedire">Nasarawa</option>
            <option value="Aiyedire">Nasarawa</option>
            <option value="Aiyedire">Nasarawa-Eggon</option>
            <option value="Aiyedire">Ndokwa East</option>
            <option value="Aiyedire">Ndokwa West</option>
            <option value="Aiyedire">Nembe</option>
            <option value="Aiyedire">Ngala</option>
             <option value="Aiyedire">Nganzai</option>
             <option value="Aiyedire">Ngaski</option>
             <option value="Aiyedire">Ngor Okpala</option>
             <option value="Aiyedire">Nguru Potiskum</option>
             <option value="Aiyedire">Ngwa</option>
             <option value="Aiyedire">Ningi</option>
             <option value="Aiyedire">Njaba</option>
             <option value="Aiyedire">Njikoka</option>
             <option value="Aiyedire">Nkanu East</option>
             <option value="Aiyedire">Nkanu</option>
             <option value="Aiyedire">Nkwerre</option>
             <option value="Aiyedire">Nnewi North</option>
             <option value="Aiyedire">Nnewi South</option>
             <option value="Aiyedire">Nsit Atai</option>
             <option value="Aiyedire">Nsit Ibom</option>
             <option value="Aiyedire">Nsit Ubium</option>
             <option value="Aiyedire">Nsukka</option>
             <option value="Aiyedire">Numan</option>
             <option value="Aiyedire">Nwangele</option>
             <option value="Aiyedire">Obafemi-Owode</option>
             <option value="Aiyedire">Obanliku</option>
             <option value="Aiyedire">Obi Nwa</option>
             <option value="Aiyedire">Obi</option>
              <option value="Aiyedire">Obia/Akpor</option>
             <option value="Aiyedire">Obokun</option>
             <option value="Aiyedire">Obot Akara</option>
             <option value="Aiyedire">Obowo</option>
             <option value="Aiyedire">Obudu</option>
             <option value="Aiyedire">Odeda</option>
             <option value="Aiyedire">Odigbo</option>
             <option value="Aiyedire">Odogbolu</option>
             <option value="Aiyedire">Odo-Otin</option>
             <option value="Aiyedire">Odubra</option>
             <option value="Aiyedire">Odukpani</option>
             <option value="Aiyedire">Offa</option>
             <option value="Aiyedire">Ofu</option>
             <option value="Aiyedire">Ogbadibo</option>
             <option value="Aiyedire">Ogbaru</option>
             <option value="Aiyedire">Ogbia</option>
             <option value="Aiyedire">Ogbmosho South</option>
             <option value="Aiyedire">Ogo Oluwa</option>
             <option value="Aiyedire">Ogoja</option>
             <option value="Aiyedire">Ogori/Mangongo</option>
             <option value="Aiyedire">Ogun Waterside</option>
             <option value="Aiyedire">Oguta</option>
             <option value="Aiyedire">Ohafia</option>
             <option value="Aiyedire">Ohaji/Egbema</option>
             <option value="Aiyedire">Ohaozara</option>
             <option value="Aiyedire">Ohaukwu</option>
             <option value="Ohimini">Ohimini</option>
             <option value="Aiyedire">Oji River</option>
             <option value="Aiyedire">Ojo</option>
             <option value="Aiyedire">Oju</option>
             <option value="Aiyedire">Oke-Ero</option>
             <option value="Aiyedire">Okehi</option>
             <option value="Aiyedire">Okeigbo</option>
             <option value="Aiyedire">Okene</option>
             <option value="Aiyedire">Okigwe</option>
             <option value="Aiyedire">Okitipupa</option>
             <option value="Aiyedire">Okobo</option>
             <option value="Aiyedire">Okpe</option>
             <option value="Aiyedire">Okpokwu</option>
             <option value="Aiyedire">Olamaboro</option>
             <option value="Aiyedire">Ola-Oluwa</option>
             <option value="Aiyedire">Olorunda</option>
             <option value="Aiyedire">Olorunsogo</option>
             <option value="Aiyedire">Oluyole</option>
             <option value="Aiyedire">Omala</option>
             <option value="Aiyedire">Ona-Ara</option>
             <option value="Aiyedire">Ondo East</option>
             <option value="Aiyedire">Ondo West</option>
             <option value="Aiyedire">Onicha</option>
             <option value="Aiyedire">Onitsha North</option>
             <option value="Aiyedire">Onitsha South</option>
             <option value="Aiyedire">Onna</option>
             <option value="Aiyedire">Oredo</option>
             <option value="Aiyedire">Orelope</option>
             <option value="Aiyedire">Orhionwon</option>
             <option value="Aiyedire">Ori Ire</option>
             <option value="Aiyedire">Oriade</option>
             <option value="Aiyedire">Orlu</option>
             <option value="Aiyedire">Orolu</option>
             <option value="Aiyedire">Oron</option>
             <option value="Aiyedire">Orsu</option>
             <option value="Aiyedire">Oru East</option>
             <option value="Aiyedire">Oru West</option>
             <option value="Aiyedire">Oruk Anam</option>
             <option value="Aiyedire">Orumba North</option>
             <option value="Aiyedire">Orumba South</option>
             <option value="Aiyedire">Ose</option>
             <option value="Aiyedire">Oshimili North</option>
             <option value="Aiyedire">Oshimili</option>
             <option value="Aiyedire">Oshodi-Isolo</option>
             <option value="Aiyedire">Osisioma</option>
             <option value="Aiyedire">Osogbo</option>
             <option value="Otukpo">Otukpo</option>
             <option value="Aiyedire">Ovia South-East</option>
             <option value="Aiyedire">Ovia SouthWest</option>
             <option value="Aiyedire">Owerri Municipal</option>
             <option value="Aiyedire">Owerri North</option>
             <option value="Aiyedire">Owerri West</option>
             <option value="Aiyedire">Owo</option>
             <option value="Aiyedire">Oye</option>
             <option value="Aiyedire">Oyi</option>
             <option value="Aiyedire">Oyo East</option>
             <option value="Aiyedire">Oyo West</option>
             <option value="Aiyedire">Oyun</option>
             <option value="Aiyedire">Pailoro</option>
             <option value="Aiyedire">Pankshin</option>
             <option value="Aiyedire">Patani</option>
             <option value="Aiyedire">Pategi</option>
             <option value="Aiyedire">Quaan Pan</option>
             <option value="Aiyedire">Rabah</option>
             <option value="Aiyedire">Rafi</option>
             <option value="Aiyedire">Rano</option>
             <option value="Aiyedire">Remo North</option>
             <option value="Aiyedire">Rijau</option>
             <option value="Aiyedire">Rimi</option>
             <option value="Aiyedire">Rimin Gado</option>
             <option value="Aiyedire">Ringim</option>
             <option value="Aiyedire">Riyom</option>
             <option value="Aiyedire">Sabon birni</option>
             <option value="Aiyedire">Sabon-Gari</option>
             <option value="Aiyedire">Sabuwa</option>
             <option value="Aiyedire">Safana</option>
             <option value="Aiyedire">Sagbama</option>
             <option value="Aiyedire">Sakaba </option>
             <option value="Aiyedire">Saki East</option>
             <option value="Aiyedire">Saki West</option>
             <option value="Aiyedire">Sandamu</option>
             <option value="Aiyedire">Sanga</option>
             <option value="Aiyedire">Sapele</option>
             <option value="Aiyedire">Sardauna</option>
             <option value="Aiyedire">Shagamu</option>
             <option value="Aiyedire">Shagari</option>
             <option value="Aiyedire">Shanga</option>
             <option value="Aiyedire">Shani</option>
             <option value="Aiyedire">Shanono</option>
             <option value="Aiyedire">Shelleng</option>
             <option value="Aiyedire">Shendam</option>
             <option value="Aiyedire">Shira</option>
             <option value="Aiyedire">Shiroro</option>
             <option value="Aiyedire">Shomgom</option>
             <option value="Aiyedire">Shomolu</option>
             <option value="Aiyedire">Silame</option>
             <option value="Aiyedire">Soba</option>
             <option value="Aiyedire">Sokoto North</option>
             <option value="Aiyedire">Sokoto South</option>
             <option value="Aiyedire">Song</option>
             <option value="Aiyedire">Southern Ijaw</option>
             <option value="Aiyedire">Suleja</option>
             <option value="Aiyedire">Sule-Tankarkar</option>
             <option value="Aiyedire">Sumaila</option>
             <option value="Aiyedire">Suru</option>
             <option value="Aiyedire">Surulere</option>
             <option value="Aiyedire">Surulere</option>
             <option value="Aiyedire">Tafa</option>
             <option value="Aiyedire">Tafawa-Balewa</option>
             <option value="Aiyedire">Takali</option>
             <option value="Aiyedire">Tambuwal</option>
             <option value="Aiyedire">Tarka</option>
             <option value="Aiyedire">Tarmua</option>
             <option value="Aiyedire">Taura</option>
             <option value="Aiyedire">Tofa</option>
             <option value="Aiyedire">Toro</option>
             <option value="Aiyedire">Toto</option>
             <option value="Aiyedire">Toungo</option>
             <option value="Aiyedire">Tqngaza</option>
             <option value="Aiyedire">Tsanyawa</option>
             <option value="Aiyedire">Tudun Wada</option>
             <option value="Aiyedire">Tureta</option>
             <option value="Aiyedire">Udenu</option>
             <option value="Aiyedire">Udi Agwu</option>
             <option value="Aiyedire">Udu</option>
             <option value="Aiyedire">Udung Uko</option>
             <option value="Aiyedire">Ughelli North</option>
             <option value="Aiyedire">Ughelli South</option>
             <option value="Aiyedire">Uhunmwonde</option>
             <option value="Aiyedire">Ukanafun</option>
             <option value="Aiyedire">Ukpoba</option>
             <option value="Aiyedire">Ukum</option>
             <option value="Aiyedire">Ukwa East</option>
             <option value="Aiyedire">Ukwa West</option>
             <option value="Aiyedire">Ukwani</option>
             <option value="Aiyedire">Umuahia North</option>
             <option value="Aiyedire">Umuahia South</option>
             <option value="Aiyedire">Umu-Neochi</option>
             <option value="Aiyedire">Ungogo</option>
             <option value="Aiyedire">Uruan</option>
             <option value="Aiyedire">Urue-Offong/Oruko</option>
             <option value="Aiyedire">Ushongo</option>
             <option value="Aiyedire">Ussa</option>
             <option value="Aiyedire">Uvwie</option>
             <option value="Aiyedire">Uyo</option>
             <option value="Aiyedire">Uzo Uwani</option>
             <option value="Aiyedire">Vandeikya</option>
             <option value="Aiyedire">Wamako</option>
             <option value="Aiyedire">Wamba</option>
             <option value="Aiyedire">Warawa</option>
             <option value="Aiyedire">Warji</option>
             <option value="Aiyedire">Warri Central</option>
             <option value="Aiyedire">Warri North</option>
             <option value="Aiyedire">Warri South</option>
             <option value="Aiyedire">Wasagu/Danko</option>
             <option value="Aiyedire">Wase</option>
             <option value="Aiyedire">Wudil</option>
             <option value="Aiyedire">Wukari</option>
             <option value="Aiyedire">Wurno</option>
             <option value="Aiyedire">Wushishi</option>
             <option value="Aiyedire">Y Zuru</option>
             <option value="Aiyedire">Yabo</option>
             <option value="Aiyedire">Yagba East</option>
             <option value="Aiyedire">Yagba West</option>
             <option value="Aiyedire">Yala</option>
             <option value="Aiyedire">Yamaltu/Delta</option>
             <option value="Aiyedire">Yankwashi</option>
             <option value="Aiyedire">Yarkur</option>
             <option value="Aiyedire">Yenegoa</option>
             <option value="Aiyedire"> Yola North</option>
             <option value="Aiyedire">Yola South</option>
             <option value="Aiyedire">Yorro</option>
             <option value="Aiyedire">Yunusari</option>
             <option value="Aiyedire">Zaki</option>
             <option value="Aiyedire">Zango</option>
             <option value="Aiyedire">Zango-Kataf</option>
             <option value="Zaria">Zaria</option>
             <option value="Zing">Zing</option>
             <option value="Others">Others</option>
            </select>
       
    </div>
</div>
<div class="form-group">
                    <div class="cols-sm-10">                 
 
            <label for="description">Institution</label>
            <select class="form-control" name="institution">
                <option value="Abdu Gusau Poly Zamfara">Abdu Gusau Poly Zamfara</option>
        <option value="Abia St. Col. Hth. Sci. Mgt. and Technology">Abia St. Col. Hth. Sci. Mgt. and Technology</option>
        <option value="Abia State Polytechnic">Abia State Polytechnic</option>
        <option value="Abia State University">Abia State University</option>
        <option value="Abraham Adesanya Polytechnic">Abraham Adesanya Polytechnic</option>
        <option value="Abubakar Tafawa Balewa Univ.">Abubakar Tafawa Balewa Univ.</option>
        <option value="Abubakar Tatari Ali Polytechnic">Abubakar Tatari Ali Polytechnic</option>
        <option value="Abuja Sch of Acct &amp; Comp Stud">Abuja Sch of Acct &amp; Comp Stud</option>
        <option value="Achievers University  Owo  Ondo State">Achievers University  Owo  Ondo State</option>
        <option value="Adamawa State Polytechnic">Adamawa State Polytechnic</option>
        <option value="Adamawa State Univ.">Adamawa State Univ.</option>
        <option value="Adekunle Ajasin University">Adekunle Ajasin University</option>
        <option value="Adeleke University, Ede">Adeleke University, Ede</option>
        <option value="Adeyemi College of Education">Adeyemi College of Education</option>
        <option value="Afe Babalola Univ Ado-Ekiti">Afe Babalola Univ Ado-Ekiti</option>
        <option value="Ahmadu Bello University">Ahmadu Bello University</option>
        <option value="0b0b16b4-758e-4fd6-9001-1d8e027d13cf">Airforce Inst of Tech Afit Kaduna</option>
        <option value="1dc6a7f7-94c5-4642-aaf8-75b4f5798450">Ajayi Crowther University Oyo</option>
        <option value="b32f9944-4511-4cdd-8378-a516e2d12901">Akanu Ibiam Federal Polytechnic</option>
        <option value="8b749330-6f93-4cc2-95a3-5e7e8e652d5c">Akperan Orshi Coll. of Agric Yandev</option>
        <option value="4c01d921-26ce-4787-b1f2-2a17ca34319c">Akwa Ibom State Polytechnic</option>
        <option value="6e82d198-9192-428f-8ae8-20e18283f713">Akwa Ibom State University</option>
        <option value="b592079d-3339-4195-ae19-a707e94c84f6">Al-Hikma University</option>
        <option value="46b47e1e-3705-45ed-8d8f-af1bf1fc33eb">Al-Qalam University</option>
        <option value="3c40e233-e15f-4890-b7fe-d4b3beed4270">Alex Ekwueme Federal University Ndufu-Alike</option>
        <option value="7be1a6b3-f822-4f35-84d8-18a51e62e0e6">All Over Central Polytechnic</option>
        <option value="a5a918a7-41bd-4d7c-a35d-2d1814163792">Ambrose Alli University</option>
        <option value="98a381ed-6291-4dee-9705-2f75f475c02f">American Univ. of Nigeria</option>
        <option value="f1e86f4b-a892-406f-ac3e-c6a641bd8194">Auchi Polytechnic</option>
        <option value="3d04cd9d-22f3-4a71-bb3a-99d7ab036c4a">Audu Bako Coll of Agric. Dambatta</option>
        <option value="e55d98ac-6bae-4a07-bb5c-dbadde30d174">Augustine University Ilara,Lagos</option>
        <option value="935160b5-a771-4b4c-89f0-528296c027a3">Babcock University</option>
        <option value="bde1ca48-3162-46c5-972b-c30ccc4b2d53">Bauchi State College of Agriculture</option>
        <option value="7cc12c10-e68c-4b2c-a80e-171399d7cf5c">Bauchi State University</option>
        <option value="c20cd2de-3cf0-4fdb-9cad-078692dfb2f1">Bayero University</option>
        <option value="1b008710-52f9-4c9b-8b11-ba6bbdfc2e9d">Baze University, Abuja</option>
        <option value="d1b2c4e8-de09-4ed1-b280-dee562a6c5ea">Bells University Ota</option>
        <option value="52e8660f-b3dd-4530-9463-98c25cd691a6">Benson Idahosa University</option>
        <option value="Benue Polytechnic">Benue Polytechnic</option>
        <option value="Benue State University">Benue State University</option>
        <option value="1f8461e4-7e94-4801-aa43-a9092c0fed65">Bingham University Karu</option>
        <option value="0c687a11-fc33-4d05-8f30-1d57ade094a9">Binyaminu Usman Polytechnic</option>
        <option value="c3780265-e984-4ce5-afe8-24c33199e2c5">Bowen University</option>
        <option value="4ab89b2a-9fd8-411d-82f3-05e16fa1a98a">Caleb University, Imota</option>
        <option value="8ea2e226-9ff4-4362-be69-fa7299eb2111">Caritas University Enugu</option>
        <option value="7c6269f8-e1e7-42d3-b01f-0cdcc8b1d42e">Chrisland University,Owode</option>
        <option value="0f5bc035-5594-4730-860e-4bc781c62764">Christopher University, Mowe, Ogun</option>
        <option value="a3f632dc-f25c-4930-ba54-357fed650b10">Chukwuemeka Odumegwu Ojukwu Univ.</option>
        <option value="81cfe985-da6a-4064-918c-8b412ed281e8">Coll of Agric and Animal Sc. Bakura</option>
        <option value="a6ebec51-abd0-43e9-9e7d-1246e83163b3">Coll of Hth Sci Luth  Idi-Araba</option>
        <option value="9a31b4a9-1d84-4d1e-8148-7b372c0f71bf">Coll of Hth Sci Nnamdi Azik Univ</option>
        <option value="1ad77738-f958-4d0a-ba04-aa2f8748e1e2">Coll. of Agric. &amp; Ani. Sci. Kaduna</option>
        <option value="6e603c99-f014-4d82-afad-9a71a2ad8a16">College of Administrative &amp; Business Studies</option>
        <option value="14ba0c85-ee17-43c8-9997-c82a81ea116a">College of Agric. Lafia.</option>
        <option value="4021bfc7-0bf6-497c-8490-347b19fd45c3">College of Agriculture  Kaba</option>
        <option value="36743bde-f9f1-4944-8acb-75690498d0eb">College of Agriculture  Zuru</option>
        <option value="a1e40d2d-6e31-4220-b25d-8369f4289d22">College of Agriculture Taraba</option>
        <option value="94ed09c0-b908-41dc-acc0-01185793e416">College of Health Technology Zawan</option>
        <option value="551a4681-42bf-4a25-96e5-977b5e298a50">College of Hth Tech Calabar</option>
        <option value="34285c4f-afb5-42b2-86c7-eaab72ae5619">Covenant Polytechnic</option>
        <option value="4ff12c00-e860-4fd4-82fa-9e4fdbef78bc">Covenant University Ota</option>
        <option value="5eab4dfd-83d9-45fb-b765-a0745dd25684">Crawford University Igbesa</option>
        <option value="6f92d375-dee7-419a-8b4d-ad7d8f9dac03">Crescent University Abeokuta</option>
        <option value="c3bbfa86-6904-427f-b106-244f77e46f3f">Cross River Univ. of Tech</option>
        <option value="26ad1e19-8ec2-4bfe-9d00-4b4dac7c71da">Crown Polytechnic</option>
        <option value="318082c2-c5d1-44c1-9575-a6622629d918">D.S Adegbenro Ict Polytechnic</option>
        <option value="ae890f38-1a05-4c62-b17e-fc72f7cbb3a5">Delta State College of Health Tech, Ofuoma</option>
        <option value="1f54cd35-ffd4-45fc-a761-a4a86582ad52">Delta State Poly Otefe-Oghara</option>
        <option value="d470a36f-15ac-491c-a60d-4ae802267f1d">Delta State Polytechnic  Ozoro</option>
        <option value="72340d1f-f581-4352-8070-63bf9a64de02">Delta State Polytechnic, Ogwashi-Uku</option>
        <option value="f4b1261b-44f1-4c08-ac6e-4b064dc67193">Delta State University</option>
        <option value="6fa96e5c-63ee-4f3b-b9f0-4c8e3318a9a8">Dorben Polytechnic, Abuja</option>
        <option value="8dd1a137-e4ce-4260-8003-fa8ef173995b">Ebonyi State University</option>
        <option value="c44612cc-f7c3-4228-9c80-192fae38b328">Edo State College of Agric. Iguoriakhi</option>
        <option value="a3bf375d-0334-45b7-a16a-899131362402">Edo State Institute of Tech. and Mgt.</option>
        <option value="b317245e-04ae-42e0-93db-5392d44b9d70">Edo University, Iyamho</option>
        <option value="cbd70af7-98ca-4fb8-9e1c-9def9ebf0d96">Edwin Clark University</option>
        <option value="c9d1c130-4283-46eb-b7e0-80dc8e217e45">Ekiti State University</option>
        <option value="8c202d42-60a8-47c2-bfa7-de7cbcfe0b45">Elizade University</option>
        <option value="6557f0dd-cfe5-4d4e-a67e-737af391419a">Enugu St. Univ. of Sci. &amp; Tech</option>
        <option value="a816a520-57af-4ff9-bec9-f368cb21a23e">Enugu State Polytechnic</option>
        <option value="4d711a40-a1d5-407e-9f0d-01b7814a8f9a">Evangel University</option>
        <option value="004db168-5b6d-47de-ae99-bf432f0ef2d0">Fed Col of Ani Hth &amp; Prd Tec Moor Plantation</option>
        <option value="26beebff-cbcb-4c4e-9b85-c62365adfcc1">Fed Col of Ani Hth &amp; Prd Tec Vom</option>
        <option value="b6f3139b-4778-42e0-923f-9579df8ffeb1">Fed Col of Wildlife Mgt New Bussa</option>
        <option value="2c32e775-7283-4ffa-b9a3-cba86353a547">Fed Coll of Agric. I.A.R.&amp;T  Ibadan</option>
        <option value="fd66b903-e637-45a7-9378-b237feb54cf2">Fed Coll of F/W Fish N/Bussa</option>
        <option value="00e001a7-b85f-4e02-8087-7dd2769cc9b4">Fed Coll of Fish &amp; Mar Tech Lagos</option>
        <option value="db48aae2-914f-42f6-8521-2c0d3359d2b6">Fed Coll of For. Mech  Afaka</option>
        <option value="50d4a21c-a19e-49ac-8ff3-0011b7a4f10c">Fed Coll of Forestry J/ Hill Ibadan</option>
        <option value="d4da3c42-0262-445f-bf59-3c3f3f878fc8">Fed Coll of Horticulture Dadinkowa</option>
        <option value="c59e46ef-6669-4bcc-bdf2-83e68ecd5909">Fed Coll of Land Res Tech  Kuru</option>
        <option value="86d6ae42-6fc4-483a-8d34-46623816934b">Fed Coll of Land Res Tech Owerri</option>
        <option value="c2889be5-6f25-4af6-bf0e-b0943e2627ab">Fed Coll. of Freshwater Fisheries Tech, Baga</option>
        <option value="4020d8c6-0ef4-4d02-8764-88b0a7df6b73">Fed Coop Coll.  Ibadan</option>
        <option value="286eb1a3-226c-445c-b685-02922c71a663">Fed Coop Coll.  Kaduna</option>
        <option value="ab90e9af-c446-4803-a5fd-e6eb53ccfd06">Fed Sch of Dent Tech &amp; Thpy Enugu</option>
        <option value="bfbcca6c-703c-4138-9ece-20f68967f4ce">Fed Univ of Pet. Resources Effurun</option>
        <option value="27e7b8cf-0006-4b02-8d0a-a55ca67a5b09">Fed. Co-Op Coll.  Oji-River</option>
        <option value="9c18ed43-733e-4fcf-901d-d9eb653504f1">Fed. College of Orthopaedic Tech. Igbobi Lagos</option>
        <option value="35315eba-a0bd-48e7-8114-6a64851eb1c3">Fed. Univ. Birnin Kebbi</option>
        <option value="8abb1887-3f78-4b6a-87f6-5e6f8e0e16c0">Fed. Univ.Of Agric Abeokuta</option>
        <option value="Fed. Univ. of Agriculture Makurdi">Fed. Univ. of Agriculture Makurdi</option>
        <option value="c7757e4d-6616-43f1-ac8a-b52b08f9dc3a">Federal Coll. of Agric. Akure</option>
        <option value="a24459a9-e23f-490f-b143-40c6dfc1fc8c">Federal Coll. of Agric. Ishiagu</option>
        <option value="3adeb19f-aa00-4eb5-aea8-5a452343f84a">Federal Coll. of Forestry  Jos</option>
        <option value="b2320e21-766f-460c-ac6b-4a37b7505629">Federal College of Agricultural Produce Tech. Kano</option>
        <option value="bd9edb24-8ee8-421e-b2b7-7c84cc261553">Federal Poly Kaura - Namoda</option>
        <option value="39201d35-768c-4d73-b2c5-d4daa7e55eb1">Federal Polytechnic  Ado-Ekiti.</option>
        <option value="6b11da59-b339-4613-b980-737f6b4b144c">Federal Polytechnic  Ede.</option>
        <option value="81e04dcb-7183-420a-82d0-b952c81a12d2">Federal Polytechnic  Nasarawa</option>
        <option value="ebe3b5a1-e85c-4f07-8ab7-79d4d68f7c57">Federal Polytechnic  Offa.</option>
        <option value="644f42ed-dbf2-4a23-b5d4-3dc36ed37347">Federal Polytechnic Bauchi</option>
        <option value="Federal Polytechnic Bida">Federal Polytechnic Bida</option>
        <option value="887fd9f0-af88-4938-be0e-35ef72774fcf">Federal Polytechnic Damaturu</option>
        <option value="c6079b73-ea8c-4d63-acbc-d97e2cd5c37a">Federal Polytechnic Idah</option>
        <option value="c621ae46-f4b4-4fea-88f0-a44dd6616d24">Federal Polytechnic Ilaro</option>
        <option value="34c74cb3-ee49-49aa-9bd5-5daff8f588d8">Federal Polytechnic Mubi</option>
        <option value="f9f653ba-b9d0-48fc-9edf-3a8c0db05ec4">Federal Polytechnic Nekede</option>
        <option value="07b48a4e-a7bc-446c-afc5-0b1a5f3725c5">Federal Polytechnic Oko</option>
        <option value="77549da5-17fa-4121-9f78-81b0d2ea996b">Federal School of Radiography Yaba</option>
        <option value="655935cc-8237-4fcd-a403-025a00e338ad">Federal School of Surveying Oyo</option>
        <option value="Federal Univ. of Tech Owerri">Federal Univ. of Tech Owerri</option>
        <option value="Federal Univ. of Tech.  Bauchi">Federal Univ. of Tech.  Bauchi</option>
        <option value="Federal Univ. of Tech. Akure">Federal Univ. of Tech. Akure</option>
        <option value="Federal Univ. of Tech. Minna">Federal Univ. of Tech. Minna</option>
        <option value="Federal University ,Lafia, Nasarawa State">Federal University ,Lafia, Nasarawa State</option>
        <option value="Federal University Duste">Federal University Duste</option>
        <option value="Federal University Dutsin-Ma">Federal University Dutsin-Ma</option>
        <option value="Federal University Gusau">Federal University Gusau</option>
        <option value="Federal University Kashere, Gombe">Federal University Kashere, Gombe</option>
        <option value="Federal University Lokoja">Federal University Lokoja</option>
        <option value="Federal University Otuoke">Federal University Otuoke</option>
        <option value="Federal University Oye-Ekiti">Federal University Oye-Ekiti</option>
        <option value="Federal University Wukari">Federal University Wukari</option>
        <option value="337875b5-3d0b-4e3e-a845-68587843e24d">Federal University, Gashua</option>
        <option value="610780f2-fee9-4951-88f3-2e42482396bd">Fidei Polytechnic</option>
        <option value="9e63982b-88d5-4053-9f6c-4871c5ef0538">Fountain University Osogbo</option>
        <option value="f34bee9a-dfa2-4fe8-8769-2e5fa05292b1">Gateway Polytechnic</option>
        <option value="e83bc65b-7278-4a9b-b6a6-34660837b977">Godfrey Okoye Univ Enugu</option>
        <option value="5d93df05-c69e-4d22-95a8-30a3e3f9cc12">Gombe State University</option>
        <option value="6e9cac4b-2aed-4e77-84cc-ab21bee0e58c">Grace Polytechnic</option>
        <option value="37b416a2-2f53-4d8e-b965-3f636d36c722">Gregory University Uturu</option>
        <option value="8808e4d3-37bd-48af-adc4-cd3c29c6e1d7">Hallmark University, Ijebu-Itele,Ogun</option>
        <option value="e1e316c8-cd91-4340-9b48-3c1e178f62c1">Hassan Usman Katsina Polytechnic</option>
        <option value="700342b7-b284-439b-bde6-7eb7c44c6ad7">Heritage Polytechnic</option>
        <option value="98550865-4c1a-400f-8804-b987563190d8">Hezekiah University</option>
        <option value="e1a8a197-e797-4a1e-8dbd-0dadef8d60f3">Hussaini Adamu Federal Polytechnic</option>
        <option value="b0818051-52db-4f40-b537-7c862695fc9b">Ibb.  Coll of Agric Obubra</option>
        <option value="cddd638a-e483-4af2-a94a-6371755d8e15">Ibrahim B. Babangida Univ Lapai</option>
        <option value="4a75c65c-9b0b-483b-98c2-17f8d1813985">Igbajo Polytechnic</option>
        <option value="50395ecb-7cb9-4e0e-8d22-bcefe3a56451">Igbinedion University</option>
        <option value="219f530f-4c1d-4877-923b-1ee83fe06c6e">Ignatius Ajuru Univ of Education</option>
        <option value="444a05e1-0cf0-48b1-9880-6fa8d4cc9c6a">Imo State Polytechnic</option>
        <option value="906749a7-c0d5-4c95-ba28-a3e00ac00423">Imo State University</option>
        <option value="177ea6f3-5f6e-4d79-8e59-01189f07d934">Institute of Mgt and Tech Enugu</option>
        <option value="271765ef-ce69-4c1c-a7c2-3f4ffb56c6a2">Interlink Polytechnic Ijebu Ijesa</option>
        <option value="fac2261e-4dbe-4042-a7c0-c2384df34d6b">Jigawa State Poly Dutse</option>
        <option value="Joseph Ayo Babalola Univ.  Ilesa">Joseph Ayo Babalola Univ.  Ilesa</option>
        <option value="Kaduna Polytechnic">Kaduna Polytechnic</option>
        <option value="Kaduna State University">Kaduna State University</option>
        <option value="Kano State Polytechnic">Kano State Polytechnic</option>
        <option value="Kano State Univ of Science and Tech">Kano State Univ of Science and Tech</option>
        <option value="Kebbi St. Uni of Sci &amp; Tech Aleiro">Kebbi St. Uni of Sci &amp; Tech Aleiro</option>
        <option value="Kenule Benson Saro-Wiwa Polytechnic">Kenule Benson Saro-Wiwa Polytechnic</option>
        <option value="Kings University, Ode- Omu, Osun">Kings University, Ode- Omu, Osun</option>
        <option value="Kogi State Polytechnic">Kogi State Polytechnic</option>
        <option value="Kogi State University">Kogi State University</option>
        <option value="Kwara State College of Health Tech,">Kwara State College of Health Tech,</option>
        <option value="Kwara State Polytechnic">Kwara State Polytechnic</option>
        <option value="a11d9b31-47ac-429c-a93f-21810563c9e2">Kwara State Univ Malete</option>
        <option value="ec417bc1-bb58-4b87-9280-3e781b474806">Kwararafa University Wukari</option>
        <option value="3e1f287f-81bd-4f8c-ac0b-1d5b73f67566">Ladoke Akintola Univ of Sci and Tech</option>
        <option value="80da4ca5-07a5-4f22-af41-c115ec06acaa">Lagos City Polytechnic  Ikeja</option>
        <option value="77158ad0-2436-44a5-9ce7-b6474585d59c">Lagos State Polytechnic</option>
        <option value="e2807cb5-e323-49b1-bfdd-692e2b4d47ea">Lagos State University</option>
        <option value="2d3d1fe6-f751-4f7a-bc38-c7d57ce344dc">Landmark University</option>
        <option value="7971754b-cd26-4429-9367-c59a1cc4da83">Lead City University Ibadan</option>
        <option value="753eb2eb-c5cf-471b-95ad-2f6c7804a299">Light House Polytechnic Evbuobanosa</option>
        <option value="e9e5fa9c-ae0d-4043-9099-c42511bb3e60">Madonna University Okija Anambra</option>
        <option value="2cb6e989-bbc5-462d-9a90-4595ce489cff">Maritime Academy of Nigeria Oron</option>
        <option value="22e46c15-c5ae-4cae-8b2e-5d6818904185">McPherson University</option>
        <option value="acff39f8-f2b5-4821-9a20-94ff3609a7f4">Michael and Cecilia Ibru Univ.</option>
        <option value="99e0135d-9a0e-4aa6-90ce-53a2ef63a4c3">Michael Okpara Univ. of Agric</option>
        <option value="00112e39-9273-480a-9ea3-b9582cf1032b">Micheal and Cecilia Ibru Univ. Owhrode, Delta</option>
        <option value="e9fe7152-7488-4b7c-9d3b-f30d3665436a">Modibbo Adama University of Technology</option>
        <option value="2bd24c14-2b66-442e-9b9a-58c50c259d27">Mohammet Lawan Coll. of Agric</option>
        <option value="c246f212-b38f-4341-9771-efb9d4f3c876">Moshood Abiola Polytechnic</option>
        <option value="5c64aa14-db20-4767-a548-3fe28d306185">Mountain Top Univ. Makogi/Oba, Ogun</option>
        <option value="bfbc962d-863e-4126-b4e2-ae81c865c751">Nasarawa State Polytechnic</option>
        <option value="592736f3-6cec-47d6-928a-2be5d62e214f">Nasarawa State University</option>
        <option value="c21b451c-6ae7-4dfe-85b6-45db3b528461">Nat Orth Hosp Col of Hth Sci Igbobi</option>
        <option value="1b84d700-7874-4505-9e24-a6eb687c24a1">National Open University of Nigeria, Noun</option>
        <option value="d479afad-fcaa-454d-a0c7-bf86c1cdacce">National Water Res. Inst. Kaduna</option>
        <option value="3208a2a0-f386-4032-a720-8ed687ecc6c6">Nig Inst of Lth and Sci Tech Zaria</option>
        <option value="72df9b49-96c4-4ba6-8676-fffa157b8f31">Nig. Army Sch of Fin &amp; Admin Apapa</option>
        <option value="7de9451c-daa6-42d0-9be4-cfac9fc31fb2">Niger Delta University</option>
        <option value="d4b27116-36c2-42e9-83f6-57b9755a6181">Niger St. Coll of Agric Mokwa</option>
        <option value="a4f03b7b-17cf-4463-8974-51235de109eb">Niger State Polytechnic Zungeru</option>
        <option value="17af5563-7fb7-45b4-b328-1101a1770ff9">Nigeria Army Inst. of Tech and Environ Stud</option>
        <option value="29d6130a-9ba9-4ebb-b687-1e1976cc27c2">Nigeria Inst. of Leather and Science Tech</option>
        <option value="3b38131c-cb52-4a05-8212-981b552ac078">Nigerian Army School of Finance and Admin</option>
        <option value="5ac8c4b6-39a9-4479-9664-ef287b9e4c35">Nigerian Army University, Biu</option>
        <option value="Nigerian College of Aviation Technology">Nigerian College of Aviation Technology</option>
        <option value="Nigerian Defence Academy">Nigerian Defence Academy</option>
        <option value="Nigerian Inst of Journalism  Ikeja">Nigerian Inst of Journalism  Ikeja</option>
        <option value="Nile University of Nigeria Abuja">Nile University of Nigeria Abuja</option>
        <option value="Nkst Coll. of Health Tech  Mkar">Nkst Coll. of Health Tech  Mkar</option>
        <option value="Nnamdi Azikiwe University">Nnamdi Azikiwe University</option>
        <option value="Novena University Ogume">Novena University Ogume</option>
        <option value="Nuhu Bamalli Poly Zaria">Nuhu Bamalli Poly Zaria</option>
        <option value="Nysc University">Nysc University</option>
        <option value="Obafemi Awolowo University">Obafemi Awolowo University</option>
        <option value="Obong University">Obong University</option>
        <option value="Oduduwa University, Ipetumodu">Oduduwa University, Ipetumodu</option>
        <option value="Ogun St Coll of H/ Tech Ilese-Ijebu">Ogun St Coll of H/ Tech Ilese-Ijebu</option>
        <option value="Ogun State Inst of Tech Igbesa">Ogun State Inst of Tech Igbesa</option>
        <option value="Olabisi Onabanjo University">Olabisi Onabanjo University</option>
        <option value="Ondo State Univ of Science and Tech. Osustech,">Ondo State Univ of Science and Tech. Osustech,</option>
        <option value="Osun St Coll of Edu Ila-Orangun">Osun St Coll of Edu Ila-Orangun</option>
        <option value="Osun State Coll. of Educ Ilesa">Osun State Coll. of Educ Ilesa</option>
        <option value="Osun State College of Tech.">Osun State College of Tech.</option>
        <option value="Osun State Poly">Osun State Poly</option>
        <option value="Osun State University Osogbo">Osun State University Osogbo</option>
        <option value="Our Saviour Polytechnic Enugu">Our Saviour Polytechnic Enugu</option>
        <option value="yo State College of Agriculture, Igboora">Oyo State College of Agriculture, Igboora</option>
        <option value="Oyo State College of Health Sc. and Technology, Eleyele">Oyo State College of Health Sc. and Technology, Eleyele</option>
        <option value="Pan Atlantic University">Pan Atlantic University</option>
        <option value="Paul University Awka,">Paul University Awka,</option>
        <option value="Petroleum Training Inst. Delta">Petroleum Training Inst. Delta</option>
        <option value="Plateau State Polytechnic">Plateau State Polytechnic</option>
        <option value="Plateau State University">Plateau State University</option>
        <option value="65aa386a-693a-4da8-9310-c52ddd67cd48">Ramat Polytechnic</option>
        <option value="Redeemers University">Redeemers University</option>
        <option value="Renaissance Univ . Ugbawka Enugu">Renaissance Univ . Ugbawka Enugu</option>
        <option value="Rhema University, Nigeria">Rhema University, Nigeria</option>
        <option value="Ritman University, Ikot-Ekpene,Akwa-Ibom">Ritman University, Ikot-Ekpene,Akwa-Ibom</option>
        <option value="Rivers State Coll of Art and Sc. Ph">Rivers St. Univ. of Sci. &amp; Tech</option>
        <option value="b437423f-bea7-4d35-9be0-944a1dd5fc20">Rivers State Coll of Art and Sc. Ph</option>
        <option value="Rivers State Coll of Hlt Sci &amp; Tech">Rivers State Coll of Hlt Sci &amp; Tech</option>
        <option value="Ronik Polytechnic Lagos">Ronik Polytechnic Lagos</option>
        <option value="Rufus Giwa Polytechnic">Rufus Giwa Polytechnic</option>
        <option value="Salem University Lokoja">Salem University Lokoja</option>
        <option value="Samaru College of Agriculture">Samaru College of Agriculture</option>
        <option value="Samuel Adegboyega University">Samuel Adegboyega University</option>
        <option value="Sch of Hth Info Mgt Akth Kano">Sch of Hth Info Mgt Akth Kano</option>
        <option value="Sch of Hth Info. Mgt. Abuth Zaria">Sch of Hth Info. Mgt. Abuth Zaria</option>
        <option value="School of Health Info Management Nauth">School of Health Info Management Nauth</option>
        <option value="School of Health Info. Management Oauth">School of Health Info. Management Oauth</option>
        <option value="School of Health Info.">School of Health Info. Management Uch</option>
        <option value="School of Health Info. Mgt, Ubth">School of Health Info. Mgt, Ubth</option>
        <option value="School of Health Info. Mgt. Uduth">School of Health Info. Mgt. Uduth</option>
        <option value="School of Health Info. Mgt. Uith">School of Health Info. Mgt. Uith</option>
        <option value="School of Health Info. Mgt. Umth">School of Health Info. Mgt. Umth</option>
        <option value="School of Health Info. Mgt. Uuth">School of Health Info. Mgt. Uuth</option>
        <option value="School of Health Info. Mgtluth">School of Health Info. Mgtluth</option>
        <option value="School of Health Information Management Uduth">School of Health Information Management Uduth</option>
        <option value="School of Health Information Management, Uuth">School of Health Information Management, Uuth</option>
        <option value="School of Health Tech.  Akure">School of Health Tech.  Akure</option>
        <option value="School of Hth  &amp; Info. Mgt Calabar">School of Hth  &amp; Info. Mgt Calabar</option>
        <option value="School of Med. Lab. Tech Enugu">School of Med. Lab. Tech Enugu</option>
        <option value="Shehu Idris Col of Hth Tech Makarfi">Shehu Idris Col of Hth Tech Makarfi</option>
        <option value="Skyline University Nigeria">Skyline University Nigeria</option>
        <option value="Sokoto State University">Sokoto State University</option>
        <option value="Southwestern University, Nigeria">Southwestern University, Nigeria</option>
        <option value="Sule Lamido University">Sule Lamido University</option>
        <option value="Summit University, Offa, Kwara">Summit University, Offa, Kwara</option>
        <option value="Tai Solarin Univ. of Education">Tai Solarin Univ. of Education</option>
        <option value="Tansian University Umunya">Tansian University Umunya</option>
        <option value="Taraba State University">Taraba State University</option>
        <option value="Temple Gate Poly Aba">Temple Gate Poly Aba</option>
        <option value="The Ibarapa Polytechnic">The Ibarapa Polytechnic</option>
        <option value="The Oke-Ogun Polytechnic">The Oke-Ogun Polytechnic</option>
        <option value="The Polytechnic Calabar">The Polytechnic Calabar</option>
        <option value="The Polytechnic Ibadan">The Polytechnic Ibadan</option>
        <option value="The Polytechnic Ife">The Polytechnic Ife</option>
        <option value="The Polytechnic of Sokoto State">The Polytechnic of Sokoto State</option>
        <option value="Umaru Musa Yaradua Univ. Katsina">Umaru Musa Yaradua Univ. Katsina</option>
        <option value="Univ. of Medical Sciences">Univ. of Medical Sciences</option>
        <option value="Univ. of Nigeria Enugu Campus">Univ. of Nigeria Enugu Campus</option>
        <option value="University of Abuja">University of Abuja</option>
        <option value="University of Agric Makurdi">University of Agric Makurdi</option>
        <option value="University of Benin">University of Benin</option>
        <option value="University of Calabar">University of Calabar</option>
        <option value="University of Ibadan">University of Ibadan</option>
        <option value="University of Ilorin">University of Ilorin</option>
        <option value="University of Jos">University of Jos</option>
        <option value="University of Lagos">University of Lagos</option>
        <option value="University of Maiduguri">University of Maiduguri</option>
        <option value="University of Mkar">University of Mkar</option>
        <option value="University of Nigeria">University of Nigeria</option>
        <option value="University of Port Harcourt">University of Port Harcourt</option>
        <option value="University of Uyo">University of Uyo</option>
        <option value="Usmanu Dan Fodiyo University">Usmanu Dan Fodiyo University</option>
        <option value="Veritas University Abuja">Veritas University Abuja</option>
        <option value="Wavecrest Col of Catr &amp; Hosp Mgt">Wavecrest Col of Catr &amp; Hosp Mgt</option>
        <option value="Waziri Umaru Poly Birnin Kebbi">Waziri Umaru Poly Birnin Kebbi</option>
        <option value="Wellspring University">Wellspring University</option>
        <option value="Wesley University Ondo">Wesley University Ondo</option>
        <option value="Western Delta University Oghara">Western Delta University Oghara</option>
        <option value="Wolex Polytechnic">Wolex Polytechnic</option>
        <option value="aba College of Technology">Yaba College of Technology</option>
        <option value="Yobe State College of Agriculture">Yobe State College of Agriculture</option>
        <option value="Yobe State University">Yobe State University</option>
        <option value="Yusuf Maitama Sule University">Yusuf Maitama Sule University</option>
                
                <option value="Others">Others</option>
                
            </select>
       
    </div>
</div>

<div class="form-group">
                    <div class="cols-sm-10">                 
 
            <label for="description">Course of Study</label>
           <select class="form-control" name="course">
                <option value="Accounting">Accounting</option><option value="Acting/Directing">Acting/Directing</option><option value="Actuarial Science">Actuarial Science</option><option value="Africana Studies">Africana Studies</option><option value="Agricultural Engineering">Agricultural Engineering</option><option value="Allied Health">Allied Health</option><option value="American Culture Studies">American Culture Studies</option><option value="Anthropology">Anthropology</option><option value="Apparel Merchandising and Product Development">Apparel Merchandising and Product Development</option><option value="Applied Economics">Applied Economics</option><option value="Applied Mathematics">Applied Mathematics</option><option value="Archaeology">Archaeology</option><option value="Architecture and Enviromental Design">Architecture and Enviromental Design</option><option value="Art Education">Art Education</option><option value="Art History">Art History</option><option value="Arts">Arts</option><option value="Asian Studies">Asian Studies</option><option value="Aviation Engineering Technology">Aviation Engineering Technology</option><option value="Aviation Management and Operations">Aviation Management and Operations</option><option value="Aviation Studies">Aviation Studies</option><option value="Biochemistry">Biochemistry</option><option value="Biology">Biology</option><option value="Broadcast Journalism">Broadcast Journalism</option><option value="Building">Building</option><option value="Business Administration">Business Administration</option><option value="Business Analytics &amp; Intelligence">Business Analytics &amp; Intelligence</option><option value="Business and Marketing Education">Business and Marketing Education</option><option value="Business Systems">Business Systems</option><option value="Chemical Engineering">Chemical Engineering</option><option value="Chemistry">Chemistry</option><option value="Choral">Choral</option><option value="Civil Engineering">Civil Engineering</option><option value="Classic Science">Classic Science</option><option value="Classical Civilization">Classical Civilization</option><option value="Classroom/General Music">Classroom/General Music</option><option value="Communication">Communication</option><option value="Computer Engineering">Computer Engineering</option><option value="Computer Science">Computer Science</option><option value="Construction Management">Construction Management</option><option value="Creative Writing">Creative Writing</option><option value="Criminal Justice">Criminal Justice</option><option value="Criminal Justice - Forensic Investigation">Criminal Justice - Forensic Investigation</option><option value="Dance">Dance</option><option value="Data Science">Data Science</option><option value="Design/Technical Theatre">Design/Technical Theatre</option><option value="Dietetics">Dietetics</option><option value="Digital Arts">Digital Arts</option><option value="Dual Field Sciences">Dual Field Sciences</option><option value="Earth Science">Earth Science</option><option value="Ecology and Conservation Biology">Ecology and Conservation Biology</option><option value="Economics">Economics</option><option value="Education">Education</option><option value="Electrical Engineering">Electrical Engineering</option><option value="Electronics and Computer Engineering Technology">Electronics and Computer Engineering Technology</option><option value="Electronics Engineering">Electronics Engineering</option><option value="Engineering Technology">Engineering Technology</option><option value="English">English</option><option value="Enviromental Policy and Analysis">Enviromental Policy and Analysis</option><option value="Enviromental Science">Enviromental Science</option><option value="Estate Management">Estate Management</option><option value="Ethnic Studies">Ethnic Studies</option><option value="Exercise Science">Exercise Science</option><option value="Family and Consumer Sciences Education">Family and Consumer Sciences Education</option><option value="Film Production">Film Production</option><option value="Film Studies">Film Studies</option><option value="Finance">Finance</option><option value="Fire Administration">Fire Administration</option><option value="Flight Technology and Operations">Flight Technology and Operations</option><option value="Food Engineering">Food Engineering</option><option value="Forensic Biology">Forensic Biology</option><option value="Forensic Chemistry">Forensic Chemistry</option><option value="Forensic Science: Forensic Biology">Forensic Science: Forensic Biology</option><option value="Forensic Science: Forensic Chemistry">Forensic Science: Forensic Chemistry</option><option value="Forensic Science: Forensic Examination">Forensic Science: Forensic Examination</option><option value="French">French</option><option value="Geography">Geography</option><option value="Geology">Geology</option><option value="German">German</option><option value="Gerontology">Gerontology</option><option value="Graphic Design">Graphic Design</option><option value="Guitar: Jazz Emphasis">Guitar: Jazz Emphasis</option><option value="Health Care Administration">Health Care Administration</option><option value="Health Science">Health Science</option><option value="History">History</option><option value="Human Development and Family Studies">Human Development and Family Studies</option><option value="Hydrogeology">Hydrogeology</option><option value="Inclusive Early Childhood Education">Inclusive Early Childhood Education</option><option value="Individualized Business">Individualized Business</option><option value="Individualized Planned Program">Individualized Planned Program</option><option value="Information and Communication Engineering">Information and Communication Engineering</option><option value="Information Communication and Technology (ICT)">Information Communication and Technology (ICT)</option><option value="Information Systems">Information Systems</option><option value="Information Systems Auditing and Control">Information Systems Auditing and Control</option><option value="Information Technology">Information Technology</option><option value="Instrumental">Instrumental</option><option value="Insurance">Insurance</option><option value="Integrated Language Arts">Integrated Language Arts</option><option value="Integrated Mathematics">Integrated Mathematics</option><option value="Integrated Sciences">Integrated Sciences</option><option value="Integrated Social Studies">Integrated Social Studies</option><option value="Interior Design">Interior Design</option><option value="Internal Relations">Internal Relations</option><option value="International Business">International Business</option><option value="International Studies">International Studies</option><option value="Intervention Specialist">Intervention Specialist</option><option value="Italian">Italian</option><option value="Japanese">Japanese</option><option value="Jazz Studies">Jazz Studies</option><option value="Journalism">Journalism</option><option value="Language">Language</option><option value="Latin">Latin</option><option value="Latin American Culture Studies">Latin American Culture Studies</option><option value="Law">Law</option><option value="Liberal Studies">Liberal Studies</option><option value="Linguistics">Linguistics</option><option value="Literature">Literature</option><option value="Long Term Care Administration">Long Term Care Administration</option><option value="Management">Management</option><option value="Management and Technology">Management and Technology</option><option value="Marine and Aquatic Biology">Marine and Aquatic Biology</option><option value="Marine Engineering">Marine Engineering</option><option value="Marketing">Marketing</option><option value="Master of Business Administration (MBA)">Master of Business Administration (MBA)</option><option value="Materials and Metallurgical Engineering">Materials and Metallurgical Engineering</option><option value="Mathematics">Mathematics</option><option value="Mechanical Engineering">Mechanical Engineering</option><option value="Mechatronics Engineering Technology">Mechatronics Engineering Technology</option><option value="Media Production">Media Production</option><option value="Media Studies">Media Studies</option><option value="Medical Laboratory Science">Medical Laboratory Science</option><option value="Medicine">Medicine</option><option value="Microbiology">Microbiology</option><option value="Middle Childhood Education">Middle Childhood Education</option><option value="Multiplatform Journalism">Multiplatform Journalism</option><option value="Music">Music</option><option value="Music Composition">Music Composition</option><option value="Music Education">Music Education</option><option value="Music History and Literature">Music History and Literature</option><option value="Music Performance">Music Performance</option><option value="Musical Arts">Musical Arts</option><option value="Musical Theatre">Musical Theatre</option><option value="Neuroscience">Neuroscience</option><option value="Nursing">Nursing</option><option value="Nutrition Sciences">Nutrition Sciences</option><option value="Paleobiology">Paleobiology</option><option value="Performance Studies">Performance Studies</option><option value="Performing Arts">Performing Arts</option><option value="Petrochemical Engineering">Petrochemical Engineering</option><option value="Petroleum Engineering">Petroleum Engineering</option><option value="Philosophy">Philosophy</option><option value="Philosophy, Politics, Economics, and Law (PPEL)">Philosophy, Politics, Economics, and Law (PPEL)</option><option value="Physical Education Health Education">Physical Education Health Education</option><option value="Physics">Physics</option><option value="Piano">Piano</option><option value="Planned Program">Planned Program</option><option value="Political Science">Political Science</option><option value="Popular Culture">Popular Culture</option><option value="Pre-Health Biology">Pre-Health Biology</option><option value="Psychology">Psychology</option><option value="Public Administration">Public Administration</option><option value="Public Health">Public Health</option><option value="Public Relations">Public Relations</option><option value="Quality Systems">Quality Systems</option><option value="Reading and Language Arts">Reading and Language Arts</option><option value="Religion">Religion</option><option value="Respiratory Care">Respiratory Care</option><option value="Russian">Russian</option><option value="Sales and Services Marketing">Sales and Services Marketing</option><option value="Science">Science</option><option value="Single Field Sciences">Single Field Sciences</option><option value="Social Studies">Social Studies</option><option value="Social Work">Social Work</option><option value="Sociology">Sociology</option><option value="Software Engineering">Software Engineering</option><option value="Spanish">Spanish</option><option value="Sport Management">Sport Management</option><option value="Statistics">Statistics</option><option value="Studio">Studio</option><option value="Supply Chain Management">Supply Chain Management</option><option value="Surveying">Surveying</option><option value="Telecommunication Engineering">Telecommunication Engineering</option><option value="Telecommunication Science">Telecommunication Science</option><option value="Theatre">Theatre</option><option value="Tourism, Leisure, and Event Planning">Tourism, Leisure, and Event Planning</option><option value="Visual Arts">Visual Arts</option><option value="Visual Communication Technology">Visual Communication Technology</option><option value="Vocal Pedogogy">Vocal Pedogogy</option><option value="Voice">Voice</option><option value="Woman's, Gender, and Sexuality Studies">Woman's, Gender, and Sexuality Studies</option><option value="Woodwind Specialist">Woodwind Specialist</option><option value="World Language Education">World Language Education</option><option value="World Music">World Music</option><option value="Youth Theatre/Puppetry">Youth Theatre/Puppetry</option><option value="Other">Other</option>
            </select>
       
    </div>
</div>
<div class="form-group">
                    <div class="cols-sm-10">                 
 
            <label for="description">level</label>
            <select class="form-control" name="level">
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
                <option value="600">600</option>
                <option value="ND1">ND1</option>
                <option value="ND2">ND2</option>
                <option value="NCE1">NCE1</option>
                <option value="NCE2">NCE2</option>
                <option value="NCE3">NCE3</option>
                <option value="HND1">HND1</option>
                <option value="HND2">HND2</option>
            </select>
       
    </div>
</div>
                    <div class="form-group">
            <label for="description">About Yourself</label>
            <textarea type="text"  class="form-control" id="taskDescription" name="description" maxlength="500"> </textarea>
        </div>      

                
        
          <div class="form-group">
            <label for="description">Upload passport</label>
            <input type="file" name="image" accept="image/*">
            
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>

          <div class="form-group">
            <label for="description">Upload Admission Letter</label>
           <input type="file" name="image2" accept="image/*">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>                 
    
    <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Bank</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="bank" id="bank" required placeholder="Bank Name"/>
                                    </div>
                                </div>
                            </div>
     <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Account Name:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="account_na" id="account_na" required placeholder="Account Name"/>
                                    </div>
                                </div>
                            </div>
     
     <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Account No:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="account_no" id="account_no" required placeholder="Account Number"/>
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
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Next>></button>
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
