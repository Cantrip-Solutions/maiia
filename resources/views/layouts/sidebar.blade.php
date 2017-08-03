<aside id="menu">
    <div id="navigation">

        <div class="profile-picture">
            @if(!empty(Auth::user()->image))
                {!! HTML::image(config('global.uploadPath').Auth::user()->image, array('class'=>'img-circle m-b', 'width'=>'70', 'height'=>'70')) !!}
            @else
                {!!HTML::image(config('global.uploadPath').'profile.jpg', 'alt', array('class'=>'img-circle m-b', 'width'=>'70', 'height'=>'70'))!!}
            @endif
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Hello {{Auth::user()->name}}!</span>
            </div>
        </div>

        <?php
            if (Auth::user()->u_role == 'A') {
                $parent_match = ['parent_id' => '0', 'admin_access' => 'YES'];
            } elseif (Auth::user()->u_role == 'S') {
                $parent_match = ['parent_id' => '0', 'vendor_access' => 'YES'];
            } elseif (Auth::user()->u_role == 'C') {
                $parent_match = ['parent_id' => '0', 'buyer_access' => 'YES'];
            }
                $parents = DB::table('menus')->where($parent_match)->get();
               // print_r($parents);die;
        ?>
        <ul class="nav" id="side-menu">
            @foreach($parents as $parent)
                @if($parent->menu_id == $live['parent'])
                    <li class="active"><a href="#"><span class="nav-label">
                    {{$parent->menu_name}}
                @else
                    <li><a href="#"><span class="nav-label">
                    {{$parent->menu_name}}
                @endif
                    <?php
                        if (Auth::user()->u_role == 'A') {
                            $menu_match = ['parent_id' => $parent->menu_id, 'admin_access' => 'YES'];
                        } elseif (Auth::user()->u_role == 'S') {
                            $menu_match = ['parent_id' => $parent->menu_id, 'superuser_access' => 'YES'];
                        } elseif (Auth::user()->u_role == 'C') {
                            $menu_match = ['parent_id' => $parent->menu_id, 'user_access' => 'YES'];
                        } else {
                            $menu_match = ['parent_id' => ''];
                        }
                        
                        $menu = DB::table('menus')->where($menu_match)->get();
                    ?>
                </span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                @foreach($menu as $menu)
                    @if($menu->menu_id == $live['menu'])
                        <li class="active">{!!HTML::link($menu->menu_page, $menu->menu_name)!!}</li>
                    @else
                        <li>{!!HTML::link($menu->menu_page, $menu->menu_name)!!}</li>
                    @endif
                @endforeach
                </ul></li>
            @endforeach

        </ul>
    </div>
</aside>
