@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
     <?php  
        $shop = Auth::user(); 
        $user_id=Auth::user()->id;
     ?>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style>
  .container {
    margin-right: 0px; 
    margin-left: 0px; 
    margin-top: 10px;
}


input[type="checkbox"] {
    position: relative;
    appearance: none;
    width: 50px;
    height: 25px;
    background: #ccc;
    border-radius: 50px;
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: 0.4s;
}

input:checked[type="checkbox"] {
    background: #7da6ff;
}

input[type="checkbox"]::after {
    position: absolute;
    content: "";
    width: 25px;
    height: 25px;
    top: 0;
    left: 0;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    transform: scale(1.1);
    transition: 0.4s;
}

input:checked[type="checkbox"]::after {
    left: 50%;
}

.square_round{
  height: 35px;
  width: 35px;
  background-color: #555;
  border-radius: 10px;
 
}

.square {
  height: 35px;
  width: 35px;
  background-color: #555;
}

.circle {
  height: 35px;
  width: 35px;
  background-color: #555;
  border-radius: 50%;
 
}

.labl {
    display: inline-block;
    width: auto;
}
.labl > input{ /* HIDE RADIO */
    visibility: hidden; /* Makes input not-clickable */
    position: absolute; /* Remove input from document flow */
}
.labl > input + div{ /* DIV STYLES */
    cursor:pointer;
    border:2px solid transparent;
}
.labl > input:checked + div{ /* (RADIO CHECKED) DIV STYLES */
    background-color: #555;
    border: 2px solid #ff6600;
}



html * {
      font-family: 'Montserrat', sans-serif;
      box-sizing: border-box;
}

/*body {
    background: #4688F1;
    padding: 0;
    margin: 0;
}*/

.login-box {
    background: #fff;
    padding: 20px;
    max-width: 480px;
    margin: 25vh auto;
    text-align: center;
    letter-spacing: 1px;
    position: relative;
}

.login-box:hover {
      box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}

.login-box h2 {
    margin: 20px 0 20px;
    padding: 0;
    text-transform: uppercase;
    color: #4688F1;
}

.social-button {
      background-position: 25px 0px;
    box-sizing: border-box;
    color: rgb(255, 255, 255);
    cursor: pointer;
    display: inline-block;
    height: 50px;
      line-height: 50px;
    text-align: left;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: middle;
    width: 100%;
      border-radius: 3px;
    margin: 10px auto;
    outline: rgb(255, 255, 255) none 0px;
    padding-left: 20%;
    transition: all 0.2s cubic-bezier(0.72, 0.01, 0.56, 1) 0s;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#facebook-connect {
    background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/facebook.svg?sanitize=true') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
    border: 1px solid rgb(60, 90, 154);
}

#facebook-connect:hover {
      border-color: rgb(60, 90, 154);
      background: rgb(60, 90, 154) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/facebook-white.svg?sanitize=true') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
      -webkit-transition: all .8s ease-out;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease-out;
}

#facebook-connect span {
      box-sizing: border-box;
    color: rgb(60, 90, 154);
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    border: 0px none rgb(255, 255, 255);
    outline: rgb(255, 255, 255) none 0px;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#facebook-connect:hover span {
      color: #FFF;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#google-connect {
    background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/google-plus.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
    border: 1px solid rgb(220, 74, 61);
}

#google-connect:hover {
      border-color: rgb(220, 74, 61);
      background: rgb(220, 74, 61) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/google-plus-white.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
      -webkit-transition: all .8s ease-out;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease-out;
}

#google-connect span {
      box-sizing: border-box;
    color: rgb(220, 74, 61);
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    border: 0px none rgb(220, 74, 61);
    outline: rgb(255, 255, 255) none 0px;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#google-connect:hover span {
      color: #FFF;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#twitter-connect {
    background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/twitter.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
    border: 1px solid rgb(85, 172, 238);
}

#twitter-connect:hover {
      border-color: rgb(85, 172, 238);
      background: rgb(85, 172, 238) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/twitter-white.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
      -webkit-transition: all .8s ease-out;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease-out;
}

#twitter-connect span {
      box-sizing: border-box;
    color: rgb(85, 172, 238);
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    border: 0px none rgb(220, 74, 61);
    outline: rgb(255, 255, 255) none 0px;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#twitter-connect:hover span {
      color: #FFF;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#linkedin-connect {
    background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/linkedin.svg?sanitize=true') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
    border: 1px solid rgb(0, 119, 181);
}

#linkedin-connect:hover {
      border-color: rgb(0, 119, 181);
      background: rgb(0, 119, 181) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/linkedin-white.svg?sanitize=true') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
      -webkit-transition: all .8s ease-out;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease-out;
}

#linkedin-connect span {
      box-sizing: border-box;
    color: rgb(0, 119, 181);
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    border: 0px none rgb(0, 119, 181);
    outline: rgb(255, 255, 255) none 0px;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}

#linkedin-connect:hover span {
      color: #FFF;
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}


</style>
<form class="form_submit_social">
    @csrf
  <div class="container">
  <div class="row">

    <div class="form-group col-md-6">
                    <label for="exampleInputFile">Theme</label>
                    <select id="themePreview" name="type_theme" class="select form-control">
                        <option value="1" selected="selected">Buttons</option>
                        <option value="0">Icons  </option>
                    </select>
    </div>

  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" style="display: block;">Shape And Size</label>

    <label class="labl">
    <input type="radio" name="radioname" value="0" checked="checked"/>
    <div class="square"></div>
    </label>

    <label class="labl">
    <input type="radio" name="radioname" value="1" />
    <div class="square_round"></div>
    </label>

    <label class="labl">
    <input type="radio" name="radioname" value="2" />
    <div class="circle"></div>
    </label>
    
  </div>

  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Social Services</label>
   <div class="check-box">
    <input type="checkbox" name="fb" checked>
    <svg style="height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" ><path d="M21.5,15.5H18v13.1h-5.4V15.5H10v-4.6h2.6V8c0-2.1,1-5.5,5.5-5.5l4,0V7h-2.9C18.6,7,18,7.2,18,8.2v2.7h4L21.5,15.5z"></path></svg>
     <input type="checkbox" name="twitter" checked>
    <svg style="height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M27.4,8.4c-0.9,0.4-1.8,0.6-2.7,0.8c1-0.6,1.7-1.5,2.1-2.6c-0.9,0.5-1.9,0.9-3,1.2c-0.9-0.9-2.1-1.5-3.5-1.5 c-2.6,0-4.8,2.1-4.8,4.8c0,0.4,0,0.7,0.1,1.1c-4-0.2-7.5-2.1-9.9-5C5.3,7.7,5.1,8.5,5.1,9.4c0,1.7,0.8,3.1,2.1,4 c-0.8,0-1.5-0.2-2.2-0.6c0,0,0,0,0,0.1c0,2.3,1.6,4.2,3.8,4.7c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1 c0.6,1.9,2.4,3.3,4.5,3.3c-1.6,1.3-3.7,2-5.9,2c-0.4,0-0.8,0-1.1-0.1c2.1,1.4,4.6,2.1,7.3,2.1c8.8,0,13.6-7.3,13.6-13.6 c0-0.2,0-0.4,0-0.6C25.9,10.2,26.7,9.3,27.4,8.4z"></path></svg>
  </div>
  </div>

  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Widget heading</label>
    <input name="heading" type="text" class="form-control" id="widget_heading" placeholder="Enter widget heading" value="{{ isset($user_data) ? $user_data->widget_heading :''}}" required>
  </div>
  <input type="hidden" name="id" value="{{$user_id}}" />

   </div>

  <button type="submit" class="btn btn-primary submit_btn_social">Submit</button>
 </div>
</form>


<?php if($user_data->theme=='1'){?> 
<div class="login-box">
            <h2 class="heading">Social Login Button</h2>
            <a href="#" class="social-button" id="facebook-connect"><span>Facebook</span></a>
            <a href="#" class="social-button" id="google-connect"> <span>Google</span></a>
            <a href="#" class="social-button" id="twitter-connect"> <span>Twitter</span></a>
            <a href="#" class="social-button" id="linkedin-connect"> <span>LinkedIn</span></a>
</div>
<?php }?>


<?php if($user_data->theme=='0'){?> 
<div class="login-box icon_box">
            <h2 class="heading">Social Login Button</h2>
            <a href="#" class="social-button" id="facebook-connect"></a>
            <a href="#" class="social-button" id="google-connect"> </a>
            <a href="#" class="social-button" id="twitter-connect"> </a>
            <a href="#" class="social-button" id="linkedin-connect"> </a>
</div>
<?php }?>



@endsection

@section('scripts')
    @parent

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>

    <script type="text/javascript">

$('.form_submit_social').validate({
    rules: {
      
    },
    messages: {
        
    },
    errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-control').parent().append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },

    submitHandler: function (form) {
        var button = $('.submit_btn_social');
        var form_all = $(".form_submit_social")[0];
            var formData = new FormData(form_all);

            var old_text = $(button).closest('.submit_btn_social').text();
                $.ajax({
                    url: '/socialstore',
                    type: 'POST',
                    data: formData,
                    contentType: false, //this is requireded please see answers above
                    processData: false,
                    beforeSend: function(){
                        $(button).prop('disabled', true);
                         $(button).text('Please wait...');
                      
            
                    },
                    success: function (data) {
                        if (data.status === true) {
                           $(button).prop('disabled', false);
                            $(button).text(old_text);
                             toastr.success(data.message);

                        } else {
                              $(button).prop('disabled', false);
                           
                        }
                    },
                    error: function (e) {
                          $(button).prop('disabled', false);
                       
                    }
                });
            //}
        //});
    }
});
</script>

<script>
    //for heading text
    $("#widget_heading").keyup(function() {
if(this.value.length >0){
    $(".heading").html(this.value);
}
else {
     $(".heading").html('Social login button');
}
});

// for theme button or icon 

        $("#themePreview").change(function() {

            if(this.value=='1'){
              $(".icon_box").hide();
            }

});

</script>


@endsection
