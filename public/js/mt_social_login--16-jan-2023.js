var url = window.Shopify;
current_shop = url.shop;   
app_url = "https://rush-food.orbitnapp.com"; 


if("undefined" == typeof jQuery) {	 
	var script = document.createElement("script");
	script.type = "text/javascript", script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js", document.getElementsByTagName("head")[0].appendChild(script)
}


css_url = "https://rush-food.orbitnapp.com/public/css/social_setting_front.css?1";
css_url2 = "https://rush-food.orbitnapp.com/css/main.css?1";
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
           path: app_url+`/sociallogin/${key}/${shop}`,
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
    
    console.log("[bitLogin] " + "event_name:" + e.data.event_name) 
  var event_name = e.data.event_name; 
  var event_name = e.data.event_name; 
    switch(event_name) {
      case 'redirect': 
        location.href = e.data.redirect_uri;
        break;
      case 'authentication_process':
        console.log('Execute login form');
        const type = e.data.type;
        const shopDomain = e.data.shopify_domain;
        const email = e.data.email_shopify;
        const password = e.data.password_shopify;
        authUser(type, shopDomain, email, password);
        break;
      default:
        console.log('Event Default');
    }
  }

function fetchButtonPosition() {
    
    fetch('/a/social_login?type=button&shop='+context.myshopify_url)
    .then((response) => {
        return response.json();
    })
    .then((data) => {
      const buttonPosition = data.data.data.styleButtonPosition;
      const buttonHtml = data.data.data.button_html;
        getPosition(buttonPosition,buttonHtml);
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

  function setActiveButton(totalButton){
    const frameButton = document.getElementById('bitloginFrame');
    if(totalButton == 0) {
      frameButton.style.height = '0px';
    }
    if(totalButton == 1) {
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
  

 

function authUser(type, shopDomain, email, password) {
    let form,
        form_name,
        form_type,
        form_action,
        input_form_type,
        input_utf,
        input_email,
        input_password,
        input_return,
        return_type;

    if (type == 'login') {
        form_name = 'customerLogin';
        form_type = 'customer_login';
        form_action = 'https://' + shopDomain + '/account/login';
        return_type = 'return_url';
    } else {
        form_name = 'customerRegistration';
        form_type = 'create_customer';
        form_action = 'https://' + shopDomain + '/account';
        return_type = 'return_to';
    }

    form = document.createElement('form');
    form.name = form_name;
    form.id = form_type;
    form.method = 'POST';
    form.action = form_action;

    input_form_type = document.createElement('input');
    input_form_type.type = 'hidden';
    input_form_type.name = 'form_type';
    input_form_type.value = form_type;
    form.appendChild(input_form_type);

    input_utf = document.createElement('input');
    input_utf.type = 'hidden';
    input_utf.name = 'utf8';
    input_utf.value = 'âœ“';
    form.appendChild(input_utf);

    input_email = document.createElement('input');
    input_email.type = 'hidden';
    input_email.name = 'customer[email]';
    input_email.id = 'CustomerEmail';
    input_email.value = email;
    form.appendChild(input_email);

    input_password = document.createElement('input');
    input_password.type = 'hidden';
    input_password.name = 'customer[password]';
    input_password.id = 'CustomerPassword';
    input_password.value = password;
    form.appendChild(input_password);

    input_return = document.createElement('input');
    input_return.type = 'hidden';
    input_return.name = return_type;
    input_return.value = '/account';
    form.appendChild(input_return);

    document.body.appendChild(form);
    form.submit();
}


 
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

function GOOGLE_signin(params, callback) {
  var width = 64;
  var height = 100;
  var google_path;
  if (params == "normal-oauth") {
    google_path =
      `https://accounts.google.com/o/oauth2/v2/auth?redirect_uri=https://polaluna.com/apps/bitlogin/bitlogin/api/auth?strategy=google&shop=polaluna.com&response_type=code&include_granted_scopes=true&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email&prompt=select_account&access_type=online&client_id=933600373534-p8mgfarfbm984aiomsmnokpasfi08u50.apps.googleusercontent.com`;
  } else {
    google_path =
      `https://accounts.google.com/o/oauth2/v2/auth?redirect_uri=https://bitlogin.bitbybit.studio/bitlogin/api/auth/store?strategy=google&shop=polaluna.com&response_type=code&include_granted_scopes=true&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email&prompt=select_account&access_type=online&client_id=933600373534-p8mgfarfbm984aiomsmnokpasfi08u50.apps.googleusercontent.com`;
  }
  GOOGLE_open_popup({
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
    path: `https://bitlogin.bitbybit.studio/bitlogin/api/proxy?social=google&shop=${shop}&client_id=${key}`,
  });
}
   
 
  