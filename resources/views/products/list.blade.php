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
                            <h6><span>{{ $products->count() }}</span> Products found</h6>
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
                <div class="col-lg-9">
                    <img src="{{ asset('img/books.jpg') }}" alt="" width="100%" height="100%">
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/product/{{ $product->slug }}">{{ $product->name }}</a></h6>
                                <h5>{{ $product->formatted_amount() }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="product__pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
