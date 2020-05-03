@foreach($childs as $child)
 <li class="dropdown-item{{ count($child->childs) ? ' dropdown' :'' }} test"><a class="dropdown-item{{ count($child->childs) ? ' dropdown-toggle' :'' }}" >{{ $child->title }}</a>
       @if(count($child->childs))
          <ul class="dropdown-menu" aria-labelledby="dropdown1">
                <li>
                    @include('menu.menusub',['childs' => $child->childs])
                </a>
                </li>
            </ul>
        @endif
   </li>
 @endforeach