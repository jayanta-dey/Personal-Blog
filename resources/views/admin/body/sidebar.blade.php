
@php

$id = Auth::id();
$admindata = App\Models\User::find($id);


@endphp


<div data-simplebar class="h-100">

<!-- User details -->
<div class="user-profile text-center mt-3">
    <div class="">
    <img class="rounded avatar-lg" 
    src="{{(!empty($admindata->profile_image))? url('upload/admin_images/'.$admindata->profile_image): url('upload/no_image.jpg')}}" alt="Card image cap">
   
    </div>
    <div class="mt-3">
        <h4 class="font-size-16 mb-1">{{$admindata->name}}({{$admindata->username}})</h4>
        <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
    </div>
</div>

<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="index.html" class="waves-effect">
                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="calendar.html" class=" waves-effect">
                <i class="ri-calendar-2-line"></i>
                <span>Calendar</span>
            </a>
        </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Home Slider Setup</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('home.slide')}}">Home Slide</a></li>
        </ul>
    </li>

    
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>About Page Setup</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('about.page')}}">About Page</a></li>
        </ul>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('about.multi.image')}}">Add Multi Images</a></li>
        </ul>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('all.multi.images')}}">All Multi Images</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Portfolio Page Setup</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('all.portfolio')}}"> All Portfolio</a></li>
        </ul>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{route('add.portfolio')}}">Add Portfolio</a></li>
        </ul>
    </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-layout-3-line"></i>
                <span>Layouts</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li>
                    <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                        <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                        <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                        <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                        <li><a href="layouts-preloader.html">Preloader</a></li>
                        <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="layouts-horizontal.html">Horizontal</a></li>
                        <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                        <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                        <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                        <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="menu-title">Pages</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-account-circle-line"></i>
                <span>Blog Category</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('all.blog.category')}}">All Blog Category</a></li>
                <li><a href="{{route('add.blog.category')}}">Add Blog Category </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-profile-line"></i>
                <span>Utility</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="pages-starter.html">Starter Page</a></li>
                <li><a href="pages-timeline.html">Timeline</a></li>
                <li><a href="pages-directory.html">Directory</a></li>
                <li><a href="pages-invoice.html">Invoice</a></li>
                <li><a href="pages-404.html">Error 404</a></li>
                <li><a href="pages-500.html">Error 500</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- Sidebar -->
</div>