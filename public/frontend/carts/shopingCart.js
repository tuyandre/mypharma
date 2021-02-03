// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // Constructor
    function Item(name,display, price, count,pharmacy,imageUrl,product,size) {
        this.name = name;
        this.display = display;
        this.price = price;
        this.count = count;
        this.pharmacy = pharmacy;
        this.image = imageUrl;
        this.product = product;
        this.size = size;
    }

    // Save cart
    function saveCart() {
        sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

    // Load cart
    function loadCart() {
        cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
        loadCart();
    }


    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};

    // Add to cart
    obj.addItemToCart = function(name,display, price, count,pharmacy,imageUrl,product,size) {
        for(var item in cart) {
            if(cart[item].name === name) {
                cart[item].count ++;
                saveCart();
                return;
            }
        }
        var item = new Item(name,display, price, count,pharmacy,imageUrl,product,size);
        cart.push(item);
        saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(name, count) {
        for(var i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(name) {
        for(var item in cart) {
            if(cart[item].name === name) {
                cart[item].count --;
                if(cart[item].count === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    }

    // Remove all items from cart
    obj.removeItemFromCartAll = function(name) {
        for(var item in cart) {
            if(cart[item].name === name) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }

    // Clear cart
    obj.clearCart = function() {
        cart = [];
        saveCart();
    }

    // Count cart
    obj.totalCount = function() {
        var totalCount = 0;
        for(var item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }

    // Total cart
    obj.totalCart = function() {
        var totalCart = 0;
        for(var item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
    }

    // List cart
    obj.listCart = function() {
        var cartCopy = [];
        for(i in cart) {
            item = cart[i];
            itemCopy = {};
            for(p in item) {
                itemCopy[p] = item[p];

            }
            itemCopy.total = Number(item.price * item.count).toFixed(2);
            cartCopy.push(itemCopy)
        }
        return cartCopy;
    }

    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
})();


// *****************************************
// Triggers / Events
// *****************************************
// Add item
$('.add-to-cart').click(function(event) {
    console.log(authcheck);
    if (authcheck==1) {
        event.preventDefault();
        var name = $(this).data('name');
        var display = $(this).data('display');
        var price = Number($(this).data('price'));
        var imageUrl = $(this).data('image');
        var pharmacy = $(this).data('pharmacy');
        var product = Number($(this).data('product'));
        var size = $(this).data('size');
        shoppingCart.addItemToCart(name, display, price, 1,pharmacy, imageUrl, product, size);
        displayCart();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Product added to your cart',
            showConfirmButton: false,
            timer: 2500
        })
    }else {
        Swal.fire({
            title: 'Please Login or Create Account ',
            showDenyButton: true,
            // showCancelButton: true,
            confirmButtonText: `Login`,
            denyButtonText: `Cancel`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location="/login";
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        })

    }
});

// Clear items
$('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
});


function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
        output += "<tr>"
            + "<td>" + cartArray[i].name + "</td>"
            + "<td>(" + cartArray[i].price + ")</td>"
            + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
            + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
            + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
            + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
            + " = "
            + "<td>" + cartArray[i].total + "</td>"
            +  "</tr>";
    }
    var products = "";
    for(var i in cartArray) {

        products +="<div class='row mb-4'>"+
            "<div class='col-md-5 col-lg-3 col-xl-3'>"+
            "<div class='view zoom overlay z-depth-1 rounded mb-3 mb-md-0'>"+
            "<img class='img-fluid w-100' src='/backend/medecines/" + cartArray[i].image + "' alt='Sample' style='width: 300px!important;'>"+
            "<a href='#!'>"+
            "<div class='mask waves-effect waves-light'>"+
            "<img class='img-fluid w-100' src='/backend/medecines/" + cartArray[i].image + "' style='width: 300px!important;'>"+
            "<div class='mask rgba-black-slight waves-effect waves-light'></div>"+
            "</div>"+
            "</a>"+
            "</div>"+
            "</div>"+
            "<div class='col-md-7 col-lg-9 col-xl-9'>"+
            "<div>"+
            "<div class='d-flex justify-content-between'>"+
            "<div>"+
            "<h5 class='product-name'>" + cartArray[i].display + "</h5>"+
            "<p class='mb-3 text-muted text-uppercase small'>Available Stock: " + cartArray[i].size + "</p>"+
            "<p class='mb-3 text-muted text-uppercase small'>Price: " + cartArray[i].price + "Rwf</p>"+
            "</div>"+
            "<div>"+
            "<div class='def-number-input number-input safari_only mb-0 w-100'>"+
            "<button  class='minus minus-item' data-name=" + cartArray[i].name + "></button>"+
            "<input type='number' class='item-count ' min='0'  data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "' >"+
            "<button  class='plus plus-item' data-name=" + cartArray[i].name + "></button>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<div class='d-flex justify-content-between align-items-center'>"+
            "<div>"+
            "<button type='button' class='delete-item btn btn-danger small text-uppercase mr-3' data-name=" + cartArray[i].name + ">" +
            "<i class='fa fa-trash-alt mr-1'></i> Remove item </button>"+
            "</div>"+
            "<p class='mb-0'>" +
            "<span><strong>" + cartArray[i].total + "  Rwf</strong></span>" +
            "</p>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<hr class='mb-4'>"
    }


    $('.cart-product').html(products);
    // $('.show-cart').html(output);
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
})

// Delete item button

$('.cart-product').on("click", ".delete-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
})
// -1
$('.show-cart').on("click", ".minus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCart(name);
    displayCart();
})
// -1
$('.cart-product').on("click", ".minus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCart(name);
    displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.addItemToCart(name);
    displayCart();
})
// +1
$('.cart-product').on("click", ".plus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.addItemToCart(name);
    displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
    var name = $(this).data('name');
    var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
});
// Item count input
$('.cart-product').on("change", ".item-count", function(event) {
    var name = $(this).data('name');
    var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
});
displayCart();

$('.checkout-payment').click(function(event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var cartArray = shoppingCart.listCart();
    var tokens=$("#token").val();
    cartArray['_token']=tokens;
    var jsonString = JSON.stringify(cartArray);

    var url="/checkout/pending";
    event.preventDefault();
    console.log(jsonString);
    $.ajax({
        url: url,
        method: "Post",
        data:{data:jsonString,count:shoppingCart.totalCount(),cost:shoppingCart.totalCart()} ,
        dataType: "JSON",
    }).done(function (data) {
        console.log(data);

        if (data.checkout=="ok"){
            console.log("ok");
            sessionStorage.clear()
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your Order has been Completed, Go to the Pharmacy',
                showConfirmButton: false,
                timer: 5000
            })
            window.location="/";
        }
    }).fail(function (response) {
        console.log(response.responseJSON);


//
        //alert("Internal server error");
    });
});
function saveOrder($order) {
    if (sessionStorage.getItem('order')!= null){
        localStorage.removeItem("order");
    }
    sessionStorage.setItem('order', $order);
}
var authcheck = $('meta[name="auth-check"]').attr('content');

