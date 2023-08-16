@extends('shopify-app::layouts.default')

@section('content')
    
<!DOCTYPE html>
<html>
    <head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />

    </head>
<body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://kit.fontawesome.com/80aa64634a.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".mt-preloader-icon").fadeOut("slow");
    });
</script>

<?php 
$shop=Auth::user();
//echo "<pre>";
//print_r($shop);dd();
?>
 


    <div class="container-fluid">

        <form id="social-setting-frm" action="/save_social_setting" method="POST" style="width: 100%;">
        <div class="col-xl-9 col-lg-9 d-sm-flex align-items-center justify-content-between m-auto pb-4">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
        
       
        </div>
        <input type="hidden" name="_token" value="a9nrkH5Mipms0J1RESiYjvdVMn2WZyKoRfXT9f8D">
        <input type="hidden" name="user_id" value="{{$shop->id}}">
        <div class="col-md-9 m-auto">
        <div class="main-card mb-3 card2 shadow">
        <div class="card-body table-responsive">
        <div class="card-title">
        <ul class="tabs-animated-shadow2 nav-justified2 tabs-animated nav">
        <li class="nav-item">
        <a role="tab" class="nav-link  show active" id="tab-c1-0" data-toggle="tab" href="#add_tab-services" aria-selected="true">
        <span class="nav-text">Social networks activate</span>
        </a>
        </li>
        <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-c1-0" data-toggle="tab" href="#add_tab-settings" aria-selected="false">
        <span class="nav-text">Skins</span>
        </a>
        </li>
         <li class="nav-item">
         <button class="btn btn-lg btn-primary social-setting-btn" style="font-size: 16px"><span class="nav-text">Save</span></button>
         </li>
        </ul>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="tab-content col-md-6 bg-white">
        <div class="tab-pane  show active" id="add_tab-services" role="tabpanel">
        <div class="position-relative row form-group">
        <label class="control-label col-md-4" for="status">Enable app</label>
        <div class="col-md-8">
        <label class="mt-toggle mb-0">
        <input type="checkbox" id="status" name="status" {{isset($user_data) &&$user_data->enable_social_app=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        </div>
        <div class="position-relative row form-group d-none">
        <label class="control-label col-md-4" for="remove_copyright">Remove Copyright</label>
        <div class="col-md-8">
        <label class="mt-toggle mb-0">
        <input type="checkbox" id="remove_copyright" name="remove_copyright">
        <span class="switcher"></span>
        <span class="label"></span>
         </label>
        </div>
        </div>
        <div class="position-relative row form-group">
      
        <div class="col-md-12">
        <ul class="list-social-services p-0" id="socialList">
        <li class="cl-facebook item-social" data-id="facebook" draggable="false">
        <span class="mt-icon icon-facebook"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[facebook]" value="{{isset($user_data)?$user_data->facebook_label:'Facebook'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[facebook]" placeholder="sort" value="0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="mt-toggle mb-0">
        <input class="social-status" type="checkbox"  name="services[facebook]" {{isset($user_data) &&$user_data->facebook=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="mt-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[facebook]" placeholder="Client ID" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[facebook]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[facebook]" value=" https://fblogin.mtapp.com/social-login/connect/facebook" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>
        <li class="cl-twitter item-social" data-id="twitter" draggable="false">
        <span class="mt-icon icon-twitter"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[twitter]" value="{{isset($user_data)?$user_data->twitter_label:'Twitter'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[twitter]" placeholder="sort" value="1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="mt-toggle mb-0">
        <input class="social-status" type="checkbox"  name="services[twitter]" {{isset($user_data) &&$user_data->twitter=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="mt-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[twitter]" placeholder="Client ID" value="">
         </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[twitter]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[twitter]" value=" https://fblogin.mtapp.com/social-login/connect/twitter" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>

        <li class="cl-google item-social" data-id="google" draggable="false">
        <span class="mt-icon icon-google"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[google]" value="{{isset($user_data)?$user_data->google_label:'Google'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[google]" placeholder="sort" value="2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="mt-toggle mb-0">
        <input class="social-status" type="checkbox" name="services[google]" {{isset($user_data) &&$user_data->google=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="mt-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[google]" placeholder="Client ID" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[google]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[google]" value=" https://fblogin.mtapp.com/social-login/connect/google" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>

        <li class="cl-linkedin item-social  " data-id="linkedin">
        <span class="mt-icon icon-linkedin"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[linkedin]" value="{{isset($user_data)?$user_data->linkedin_label:'linkedin'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[linkedin]" placeholder="sort" value="3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="mt-toggle mb-0">
        <input class="social-status" type="checkbox"  name="services[linkedin]" {{isset($user_data) &&$user_data->linkedin=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="mt-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[linkedin]" placeholder="Client ID" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[linkedin]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[linkedin]" value=" https://fblogin.mtapp.com/social-login/connect/linkedin" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>

        </ul>
        </div>
        </div>
        </div>
        <div class="tab-pane" id="add_tab-settings" role="tabpanel">
        <div class="position-relative form-group">
         <div class="row">
        <label class="control-label col-md-4" for="status">Button style</label>
        <div class="col-md-8">
        <div class="btn-group-custom" data-toggle="buttons">
        <em>With Label</em><br>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='8'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="8" {{isset($user_data) &&$user_data->button_style=='8'?'checked':''}}>
        <span class="option-style option-style-8"></span>
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='5'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="5" {{isset($user_data) &&$user_data->button_style=='5'?'checked':''}}>
        <span class="option-style option-style-5"></span>
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='6'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="6" {{isset($user_data) &&$user_data->button_style=='6'?'checked':''}}>
        <span class="option-style option-style-6"></span>
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='7'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="7" {{isset($user_data) &&$user_data->button_style=='7'?'checked':''}}>
        <span class="option-style option-style-7"></span>
        </label>
        <div class="clear-fix" style="margin-top:10px; "></div>
        <em>Without Label</em><br>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='1'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="1" {{isset($user_data) &&$user_data->button_style=='1'?'checked':''}}>
        <span class="option-style option-style-1"></span>
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='2'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="2" {{isset($user_data) &&$user_data->button_style=='2'?'checked':''}}>
        <span class="option-style option-style-2"></span>
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='3'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="3" {{isset($user_data) &&$user_data->button_style=='3'?'checked':''}}>
        <span class="option-style option-style-3"></span>
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_style=='4'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_type" autocomplete="off" value="4" {{isset($user_data) &&$user_data->button_style=='4'?'checked':''}}>
        <span class="option-style option-style-4"></span>
        </label>
        </div>
        </div>
        </div>
        </div>
        <div class="position-relative form-group">
        <div class="row">
        <label class="control-label col-md-4" for="status">Button size</label>
        <div class="col-md-8">
        <div class="btn-group-custom" data-toggle="buttons">
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_size=='1'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_size" id="option1" autocomplete="off" value="1" {{isset($user_data) &&$user_data->button_size=='1'?'checked':''}}>Small
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_size=='2'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_size" id="option2" autocomplete="off" value="2" {{isset($user_data) &&$user_data->button_size=='2'?'checked':''}}> Normal
        </label>
        <label class="btn btn-default-cus {{isset($user_data) &&$user_data->button_size=='3'?'active':''}}">
        <input type="radio" class="btn-preview" name="social_size" id="option3" autocomplete="off" value="3" {{isset($user_data) &&$user_data->button_size=='3'?'checked':''}}> Large
        </label>
        </div>
        </div>
        </div>
        </div>
        <div class="position-relative form-group">
        <div class="row">
        <label class="control-label col-md-4" for="position_social">Button position</label>
        <div class="col-md-8">
        <select class="btn-preview form-control" name="position_social">
        <option value="top" selected="selected">Above the Login Form</option>
        <option value="bottom">Below the Login Form</option>
        </select>
        </div>
        </div>
        </div>
        <input type="hidden" name="ele_frm" value="">
        <div class="position-relative form-group">
        <div class="row">
        <label class="control-label col-md-4" for="social_heading">Social heading</label>
        <div class="col-md-8">
        <input type="text" class="btn-preview form-control" name="social_heading" placeholder="or" value="{{isset($user_data)?$user_data->social_heading:'Or login with'}}">
        </div>
        </div>
        </div>
        </div>
      
        </div>
        <div class="col-md-6">
        <div class="content-body">
        <div class="live-preview"><div class="mtapps-sociallogin-wrapper">
        <div id="mt-sticky-social" class="layout-mt-social-8 layout-mt-socials mt-size-small-2 ">   </div>
             <div class="social_heading">Or login with</div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        </div>
        </div>
        </div>
        </form>
        </div>

        <script type="text/javascript">
            //plan limit 2 item
            //var $shopjs = ;
            //console.log($shopjs);
                $(document).ready(function(){
                var $checkboxes = $('.social-status');
                $checkboxes.change(function(){
                    var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                    //alert(countCheckedCheckboxes);
                    if(countCheckedCheckboxes <= 2){
                        $checkboxes.removeClass('upgrade-modal');
                    }
                    else{
                        //$(this).prop("checked", false);
                        //$checkboxes.removeClass('upgrade-modal');
                        //$(this).addClass('upgrade-modal');
                    }
                });
        
            });
            
            $(document).ready(function() {
               // $('[data-toggle="tooltip"]').tooltip();
                $(document).on('click','#btn-save-setting',function(){
                    $("#social-setting-frm").submit();
                    $('.mt-preloader-icon').show();
                });
        
                function loadAjax(){
                  $.ajax({
                    type : 'POST',
                    url : '/socialstore',
                    data : $('#social-setting-frm').serialize(),
                    beforeSend: function( xhr ) {
                        $('.live-preview').html('<div style="text-align: center;"><img style="width:32px;" src="{{url("public/image/load.webp")}}"/></div>');
                    }
                    }).done(function(result) {
                         $('.live-preview').html(result.html);
                         var widthBox = 32;
                         
                        
                            $('a.mt-social-connect').each(function(){
                            
                            // If this box is higher than the cached highest then store it
                            if($(this).outerWidth() > widthBox) {
                              widthBox = $(this).outerWidth();
                             
                            }
                          
                                });
                            $('a.mt-social-connect').css("min-width", widthBox + 'px' );
                    
                        //jQuery('a.mt-social-connect').css("min-width", (widthBox+1) + 'px' );
                    });
                }
                
                $(document).on('change','.social-status',function(){
                    if($(this).prop( "checked" )){
                         $(this).parent().parent().parent().addClass('active');
                    }else{
                         $(this).parent().parent().parent().removeClass('active');
                    }
                });
        
                $(document).on('change','.btn-preview',function(){
                    loadAjax();
                });
        
                $(window).on('load', function() {
                    loadAjax();
                });
        
                $(document).on('change','.list-social-services input',function(){
                    loadAjax();
                });
        
                $('#load-preview-tab').click(function (e) {
                    e.preventDefault();
                    if($(".live-preview").length > 0){
                        loadAjax();
                    }
                 });
        
                 Sortable.create(socialList, {
                    animation: 150,
                    swap: false, // Enable swap plugin
                    ghostClass: 'blue-background-class',
                    swapClass: 'item-highlight', // The class applied to the hovered swap item
                    dataIdAttr: 'data-id',
                    draggable: '.item-social',
                    store: {
                        get: function (sortable) {
                            var order = localStorage.getItem(sortable.options.group);
                            return order ? order.split('|') : [];
                        },
                        set: function (sortable) {
                            var order = sortable.toArray();
                            $.each( order, function( key, value ) {
                              $('#socialList .cl-'+value).find('input.input-right').val(key);
                            });
                            $('.live-preview').html('<div style="text-align: center;"><img style="width:32px;" src="{{url("public/image/load.webp")}}"/></div>');
                            setTimeout(loadAjax, 500)
                            //loadAjax();
                            //$('#sort_list').val(order.join(','));
                           
                        }
                    },
                    
                });
                $('.tabs-animated-shadow2 a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                  //e.target // newly activated tab
                  //e.relatedTarget // previous active tab
                  $('#choose_tab').val($(this).attr( "href"));
                  
                })
            });
        </script>



<script type="text/javascript">

$('#social-setting-frm').validate({
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
        var button = $('.social-setting-btn');
        var form_all = $("#social-setting-frm")[0];
        var formData = new FormData(form_all);
        var old_text = $(button).closest('.social-setting-btn').text();
        $.ajax({
                    url: $(form_all).attr("action"),
                    type: $(form_all).attr("method"),
                    data: formData,
                    contentType: false, 
                    processData: false,
                    beforeSend: function(){
                        $(button).prop('disabled', true);
                        $(button).text('Please wait...');
                    },
                    success: function (data) {
                        if (data.status === true) {
                            toastr.success(data.message);
                            $(button).prop('disabled', false);
                            $(button).text(old_text);
                        } else {
                            toastr.error(data.message);
                            $(button).prop('disabled', false);
                            $(button).text(old_text);
                            $(button).prop('disabled', false);
                            $(button).text(old_text);
                        }
                    },
                    error: function (e) {
                        $(button).prop('disabled', false);
                        $(button).text(old_text);
                        $(button).prop('disabled', false);
                        $(button).text(old_text);
                        toastr.error(e.responseJSON.message);
                    }
                });
    }
});
</script>

 

<div class="mt-message">


 </div>

</body>
</html>





@endsection
