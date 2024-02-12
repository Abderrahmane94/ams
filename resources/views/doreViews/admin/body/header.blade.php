<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1"/>
                <rect x="0.48" y="7.5" width="7" height="1"/>
                <rect x="0.48" y="15.5" width="7" height="1"/>
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1"/>
                <rect x="1.56" y="7.5" width="16" height="1"/>
                <rect x="1.56" y="15.5" width="16" height="1"/>
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1"/>
                <rect x="0.5" y="7.5" width="25" height="1"/>
                <rect x="0.5" y="15.5" width="25" height="1"/>
            </svg>
        </a>
    </div>

    <a class="navbar-logo" href="{{ route('dashboard') }}">
        <span class="logo d-none d-xs-block"></span>
        <span class="logo-mobile d-block d-xs-none"></span>
    </a>

    <div class="navbar-right">

        <div class="header-icons d-inline-block">
            @if(!$user->login_status)
                <form action="{{ route('user.signin') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="simple-icon-login"></i> دخول</button>
                </form>
            @else
                <form action="{{ route('user.signout') }}" method="POST">
                    @csrf
                    <span type="button" class="btn btn-outline-primary default mr-2" id="chronometer">00:00:00</span>
                    <button type="submit" class="btn btn-warning"><i class="simple-icon-logout"></i> خروج</button>
            @endif
        </div>


        {{--Dark Mode--}}
        <div class="header-icons d-inline-block align-middle">
            <div class="d-none d-md-inline-block align-text-bottom mr-3">
                <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                     data-toggle="tooltip" data-placement="left" title="Dark Mode">
                    <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                    <label class="custom-switch-btn" for="switchDark"></label>
                </div>
            </div>

            <!--fullScreen-->
            <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button"
                    id="fullScreenButton">
                <i class="simple-icon-size-fullscreen"></i>
                <i class="simple-icon-size-actual"></i>
            </button>

        </div>
        <!--Compte-->
        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="name">{{Auth::user()->name }}</span>
                <span>
                        <img alt="Profile Picture"
                             src="{{ (!empty(Auth::user()->profile_photo_path))? Auth::user()->profile_photo_path:asset('img/profiles/no image.png') }} "/>
                    </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{ route('profile.view') }}">{{__('حسابي')}}</a>
                <a class="dropdown-item" href="{{ route('password.view') }}">{{__('تغيير كلمة المرور')}}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    {{ __('خروج') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>


<script>
    // Fonction pour mettre à jour le chronomètre
    function updateChronometer() {
        var startDate = new Date("{{ Auth::user()->last_login_at }}");
        var now = new Date();
        var elapsedTime = now - startDate;
        var hours = Math.floor(elapsedTime / (1000 * 60 * 60));
        var minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);
        document.getElementById("chronometer").innerText = hours.toString().padStart(2, '0') + ":" + minutes.toString().padStart(2, '0') + ":" + seconds.toString().padStart(2, '0');
    }

    // Mettre à jour le chronomètre toutes les secondes
    setInterval(updateChronometer, 1000);

    // Appeler la fonction une fois pour afficher le chronomètre immédiatement
    updateChronometer();
</script>
