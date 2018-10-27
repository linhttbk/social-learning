<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admin/img/avatar-1.jpg')}}" alt="..."
                                 class="img-fluid rounded-circle"></div>
        
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin')}}">Home </a></li>
        <li><a href="{{route('courses')}}">Courses</a></li>
        <li><a href="{{route('members')}}"> User Management </a></li>
        <li><a href="{{route('group-user')}}"> Group Management </a></li>
        <li><a href="{{route('document_management')}}"> Document Management </a></li>
        <li><a href="{{route('forms')}}"> <i class="icon-padnote"></i>Forms </a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-interface-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li><a href="#"> <i class="icon-flask"></i>Demo </a></li>
        <li><a href="#"> <i class="icon-screen"></i>Demo </a></li>
        <li><a href="#"> <i class="icon-mail"></i>Demo </a></li>
        <li><a href="#"> <i class="icon-picture"></i>Demo </a></li>
    </ul>
</nav>
