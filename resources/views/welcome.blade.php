<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<style>
body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}
.text-center {
    text-align: center!important;
}
.mb-auto, .my-auto {
    margin-bottom: auto!important;
}
.mt-auto, .my-auto {
    margin-top: auto!important;
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.masthead h1 {
    font-size: 5.5rem;
}
.mb-1, .my-1 {
    margin-bottom: .25rem!important;
}
h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
}
.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn {
    box-shadow: 0 3px 3px 0 rgb(0 0 0 / 10%);
    font-weight: 700;
}
.btn-primary {
    background-color: #1d809f!important;
    border-color: #1d809f!important;
    color: #fff!important;
    text-decoration: none;
}
.btn-xl {
    padding: 1.25rem 2.5rem;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1140px;
}
.masthead {
    height: 100vh;
}
.masthead {
    min-height: 30rem;
    position: relative;
    display: table;
    width: 100%;
    height: auto;
    padding-top: 8rem;
    padding-bottom: 8rem;
    background: linear-gradient(
90deg
,rgba(255,255,255,.1) 0,rgba(255,255,255,.1) 100%),url(/system_images/bg-masthead.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
    </head>
    <body>
      <header class="masthead d-flex">
        <div class="container text-center my-auto">
          <h1 class="mb-1">Stylish Portfolio</h1>
          <h3 class="mb-5">
            <em>A Free Bootstrap Theme by Start Bootstrap</em>
          </h3>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{route('employerIndex')}}">Client Sign In</a>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{route('employee_profile.showLoginForm')}}">Employee Sign In</a>
        </div>
        <div class="overlay"></div>
      </header>
    </body>
</html>
