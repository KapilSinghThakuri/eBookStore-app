    <div>
        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
            data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
            <h6 class="m-0">Categories</h6>
            <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
            id="navbar-vertical">
            <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">Religion & Spirituality <i
                            class="fa fa-angle-down float-right mt-1"></i></a>
                    @if ($categories)
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach ($categories as $category)
                                <a href="#Religion-Spirituality" class="dropdown-item">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">Business Essentials<i
                            class="fa fa-angle-down float-right mt-1"></i></a>
                    @if ($businessEssential)
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach ($businessEssential as $businessCategory)
                                <a href="#business-investing" class="dropdown-item">{{ $businessCategory->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                @if ($remainCategories)
                    @foreach ($remainCategories as $remainCategory)
                        <a href="" class="nav-item nav-link">{{ $remainCategory->name }}</a>
                    @endforeach
                @endif --}}
            </div>
        </nav>
    </div>
