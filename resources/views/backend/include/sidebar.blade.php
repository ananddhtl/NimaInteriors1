<div class="main-menu">
   
    {{-- <div class="logo-box">
       
        <a href="index.html" class="logo-light">
            <img src="assets/images/logo-light.png" alt="logo" class="logo-lg" height="28">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>

       >
        <a href="index.html" class="logo-dark">
            <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>
    </div> --}}

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">NIma Interiors</li>

            <li class="menu-item">
                <a href="/admin/dashboard" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Dashboard</span>
                    
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.addbrand') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text">Company Profile</span>

                </a>
            </li>

            {{-- <li class="menu-title">Pages</li> --}}

           
            <li class="menu-item">
                <a href="#menuExpages7" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text"> Product Management</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuExpages7">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{ route('admin.items') }}" class="menu-link">
                                <span class="menu-text">Items </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.itemgroup') }}" class="menu-link">
                                <span class="menu-text">Category</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.itemsubgroup') }}" class="menu-link">
                                <span class="menu-text">Sub Category</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.addonitemcategory') }}" class="menu-link">
                                <span class="menu-text">Addon Category</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.addonitem') }}" class="menu-link">
                                <span class="menu-text">Addon Item</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li> 
            <li class="menu-item">
                <a href="#menuExpages5" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text"> Stock Management</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuExpages5">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{ route('admin.stockin') }}" class="menu-link">
                                <span class="menu-text">Stock In </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.stockout') }}" class="menu-link">
                                <span class="menu-text">Stock Out</span>
                            </a>
                        </li>
                        
                       
                    </ul>
                </div>
            </li> 

            <li class="menu-item">
                <a href="#menuExpages6" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text"> Report</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuExpages6">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{ route('admin.todaytotalstock') }}" class="menu-link">
                                <span class="menu-text">Today</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.instock') }}" class="menu-link">
                                <span class="menu-text">In </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('admin.outstock')}}" class="menu-link">
                                <span class="menu-text">Out </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.stockout') }}" class="menu-link">
                                <span class="menu-text">Item Wise </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.groupwise') }}" class="menu-link">
                                <span class="menu-text">Group Wise </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.stockout') }}" class="menu-link">
                                <span class="menu-text">Sub Group Wise </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.stockout') }}" class="menu-link">
                                <span class="menu-text">Brand Wise </span>
                            </a>
                        </li>
                        
                        
                        
                       
                    </ul>
                </div>
            </li> 
            <li class="menu-item">
                <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text"> Projects</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuExpages">
                   
                       
                       
                            <a href="{{ route('admin.listproject') }}" class="menu-link">
                                <span class="menu-text">List</span>
                            </a>
                      
                </div>
                <div class="collapse" id="menuExpages">
                  
                            <a href="{{ route('admin.listprojectimages') }}" class="menu-link">
                                <span class="menu-text">Project Images </span>
                            </a>
                   
                </div>
            </li> 

           

            <li class="menu-item">
                <a href="{{ route('admin.listblog') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text"> Blog</span>
                   
                </a>
                {{-- <div class="collapse" id="menuExpages1">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{route('admin.addblog')}}" class="menu-link">
                                <span class="menu-text">Add </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('admin.listblog')}}" class="menu-link">
                                <span class="menu-text">List</span>
                            </a>
                        </li>
                       
                    </ul>
                </div> --}}
            </li> 
            <li class="menu-item">
                <a href="{{ route('admin.listtermandcondition') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Term and Condition</span>

                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.listprivacydeclaration') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text">Privacy Declaration</span>
                    
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.listnormausers') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Normal Users</span>

                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.contactusdata') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-calendar"></i></span>
                    <span class="menu-text"> Contact Us </span>
                </a>
            </li>
            
        </ul>
    </div>
</div>