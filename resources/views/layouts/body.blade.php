<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>@yield('Title')</title>
</head>
<style>
      @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
@import url(http://fonts.googleapis.com/css?family=Roboto:700,400,300);
@import url(https://raw.github.com/necolas/normalize.css/master/normalize.css);
/**
* Set up reusable colors
*/
/**
* Colors from Flat UI
* Source: http://flatuicolors.com
*/
* {
  box-sizing: border-box;
}
/**
* This can be extended to anything to make it get slightly bigger on hover,
* which is a pretty commonly desired effect
*/
.big-on-hover {
  transform: scale(1, 1);
}
.big-on-hover:hover {
  transform: scale(1.2, 1.2);
}

/**
* Reusable single-direction margin declaration
*/
.margin, p, .flag {
  margin-top: 0;
  margin-bottom: 24px;
}
.margin:last-child, p:last-child, .flag:last-child {
  margin-bottom: 0;
}

/**
* Flag Object
* Original Source: http://csswizardry.com/2013/05/the-flag-object/
*/
.flag {
  display: table;
  width: 100%;
}

.flag__image,
.flag__body {
  display: table-cell;
  vertical-align: middle;
}
.flag--top .flag__image, .flag--top
.flag__body {
  vertical-align: top;
}
.flag--bottom .flag__image, .flag--bottom
.flag__body {
  vertical-align: bottom;
}

.flag__image {
  padding-right: 24px;
}
.flag__image > img {
  display: block;
  max-width: none;
}
.flag--rev .flag__image {
  padding-right: 0;
  padding-left: 24px;
}

.flag__body {
  width: 100%;
}

/**
* Notification Styles
*/
.note {
  position: relative;
  overflow: hidden;
  color: white;
  background-color: #E91E63;
}

.note--secondary {
  background-color: #263238;
}

.note--success {
  background-color: #4CAF50;
}

.note--warning {
  background-color: #FFC107;
}

.note--error {
  background-color: #d50000;
}

.note--info {
  background-color: #03A9F4;
}

.note__icon,
.note__text {
  padding: 24px;
}

.note__icon {
  min-width: 80px;
  text-align: center;
  font-size: 32px;
  font-size: 2rem;
  background-color: rgba(0, 0, 0, 0.25);
}

.note__text {
  padding-right: 48px;
}

.note__close {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 29px;
  line-height: 30px;
  font-size: 24px;
  text-align: center;
  color: white;
  background-color: rgba(0, 0, 0, 0.25);
  opacity: 0;
  transition: all 0.25s;
}
.note__close:hover {
  background-color: rgba(0, 0, 0, 0.15);
}
.note:hover .note__close {
  opacity: 1;
}


button:focus,
input:focus,
textarea:focus,
select:focus {
  outline: none; 
}

</style>
<body style="position: relative;min-height: 100vh;">
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
        {{-- <i class="material-icons">person</i> --}}
        <img src="/images/@yield('img').png" alt="user" width="30" class="mr-1">
        <span class="navbar-brand mr-2">@yield('UserName')</span>
        <span style="height:30px;border-left:2px solid black;"></span>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                @yield('NavbarLinks')
            </ul>
        </div>

        <a class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="cursor: pointer;">
            <i class="material-icons align-top">logout</i>
            Se deconnecter
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>

    <footer class="card-footer" style="position:absolute;bottom:0;left:0;width:100%;text-align:center;">
        <small>
            <span class="font-weight-bold">Copyright &copy; <script>document.write(new Date().getFullYear());</script> :</span> 
            LearnToCode - الدارجة المغربية
        </small>
    </footer>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
        $(".note__close").click(function() {
          $(this).parent()
          .animate({ opacity: 0 }, 250, function() {
            $(this)
            .animate({ marginBottom: 0 }, 250)
            .children()
            .animate({ padding: 0 }, 250)
            .wrapInner("<div />")
            .children()
            .slideUp(250, function() {
              $(this).closest(".note").remove();
            });
          });
        });
        });
    </script>

</body>
</html>

