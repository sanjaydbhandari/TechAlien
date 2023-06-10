$(document).ready(function () {
  $(document).on("click", ".increment-btn", function () {
    e.preventDefault();
    var qty = $(this).closest(".product_data").find(".input-qty").val();
    var value = parseInt(qty, 10);
    alert(value);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      $(this).closest(".product_data").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".decrement-btn", function () {
    // e.preventDefault();
    var qty = $(this).closest(".product_data").find(".input-qty").val();
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(this).closest(".product_data").find(".input-qty").val(value);
    }
  });

  // $(document).on("click", ".addToCartBtn", function () {
  $('.addToCartBtn').click(function (e) {
    e.preventDefault();
    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var prod_id = $(this).val();
    var scope = "add";
    alert(qty);

    $.ajax({
      url: 'handlecart.php',
      type : "POST",
      // dataType: "dataType",
      data: {
        "prod_id": prod_id,
        "prod_qty": qty,
        "scope": scope
      },
    // $.ajax({
    //   url: $(this).attr('method'),
    //   method: $(this).attr('action'),
    //   data: {
    //     "prod_id": prod_id,
    //     "prod_qty": qty,
    //     "scope": scope,
    //   },
    //   // dataType: "dataType",
      success: function (response) {
        if(response==201)
        {
            alert("Products added to cart");
        }
        if(response=="existing")
        {
          alert("Products added to cart");
            alertify.success("Products already added to cart");
        }
        else if(response==401)
        {
          alert("Products added to cart");
            alertify.success("Login to continue");
        }
        else if(response==500)
        {
          alert("Products added to cart");
            alertify.success("Something went wrong");
        }
      }
    });

    
  });
});









// $.ajax({
//   type: "POST",
//   url: "handlecart.php",
//   data: {
//     "prod_id": prod_id,
//     "prod_qty": qty,
//     "scope": "add"
//   },
  // dataType: "dataType",
  // success: function (response) {
    // if(response==201)
    // {
    //     alertify.success("Products added to cart");
    // }
    // if(response=="existing")
    // {
    //     alertify.success("Products already added to cart");
    // }
    // else if(response==401)
    // {
    //     alertify.success("Login to continue");
    // }
    // else if(response==500)
    // {
    //     alertify.success("Something went wrong");
    // }
//   }
// });







// Checkout
// near form
// <!-- <form action="payment.php" method="POST"> -->

// near razor <a name="" id="" class="btn btn-primary" href="#" role="button"><!-- <input type="button" value="Pay With Rayzorpay" name="paywithrazorpay" class="btn btn-outline-success w-100" onclick="pay_now()"></input> --></a>