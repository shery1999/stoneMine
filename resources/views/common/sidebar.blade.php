        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-label">Dashboard</li>
                        <li>
                            <a class="has-arrow" href="/admin_panel" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/admin_panel">Home</a></li>
                            </ul>
                        </li>
                    @endif


                    <li class="nav-label">ADMIN CONTROLS</li>
                    @if (Auth::user()->role == 'admin')
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Add tables</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/add_user">Add Users</a></li>
                                <li><a href="/add_showroom">Add Showroom</a></li>
                                <li><a href="/add_store">Add Storage</a></li>
                                <li><a href="/add_workshop">Add Workshop</a></li>
                                <li><a href="/add_mine">Add Mine </a></li>

                            </ul>
                        </li>
                    @endif


                    <li class="nav-label">GRADING</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Grading</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/unprocessed_grading">Unprocessed Grading</a></li>
                            <li><a href="/processed_specimen">Processed Grading</a></li>
                        </ul>
                    </li>


                    <li class="nav-label">PROCESSING</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Send to Workshop</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/processing">Send to Workshop</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-label">UPDATE STORE LOCATION</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Update Store Location</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/to_store">Update Unprocessed Store Location</a></li>
                            <li><a href="/to_store_processed">Update Processed Store Location</a></li>
                        </ul>
                    </li>




                    @if (Auth::user()->role == 'admin')
                        <li class="nav-label">INVENTORY</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Store </span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/list_unprocessed">Unprocessed </a></li>
                                <li><a href="/list_processed">Processed </a></li>
                            </ul>
                        </li>

                        <li class="nav-label">LOT MANAGEMENT</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Lot </span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/create_lot">Create Lot</a></li>
                            </ul>
                        </li>

                        <li class="nav-label">SHOWROOM</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Showroom</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/view_showroom_detail">View Showroom</a></li>
                            </ul>
                        </li>

                        <li class="nav-label">SODL DATA</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">VIEW SOLD</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/orders">Sold Lot Data</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
