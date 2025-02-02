@extends('welcome')
@section('title', 'change password :: Nimainteriors.com')

@section('content')

<style>
    .r1 {
    padding: 15px;
    border: groove 2px;
    position: sticky;
    top: 120px;
}

/* for every component with this name */
.productlisting>li {
    list-style-type: none;
}

.productlisting {
    margin-top: 40px;
}

S {
    color: #949698;
}

/* breadcrumbs */
.breadcrumbs .ul {
    list-style-type: none;
    float: right;
}

/* coloumns */
.listing-flex {
    display: flex;
    width: 100%;
    margin: auto;
    gap: 15px;
}

.productlisting .c1 {
    width: 25%;

}


.pagination-pages {
    display: flex;
}

.pag-box {
    width: 50%;
}

.total-items {
    width: 50%;
    display: flex;
    justify-content: right;
    align-items: center;
}

.sort-by {
    display: flex;
    gap: 20px;
    justify-content: right;
    width: 50%;
}

.categories-lists li {
    margin-top: 10px;
}


.categories-lists a {
    color: grey;
}

.categories-lists a:hover {
    color: black !important;
    font-weight: bold;
}

.categories-lists a.product-active {
    color: black !important;
    font-weight: bold;
}

.categories-lists li i {
    font-size: 13px;
    margin-right: 8px;
}



.sort-by select {
    padding: 10px;
    cursor: pointer;
}


.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination a.active {
    background-color: black;
    color: white;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
}

.c2 {
    padding-top: 0px !important;
    width: 75%;

}

/* banner image css */
.hero {
    width: 817px;
    height: 200px;
}

.hero>img {
    width: 100%;
    height: 100%;
}

/* toolbar */
.productlisting .toolbar {
    margin-top: 20px;
    display: flex;
}

.page .c2,
.toolbar .c2 {
    display: flex;
    width: 50%;
}


/* slider */
.slider-container {
    position: relative;
    width: 220px;
    height: 70px;
    /* Increased height for better spacing */
}

.range-slider {
    position: absolute;
    pointer-events: none;
    width: 100%;
    height: 8px;
    background: #ddd;
    border-radius: 5px;
    margin: 20px 0;
    /* Added margin for spacing */
}

.range-slider input {
    pointer-events: auto;
    position: absolute;
    width: 100%;
    height: 8px;
    background: none;
    -webkit-appearance: none;
    pointer-events: none;
}

.range-slider input::-webkit-slider-thumb {
    pointer-events: auto;
    -webkit-appearance: none;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    background: #938064;
    cursor: pointer;
}

.range-slider input::-moz-range-thumb {
    pointer-events: auto;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    background: #007bff;
    cursor: pointer;
}

.range-values {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    /* Added margin for spacing */
}



/* dropdowns */
.productlisting .c2 #dropdown {
    border: groove 2px;
    margin-left: 5px;
}

.productlisting .c2 .drop-text {
    font-size: medium;
    margin-top: 8px;
    margin-left: 5px;
    font-weight: 700;
}

.productlisting .c2 .drop-text:nth-child(1) {
    margin-left: 350px;
}

/* page */
.page {
    display: flex;
    margin: 10px 0 0 0;
}

.productlisting .page .c2 {
    margin-left: 270px;
}

.productlisting .page .c2 .page-list {
    list-style-type: none;
    margin-left: 6px;
}

.productlisting .page .c2 .page-list .page-num {
    color: black;
}

/* gets access to first child of the tag and then adds margin */
.page .c2 li:first-child {
    margin-left: 270px;
}


/* side navigation */
.productlisting strong {
    font-weight: bolder;
    font-size: 25px;
}

.title {
    text-transform: uppercase;
    font-weight: 700;
    font-size: 16px;

}


/* category */

.productlisting .category .item-category-list:hover {
    color: #938064;
    transition: color 0.1s;
    cursor: pointer;
}

.productlisting .category .item-category-list {
    padding: 5px;
}

.productlisting .category .item-category-list #category-check {
    position: relative;
    left: -2px;
    font-size: 12px;

}

.productlisting .category .item-category-list .catagory-count {
    float: right;
    font-size: 12px;
}

/* price */
.productlisting .price {
    padding-bottom: 10px;
}

.productlisting .price .amount {
    width: 75px;
    padding: 5px 13px 5px 13px;
    margin-left: 4px;
    border: groove 2px;
}

.productlisting .price .price-filter-btn {
    background-color: white;
    color: black;
    border: groove 2px;
    padding: 3px;
    font-size: 16px;
    width: 60px;
    margin-left: 7px;
}

.productlisting .price .price-filter-btn:hover {
    background-color: black;
    transition: color 0.5s;
    transition: background-color 0.5s;
    color: white;
}

/* manufacture */
.productlisting .manufacture ul {
    padding-left: 10px;
}

.productlisting .manufacture .manufacturer-list {
    padding: 5px;
}

.productlisting .manufacture .manufacturer-list:hover {
    color: #938064;
    transition: color 0.1s;
    cursor: pointer;
}

.productlisting .manufacture .manufacturer-list #Manufacturer {
    position: relative;
    left: -2px;
    font-size: 12px;
}

.productlisting .manufacture .manufacturer-list .manufacturer-list-count {
    float: right;
    font-size: 12px;
}

.color>ul>li>a {
    color: #949698;
}

/* advertisement */
.ad {
    height: 180px;
}

.ad>img {
    object-fit: cover;
    height: 100%;
    width: 100%;

}

/* recomend */
.productlisting .recomended {
    display: flex;
}

.productlisting .recomended>span {
    padding-top: 10px;
    padding-right: 10px;
}

.productlisting .recomend {
    border: groove 2px;
    padding: 10px;
}

.productlisting .recomend .recomended .title {
    font-weight: 900;
    font-size: 23px;
}

.productlisting .recomend-card {
    display: flex;
    margin-top: 10px;
    gap: 5px;
}

.productlisting .recomend-img {
    width: 100px;
    height: 80px;
}

.productlisting .recomend-img>img {
    border: groove 2px;
    width: 80%;
    height: 100%;
    object-fit: cover;
}

.productlisting .recomend .recomend-card .recomend-data .recomend-data-list .recomend-data-Price {
    font-size: 20px;
    font-weight: 700;
}

.productlisting .recomend .recomend-card .recomend-data .recomend-data-list .recomend-data-text {
    font-size: 17px;
    color: black;
}

.productlisting .recomend .recomend-card .recomend-data .recomend-data-list .recomend-data-link {
    color: black;
}

/* containers for the colours */
.red,
.green,
.yellow,
.blue {
    background-color: aqua;
    width: 15px;
    border: groove 1px;
    height: 15px;
}

/* color for colour selection */
.productlisting .color-list {
    position: relative;
    padding: 10px;

}

.productlisting .color-list .red,
.productlisting .color-list .blue,
.productlisting .color-list .green,
.productlisting .color-list .yellow {
    position: absolute;
    top: 16px;
    left: -6px;
}

.productlisting .color-list .count {
    float: right;
}

.productlisting .color-list .color-name {
    padding: 10px;
}

.productlisting .color-list .color-name:hover {
    color: #938064;
    transition: color 0.1s;
    cursor: pointer;
}

.red {
    background-color: red;
}

.green {
    background-color: rgb(105, 213, 105);
}

.blue {
    background-color: rgb(117, 117, 226);
}

.yellow {
    background-color: yellow;
}

/* MAIN CARD LAYOUT */
.productlisting .layout {
    display: flex;
    width: 100%;
    flex-wrap: wrap;
    gap: 8px;
    margin-left: -5px;
}

.card {
    background: #fff;
    border-radius: 0px;
    overflow: hidden;
    width: calc(25% - 15px);
    border: none !important;
    text-align: center;
}




.discount-card {
    background-color: black;
}

.new-product {
    background-color: #007bff;
}

.coupen-product {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 3px;
    color: white;
}

.image-container {
    position: relative;
    border: 1px solid #e0e0e0;
    overflow: hidden;

}

.image-container:hover .action-box {
    bottom: 0px;

}

.action-box {
    position: absolute;
    width: 100%;
    left: 0px;
    bottom: -50px;
    transition: ease-in-out 0.3s;
}


.heart{
    background:rgb(180, 7, 7);
    border-radius: 50%;
    height: 30px;
    width: 30px;
}

.heart i{
    color: white!important;
    font-size: 12px;
}

.add-to-cart a {
    color: white;
    text-decoration: none;
}

.action-box .add-to-cart:hover {
    background-color: black;
}

.action-box .add-to-cart {
    background-color: rgba(0, 0, 0, 0.685);
    text-align: center;
    padding: 9px;
    font-weight: 500;
    color: white;
    transition: 0.3s;
}

.image-container img {
    width: 100%;
    display: block;
}

.details {
    padding: 10px;
}

.overlay-box {
    width: 33.33%;
    border-left: 1px solid #e0e0e0;
    padding: 4px;
}

.overlay-box a {
    color: rgb(139, 139, 139);
}

.overlay-box a:hover {
    color: #007bff;
}

.searh-results {
    display: flex;
    width: 100%;
}

.results-box {
    width: 50%;
    display: flex;
    align-items: center;
}

.results-box p {
    font-weight: bold;
    font-size: 18px;
    color: rgb(29, 28, 28);
}

.results-box p span {
    color: rgb(146, 146, 146);
}

.overlay-box:first-child {
    border: none;
}

.overlay-buttons {
    display: flex;
    width: 100%;
    background-color: white;
    border-bottom: 1px solid #e0e0e0;
}

.overlay-buttons i {
    font-size: 13px;
}

.product-name {
    font-size: 18px;
    margin: 10px 0 5px;
}


.price {
    font-size: 16px;
    color: black;
}

.original-price {
    text-decoration: line-through;
    color: #999;
    font-size: 14px;
}

.icons {
    display: flex;
    justify-content: space-around;
    background-color: white;
    margin-top: 10px;
    position: relative;
    right: -100%;
    /* Start off-screen to the right */
    transition: right 0.3s ease-in-out;
}

.image-container:hover .icons {
    right: 0;
    /* Move into view from the right */
}

.icon {
    font-size: 18px;
    cursor: pointer;
}


/* website responsive code  width = 989*/
@media (max-width:989px) {
    .filter {
        display: none;
    }

    /* coloumns */

    .coloumns {
        display: flex;
        padding: 0 0 0 0;
        margin-top: 130px;
        justify-content: center;
    }

    .c2 {
        /* justify-content: center; */
        padding-top: 0px !important;
        width: 600px;
        /* background-color: aqua; */
    }

    /* banner image css */
    .hero {
        width: 600px;
        height: 200px;
    }

    /* main part */
    .layout {
        justify-content: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }


    /* toolbar */
    .toolbar {
        margin-top: 10px;
    }

    /* dropdown container */
    .dropdown {
        margin: 10px 0 0 20px;
        border: 2px groove;
        padding: 3px;
    }

    /* gets access to nth child(here 2) of the tag and then adds margin */
    .toolbar .c2:nth-child(2) {
        margin-left: 220px;
        margin-bottom: 10px;
    }

}

/* website responsive code */
@media (max-width:989px) {
    .filter {
        display: block!important;
    }

    .listing-flex{
        display: block;
    }
    .productlisting .c1{
        width: 100%;
    }

    /* coloumns */
    .coloumns {
        display: flex;
        padding: 0 0 0 0;
        margin-top: 130px;
        justify-content: center;
    }

    .c2 {
        /* justify-content: center; */
        padding-top: 0px !important;
        width: 100%;
        /* background-color: aqua; */
    }

    /* banner image css */
    .hero {
        width: 630px;
        height: 200px;
    }

    .hero>img {
        width: 630px;
        height: 100%;
    }

    /* main part */
    .layout {
        justify-content: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }


    /* toolbar */
    .toolbar {
        margin-top: 10px;
    }

    /* dropdown container */
    .dropdown {
        margin: 10px 0 0 20px;
        border: 2px groove;
        padding: 3px;
    }

    .toolbar .c1,
    .page .c1 {
        width: 30%;
    }

    /* gets access to nth child(here 2) of the tag and then adds margin */
    .toolbar .c2:nth-child(2) {
        margin-left: 30%;
        margin-bottom: 10px;
    }

}

/* website responsive code */

@media (max-width: 991px){
    .header-area .main-nav .menu-trigger{
        top: 40px;
    }
}

@media (max-width:770px) {
    .card{
        width: calc(48% - 15px);
    }
    .products-new h2.heading-head{
        font-size: 20px;
    }
    h2.heading-head:after{
        height: 2px;
        width: 50px;
    }
    h2.heading-head:before{
        height: 2px;
        width: 50px;
    }
}

@media (max-width:360px) {

    /* coloumns */
    .coloumns {
        display: flex;
        padding: 0 0 0 0;
        margin-top: 130px;
        justify-content: start;
    }

    .c2 {
        padding-top: 0px !important;
        width: 100%;
    }

    /* banner image css */
    .hero {
        width: 100%;
        height: 100px;
    }

    .hero>img {
        width: 100%;
        height: 100%;
    }

    /* main part */
    .card {
        width: 300px;
        height: 400px;
    }

    .cardtext {
        font-size: 28px;
    }

    /* toolbar */
    .toolbar {
        margin-top: 10px;
    }

    /* dropdown container */
    .dropdown {
        margin: 10px 0 0 20px;
        border: groove 2px;
        padding: 3px;
    }

    .toolbar .c1,
    .page .c2 {
        width: 100%;
    }

    .page .c2 {
        margin-left: -100px;
    }

    .toolbar .c2,
    .page .c1 {
        display: none;
        background-color: aqua;
    }

    /* gets access to nth child(here 2) of the tag and then adds margin */
    .toolbar .c2:nth-child(2) {
        /* margin-left: 30%; */
        margin-bottom: 10px;
    }

}

@media (max-width: 450px) {
.card{
    width: calc(46% - 15px);
}
}
    </style>


    <div class="container">
        <div class="user-profile">
            @include('frontend.customer.account.sidebar')
            <div class="user-description">
                <h5>Your WishList</h5>
                <div class="products-new your-product">

                    <div class="layout r5 your-product-flex">
                        <!-- cards -->


                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wishlistContainer = document.querySelector('.layout.r5');
            let wishlist = localStorage.getItem('wishlist');
            wishlist = wishlist ? JSON.parse(wishlist) : [];

            wishlist.forEach(item => {
                const card = document.createElement('div');
                card.classList.add('card');

                card.innerHTML = `
                    <div class="image-container">
                        <img src="${item.thumbnail}" alt="${item.name}">
                        <div class="coupen-product heart" data-id="${item.id}">
                            <p><i class="fa fa-heart"></i></p>
                        </div>
                        <div class="action-box">
                            <div class="add-to-cart">
                                <a href="/addtocart/${item.id}">
                                    <p>Add To Cart</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <h2 class="product-name">${item.name}</h2>
                        <p class="price">$${item.price}</p>
                    </div>
                `;

                wishlistContainer.appendChild(card);
            });

            // Toggle wishlist status when heart icon is clicked
            document.querySelectorAll('.coupen-product.heart').forEach(heart => {
                heart.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    toggleWishlistStatus(itemId);
                });
            });

            function toggleWishlistStatus(id) {
                let wishlist = localStorage.getItem('wishlist');
                wishlist = wishlist ? JSON.parse(wishlist) : [];

                const index = wishlist.findIndex(item => item.id === id);
                if (index !== -1) {
                    wishlist.splice(index, 1);
                    localStorage.setItem('wishlist', JSON.stringify(wishlist));
                    location.reload(); // Reload the page to update the wishlist display
                }
            }
        });
    </script>
@endsection
