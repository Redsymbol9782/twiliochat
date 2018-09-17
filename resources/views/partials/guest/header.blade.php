<header class="main-header">
    <a href="{{ route('guest.home') }}" class="logo">
        <span class="logo-mini">Twilio IVR</span>
        <span class="logo-lg">Twilio IVR</span>
    </a>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="">
            <!--<ul class="nav navbar-nav navbar-right" style="margin-right:0px;">
                <li><a href="{{ url('/login') }}">Login</a></li>
            </ul>-->
			<ul class="nav navbar-nav navbar-right" style="margin-right:0px;">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('sms') }}">Send Message</a></li>

							<li><a href="{{ url('voice') }}">Voice Call</a></li>
							<li><a href="{{ url('ivr') }}">IVR</a></li>
							<li><a href="{{ url('change_password') }}">Change Password</a></li>

							<li>
								<a href="{{ url('logout') }}"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endif
			</ul>
        </div>
    </nav>
</header>