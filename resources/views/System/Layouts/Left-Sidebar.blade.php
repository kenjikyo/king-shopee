
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="{{ route('getDashboard') }}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Tools King Shopee</span> 
					<i class="zmdi zmdi-more"></i>
                    <li>
                        <a href="{{ route('getXShopee') }}"><div class="pull-left"><i class="fa fa-save mr-20"></i><span class="right-nav-text">XShopee</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>
                    <li>
                        <a href="{{ route('getMShopee') }}"><div class="pull-left"><i class="fa fa-cog mr-20"></i><span class="right-nav-text">MShopee</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>
                    <li>
                        <a href="{{ route('getKeyWord') }}"><div class="pull-left"><i class="fa fa-file-text mr-20"></i><span class="right-nav-text">KeyWords</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>
                    <li>
                        <a href="{{ route('getSpy') }}"><div class="pull-left"><i class="fa fa-search-plus mr-20"></i><span class="right-nav-text">Spy Shopee</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Support</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Guide</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="signup.html">Register</a>
                        </li>
                        <li>
                            <a href="forgot-password.html">Recover Password</a>
                        </li>
                        <li>
                            <a href="reset-password.html">reset Password</a>
                        </li>
					</ul>
                </li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Vip</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                <li>
                    <a href="documentation.html"><div class="pull-left"><i class="fa fa-history mr-20"></i><span class="right-nav-text">History</span></div><div class="clearfix"></div></a>
                </li>
                <li>
                    <a href="documentation.html"><div class="pull-left"><i class="fa fa-gitlab mr-20"></i><span class="right-nav-text">Update VIP</span></div><div class="clearfix"></div></a>
                </li>
                <hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>System</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                <li>
                    <a href="{{ route('getUser') }}"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Users</span></div><div class="clearfix"></div></a>
                </li>
                <li>
                    <a href="{{ route('getStatistic') }}"><div class="pull-left"><i class="fa fa-signal mr-20"></i><span class="right-nav-text">Statistic</span></div><div class="clearfix"></div></a>
                </li>
			</ul>
		</div>