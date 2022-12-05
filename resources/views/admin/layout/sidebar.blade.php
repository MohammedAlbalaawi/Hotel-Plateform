<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin_home')}}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin_home')}}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active"><a class="nav-link" href="{{route('admin_home')}}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>


            <li class=""><a class="nav-link" href="{{ route('pages.index') }}"><i class="fa fa-hand-o-right"></i> <span>Static Pages</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('adminSlider.index') }}"><i class="fa fa-hand-o-right"></i> <span>ٍSlides</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('adminFeature.view') }}"><i class="fa fa-hand-o-right"></i> <span>Features</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('testimonials.index') }}"><i class="fa fa-hand-o-right"></i> <span>Testimonials</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('posts.index') }}"><i class="fa fa-hand-o-right"></i> <span>Posts</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('photos.index') }}"><i class="fa fa-hand-o-right"></i> <span>Photo Gallery</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('videos.index') }}"><i class="fa fa-hand-o-right"></i> <span>Video Gallery</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('faqs.index') }}"><i class="fa fa-hand-o-right"></i> <span>Faqs</span></a></li>

        </ul>
    </aside>
</div>
