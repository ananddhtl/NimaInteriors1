@extends('welcome')
@section('title', 'Product detail:: Nimainteriors.com')
<style>
    .wishlist{

    }
    .layout {
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        gap: 8px;
        margin: 20px 0 100px 0;
        margin-left: -5px;
    }
    .layout .card {
        background: #fff;
        border-radius: 0px;
        overflow: hidden;
        width: calc(25% - 15px);
        border: none !important;
        text-align: center;
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
    .remove-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 50%;
    cursor: pointer;
    padding: 5px;
    transition: background 0.3s;
}

.remove-icon:hover {
    background: rgba(255, 0, 0, 0.7);
}

.remove-icon i {
    color: red;
    font-size: 16px;
}


/*
    .heart {
        background: rgb(180, 7, 7);
        border-radius: 50%;
        height: 30px;
        width: 30px;
    }

    .heart i {
        color: white !important;
        font-size: 12px;
    } */

    .add-to-cart a {
        color: white;
        text-decoration: none;
    }

    .action-box .add-to-cart:hover {
        background-color: black;
        color: #ddd;
    }


    .action-box .add-to-cart {
        background-color: rgba(57, 57, 57, 0.685);
        text-align: center;
        padding: 9px;
        font-weight: 500;
        color: white;
        transition: 0.3s;
    }
    .action-box .add-to-cart a:hover{
        color:white;
    }
    .image-container img {
        width: 100%;
        display: block;
    }

    .layout .product-details {
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



</style>
@section('content')
<section class="product-details">
    <div class="container wishlist">
        <div class="products-you-may-like">
            <div class="col-lg-12 col-md-7 col-sm-12 mt-5">
                <div class="products-new">
                    <h2 class="heading-head">Your Wishlist</h2>
                    <div class="layout r5">
                        <!-- cards will be dynamically added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                <div class="remove-icon" data-id="${item.id}">
                    <i class="fa fa-times"></i>
                </div>
                <div class="action-box">
                    <div class="add-to-cart">
                        <a href="/$locale/addtocart/${item.id}">
                            <p>Add To Cart</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-details">
                <h2 class="product-name">${item.name}</h2>
                <p class="price">$${item.price}</p>
            </div>
        `;

        wishlistContainer.appendChild(card);
    });

    // Add event listener for remove icon
    document.querySelectorAll('.remove-icon').forEach(removeIcon => {
        removeIcon.addEventListener('click', function() {
            const itemId = this.dataset.id;
            removeFromWishlist(itemId);
        });
    });

    function removeFromWishlist(id) {
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
