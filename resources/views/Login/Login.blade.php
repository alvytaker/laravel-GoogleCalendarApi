<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
    
   body{
   /* background: url(https://www.xtrafondos.com/wallpapers/montanas-con-nieve-en-el-bosque-3934.jpg);
	 */
   background-image: url('../img/futu.jpg');
   background-size: 100vw 100vh;
   
   
   
      
    } 
    .capa{
		width: 100%;
		height: 100vh;
		background: rgba(0,0,0,0.3);
		
    }

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
      
    }
    
   .form #form1 {
      position: relative;
      z-index: 1;
      background: #0F5138;
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
   .form #form1 #logintitulo{
      font-family: "Roboto", sans-serif;
      color: #f2f2f2;
      font-size: 19px;
      position: relative;
	   	top: -20;
      
      
    }

    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }
    #formbutton {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #1134AB;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }
    #linkregisters:hover,#linkregisters:active,#linkregisters:focus{
      color: #1134AB;
    }
    
    .form button:hover,.form button:active,.form button:focus {
      background: #43A047;
      cursor: pointer;
    }
    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }
    .form .message a {
      color: #4CAF50;
      text-decoration: none;
    }
    .form .register-form {
      display: none;
    }
  
</style>

@extends('master')

@section('body')

<div class="capa">
<div class="login-page">
  <div class="form">
    <form id="form1" class="login-form" action="{{ route('login')}}" method="get">
      @csrf
        <div id="logintitulo">Ingrese sus credenciales</div>
        <input type="text" name="rut" placeholder="Rut"/>
        <input type="password" name="password" placeholder="Contraseña"/>
        @if (session('message'))
        <div class="alert alert-danger">
        {{session('message')}}
        </div>
        @endif
        <button id="formbutton">login</button>       
        <p class="message">Aun no te registras? <a id="linkregisters" class="link-info" data-toggle="modal" data-target="#register">Crear cuenta</a></p>   
      </form>
      @include('Login/Register')
  </div>
</div>

</div>
@stop




