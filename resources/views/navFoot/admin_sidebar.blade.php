

<div id="sidebar" class="sidebar">
	<input type="hidden" id="hdnMenu" value="" data-currurl="" />
	<div data-scrollbar="true" data-height="100%">
		<ul class="nav" id="menuBar">

			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>

			<li class="nav-header">Menu</li>

            <li class="">
				<a href="/">
					<i class="fas fa-home"></i>
					<span>Home</span>
				</a>
			</li>

			<li class="">
				<a href="/admin/ManagementRegistration#">
					<i class="fas fa-user-circle"></i>
					<span>ManagementRegistration</span>
				</a>
			</li>

            <li class='has-sub " + mainActive + "'>
                <a href="#">
                    <b class='caret'></b>
                    <i class="fas fa-cogs"></i>
                    <span>Master Maintenance</span>
                </a>
                <ul class='sub-menu'>
                    <li>
                        <a href="/admin/MasterMaintenance/JobInformation">Job Information</a>
                    </li>
                    <li>
                        <a href="/admin/MasterMaintenance/UserInformation">User Information</a>
                    </li>
                </ul>
            </li>
			
		</ul>
	</div>
</div>
<div class="sidebar-bg"></div>