
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PMO | Registration Page</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{asset('assets/dist/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

<link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
<script nonce="08f2f084-f7d4-4ab5-8a8e-f78476b60be1">try{(function(w,d){!function(bk,bl,bm,bn){if(bk.zaraz)console.error("zaraz is loaded twice");else{bk[bm]=bk[bm]||{};bk[bm].executed=[];bk.zaraz={deferred:[],listeners:[]};bk.zaraz._v="5807";bk.zaraz._n="08f2f084-f7d4-4ab5-8a8e-f78476b60be1";bk.zaraz.q=[];bk.zaraz._f=function(bo){return async function(){var bp=Array.prototype.slice.call(arguments);bk.zaraz.q.push({m:bo,a:bp})}};for(const bq of["track","set","debug"])bk.zaraz[bq]=bk.zaraz._f(bq);bk.zaraz.init=()=>{var br=bl.getElementsByTagName(bn)[0],bs=bl.createElement(bn),bt=bl.getElementsByTagName("title")[0];bt&&(bk[bm].t=bl.getElementsByTagName("title")[0].text);bk[bm].x=Math.random();bk[bm].w=bk.screen.width;bk[bm].h=bk.screen.height;bk[bm].j=bk.innerHeight;bk[bm].e=bk.innerWidth;bk[bm].l=bk.location.href;bk[bm].r=bl.referrer;bk[bm].k=bk.screen.colorDepth;bk[bm].n=bl.characterSet;bk[bm].o=(new Date).getTimezoneOffset();if(bk.dataLayer)for(const bx of Object.entries(Object.entries(dataLayer).reduce(((by,bz)=>({...by[1],...bz[1]})),{})))zaraz.set(bx[0],bx[1],{scope:"page"});bk[bm].q=[];for(;bk.zaraz.q.length;){const bA=bk.zaraz.q.shift();bk[bm].q.push(bA)}bs.defer=!0;for(const bB of[localStorage,sessionStorage])Object.keys(bB||{}).filter((bD=>bD.startsWith("_zaraz_"))).forEach((bC=>{try{bk[bm]["z_"+bC.slice(7)]=JSON.parse(bB.getItem(bC))}catch{bk[bm]["z_"+bC.slice(7)]=bB.getItem(bC)}}));bs.referrerPolicy="origin";bs.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bk[bm])));br.parentNode.insertBefore(bs,br)};["complete","interactive"].includes(bl.readyState)?zaraz.init():bk.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async j=>new Promise((k=>{if(j){j.e&&j.e.forEach((l=>{try{const m=d.querySelector("script[nonce]"),n=m?.nonce||m?.getAttribute("nonce"),o=d.createElement("script");n&&(o.nonce=n);o.innerHTML=l;o.onload=()=>{d.head.removeChild(o)};d.head.appendChild(o)}catch(p){console.error(`Error executing script: ${l}\n`,p)}}));Promise.allSettled((j.f||[]).map((q=>fetch(q[0],q[1]))))}k()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="register-logo">
<a href=""><b>PMO</b>Pvt</a>
</div>
<div class="card">
<div class="card-body register-card-body">
<p class="login-box-msg">Registration</p>
<form action="{{url('store')}}" method="post">
@csrf
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Full name" name="name">
   <div class="input-group-append">
   <div class="input-group-text">
   <span class="fas fa-user"></span>
</div>
</div>
</div>
@if ($errors->has('name'))
    <div class="text-danger small mt-1">
        {{ $errors->first('name') }}
    </div>
@endif
<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email" name="email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
@if ($errors->has('email'))
    <div class="text-danger small mt-1">
        {{ $errors->first('email') }}
    </div>
@endif
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password" name="password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>@if ($errors->has('password'))
    <div class="text-danger small mt-1">
        {{ $errors->first('password') }}
    </div>
@endif
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>

</div>
</div>
@if ($errors->has('confirm_password'))
    <div class="text-danger small mt-1">
        {{ $errors->first('confirm_password') }}
    </div>
@endif
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="agreeTerms" name="terms" value="agree">
<label for="agreeTerms">
I agree to the <a href="#">terms</a>
</label>

</div>@if ($errors->has('terms'))
    <div class="text-danger small mt-1">
        {{ $errors->first('terms') }}
    </div>
@endif
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Register</button>
</div>

</div>
</form>

<a href="{{url('login')}}" class="text-center">I already have a account</a>
</div>

</div>
</div>


<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

</body>
</html>
