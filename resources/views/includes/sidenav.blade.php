<div class="side-navigation fixed">
    <div class="nav-header">
        <a href="">
            <img src="{{ asset('img/logo-icon.png') }}" alt="">
            <span class="title">Gearup Nepal</span>
        </a>
    </div>
    <ul class="side-nav-list">

            <li>
                <a href="{{ route('category.index') }}">
                    <span> <i class="fas fa-helmet text-secondary"></i> </span>
                    <strong>Category</strong>
                </a>
            </li>
            <li>
                <a href="{{ route('subcategory.index') }}">
                    <span> <i class="fas fa-helmet text-secondary"></i> </span>
                    <strong>Sub category</strong>
                </a>
            </li>
            <li>
                <a href="{{ route('item.index') }}">
                    <span> <i class="fas fa-helmet text-secondary"></i> </span>
                    <strong>Item</strong>
                </a>
            </li>
            <li>
                <a href="{{ route('purchase.index') }}">
                    <span> <i class="fas fa-helmet text-secondary"></i> </span>
                    <strong> Inventory</strong>
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.index') }}">
                    <span> <i class="fas fa-helmet text-secondary"></i> </span>
                    <strong>Vendor</strong>
                </a>
            </li>
    </ul>
</div>