@extends('layout.base')

@section('content')
    <!-- Product Section Begin -->
    <section class="product spad" style="padding-top: 0px;">
        <div class="container">
            <div class="filter__item">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="filter__sort">
                            <span>Sort By</span>
                            <select>
                                <option value="0">Default</option>
                                <option value="0">Default</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="filter__found">
                            <h6"><span>{{ $products->count() }}</span> Products found</h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <div class="filter__option">
                            <span class="icon_grid-2x2"></span>
                            <span class="icon_ul"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 30px">
                <div class="col-lg-9">
                    <img src="{{ asset('img/books.jpg') }}" alt="" width="100%" height="100%"
                        style="border-radius: 15px;">
                </div>
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Category</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a class="{{ request()->getQueryString() == 'category=' . $category->slug ? 'text-primary' : '' }}"
                                            href="/products?category={{ $category['slug'] }}">{{ $category['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="hero__item set-bg col-lg-9" data-setbg="img/books.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2 style="color: white;">Vegetable <br />100% Organic</h2>
                        <p style="color: white;">Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div> --}}
            </div>
            <div id="product-details" class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <a href="/book/{{ $product->slug }}">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg"
                                    style="border-radius: 8px;">
                                </div>
                            </a>
                            <div class="product__item__text">
                                <h6><a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
                                </h6>
                                <h5>{{ $product->formatted_amount() }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
