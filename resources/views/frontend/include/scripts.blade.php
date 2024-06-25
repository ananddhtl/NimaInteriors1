<script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('frontend/assets/js/popper.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('frontend/assets/js/scrollreveal.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/parallax.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/imgfix.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>

<!-- Global Init -->
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateWishlistCount();
    });

    function addToWishlist(item, parentDiv) {
        let wishlist = localStorage.getItem('wishlist');
        wishlist = wishlist ? JSON.parse(wishlist) : [];

        if (!wishlist.some(wishlistItem => wishlistItem.id === item.id)) {
            wishlist.push(item);
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            showSnackbar('Item added to wishlist!');
        } else {
            showSnackbar('Item already in wishlist!');
            parentDiv.remove();
        }

        
        updateWishlistCount();
    }

    function updateWishlistCount() {
        let wishlist = localStorage.getItem('wishlist');
        wishlist = wishlist ? JSON.parse(wishlist) : [];
        document.getElementById('wishlist-count').innerHTML = '<i class="fa-solid fa-heart"></i>' + wishlist.length;
    }
</script>