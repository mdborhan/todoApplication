<div id="sidebar-main" class="sidebar sidebar-default">
    <div class="sidebar-content">
        <ul class="navigation">
            <li>
                {{--                        {{ route('admin.dashboard') }}--}}
                <a href="{{route('dash')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li>
                <a href="javascript:void(0);"><i class="fa fa-th"></i><span>Create Section</span></a>
                <ul @if(request()->path()== 'create/category') style="display: block;"
                    @elseif(request()->path()== 'create/products') style="display: block;"
                    @elseif(request()->path()== 'create/customer') style="display: block;"
                    @elseif(request()->path()== 'create/proposal/page') style="display: block;"

                    @endif>
                    <li>
                        <a class="@if(request()->path()=='create/category') btn-success @endif" href="{{route('create.category')}}">Create Category</a>
                    </li>
                    <li>
                        <a class="@if(request()->path()=='create/products') btn-success @endif" href="{{route('create.products')}}">Create Products</a>
                    </li>
                    <li>
                        <a class="@if(request()->path()=='create/customer') btn-success @endif" href="{{route('create.customer')}}">Create Customer</a>
                    </li>
                    <li>
                        <a class="@if(request()->path()=='create/proposal/page') btn-success @endif" href="{{route('create.proposal')}}">Create Proposal</a>
                    </li>

                </ul>

            </li>

        </ul>
    </div>
</div>
