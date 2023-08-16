var url = window.Shopify;
current_shop = url.shop;
app_url = "https://sociallogin.developersforhire.site";


if ("undefined" == typeof jQuery) {
  var script = document.createElement("script");
  script.type = "text/javascript", script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js", document.getElementsByTagName("head")[0].appendChild(script)
}


var script = document.createElement("script");
script.type = "text/javascript", script.src = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js", document.getElementsByTagName("head")[0].appendChild(script)
  
css_url = "https://sociallogin.developersforhire.site/public/css/social_setting_front.css?3";
css_url2 = "https://sociallogin.developersforhire.site/css/main.css?1";
$("<link/>", {
  rel: "stylesheet",
  type: "text/css",
  href: css_url
}).appendTo("head");
$("<link/>", {
  rel: "stylesheet",
  type: "text/css",
  href: css_url2
}).appendTo("head");


function mtSocialLogin(shop, key) {
  var width = 64;
  var height = 100;
  mt_login_popup({
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
    path: app_url + `/sociallogin/${key}/${shop}`,
  });
}

function mt_login_popup(options) {
  function popup_window(url, title, w, h) {
    var left = screen.width / 2 - w / 2;
    var top = screen.height / 2 - h / 2 - 40;
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

let context = {
  myshopify_url: current_shop,
  app_host: app_url,
  iframe_id: 'bitloginFrame',
};

context.iframe_source = `/a/social_login?shop=${context.myshopify_url}&type=button`;
context.iframe_html = `<iframe id="${context.iframe_id}" frameBorder="0" scrolling="no" style="width: 100%; height: 160px;" src="${context.iframe_source}"></iframe>`;


let dom = {
  login: $("form[action='/account/login']#customer_login"),
  register: $("form[action='/account']#create_customer")
};


context.is_initialized = false;

if (dom.login) {
  context.is_login_page = true;
}


if (dom.register) {
  context.is_register_page = true;
}

function message_handler(e) {

   var event_name = e.data.event_name;
  var event_name = e.data.event_name;
  switch (event_name) {
    case 'redirect':
      location.href = e.data.redirect_uri;
      break;
    case 'authentication_process':
      const type = e.data.type;
      const shopDomain = e.data.shopify_domain;
      const email = e.data.email_shopify;
      const password = e.data.password_shopify;
      break;
    default:
      console.log('Login');
  }
}

function fetchButtonPosition() {

  fetch('/a/social_login?type=button&shop=' + context.myshopify_url)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      const buttonPosition = data.data.data.styleButtonPosition;
      const buttonHtml = data.data.data.button_html;
      getPosition(buttonPosition, buttonHtml);
    });

}

function getPosition(buttonPosition, buttonHtml) {

  if (buttonPosition == 'top') {

    if (context.is_login_page) {
      dom.login.before(buttonHtml);
      dom.register.before(buttonHtml);
    } else if (context.is_register_page) {

      dom.register.before(buttonHtml);
    };
  } else {
    if (context.is_login_page) {
      dom.login.after(buttonHtml);
    } else if (context.is_register_page) {
      dom.register.after(buttonHtml);
    };
  }
}

function fetchActiveButton() {
  fetch('/a/social_login?type=count')
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      const totalButton = data.data;
      setActiveButton(totalButton);
    });
}

function setActiveButton(totalButton) {
  const frameButton = document.getElementById('bitloginFrame');
  if (totalButton == 0) {
    frameButton.style.height = '0px';
  }
  if (totalButton == 1) {
    frameButton.style.height = '100px';
  }
}

if (!context.is_initialized) {
  window.addEventListener("message", message_handler, false);
  fetchButtonPosition();
};


context.is_initialized = $('#' + context.iframe_id).length > 0;

fetchActiveButton();

window.__bitlogin = {
  context: context
};

fetchActiveButton();



function GOOGLE_open_popup(options) {
  function popup_window(url, title, w, h) {
    var left = screen.width / 2 - w / 2;
    var top = screen.height / 2 - h / 2 - 40;
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


function login_popup(options) {
  function popup_window(url, title, w, h) {
    var left = screen.width / 2 - w / 2;
    var top = screen.height / 2 - h / 2 - 40;
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

function createAccount(firstName, lastName, email, password) {
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
    .done(function (response) {
      $(".rkloader_img").hide();
      var logErrors = jQuery(response).find('.errors').text();
      var successHtml = $($.parseHTML(response)).find("#create_customer ul li").text();
      var EmailExitslogErrors = jQuery(response).find('already');
      if (logErrors != '' && logErrors != 'undefined') {
        swal("Error!", logErrors);
      }
      else if (successHtml.includes("email address is already")) {
        var successHtml = $($.parseHTML(response)).find("#create_customer ul li").text();
        swal("Login!", "This email address is already associated with an account. Login with your password.");

      } else {
        window.location.href = "https://rekhtabooks.com/account";
      }
    }).fail(function () { swal("Error!", 'error could not submit'); });
  return false;
}


const urlParams = new URLSearchParams(window.location.search);
const email = urlParams.get('email');
const customer_name = urlParams.get('name');


if (email != '' && email != null) {

  let email_decoded = decodeURIComponent(email);

  //loginAccount(email_decoded, '123456'); 
  if (email != '' && email != undefined) {
    //Check social id is exits or not 
    $.ajax({
      type: 'GET',
      dataType: "json",
      data: {shop : current_shop, email: email_decoded, name: customer_name },
      url: "/a/social_login?type=checkSocialLogin",
      beforeSend: function () {
        $(".rkloader_img").show();
      },
      success: function (data_res) {
        
        loginAccount(data_res.email, data_res.password); 
        if (data_res.code == "200") {

          loginAccount(data_res.email, data_res.password);

        } else if (data_res.code == "201") {

          $(".rkloader_img").hide();
          //swal("Login!", "This email address is already associated with an account. Login with your password.");
          alert('This email address is already associated with an account. Login with your password.')

        }
        else {

         }
      },
    });
     
  } else {
   // swal("Error!", "As your email is not connected with Facebook, please try other login methods. Return to site");
    alert("As your email is not connected with Facebook, please try other login methods. Return to site");
  }


}


function loginAccount(email, password) {
  var escapedData = {
    email: escape(email),
    password: escape(password).replace(/\+/g, '%2B')
  }

  var data = 'form_type=customer_login&utf8=%E2%9C%93&customer%5Bemail%5D=';
  data += escapedData.email;
  data += '&customer%5Bpassword%5D=';
  data += escapedData.password;
  
  jQuery.post('https://'+current_shop+'/account/login', data)
    .done(function (response) {
    
      $(".rkloader_img").hide();
      var logErrors = jQuery(response).find('.errors').text();
      var successHtml = $($.parseHTML(response)).find(".shopify-erro li").text();
      if (logErrors != '' && logErrors != 'undefined') {
         //swal("Alert!", "This email address is already associated with an account. Login with your password.");            

        
         swal({
          title: "Alert",
          text: "This email address is already associated with an account. Login with your password.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok'
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = 'https://'+current_shop+'/account/login';
          } else {
            window.location.href = 'https://'+current_shop+'/account/login';
          }
        }); 
        
       } else if (successHtml.includes("Incorrect email or password")) { 
        swal({
          title: "Alert",
          text: "This email address is already associated with an account. Login with your password.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok'
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = 'https://'+current_shop+'/account/login';
          } else {
            window.location.href = 'https://'+current_shop+'/account/login';
          }
        });
      }
      else {

        window.location.href = "https://"+current_shop;

      }
    }).fail(function () { alert('error could not submit'); });

  return false;
}



