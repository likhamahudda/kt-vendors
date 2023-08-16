 
function FACEBOOK_open_popup(options) {
  $.extend({
      window_name: "ConnectWithOAuth",
    },
    options
  );

  function popup_window(url, title, w, h) {
    var left = screen.width / 2 - w / 2;
    var top = screen.height / 2 - h / 2;
    return window.open(
      url,
      title,
      "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=" +
      w +
      ", height=" +
      h +
      ", top=" +
      top +
      ", left=" +
      left
    );
  }

  var oauth_window = popup_window(
    options.path,
    options.window_name,
    600,
    600
  );
}

function FACEBOOK_signin(params, callback) {
  function FACEBOOK_callback(user_id, data_params, error) {
    console.log({
      user_id,
      data_params,
      error
    });
  }
  var width = 64;
  var height = 100;
  FACEBOOK_open_popup({
    callback: FACEBOOK_callback,
    windowOptions: {
      outerWidth: width,
      outerHeight: height,
      innerWidth: width,
      innerHeight: height,
      width: width,
      height: height,
      top: 400,
      left: 400,
      toolbar: "no",
      directories: "no",
    },
    path: `https://www.facebook.com/dialog/oauth?scope=email&state=6935-d0d64e3267eb4708b15a1a0d03fe2554&redirect_uri=https://bitlogin.bitbybit.studio/bitlogin/api/auth/store?strategy=facebook&shop=polaluna.com&client_id=test`,
  });
}

function globalLoginFacebook(shop, key) {
  var width = 64;
  var height = 100;
  login_popup({
    windowOptions: {
      outerWidth: width,
      outerHeight: height,
      innerWidth: width,
      innerHeight: height,
      width: width,
      height: height,
      top: 400,
      left: 400,
      toolbar: "no",
      directories: "no",
    },
    path: `https://rush-food.orbitnapp.com/sociallogin?social=facebook&shop=${shop}&client_id=${key}`,
  });
}

 
      function GOOGLE_open_popup(options) {
        $.extend({
            window_name: "ConnectWithOAuth",
          },
          options
        );

        function popup_window(url, title, w, h) {
          var left = screen.width / 2 - w / 2;
          var top = screen.height / 2 - h / 2;
          return window.open(
            url,
            title,
            "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=" +
            w +
            ", height=" +
            h +
            ", top=" +
            top +
            ", left=" +
            left
          );
        }
        var oauth_window = popup_window(
          options.path,
          options.window_name,
          600,
          600
        );
      }

      function GOOGLE_signin(params, callback) {
        function GOOGLE_callback(user_id, data_params, error) {
          console.log({
            user_id,
            data_params,
            error
          });
        }
        var width = 64;
        var height = 100;
        let google_path;
        if (params == "normal-oauth") {
          google_path =
            "https://accounts.google.com/o/oauth2/v2/auth?redirect_uri=https://polaluna.com/apps/bitlogin/bitlogin/api/auth?strategy=google&shop=polaluna.com&response_type=code&include_granted_scopes=true&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email&prompt=select_account&access_type=online&client_id=933600373534-p8mgfarfbm984aiomsmnokpasfi08u50.apps.googleusercontent.com";
        } else {
          google_path =
            `https://accounts.google.com/o/oauth2/v2/auth?redirect_uri=https://bitlogin.bitbybit.studio/bitlogin/api/auth/store?strategy=google&shop=polaluna.com&response_type=code&include_granted_scopes=true&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email&prompt=select_account&access_type=online&client_id=933600373534-p8mgfarfbm984aiomsmnokpasfi08u50.apps.googleusercontent.com`;
        }
        GOOGLE_open_popup({
          callback: GOOGLE_callback,
          windowOptions: {
            outerWidth: width,
            outerHeight: height,
            innerWidth: width,
            innerHeight: height,
            width: width,
            height: height,
            top: 400,
            left: 400,
            toolbar: "no",
            directories: "no",
          },
          path: google_path,
        });
      }

      function login_popup(options) {
        $.extend({
            window_name: "loginPopup",
          },
          options
        );

        function popup_window(url, title, w, h) {
          var left = screen.width / 2 - w / 2;
          var top = screen.height / 2 - h / 2;
          return window.open(
            url,
            title,
            "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=" +
            w +
            ", height=" +
            h +
            ", top=" +
            top +
            ", left=" +
            left
          );
        }
        var bitlogin_window = popup_window(
          options.path,
          options.window_name,
          600,
          600
        );
      }

      function globalLogin(shop, key) {
        var width = 64;
        var height = 100;
        login_popup({
          windowOptions: {
            outerWidth: width,
            outerHeight: height,
            innerWidth: width,
            innerHeight: height,
            width: width,
            height: height,
            top: 400,
            left: 400,
            toolbar: "no",
            directories: "no",
          },
          path: `https://rush-food.orbitnapp.com/sociallogin?social=google&shop=${shop}&client_id=${key}`,
        });
      }
  
 


$(document).ready(function () {

 
  

  $(".popup").hide();
      
   $(".openpop").click(function (e) {
      e.preventDefault();
      $("iframe").attr("src", $(this).attr('href'));
      $(".links").fadeOut('slow');
      $(".popup").fadeIn('slow');
  }); 

  $(".close").click(function () {
      $(this).parent().fadeOut("slow");
      $(".links").fadeIn("slow");
  });
});

function myFunction() {
      $(".popup").hide();
      
   $(".openpop").click(function (e) {
      e.preventDefault();
      $("iframe").attr("src", $(this).attr('href'));
      $(".links").fadeOut('slow');
      $(".popup").fadeIn('slow');
  }); 

  $(".close").click(function () {
      $(this).parent().fadeOut("slow");
      $(".links").fadeIn("slow");
  });
}
$(document).ready(function () {
  $('#autoclickme a').click();
});


window.fbAsyncInit = function () {
  // FB JavaScript SDK configuration and setup
  FB.init({
    appId      : '1158060085138467', // FB App ID
    cookie     : true,  // enable cookies to allow the server to access the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v15.0' // use graph api version 2.8
  });
  
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
function fbLogin() {
  FB.login(function (response) {
      if (response.authResponse) {
          // Get and display the user profile data
          getFbUserData();
      } else {
          document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
      }
  }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
  FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email'},
  function (response) {
     // document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
     // document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
     // document.getElementById('status').innerHTML = '<p>Thanks for logging in, ' + response.first_name + '!</p>';
      //document.getElementById('userData').innerHTML = '<h2>Facebook Profile Details</h2><p><img src="'+response.picture.data.url+'"/></p><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
       // alert(response.email) 
    var ck_email = response.email;
    if (ck_email != '' && ck_email != undefined){ 
       //Check social id is exits or not 
      $.ajax({
              type: 'GET',   
              dataType: "json",
              data:  {social_type : "Facebook",social_id : response.id,email:response.email,name:response.first_name+' '+response.last_name},  
              url: "https://demo.dev9server.com/rekhta/check_social_account.php", 
              beforeSend: function(){
            $(".rkloader_img").show();  
          },
              success: function (data_res) {  
                if(data_res.code == "200"){
                loginAccount(response.email, data_res.password);
                }else if(data_res.code == "201"){
                $(".rkloader_img").hide(); 
                swal("Login!", "This email address is already associated with an account. Login with your password.");

                }
                else{ 
                 createAccount(response.first_name, response.last_name, response.email,data_res.password);
                }
              },
        });
    //
    }else{  
      swal("Error!", "As your email is not connected with Facebook, please try other login methods. Return to site"); 
    }
  });
}

  // Logout from facebook
  function fbLogout() {
      FB.logout(function() {
          //document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
         // document.getElementById('fbLink').innerHTML = '<img src="images/fb-login-btn.png"/>';
         // document.getElementById('userData').innerHTML = '';
        //  document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
      });
}

  
function createAccount(firstName, lastName, email, password){
  var escapedData = {
      firstName: escape(firstName),
      lastName: escape(lastName),
      email: escape(email),
    // password: (password)
     password: escape(password).replace(/\+/g, '%2B')
  }
  
      var data = 'form_type=create_customer&utf8=%E2%9C%93&customer%5Bfirst_name%5D=';
      data += escapedData.firstName;
      data += '&customer%5Blast_name%5D=';
      data += escapedData.lastName;
      data += '&customer%5Bemail%5D=';
      data += escapedData.email;
      data += '&customer%5Bpassword%5D=';
      data += escapedData.password;
      jQuery.post('/account', data)
      .done(function(response){
        $(".rkloader_img").hide(); 
       var logErrors = jQuery(response).find('.errors').text();
       var successHtml = $($.parseHTML(response)).find("#create_customer ul li").text();  
      var EmailExitslogErrors = jQuery(response).find('already'); 
        if (logErrors != '' && logErrors != 'undefined'){ 
           swal("Error!", logErrors); 
        } 
        else if(successHtml.includes("email address is already")) { 
          var successHtml = $($.parseHTML(response)).find("#create_customer ul li").text();
           swal("Login!", "This email address is already associated with an account. Login with your password.");
          
        }else{ 
          window.location.href = "https://rekhtabooks.com/account";            
        }
      }).fail(function(){swal("Error!",'error could not submit');});
      return false;
} 

function loginAccount(email, password){
  var escapedData = {     
      email: escape(email),
      password: escape(password).replace(/\+/g, '%2B')
  }   
      var data = 'form_type=customer_login&utf8=%E2%9C%93&customer%5Bemail%5D=';
      data += escapedData.email;
      data += '&customer%5Bpassword%5D=';
      data += escapedData.password; 
      jQuery.post('/account/login', data)
      .done(function(response){
      
        $(".rkloader_img").hide();
        var logErrors = jQuery(response).find('.errors').text();           
         var successHtml = $($.parseHTML(response)).find(".shopify-erro li").text(); 
        if (logErrors != '' && logErrors != 'undefined'){
            swal("Errors!", logErrors); 
        } else if(successHtml.includes("Incorrect email or password")) { 
         // var successHtml = $($.parseHTML(response)).find("#create_customer ul li").text();
           swal("Login!", "This email address is already associated with an account. Login with your password.");            
        }
        else{ 
           swal("Login!", "successfully Login"); 
           window.location.href = "https://rekhtabooks.com/account";
        }
      }).fail(function(){alert('error could not submit');});
      return false;
}


// Render Google Sign-in button
function handleCredentialResponse(response) {
   // decodeJwtResponse() is a custom function defined by you
   // to decode the credential response.

   const responsePayload = parseJwt(response.credential);
   // console.log(responsePayload)
   // console.log("ID: " + responsePayload.sub);
   // console.log('Full Name: ' + responsePayload.name);
   // console.log('Given Name: ' + responsePayload.given_name);
   // console.log('Family Name: ' + responsePayload.family_name);
   // console.log("Image URL: " + responsePayload.picture);
   // console.log("Email: " + responsePayload.email);

    var ck_email = responsePayload.email;
    if (ck_email != '' && ck_email != undefined){ 
       //Check social id is exits or not 
      $.ajax({
              type: 'GET',   
              dataType: "json",
              data:  {social_type : "Gmail",social_id : responsePayload.id,email:responsePayload.email,name:responsePayload.name},  
              url: "https://demo.dev9server.com/rekhta/check_social_account.php", 
              beforeSend: function(){
            $(".rkloader_img").show();  
          },
              success: function (data_res) {  
                if(data_res.code == "200"){
                loginAccount(responsePayload.email, data_res.password);
                }else if(data_res.code == "201"){
                $(".rkloader_img").hide(); 
                swal("Login!", "This email address is already associated with an account. Login with your password.");

                }
                else{ 
                 createAccount(responsePayload.name,'', responsePayload.email,data_res.password);
                }
              },
        });
    //
    }else{  
      swal("Error!", "As your email is not connected with Facebook, please try other login methods. Return to site"); 
    }
}

function parseJwt (token) {
  var base64Url = token.split('.')[1];
  var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
  var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
      return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
  }).join(''));

  return JSON.parse(jsonPayload);
}

$(document).on("click","#FirstNamereg",function() {
       
  });


$('#FirstNamereg').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
            $('.text_content_success').hide();
      return true; 
    } else {
    e.preventDefault();
          $('.text_content_success').html('<span style="color: red; font-size: 13px; padding: 7px; border: 1px solid; text-align: center; display: block;">Please enter alphabate only.</span>');
    $('.text_content_success').show(); 
    return false;
    }
});
$('#LastNamereg').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
            $('.text_content_success').hide();
      return true; 
    } else {
    e.preventDefault();
          $('.text_content_success').html('<span style="color: red; font-size: 13px; padding: 7px; border: 1px solid; text-align: center; display: block;">Please enter alphabate only.</span>');
    $('.text_content_success').show(); 
    return false;
    }
});

$('#FirstName').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
            $('.shopify-password-strength').hide();
      return true; 
    } else {
    e.preventDefault();
          $('.shopify-password-strength').html('<span style=" color: red; font-size: 13px;   text-align: center; display: block; border: 1px solid; padding: 10px;">Please enter alphabate only.</span>');
    $('.shopify-password-strength').show(); 
    return false;
    }
});
$('#LastName').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
            $('.text_content_success').hide();
      return true; 
    } else {
    e.preventDefault();
          $('.text_content_success').html('<span style=" color: red; font-size: 13px; text-align: center; display: block; border: 1px solid; padding: 10px;">Please enter alphabate only.</span>');
    $('.text_content_success').show(); 
    return false;
    }
});

 
 

 
  