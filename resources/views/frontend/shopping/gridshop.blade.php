@extends('welcome')
@section('title','login :: Nimainteriors.com')

@section('content')

<section class="bg-white">
    <div class="container container-product productlisting">
        <div class="coloumns row d-flex ">
            <div class="c1 filter col-lg-3 col-md-3">
                <div class="r1">
                    <div class="title">
                        <strong>
                            <span class="shop-by">Shop By:</span>
                        </strong>
                    </div>
                    <hr>
                    <div class="category">
                        <span class="title">Category</span>
                        <ul>
                            <li class="item-category-list">
                                <input type="checkbox" name="category" id="category-check">
                                <span class="item-category"> Stoel</span>
                                <span class="catagory-count">(12)</span>
                            </li>
                            <li class="item-category-list">
                                <input type="checkbox" name="category" id="category-check">
                                <span class="item-category"> Tafel</span>
                                <span class="catagory-count">(12)</span>
                            </li>
                            <li class="item-category-list">
                                <input type="checkbox" name="category" id="category-check">
                                <span class="item-category"> Kasten</span>
                                <span class="catagory-count">(12)</span>
                            </li>
                            {{-- <li class="item-category-list">
                                <input type="checkbox" name="category" id="category-check">
                                <span class="item-category"> Category 4</span>
                                <span class="catagory-count">(12)</span>
                            </li>
                            <li class="item-category-list">
                                <input type="checkbox" name="category" id="category-check">
                                <span class="item-category"> Category 5</span>
                                <span class="catagory-count">(12)</span>
                            </li> --}}
                        </ul>
                    </div>
                    
                    <!-- manufacturer -->
                    
                    <hr>
    
                    <!-- colours -->
                    <div class="color">
                        <span class="title">Color</span>
                        <ul>
                            <li class="color-list"><a href="#">
                                    <div class="red"></div>
                                    <span class="color-name">Red</span>
                                    <span class="count">(12)</span>
                                </a></li>
                                <li class="color-list"><a href="#">
                                    <div class="yellow"></div>
                                    <span class="color-name">yellow</span>
                                    <span class="count">(12)</span>
                                </a></li>
                                <li class="color-list"><a href="#">
                                    <div class="green"></div>
                                    <span class="color-name">green</span>
                                    <span class="count">(12)</span>
                                </a></li>
                                <li class="color-list"><a href="#">
                                    <div class="blue"></div>
                                    <span class="color-name">blue</span>
                                    <span class="count">(12)</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <br>
                <!-- ad loads here -->
                <div class="r2 ad">
                    <img src="assets/images/photos/welcome/4.jpg" alt="no ad">
                </div>
                <br>
                <!-- items get recomended -->
                <div class="recomend">
                    <div class="recomended">
                        <span class="title">Recommended </span>
                    </div>
                    <hr>
                    <!-- 1 -->
                    <div class="recomend-card">
                        <div class="recomend-img">
                            <img src="https://shorturl.at/7EwWp" alt="1">
                        </div>
                        <div class="recomend-data">
                            <ul>
                                <li class="recomend-data-list"><a href="#" class="recomend-data-link">
                                    <span class="recomend-data-text">ProductName</span></a><br>
                                    <span class="recomend-data-Price">$100</span>
                                </li>
                                <!-- <li class="recomend-data-list"></li> -->
                                <li class="recomend-data-list"><a href="#" class="recomend-data-link"><i class="fa-solid fa-cart-shopping"></i> <span class="recomend-data-text">Add to cart</span></a></li>
                            </ul>
                        </div>
                    </div>
    
    
                </div>
            </div>
    
            <!-- second coloumn -->
    
            <div class="c2 product col-lg-9 col-md-9.">
                <div class="hero r2">
                    <!-- Hero -->
                    <!-- please change this img link this one is from a stock image website -->
                    <img src="{{ asset('frontend/assets/images/photos/project/project_cover1.jpeg') }}"
                        alt="">
                </div>
               
                <hr>
                <!-- number 123 to be changed from backend -->
                <!-- page counter 1 -->
               
                <!-- actual cards for items are to be fetch here -->
    
                <div class="layout r5">
                    <!-- cards -->
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <a href="/shop/product-detail"><img src="{{ asset('frontend/assets/images/shop/products/1.jpg') }}" alt="Modular Modern Chair"></a>
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/8.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/7.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/6.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/5.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/4.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/3.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>
                    <div class="card-item product-item  col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                        <div class="image-container img-b">
                            <img src="{{ asset('frontend/assets/images/shop/products/2.jpg') }}" alt="Modular Modern Chair">
                            <div class="action-bot">
                                <div class="overlay">
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>
                    
                                 <div class="image-container">
                                    <div class="icons">
                                        <a title="Add to Wishlist" class="icon"><i class="fa fa-heart"></i></a>
                                        <a  title="Add to compare" class="icon"><i class="fa fa-random"></i></a>
                                        <a title="Quick view"  class="icon"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                        <div class="details">
                            <h2 class="product-name">Modular Modern</h2>
                            <p class="price">$540.00 <span class="original-price">$600.00</span></p>
                            
                        </div>
                    </div>

                    
    
                </div>
    
                <!-- page counter 2 -->
                <hr>
                <div class="page">
                    <div class="c1">123 item(s)</div>
                    <ul class="c2">
                        <li class="topic">Pages: </li>
                        <li class="page-list"><a href="#" class="page-num">1</a></li>
                        <li class="page-list"><a href="#" class="page-num">2</a></li>
                        <li class="page-list"><a href="#" class="page-num">3</a></li>
                        <li class="page-list"><a href="#" class="page-num">></a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
   
</section>
@endsection
<!-- /container -->

<!-- COMMON SCRIPTS -->
<script src="js/common_scripts.js"></script>
<script src="js/common_func.js"></script>


    <!-- slider script -->

    <script>
        function updateSlider() {
            let minPrice = document.getElementById('minPrice');
            let maxPrice = document.getElementById('maxPrice');
            let minValue = parseInt(minPrice.value);
            let maxValue = parseInt(maxPrice.value);

            if (minValue > maxValue - 10) {
                if (event.target.id === "minPrice") {
                    minPrice.value = maxValue - 10;
                    minValue = maxValue - 10;
                } else {
                    maxPrice.value = minValue + 10;
                    maxValue = minValue + 10;
                }
            }

            document.getElementById('minValue').textContent = minValue;
            document.getElementById('maxValue').textContent = maxValue;
        }

        updateSlider();
    </script>