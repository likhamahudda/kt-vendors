
 
<head> 
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" type="text/javascript" charset="utf-8"></script>
    <script src="https://apis.google.com/js/api:client.js"></script>   
 </head>


 
 <div class="container" style="max-width:500px;">
  <div class="text-center" id="google_login_group">
      <button type="button" class="btn btn-danger btn-lg btn-block" id="google_login" style="padding:0;"></button>  
      <div id="google_profile" style="text-align:center"></div>  
  </div>
 </div>
 
 <?php if(isset($social) && $social == 'linkedin'){  ?> 

  <script> 
    const url = `{{ url('auth/linkedin') }}?shop=<?php echo $shop; ?>`;  
    location.href = url; 
  </script>

<?php } ?> 

<?php if(isset($social) && $social == 'gmail'){  ?> 

<script> 
  const url = `{{ url('auth/google') }}?shop=<?php echo $shop; ?>`;  
  location.href = url; 
</script>

<?php } ?>

<?php if(isset($social) && $social == 'facebook'){  ?> 

<script> 
  const url = `{{ url('auth/facebook') }}?shop=<?php echo $shop; ?>`;  
  location.href = url; 
</script>

<?php } ?>


 <script>  
 function mt_fb_login(){

    window.fbAsyncInit = function() { 
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '2916363798659189', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      autoLogAppEvents : true,
      xfbml      : true,  // parse social plugins on this page
      version    : 'v15.0' // use graph api version 2.8
    });
    FB.AppEvents.logPageView();
    
// Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            //getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



// Facebook login with JavaScript SDK
$(window).on('load', function(){ 
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
});

 }
 

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email'},
    function (response) { 
   

      var ck_email = response.email;
      if (ck_email != '' && ck_email != undefined){  

        window.open('','_self').close();
        const email = ck_email;
        const encodedEmail = encodeURIComponent(email);
        const url = `https://<?php echo $shop; ?>/account/login?email=${encodedEmail}`; 
         window.opener.location.href=url;  
      
      }else{  
        swal("Error!", "As your email is not connected with Facebook, please try other login methods. Return to site"); 
      }
    });
}

function mt_gmail_login(){  
        var googleUser = {};
        //start the google login app
        gapi.load('auth2', function(){
           auth2 = gapi.auth2.init({
            client_id: '71333009896-lu1rfvs06e91vm1jm7crvdt5k7t64cu5.apps.googleusercontent.com',          
            cookiepolicy: 'single_host_origin',
            plugin_name: 'hello' //any name can be used
          });
          //clicking login button attachment to signin function
          auth2.attachClickHandler('google_login', {},
              function(googleUser) {
                var profile = googleUser.getBasicProfile();
                var social_id = profile.getId();
                var social_name = profile.getName();
                var social_email = profile.getEmail();
                var social_image = profile.getImageUrl();               
                $("#google_login").hide();

                window.open('', '_self').close(); 
                const encodedfid = encodeURIComponent(social_id);
                const encodedfname = encodeURIComponent(social_name);
                const encodedfemail = encodeURIComponent(social_email);
                const encodedfimage = encodeURIComponent(social_image);
                const url = `https://<?php echo $shop; ?>/account/login?email=${encodedfemail}`;
                 
                  window.opener.location.href = url;

               
            }, function(error) { 
                alert(JSON.stringify(error, undefined, 2));
            });          
        }); 
 
}
  
 </script> 

 


 <?php if(isset($social) && $social == 'facebook-'){  ?>

<script>  
mt_fb_login();
 </script>

<?php }elseif($social == 'gmail_login'){ ?>
  <script>
    window.open('','_self').close();
    const email = '<?php echo $email; ?>';
    const encodedEmail = encodeURIComponent(email);
    const url = `https://<?php echo $shop; ?>/account/login?email=${encodedEmail}`; 
    window.opener.location.href=url;  
</script>
  
<?php } elseif($social == 'linkedin_login') { ?>


<script>
    window.open('','_self').close();
    const email = '<?php echo $email; ?>';
    const encodedEmail = encodeURIComponent(email);
    const url = `https://<?php echo $shop; ?>/account/login?email=${encodedEmail}`; 
    window.opener.location.href=url;  
</script>

 <?php } elseif($social == 'facebook_login') {  ?>

  <script>
    window.open('','_self').close();
    const email = '<?php echo $email; ?>';
    const encodedEmail = encodeURIComponent(email);
    const url = `https://<?php echo $shop; ?>/account/login?email=${encodedEmail}`; 
    window.opener.location.href=url;  
</script>

<?php } ?>

 


 

<script>

  $(document).ready(function(){   

    setTimeout(
        function() 
        {
                console.log('trigger google_login');
                $('#google_login').trigger('click');

        }, 1000
    );

  });

</script>

 
 
