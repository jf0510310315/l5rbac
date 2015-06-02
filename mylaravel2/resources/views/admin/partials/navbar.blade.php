<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="/" target="_blank">FDD Admin Dashboard</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
	@if (Auth::guest())
		<li><a href="{{ url('/auth/login') }}">Login</a></li>
		<li><a href="{{ url('/auth/register') }}">Register</a></li>
	@else
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
			<ul class="dropdown-menu dropdown-user">
				<li><a href="/admin/settings/index"><i class="fa fa-gear fa-fw"></i> Settings</a>
				</li>
				<li class="divider"></li>
				<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
			</ul>
		</li>
	@endif
</ul>
<!-- /.navbar-top-links -->
