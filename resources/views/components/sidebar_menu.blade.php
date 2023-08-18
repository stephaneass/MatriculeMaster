@props(['title', 'route', 'icon'])
<li class="nav-item">
    <a class="nav-link menu-link" href="{{$route}}">
        <i class="{{$icon}}"></i> <span data-key="t-widgets">{{$title}}</span>
    </a>
</li>