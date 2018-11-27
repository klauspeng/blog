@inject('menus', 'App\Services\MenuService')
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            @foreach ($menus->getMenuTree() as $menu)
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>{{$menu->name}}</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    @foreach ($menu->child as $child)
                    <li>
                        <a _href="{{$child->url}}">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>{{$child->name}}</cite>
                        </a>
                    </li >
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->