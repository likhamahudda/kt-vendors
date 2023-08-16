@extends('shopify-app::layouts.default')

@section('content')
    
<!DOCTYPE html>
<html>
    <head>

<style>
    .zifyapp-wrapper,
#zifyapp-footer {
    font-family: ShopifySans, Helvetica, Arial, Lucida Grande, sans-serif
}

.zifyapp-wrapper .modal {
    z-index: 1000 !important;
    padding-left: 0 !important
}

.modal-backdrop {
    z-index: 999 !important
}

table.table {
    width: 100%;
    font-size: 14px
}

.zifyapp-wrapper .navbar {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
    z-index: 998
}

table.table .checkbox {
    margin-bottom: 0 !important;
    padding-left: 7px
}

.zifyapp-wrapper .text-warning {
    color: orange !important
}

.nav.navbar-nav a:hover {
    background: #e7e7e7 !important
}

.nav.navbar-nav .active a:after {
    content: "";
    position: absolute;
    bottom: -20px;
    left: 42%;
    border: 10px solid transparent;
    border-top-color: #e7e7e7
}

.nav.navbar-right {
    margin-right: 15px
}

.zifyapp-wrapper-body {
    margin-top: 75px;
    display: block;
    margin-bottom: 20px
}

.zifyapp-wrapper label {
    font-weight: 500 !important;
    padding: 6px
}

.zifyapp-wrapper .modal-footer .btn {
    font-size: 16px
}

.zify-loading {
    bottom: 0;
    height: 100%;
    left: 0;
    margin: 0 auto;
    position: fixed;
    right: 0;
    text-align: center;
    top: 40%;
    width: 100%;
    z-index: 9999
}

.zify-loading:before,
.zify-message .zify-overlay:before {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5)
}

.zify-message .alert {
    position: relative
}

.zify-loading img {
    width: 50px
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 26px
}

.switch-form {
    top: 26px !important;
    left: 15px !important;
    position: absolute !important
}

.switch input {
    display: none
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s
}

.slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 4px;
    background-color: #fff;
    -webkit-transition: .4s;
    transition: .4s
}

.slider::after {
    content: "OFF";
    right: 10px;
    position: absolute;
    top: 3px;
    color: #999
}

input:checked+.slider {
    background-color: #3f51b5
}

input:focus+.slider {
    box-shadow: 0 0 1px #3f51b5
}

input:checked+.slider:before {
    -webkit-transform: translateX(36px);
    -ms-transform: translateX(36px);
    transform: translateX(36px)
}

input:checked+.slider::after {
    content: "ON";
    position: absolute;
    top: 3px;
    left: 10px;
    color: #fff
}

.slider.round {
    border-radius: 34px;
    font-size: 14px
}

.slider.round:before {
    border-radius: 50%
}

.input-field {
    width: 100%;
    padding: 7px 20px 7px 90px;
    margin: 0;
    box-sizing: border-box;
    border: 1px solid #e7e7e7;
    -webkit-transition: .5s;
    transition: .5s;
    outline: none;
    border-radius: 34px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    color: #9a9a9a
}

.input-field:focus {
    border: 1px solid #555
}

.input-field-nopadding {
    padding-left: 20px !important;
    border-radius: 34px;
    width: 56%
}

.row-item {
    margin: 10px 0
}

.input-container code {
    padding: 0 !important;
    background: 0 0 !important
}

.button-save {
    border-radius: 34px;
    border: none;
    color: #fff;
    text-align: center;
    font-size: 16px;
    padding: 5px 15px;
    transition: all .5s;
    cursor: pointer;
    box-shadow: 0 1px 4px 0 #333;
    position: relative;
    outline: none;
    display: none;
    margin-left: 5px
}

.zifyapp-wrapper button:focus,
.zifyapp-wrapper button:active {
    outline: none;
    color: #fff
}

.button-save span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: .5s
}

.button-save span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -12px;
    transition: .5s
}

.button-save:hover span {
    padding-right: 12px;
    color: #fff
}

.button-save:hover span:after {
    opacity: 1;
    right: 0
}

.zify-tablink {
    background-color: #ddd;
    color: #fff;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px;
    font-size: 16px;
    width: 33.33%;
    box-shadow: 0 3px #999;
    border-radius: 34px
}

.zify-tablink:hover {
    background-color: #ccc
}

.zify-tabcontent {
    max-height: 100%;
    display: none;
    margin-top: 20px;
    padding: 10px 20px;
    height: auto;
    width: 100%
}

.zify-tabcontent .row {
    padding: 10px 0
}

.margin-top-bottom-5 {
    margin: 5px 0
}

ul.ul-note {
    padding-left: 0
}

ul.ul-note li {
    list-style: none
}

.radio-container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-top: 6px;
    cursor: pointer;
    font-size: 13px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

.radio-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer
}

.radio-checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%
}

.radio-container:hover input~.radio-checkmark {
    background-color: #ccc
}

.radio-container input:checked~.radio-checkmark {
    background-color: #92c016
}

.radio-checkmark:after {
    content: "";
    position: absolute;
    display: none
}

.radio-container input:checked~.radio-checkmark:after {
    display: block
}

.radio-container .radio-checkmark:after {
    top: 5px;
    left: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #fff
}

.jscolor-custom {
    width: 25px;
    height: 25px;
    border: 1px solid #ddd;
    text-indent: -9999
}

input.jscolor-custom01 {
    position: absolute;
    right: 58px;
    top: 6px
}

input.jscolor-custom02 {
    position: absolute;
    right: 25px;
    top: 6px
}

.rangeslider {
    -webkit-appearance: none;
    width: 100%;
    height: 6px;
    border-radius: 5px;
    background: gray;
    outline: none;
    margin-top: 15px;
    -webkit-transition: .2s;
    transition: opacity .2s
}

.rangeslider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #fff;
    border: 3px solid #92c016;
    cursor: pointer
}

.rangeslider::-moz-range-thumb {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #fff;
    border: 3px solid #92c016;
    cursor: pointer
}

.zify-message {
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 999;
    right: 50px;
    bottom: 50px
}

.zify-message.show {
    visibility: visible;
    -webkit-animation: fadein .5s, fadeout .5s 2.5s;
    animation: fadein .5s, fadeout .5s 2.5s
}

@-webkit-keyframes fadein {
    from {
        bottom: 0;
        opacity: 0
    }

    to {
        bottom: 30px;
        opacity: 1
    }
}

@keyframes fadein {
    from {
        bottom: 0;
        opacity: 0
    }

    to {
        bottom: 30px;
        opacity: 1
    }
}

@-webkit-keyframes fadeout {
    from {
        bottom: 30px;
        opacity: 1
    }

    to {
        bottom: 0;
        opacity: 0
    }
}

@keyframes fadeout {
    from {
        bottom: 30px;
        opacity: 1
    }

    to {
        bottom: 0;
        opacity: 0
    }
}

.modal-dialog {
    height: 100%;
    padding: 0;
    margin-top: 50px !important
}

.support-form-wrapper .modal-dialog {
    width: 50% !important
}

.tooltip {
    z-index: 9999 !important
}

#add-form .modal-header,
#edit-form .modal-header {
    border: 0
}

.tabs-left,
.tabs-right {
    border-bottom: none;
    padding-top: 2px
}

.tabs-left {
    border-right: 1px solid #ddd
}

.tabs-right {
    border-left: 1px solid #ddd
}

.tabs-left>li,
.tabs-right>li {
    float: none;
    margin-bottom: 2px
}

.tabs-left>li {
    margin-right: -1px
}

.tabs-right>li {
    margin-left: -1px
}

.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
    border-bottom-color: #ddd;
    border-right-color: transparent;
    border-radius: 0;
    border-left: 2px solid #5c6ac4
}

.tabs-right>li.active>a,
.tabs-right>li.active>a:hover,
.tabs-right>li.active>a:focus {
    border-bottom: 1px solid #ddd;
    border-left-color: transparent
}

.tabs-left>li>a {
    border-radius: 4px 0 0 4px;
    margin-right: 0;
    display: block
}

.tabs-right>li>a {
    border-radius: 0 4px 4px 0;
    margin-right: 0
}

.checkbox-inline {
    margin-bottom: 20px !important;
    padding-top: 0 !important;
    font-weight: 500 !important
}

#zifyapp-footer {
    padding: 20px 0;
    margin-top: 20px;
    text-align: center;
    background-color: #f8f9fa !important;
    clear: both
}

@media(max-width:768px) {
    .row-mobile {
        margin-top: 20px
    }

    .support-form-wrapper .modal-dialog {
        width: 98% !important
    }
}

.fa-live::before {
    content: "\f17a"
}

.layout-zify-socials {
    display: block;
    width: 100%;
    max-width: 800px;
    margin: 10px 0;
    text-align: center;
    font-family: open sans, sans-serif
}

.layout-zify-socials a {
    font-family: open sans, sans-serif;
    font-weight: 400
}

.layout-zify-socials .fa:before {
    font-family: fontawesome !important
}

.layout-zify-socials .zify-social-connect {
    display: inline-block;
    text-align: center;
    padding: 0;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
    color: #fff;
    box-sizing: border-box
}

.layout-zify-socials .zify-social-connect:hover {
    opacity: .7;
    color: #fff
}

.cl-paypal {
    background-color: #019cde !important
}

.cl-reddit {
    background-color: #000 !important
}

.cl-naver {
    background-color: #1ec800 !important
}

.cl-spotify {
    background-color: #1db954 !important
}

.cl-facebook {
    background-color: #3c5a99 !important
}

.cl-twitter {
    background-color: #1da1f2 !important
}

.cl-google {
    background-color: #db4437 !important
}

.cl-linkedin {
    background-color: #0077b5 !important
}

.cl-instagram {
    background-color: #c13584 !important
}

.cl-amazon {
    background-color: #f90 !important
}

.cl-youtube {
    background-color: red !important
}

.cl-pinterest {
    background-color: #c92228 !important
}

.cl-live {
    background-color: #00a4ef !important
}

.cl-wordpress {
    background-color: #464646 !important
}

.cl-dropbox {
    background-color: #007ee5 !important
}

.cl-flickr {
    background-color: #ff0084 !important
}

.cl-mailchimp {
    background-color: #ffe01b !important
}

.cl-vimeo {
    background-color: #19b7ea !important
}

.cl-disqus {
    background-color: #2e9fff !important
}

.zify-size-big .zify-social-connect {
    width: 64px;
    font-size: 30px;
    height: 64px;
    line-height: 64px
}

.zify-size-big-2 .zify-social-connect {
    min-width: 220px;
    font-size: 30px;
    height: 64px
}

.zify-size-normal .zify-social-connect {
    width: 48px;
    font-size: 24px;
    height: 48px;
    line-height: 48px
}

.zify-size-small .zify-social-connect {
    width: 32px;
    font-size: 18px;
    height: 32px;
    line-height: 32px
}

.layout-zify-social-2 .zify-social-connect {
    border-radius: 5px
}

.layout-zify-social-3 .zify-social-connect {
    border-radius: 50%
}

.layout-zify-social-4 .zify-social-connect.cl-facebook {
    background-color: #fff !important;
    color: #3c5a99;
    border: 1px solid #3c5a99
}

.layout-zify-social-4 .zify-social-connect.cl-twitter {
    background-color: #fff !important;
    color: #1da1f2;
    border: 1px solid #1da1f2
}

.layout-zify-social-4 .zify-social-connect.cl-google {
    background-color: #fff !important;
    color: #db4437;
    border: 1px solid #db4437
}

.layout-zify-social-4 .zify-social-connect.cl-linkedin {
    background-color: #fff !important;
    color: #0077b5;
    border: 1px solid #0077b5
}

.layout-zify-social-4 .zify-social-connect.cl-instagram {
    background-color: #fff !important;
    color: #c13584;
    border: 1px solid #c13584
}

.layout-zify-social-4 .zify-social-connect.cl-amazon {
    background-color: #fff !important;
    color: #f90;
    border: 1px solid #f90
}

.layout-zify-social-4 .zify-social-connect.cl-youtube {
    background-color: #fff !important;
    color: red;
    border: 1px solid red
}

.layout-zify-social-4 .zify-social-connect.cl-pinterest {
    background-color: #fff !important;
    color: #c92228;
    border: 1px solid #c92228
}

.layout-zify-social-4 .zify-social-connect.cl-live {
    background-color: #fff !important;
    color: #00a4ef;
    border: 1px solid #00a4ef
}

.layout-zify-social-4 .zify-social-connect.cl-wordpress {
    background-color: #fff !important;
    color: #464646;
    border: 1px solid #464646
}

.layout-zify-social-4 .zify-social-connect.cl-dropbox {
    background-color: #fff !important;
    color: #007ee5;
    border: 1px solid #007ee5
}

.layout-zify-social-4 .zify-social-connect.cl-flickr {
    background-color: #fff !important;
    color: #ff0084;
    border: 1px solid #ff0084
}

.layout-zify-social-4 .zify-social-connect.cl-mailchimp {
    background-color: #fff !important;
    color: #ffe01b;
    border: 1px solid #ffe01b
}

.layout-zify-social-4 .zify-social-connect.cl-vimeo {
    background-color: #fff !important;
    color: #19b7ea;
    border: 1px solid #19b7ea
}

.layout-zify-social-4 .zify-social-connect.cl-disqus {
    background-color: #fff !important;
    color: #2e9fff;
    border: 1px solid #2e9fff
}

.layout-zify-social-4 .zify-social-connect.cl-naver {
    background-color: #fff !important;
    color: #1ec800;
    border: 1px solid #1ec800
}

.layout-zify-social-4 .zify-social-connect.cl-spotify {
    background-color: #fff !important;
    color: #1db954;
    border: 1px solid #1db954
}

.layout-zify-social-4 .zify-social-connect.cl-paypal {
    background-color: #fff !important;
    color: #019cde;
    border: 1px solid #019cde
}

.layout-zify-social-4 .zify-social-connect.cl-reddit {
    background-color: #fff !important;
    color: #000;
    border: 1px solid #000
}

.layout-zify-social-4 .zify-social-connect {
    border-radius: 50%
}

.layout-zify-social-5 .zify-social-connect,
.layout-zify-social-6 .zify-social-connect,
.layout-zify-social-8 .zify-social-connect {
    text-align: left
}

.layout-zify-social-5.zify-size-big-2 .zify-social-connect {
    font-size: 30px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    box-shadow: inset 0 -.5em 0 -.35em rgba(0, 0, 0, .17);
    line-height: 60px;
    padding: 0 20px;
    height: 64px
}

.layout-zify-social-5.zify-size-normal-2 .zify-social-connect {
    min-width: 170px;
    font-size: 24px;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    box-shadow: inset 0 -.5em 0 -.35em rgba(0, 0, 0, .17);
    line-height: 44px;
    padding: 0 20px;
    height: 48px
}

.layout-zify-social-5.zify-size-small-2 .zify-social-connect {
    min-width: 140px;
    font-size: 18px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    box-shadow: inset 0 -.5em 0 -.35em rgba(0, 0, 0, .17);
    line-height: 30px;
    padding: 0 10px;
    height: 32px
}

.layout-zify-social-5 .zify-social-connect .zify-label,
.layout-zify-social-6 .zify-social-connect .zify-label {
    display: inline-block;
    line-height: 1;
    margin: 0 0 0 10px;
    padding: 0
}

.layout-zify-social-7 .zify-social-connect .zify-label {
    display: inline-block;
    line-height: 1;
    margin: 0 0 0 5px;
    padding: 0
}

.layout-zify-social-3.zify-size-big .zify-social-connect,
.layout-zify-social-4.zify-size-big .zify-social-connect,
.layout-zify-social-5.zify-size-big-2 .zify-social-connect .zify-label {
    font-size: 28px
}

.layout-zify-social-3.zify-size-normal .zify-social-connect,
.layout-zify-social-4.zify-size-normal .zify-social-connect,
.layout-zify-social-5.zify-size-normal-2 .zify-social-connect .zify-label {
    font-size: 22px
}

.layout-zify-social-3.zify-size-small .zify-social-connect,
.layout-zify-social-4.zify-size-small .zify-social-connect,
.layout-zify-social-5.zify-size-small-2 .zify-social-connect .zify-label {
    font-size: 16px
}

.layout-zify-social-6.zify-size-big-2 .zify-social-connect {
    font-size: 30px;
    line-height: 64px;
    padding: 0 20px;
    height: 64px
}

.layout-zify-social-6.zify-size-normal-2 .zify-social-connect {
    min-width: 170px;
    font-size: 24px;
    line-height: 48px;
    padding: 0 20px;
    height: 48px
}

.layout-zify-social-6.zify-size-small-2 .zify-social-connect {
    min-width: 140px;
    font-size: 18px;
    line-height: 32px;
    padding: 0 20px;
    height: 32px
}

.layout-zify-social-7.zify-size-big-2 .zify-social-connect {
    font-size: 30px;
    line-height: 64px;
    padding: 0 20px;
    height: 64px;
    border-radius: 32px
}

.layout-zify-social-7.zify-size-normal-2 .zify-social-connect {
    min-width: 170px;
    font-size: 24px;
    line-height: 48px;
    padding: 0 20px;
    height: 48px;
    border-radius: 24px
}

.layout-zify-social-7.zify-size-small-2 .zify-social-connect {
    min-width: 140px;
    font-size: 18px;
    line-height: 32px;
    padding: 0 20px;
    height: 32px;
    border-radius: 16px
}

.layout-zify-social-6 .zify-social-connect,
.layout-zify-social-7 .zify-social-connect {
    color: #fff !important;
    background: -moz-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(0, 0, 0, .05)), color-stop(100%, rgba(0, 0, 0, .3)));
    background: -webkit-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -o-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -ms-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: linear-gradient(to bottom, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background-clip: padding-box
}

.layout-zify-social-8.zify-size-big-2 .zify-social-connect {
    font-size: 24px;
    line-height: 55px;
    padding: 0 20px 0 75px;
    height: 55px;
    position: relative;
    min-width: 225px
}

.layout-zify-social-8.zify-size-big-2 .zify-social-connect:before {
    position: absolute;
    left: 0;
    top: 0;
    width: 55px;
    height: 100%;
    text-align: center;
    background-color: rgb(255, 255, 255, .1)
}

.layout-zify-social-8.zify-size-normal-2 .zify-social-connect {
    min-width: 165px;
    font-size: 20px;
    line-height: 40px;
    padding: 0 20px 0 50px;
    height: 40px;
    position: relative
}

.layout-zify-social-8.zify-size-normal-2 .zify-social-connect:before {
    position: absolute;
    left: 0;
    top: 0;
    width: 40px;
    height: 100%;
    text-align: center;
    background-color: rgb(255, 255, 255, .1)
}

.layout-zify-social-8.zify-size-small-2 .zify-social-connect {
    min-width: 125px;
    font-size: 15px;
    line-height: 30px;
    padding: 0 20px 0 37px;
    height: 30px;
    position: relative
}

.layout-zify-social-8.zify-size-small-2 .zify-social-connect:before {
    position: absolute;
    left: 0;
    top: 0;
    width: 30px;
    height: 100%;
    text-align: center;
    background-color: rgb(255, 255, 255, .1)
}

.list-social-services li>label {
    width: 35%
}

@font-face {
    font-family: fontello;
    src: url(../../public/font/fontello.eot?45770065);
    src: url(../../public/font/fontello.eot?45770065#iefix) format('embedded-opentype'), url(../../public/font/fontello.woff2?45770065) format('woff2'), url(../../public/font/fontello.woff?45770065) format('woff'), url(../../public/font/fontello.ttf?45770065) format('truetype'), url(../../public/font/fontello.svg?45770065#fontello) format('svg');
    font-weight: 400;
    font-style: normal
}

[class^=icon-]:before,
[class*=" icon-"]:before {
    font-family: fontello;
    font-style: normal;
    font-weight: 400;
    speak: none;
    display: inline-block;
    text-decoration: inherit;
    width: 1em;
    text-align: center;
    font-variant: normal;
    text-transform: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}

.icon-disqus:before {
    content: '\e801'
}

.icon-naver:before {
    content: '\e805'
}

.icon-mailchimp:before {
    content: '\e80c'
}

.icon-twitter:before {
    content: '\f099'
}

.icon-facebook:before {
    content: '\f09a'
}

.icon-mail-alt:before {
    content: '\f0e0'
}

.icon-linkedin:before {
    content: '\f0e1'
}

.icon-youtube:before {
    content: '\f167'
}

.icon-xing:before {
    content: '\f168'
}

.icon-dropbox:before {
    content: '\f16b'
}

.icon-instagram:before {
    content: '\f16d'
}

.icon-flickr:before {
    content: '\f16e'
}

.icon-tumblr:before {
    content: '\f173'
}

.icon-live:before {
    content: '\f17a'
}

.icon-skype:before {
    content: '\f17e'
}

.icon-vkontakte:before {
    content: '\f189'
}

.icon-weibo:before {
    content: '\f18a'
}

.icon-renren:before {
    content: '\f18b'
}

.icon-wordpress:before {
    content: '\f19a'
}

.icon-google:before {
    content: '\f1a0'
}

.icon-stumbleupon:before {
    content: '\f1a4'
}

.icon-digg:before {
    content: '\f1a6'
}

.icon-steam:before {
    content: '\f1b7'
}

.icon-spotify:before {
    content: '\f1bc'
}

.icon-hacker-news:before {
    content: '\f1d4'
}

.icon-paypal:before {
    content: '\f1ed'
}

.icon-pinterest:before {
    content: '\f231'
}

.icon-whatsapp:before {
    content: '\f232'
}

.icon-get-pocket:before {
    content: '\f265'
}

.icon-amazon:before {
    content: '\f270'
}

.icon-vimeo:before {
    content: '\f27d'
}

.icon-reddit:before {
    content: '\f281'
}

.icon-mixcloud:before {
    content: '\f289'
}

.icon-telegram:before {
    content: '\f2c6'
}

.icon-blogger:before {
    content: '\f314'
}

.icon-evernote:before {
    content: '\f333'
}

.list-social-services {
    list-style: none;
    display: block;
    padding: 5px 10px;
    max-width: 750px
}

.list-social-services li {
    display: block;
    width: 100%;
    list-style: none;
    color: #fff;
    text-align: left;
    margin-bottom: 15px;
    padding: 2px 15px;
    overflow: hidden;
    position: relative
}

.list-social-services li .detail {
    float: right;
    background: #fff;
    padding: 15px;
    position: absolute;
    top: 0;
    right: 1px
}

.list-social-services li .detail .input-right {
    float: right;
    max-width: 60px
}

.list-social-services li .detail input {
    color: #333;
    text-align: center;
    height: 26px
}

.list-social-services li .detail .switch {
    margin: 0 15px 0 10px
}

.list-social-services li .zify-icon {
    font-size: 20px;
    width: 26px;
    height: 26px;
    line-height: 26px;
    text-align: center;
    margin-right: 15px
}

.list-social-services li>label {
    font-size: 20px;
    display: inline-block;
    line-height: 26px
}

.fa-live::before {
    content: "\f17a"
}

.cl-facebook {
    background-color: #3c5a99
}

.cl-twitter {
    background-color: #1da1f2
}

.cl-google {
    background-color: #db4437
}

.cl-linkedin {
    background-color: #0077b5
}

.cl-instagram {
    background-color: #c13584
}

.cl-amazon {
    background-color: #f90
}

.cl-youtube {
    background-color: red
}

.cl-pinterest {
    background-color: #c92228
}

.cl-live {
    background-color: #00a4ef
}

.cl-wordpress {
    background-color: #464646
}

.cl-dropbox {
    background-color: #007ee5
}

.cl-flickr {
    background-color: #ff0084
}

.cl-mailchimp {
    background-color: #ffe01b
}

.cl-vimeo {
    background-color: #19b7ea
}

.cl-disqus {
    background-color: #2e9fff
}

.cl-naver {
    background-color: #1ec800
}

.cl-spotify {
    background-color: #1db954
}

.btn-default-cus {
    border: 1px solid #d1d3e2;
    background-color: #fff;
    cursor: pointer
}

.option-style {
    width: 24px;
    height: 24px;
    margin: 0 5px;
    border: 1px solid #c2c2c2;
    background-color: #c2c2c2;
    display: block
}

.btn-default-cus.active {
    border: dashed 1px #3f51b5
}

.btn-default-cus.active>.option-style {
    background-color: #3f51b5;
    border-color: #3f51b5
}

.option-style-2 {
    border-radius: 5px
}

.option-style-3 {
    border-radius: 50px
}

.option-style-4 {
    background-color: #fff;
    border: 3px solid #c2c2c2;
    border-radius: 50%
}

.option-style-5 {
    border: 0;
    box-shadow: inset 0 -.6em 0 -.35em rgba(0, 0, 0, .17);
    border-radius: 5px
}

.option-style-6 {
    border: 0;
    color: #fff !important;
    background: -moz-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(0, 0, 0, .05)), color-stop(100%, rgba(0, 0, 0, .3)));
    background: -webkit-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -o-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -ms-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: linear-gradient(to bottom, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background-clip: padding-box
}

.option-style-7 {
    border: 0;
    border-radius: 10px;
    color: #fff !important;
    background: -moz-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(0, 0, 0, .05)), color-stop(100%, rgba(0, 0, 0, .3)));
    background: -webkit-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -o-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: -ms-linear-gradient(top, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background: linear-gradient(to bottom, rgba(0, 0, 0, .05) 0, rgba(0, 0, 0, .3) 100%);
    background-clip: padding-box
}

.option-style-8 {
    border: 0;
    position: relative;
    padding-left: 20px
}

.option-style-8:before {
    content: '';
    background: #fff;
    opacity: .2;
    position: absolute;
    left: 0;
    top: 0;
    width: 20px;
    height: 100%
}

.btn-default-cus.active>.option-style-4 {
    background-color: #fff;
    border: 3px solid #3f51b5
}

.socials-input-label {
    border: 0;
    font-size: 16px;
    color: #333;
    background: #fff;
    padding: 5px;
    margin-top: 6px;
    outline: 0
}

.socials-input-label:focus {
    border-bottom: 1px solid #fff
}

.bs-example {
    position: relative;
    padding: 15px;
    margin: 0 -15px 15px;
    border-color: #e5e5e5 #eee #eee;
    border-style: solid;
    border-width: 1px 0;
    -webkit-box-shadow: inset 0 3px 6px rgba(0, 0, 0, .05);
    box-shadow: inset 0 3px 6px rgba(0, 0, 0, .05);
    margin-right: 0;
    margin-left: 0;
    background-color: #fff;
    border-color: #ddd;
    border-width: 1px;
    border-radius: 4px 4px 0 0;
    -webkit-box-shadow: none;
    box-shadow: none
}

.item-social {
    opacity: .6
}

.item-social.active {
    opacity: 1
}

.social_heading {
    text-align: center
}

.btn-default-cus .btn-preview {
    display: none
}

.nav-link.active,
.nav-link:hover {
    background: #ddd
}
        
    </style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
<link href="https://fblogin.zifyapp.com/css/backend/v2/main.css" rel="stylesheet">
<link href="https://fblogin.zifyapp.com/css/backend/styles.css" rel="stylesheet">
<link href="https://fblogin.zifyapp.com/css/backend/clean-switch.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

 

    </head>
<body>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<script type="text/javascript">
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".zify-preloader-icon").fadeOut("slow");
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
        
        <button class="btn btn-lg btn-primary social-setting-btn" style="font-size: 16px"><span>Save Settings </span></button>
        </div>
        <input type="hidden" name="_token" value="a9nrkH5Mipms0J1RESiYjvdVMn2WZyKoRfXT9f8D">
        <input type="hidden" name="choose_tab" id="choose_tab" value="#add_tab-services">
        <input type="hidden" name="id" value="3386">
        <input type="hidden" name="user_id" value="{{$shop->id}}">
        <div class="col-md-9 m-auto">
        <div class="main-card mb-3 card2 shadow">
        <div class="card-body table-responsive">
        <div class="alert alert-warning">
        <a href="javascript:void(0)" onclick="openWidget()">Contact us</a> to remove Zify Copyright or enable all social networks and all features without upgrade the plan.
        </div>
        
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
    <!--     <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-c1-0" data-toggle="tab" href="#add_tab-genaral" aria-selected="false">
        <span class="nav-text">Popup &amp; Redirect</span>
        </a>
        </li> -->
 <!--        <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-c1-0" data-toggle="tab" href="#add_tab-trans" aria-selected="false">
        <span class="nav-text">Translate</span>
        </a>
        </li> -->
        </ul>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="tab-content col-md-6 bg-white">
        <div class="tab-pane  show active" id="add_tab-services" role="tabpanel">
        <div class="position-relative row form-group">
        <label class="control-label col-md-4" for="status">Enable app</label>
        <div class="col-md-8">
        <label class="cl-switch mb-0">
        <input type="checkbox" id="status" name="status" {{isset($user_data) &&$user_data->enable_social_app=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        </div>
        <div class="position-relative row form-group d-none">
        <label class="control-label col-md-4" for="remove_copyright">Remove Copyright</label>
        <div class="col-md-8">
        <label class="cl-switch mb-0">
        <input type="checkbox" id="remove_copyright" name="remove_copyright">
        <span class="switcher"></span>
        <span class="label"></span>
         </label>
        </div>
        </div>
        <div class="position-relative row form-group">
        <label class="control-label col-md-4" for="status"></label>
        <div class="col-md-8">
        <ul class="list-social-services p-0" id="socialList">
        <li class="cl-facebook item-social" data-id="facebook" draggable="false">
        <span class="zify-icon icon-facebook"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[facebook]" value="{{isset($user_data)?$user_data->facebook_label:'Facebook'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[facebook]" placeholder="sort" value="0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="cl-switch mb-0">
        <input class="social-status" type="checkbox"  name="services[facebook]" {{isset($user_data) &&$user_data->facebook=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="zify-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[facebook]" placeholder="Client ID" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[facebook]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[facebook]" value=" https://fblogin.zifyapp.com/social-login/connect/facebook" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>
        <li class="cl-twitter item-social" data-id="twitter" draggable="false">
        <span class="zify-icon icon-twitter"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[twitter]" value="{{isset($user_data)?$user_data->twitter_label:'Twitter'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[twitter]" placeholder="sort" value="1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="cl-switch mb-0">
        <input class="social-status" type="checkbox"  name="services[twitter]" {{isset($user_data) &&$user_data->twitter=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="zify-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[twitter]" placeholder="Client ID" value="">
         </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[twitter]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[twitter]" value=" https://fblogin.zifyapp.com/social-login/connect/twitter" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>

        <li class="cl-google item-social" data-id="google" draggable="false">
        <span class="zify-icon icon-google"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[google]" value="{{isset($user_data)?$user_data->google_label:'Google'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[google]" placeholder="sort" value="2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="cl-switch mb-0">
        <input class="social-status" type="checkbox" name="services[google]" {{isset($user_data) &&$user_data->google=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="zify-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[google]" placeholder="Client ID" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[google]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[google]" value=" https://fblogin.zifyapp.com/social-login/connect/google" readonly="readonly">
        <em class="small muted-text">Authorized redirect URIs</em>
        </div>
        </div>
        </li>

        <li class="cl-linkedin item-social  " data-id="linkedin">
        <span class="zify-icon icon-linkedin"></span>
        <label data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to edit social label">
        <input class="socials-input-label" type="text" name="label[linkedin]" value="{{isset($user_data)?$user_data->linkedin_label:'linkedin'}}">
        </label>
        <div class="detail">
        <input class="input-right" type="hidden" name="sort[linkedin]" placeholder="sort" value="3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort Order">
        <label class="cl-switch mb-0">
        <input class="social-status" type="checkbox"  name="services[linkedin]" {{isset($user_data) &&$user_data->linkedin=='on'?'checked':''}}>
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        <div class="zify-social-api" style="display: none;">
        <div class="position-relative form-group">
        <input class="form-control input-text" type="text" name="client_id[linkedin]" placeholder="Client ID" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="client_secret[linkedin]" placeholder="Client secret" value="">
        </div>
        <div class="position-relative row form-group">
        <input class="form-control input-text" type="text" name="redirect[linkedin]" value=" https://fblogin.zifyapp.com/social-login/connect/linkedin" readonly="readonly">
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
        <option value="0" selected="selected">Above the Login Form</option>
        <option value="1">Below the Login Form</option>
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
    <!--     <div class="position-relative row form-group">
        <label for="custom_styles" class="col-md-4 control-label">Custom CSS</label>
        <div class="col-md-8">
        <textarea type="text" rows="7" class="form-control" id="custom_styles" name="custom_styles"></textarea>
        </div>
        </div> -->
        </div>
        <div class="tab-pane" id="add_tab-genaral" role="tabpanel">
        <div class="content-body form-horizontal">
        <div class="position-relative row form-group">
        <label class="control-label col-md-4" for="quick_login"> Enable popup login form</label>
        <div class="col-md-8">
        <label class="cl-switch mb-0">
        <input type="checkbox" class="upgrade-modal">
        <span class="switcher"></span>
        <span class="label"></span>
        </label>
        </div>
        </div>
        <div class="position-relative row form-group">
        <label for="class_ele" class="col-md-4 control-label">Element selector to open the popup login form</label>
        <div class="col-md-8">
        <input class="form-control input-text {" type="text" name="class_ele" value=".site-header__account,a[href^=&quot;/account&quot;]">
        <em class="small muted-text">Default: .site-header__account,a[href^="/account"]</em>
        </div>
        </div>
        <div class="position-relative row form-group">
        <label class="control-label col-md-4" for="login_redirect">Redirect users after login </label>
        <div class="col-md-8">
        <select name="back" class="choose-redirect form-control input-text input-select">
        <option selected="selected" value="0">Redirect to a page. Put the page URL on the text box below </option>
        <option value="1" disabled=""> Redirect back to original URL after successful login (Pricing plan) </option>
        </select>
        </div>
        </div>
        <div class="position-relative row form-group url_redirect">
        <label for="custom_styles" class="col-md-4 control-label">URL redirection</label>
        <div class="col-md-8">
        <input class="form-control input-text upgrade-modal" type="text" value="">
        <em class="small muted-text">Default redirection (Shopify default): /account</em>
        </div>
        </div>
        <script type="text/javascript">
                                                                    jQuery('.choose-redirect').on('change', function() {
                                                                      if(jQuery(this).val() == 1){
                                                                          jQuery('.url_redirect').hide();
                                                                      }else{
                                                                          jQuery('.url_redirect').show();
                                                                      }
                                                                    });
                                                                </script>
        </div>
        </div>
        <div class="tab-pane" id="add_tab-trans" role="tabpanel">
        <div class="content-body ">
        <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" name="trans[email_label]" class="form-control" id="trans_email_label" placeholder="Translate 'Email'" value="Email">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="text" name="trans[pass_label]" class="form-control" id="trans_pass_label" placeholder="Translate 'Password'" value="Password">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" name="trans[last_name_label]" class="form-control" id="trans_last_name_label" placeholder="Translate 'Last Name'" value="Last Name">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" name="trans[first_name_label]" class="form-control" id="trans_first_name_label" placeholder="Translate 'First Name'" value="First Name">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">is not a valid email</label>
        <input type="text" name="trans[email_err]" class="form-control" id="trans_email_err" placeholder="Translate 'is not a valid email'" value="is not a valid email">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">can't be blank</label>
        <input type="text" name="trans[required_err]" class="form-control" id="trans_required_err" placeholder="Translate 'can't be blank'" value="can't be blank">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">must be at least 5 characters</label>
        <input type="text" name="trans[pass_err]" class="form-control" id="trans_pass_err" placeholder="Translate 'must be at least 5 characters'" value="must be at least 5 characters">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" name="trans[login_frm]" class="form-control" id="trans_login_frm" placeholder="Translate 'Login'" value="Login">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Create Account</label>
        <input type="text" name="trans[register_frm]" class="form-control" id="trans_register_frm" placeholder="Translate 'Create Account'" value="Create Account">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Reset your password</label>
        <input type="text" name="trans[resetpass_frm]" class="form-control" id="trans_resetpass_frm" placeholder="Translate 'Reset your password'" value="Reset your password">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">We will send you an email to reset your password.</label>
        <input type="text" name="trans[resetpass_sub]" class="form-control" id="trans_resetpass_sub" placeholder="Translate 'We will send you an email to reset your password.'" value="We will send you an email to reset your password.">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Forgot your password?</label>
        <input type="text" name="trans[resetpass_link]" class="form-control" id="trans_resetpass_link" placeholder="Translate 'Forgot your password?'" value="Forgot your password?">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Already Have an Account? Login!</label>
        <input type="text" name="trans[login_back_link]" class="form-control" id="trans_login_back_link" placeholder="Translate 'Already Have an Account? Login!'" value="Already Have an Account? Login!">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Sign In</label>
        <input type="text" name="trans[login_btn]" class="form-control" id="trans_login_btn" placeholder="Translate 'Sign In'" value="Sign In">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Create</label>
        <input type="text" name="trans[register_btn]" class="form-control" id="trans_register_btn" placeholder="Translate 'Create'" value="Create">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Cancel</label>
        <input type="text" name="trans[cancel]" class="form-control" id="trans_cancel" placeholder="Translate 'Cancel'" value="Cancel">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Submit</label>
        <input type="text" name="trans[submit]" class="form-control" id="trans_submit" placeholder="Translate 'Submit'" value="Submit">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Invalid login credentials.</label>
        <input type="text" name="trans[login_frm_err]" class="form-control" id="trans_login_frm_err" placeholder="Translate 'Invalid login credentials.'" value="Invalid login credentials.">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Error</label>
        <input type="text" name="trans[error]" class="form-control" id="trans_error" placeholder="Translate 'Error'" value="Error">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Sorry, looks like something went wrong.</label>
        <input type="text" name="trans[js_err]" class="form-control" id="trans_js_err" placeholder="Translate 'Sorry, looks like something went wrong.'" value="Sorry, looks like something went wrong.">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Invalid login credentials.</label>
        <input type="text" name="trans[js_login_err]" class="form-control" id="trans_js_login_err" placeholder="Translate 'Invalid login credentials.'" value="Invalid login credentials.">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Your email is already registered in this store, please sign in directly!</label>
        <input type="text" name="trans[message_email]" class="form-control" id="trans_message_email" placeholder="Translate 'Your email is already registered in this store, please sign in directly!'" value="Your email is already registered in this store, please sign in directly!">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Success!</label>
        <input type="text" name="trans[message_succes]" class="form-control" id="trans_message_succes" placeholder="Translate 'Success!'" value="Success!">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">You did not use an email address for your social account, so we can not get your email and login to our store.</label>
        <input type="text" name="trans[message_email_2]" class="form-control" id="trans_message_email_2" placeholder="Translate 'You did not use an email address for your social account, so we can not get your email and login to our store.'" value="You did not use an email address for your social account, so we can not get your email and login to our store.">
        </div>
        </div> </div>
        </div>
        <div class="col-md-6">
        <div class="content-body">
         <div class="live-preview"><div class="zifyapps-sociallogin-wrapper">
        <style type="text/css">
        
        @font-face {
          font-family: 'fontello';
          src: url('https://fblogin.zifyapp.com/public/font/fontello.eot?81342758');
          src: url('https://fblogin.zifyapp.com/public/font/fontello.eot?81342758#iefix') format('embedded-opentype'),
               url('https://fblogin.zifyapp.com/public/font/fontello.woff2?81342758') format('woff2'),
               url('https://fblogin.zifyapp.com/public/font/fontello.woff?81342758') format('woff'),
               url('https://fblogin.zifyapp.com/public/font/fontello.ttf?81342758') format('truetype'),
               url('https://fblogin.zifyapp.com/public/font/fontello.svg?81342758#fontello') format('svg');
          font-weight: normal;
          font-style: normal;
        }
        
         
         .layout-zify-socials [class^="icon-"]:before, .layout-zify-socials [class*=" icon-"]:before {
          font-family: "fontello" !important;
          font-style: normal;
          font-weight: normal;
          speak: none;
          display: inline-block;
          text-decoration: inherit;
          width: 1em;
          line-height: inherit;
          text-align: center;
          font-variant: normal;
          text-transform: none;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
        }
        .layout-zify-socials .icon-spotify:before { content: '\f1bc'; }
        .layout-zify-socials .icon-naver:before { content: '\e805'; } /* '' */
        .layout-zify-socials .icon-disqus:before { content: '\e801'; }
        .layout-zify-socials .icon-mailchimp:before { content: '\e80c'; }
        .layout-zify-socials .icon-twitter:before { content: '\f099'; }
        .layout-zify-socials .icon-facebook:before { content: '\f09a'; }
        .layout-zify-socials .icon-linkedin:before { content: '\f0e1'; }
        .layout-zify-socials .icon-youtube:before { content: '\f167'; }
        .layout-zify-socials .icon-dropbox:before { content: '\f16b'; }
        .layout-zify-socials .icon-instagram:before { content: '\f16d'; }
        .layout-zify-socials .icon-flickr:before { content: '\f16e'; }
        .layout-zify-socials .icon-live:before { content: '\f17a'; }
        .layout-zify-socials .icon-wordpress:before { content: '\f19a'; }
        .layout-zify-socials .icon-google:before { content: '\f1a0'; }
        .layout-zify-socials .icon-pinterest:before { content: '\f231'; }
        .layout-zify-socials .icon-amazon:before { content: '\f270'; }
        .layout-zify-socials .icon-vimeo:before { content: '\f27d'; }
        
        
        
        </style>
        
        
        <!-- Add font awesome icons -->
         
        
        
        
        <div id="zify-sticky-social" class="layout-zify-social-8 layout-zify-socials zify-size-small-2 ">
        
                                                                                               
        </div>
        
        
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
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
                    $('.zify-preloader-icon').show();
                });
        
                function loadAjax(){
                  $.ajax({
                    type : 'POST',
                    url : '/socialstore',
                    data : $('#social-setting-frm').serialize(),
                    beforeSend: function( xhr ) {
                        $('.live-preview').html('<div style="text-align: center;"><img style="width:32px;" src="https://fblogin.zifyapp.com/images/frontend/load.gif"/></div>');
                    }
                    }).done(function(result) {
                         $('.live-preview').html(result.html);
                         var widthBox = 32;
                         
                        
                            $('a.zify-social-connect').each(function(){
                            
                            // If this box is higher than the cached highest then store it
                            if($(this).outerWidth() > widthBox) {
                              widthBox = $(this).outerWidth();
                             
                            }
                          
                                });
                            $('a.zify-social-connect').css("min-width", widthBox + 'px' );
                    
                        //jQuery('a.zify-social-connect').css("min-width", (widthBox+1) + 'px' );
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
                            $('.live-preview').html('<div style="text-align: center;"><img style="width:32px;" src="https://fblogin.zifyapp.com/images/frontend/load.gif"/></div>');
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

<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.0/jscolor.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script type="text/javascript" src="https://fblogin.zifyapp.com/js/backend/v2/main.js"></script>
<script type="text/javascript" src="https://fblogin.zifyapp.com/js/backend/custom.js"></script>
<script type="text/javascript">
        
        $(document).on('click','.zify-overlay',function(){
            $(this).parent().hide();
        });
        
        $( document ).ready(function() {
            setTimeout(function(){
                $(".zify-message").hide();

            }, 1500);
        });
        //Upgrade
        $(document).on('click', '.upgrade-modal', function(){
            $('#form-upgrade').modal({backdrop: 'static', keyboard: false}, 'show');
        });
    </script>
<style type="text/css">
    #publicthemesModal{font-size: 13px;}
    #publicthemesFrom.loading-ajax{
        position: relative;
        z-index: 1;
    }
    #publicthemesFrom.loading-ajax:before{
        content:"";
        display: block;
        z-index: 9;
        background-color: rgba(255,255,255,0.5);
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background-image:url(https://fblogin.zifyapp.com/images/backend/ajax-spinner.gif);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 30px 30px;
    }
</style>
<div class="modal" tabindex="-1" role="dialog" id="publicthemesModal">
<div class="modal-dialog" role="document" style="height: auto">
<form class="modal-content" style="background:#FFF;display: block;" id="publicthemesFrom">
<div class="modal-header">
<h5 class="modal-title">Publish app to other themes</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="choose_themes">
<input type="hidden" name="_token" value="a9nrkH5Mipms0J1RESiYjvdVMn2WZyKoRfXT9f8D">
<input type="hidden" name="domain" value="multi-social-login.myshopify.com">
<div class="row">
<div class="col-md-6">
<div class="form-check abc-checkbox abc-checkbox-success text-success">
<input class="form-check-input" type="radio" name="theme_public[]" id="theme_public" value="139525357858" data-role="main" checked="checked" style="display:none">
<input class="form-check-input" type="radio" name="theme_public[]" id="theme_public_0" value="139525357858" data-role="main" checked="checked" disabled="disabled">
 <label class="form-check-label" for="theme_public_0">
Dawn (Current theme)
</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-12"><p>If you want to check this app with another theme, please select the theme and Publish!</p></div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" id="submit_publicthemesModal">Publish</button>
<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
<script type="text/javascript">
    $('#showpublicthemesModal').click(function(event) {
        event.preventDefault();
        // body...
        $('#publicthemesModal').modal('toggle');
            $("#submit_publicthemesModal").click(function(event) {
            event.preventDefault();
            $.ajax({
                        type: "GET",
                        url: 'https://fblogin.zifyapp.com/social-login/public-theme',
                        data:  $('#publicthemesFrom').serialize(),
                        beforeSend: function( xhr ) {
                            $('.zifyapps-wrapper').find('.save-loading').show();
                            $('#publicthemesFrom').addClass('loading-ajax');

                        },

                        success: function (response) {
                            $('.zifyapps-wrapper').find('.save-loading').hide();
                            $('#publicthemesFrom').removeClass('loading-ajax');
                            $('#publicthemesModal').modal('hide');
                            $("#snackbar").text(response.message);
                            var x = document.getElementById("snackbar");
                            x.className = "show";                     
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        },

                        error: function(response){

                            console.log('connecting error!');

                        }
                });
        })
    })

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

 
<div class="zify-loading" style="display: none;">
<img src="https://fblogin.zifyapp.com/images/backend/loading.gif" />
</div>

<div class="zify-message">


 </div>

</body>
</html>





@endsection
