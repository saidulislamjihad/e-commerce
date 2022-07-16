<ul class="metismenu" id="menu">
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-message-square-edit'></i></div>
            <div class="menu-title">Category</div>
        </a>
        <ul>
            <li> <a href="{{ route('categories.index')}}"><i class="bx bx-right-arrow-alt"></i>Lists</a></li>
            <li> <a href="{{ route('categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Add new</a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-message-square-edit'></i></div>
            <div class="menu-title">Subcategory</div>
        </a>
        <ul>
            <li> <a href="{{ route('subcategories.index')}}"><i class="bx bx-right-arrow-alt"></i>Lists</a></li>
            <li> <a href="{{ route('subcategories.create')}}"><i class="bx bx-right-arrow-alt"></i>Add new</a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-message-square-edit'></i></div>
            <div class="menu-title">Brands</div>
        </a>
        <ul>
            <li> <a href="{{ route('brands.index') }}"><i class="bx bx-right-arrow-alt"></i>Lists</a></li>
            <li> <a href="{{ route('brands.create') }}"><i class="bx bx-right-arrow-alt"></i>Add new</a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i></div>
            <div class="menu-title">Product</div>
        </a>
        <ul>
            <li> <a href="{{ route('products.index') }}"><i class="bx bx-right-arrow-alt"></i>Lists</a></li>
            <li> <a href="{{ route('admin.products.create') }}"><i class="bx bx-right-arrow-alt"></i>Add new</a></li>
            <li> <a href="{{ url('/stocks') }}"><i class="bx bx-right-arrow-alt"></i>Stock</a></li>
            <li> <a href="{{ url('/orders') }}"><i class="bx bx-right-arrow-alt"></i>Order(s)</a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-group'></i></div>
            <div class="menu-title">Customers</div>
        </a>
        <ul>
            <li> <a href="{{ url('/supplier/list') }}"><i class="bx bx-right-arrow-alt"></i>Suppliers</a></li>
            <li> <a href="{{ url('/customer/list') }}"><i class="bx bx-right-arrow-alt"></i>Users</a></li>
        </ul>
    </li>
    <li>
        <a class="" href="{{ url('/order/report') }}">
            <div class="parent-icon"><i class='bx bx-group'></i></div>
            <div class="menu-title">Order report</div>
        </a>
    </li>
    <li>
        <a class="" href="{{ url('/contacts') }}">
            <div class="parent-icon"><i class='bx bx-group'></i></div>
            <div class="menu-title">Contacts</div>
        </a>
    </li>
    {{-- <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-message-detail'></i></div>
            <div class="menu-title">Attributes</div>
        </a>
        <ul>
            <li> <a href="{{ url('/colors') }}"><i class="bx bx-right-arrow-alt"></i>Colors</a></li>
            <li> <a href="{{ url('/sizes') }}"><i class="bx bx-right-arrow-alt"></i>Sizes</a></li>
        </ul>
    </li> --}}
    {{-- <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-dollar-circle'></i></div>
            <div class="menu-title">Payments</div>
        </a>
        <ul>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Suppliers</a></li>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Users</a></li>
        </ul>
    </li> --}}
    <hr/>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bxs-cog'></i></div>
            <div class="menu-title">Settings</div>
        </a>
        <ul>
            <li> <a href="{{ url('/slider/list') }}"><i class="bx bx-right-arrow-alt"></i>Setting</a></li>
            <li> <a href="{{ url('/blog/list') }}"><i class="bx bx-right-arrow-alt"></i>Blog</a></li>
        </ul>
    </li>
</ul>
