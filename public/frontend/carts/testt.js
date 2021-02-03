var products = "";
for(var i in cartArray) {

    productsproducts +="<div class='row mb-4'>"+
        "<div class='col-md-5 col-lg-3 col-xl-3'>"+
        "<div class='view zoom overlay z-depth-1 rounded mb-3 mb-md-0'>"+
        "<img class='img-fluid w-100' src='https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg' alt='Sample'>"+
        "<a href='#!'>"+
        "<div class='mask waves-effect waves-light'>"+
        "<img class='img-fluid w-100' src='https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg'>"+
        "<div class='mask rgba-black-slight waves-effect waves-light'></div>"+
        "</div>"+
        "</a>"+
        "</div>"+
       "</div>"+
        "<div class='col-md-7 col-lg-9 col-xl-9'>"+
        "<div>"+
        "<div class='d-flex justify-content-between'>"+
        "<div>"+
        "<h5 class='product-name'>" + cartArray[i].name + "</h5>"+
        "<p class='mb-3 text-muted text-uppercase small'>Size: M</p>"+
        "<p class='mb-3 text-muted text-uppercase small'>Price: " + cartArray[i].price + "</p>"+
    "</div>"+
    "<div>"+
    "<div class='def-number-input number-input safari_only mb-0 w-100'>"+
       "<button  class='minus minus-item' data-name=" + cartArray[i].name + "></button>"+
        "<input class='item-count quantity' min='0' name='quantity' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "' type='number'>"+
        "<button  class='plus plus-item' data-name=" + cartArray[i].name + "></button>"+
       "</div>"+
    "</div>"+
    "</div>"+
    "<div class='d-flex justify-content-between align-items-center'>"+
        "<div>"+
        "<button type='button' class='delete-item card-link-secondary small text-uppercase mr-3' data-name=" + cartArray[i].name + ">" +
    "<i class='fa fa-trash-alt mr-1'></i> Remove item </button>"+
    "</div>"+
    "<p class='mb-0'>" +
        "<span><strong>" + cartArray[i].total + "</strong></span>" +
        "</p>"+
    "</div>"+
    "</div>"+
    "</div>"+
    "</div>"
}
