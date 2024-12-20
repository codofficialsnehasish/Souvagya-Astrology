<script>
    $(document).ready(function() {
        $('#add-to-cart-btn').on('click', function() {
            var productId = $(this).data('product-id');
            var quantity = $('#quantity_6041ce9eca5d6').val();  // Get the quantity input value
            
            if (!quantity || quantity === '') {
                quantity = 1;
            }

            // Send AJAX request
            $.ajax({
                url: "{{ route('add-to-cart') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token for security
                    product_id: productId,  // Send product ID
                    quantity: quantity      // Send quantity
                },
                success: function(response) {
                    if (response.status === "true") {
                        updateCartTotal();
                        updateCartCount();
                        round_success_noti(response.massage);
                        triggerBlinkEffect();
                    } else {
                        round_error_noti('Failed to add product to cart.');
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors; // Get validation errors
                        let errorMessages = '';

                        // Loop through errors and append to the message
                        $.each(errors, function (key, value) {
                            errorMessages += value[0] + '<br>'; // Add each error message
                        });

                        // Show all error messages
                        round_error_noti(errorMessages);
                    } else {
                        // Show generic error message
                        round_error_noti("Something went wrong. Please try again.");
                    }
                }
            });
        });

        $('.qty_button').on('click', function () {
            const button = $(this);
            const input = button.siblings('.qty');
            let quantity = parseInt(input.val());
            const cartId = button.closest('tr').data('id');

            $.ajax({
                url: "{{ route('cart.update',':id') }}".replace(':id', cartId),
                type: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: { quantity: quantity },
                success: function (response) {
                    // Update cart total price in the table
                    const totalPrice = response.total_price;
                    button.closest('tr').find('.prod_total_price').text('₹' + totalPrice);

                    updateCartTotal();
                },
                error: function (error) {
                    round_error_noti(error.responseJSON.error);
                    input.val(1);
                }
            });
        });


        $('.close_pro img').on('click', function () {
            const cartId = $(this).closest('tr').data('id');
            $.ajax({
                url: "{{ route('cart.delete', ':id') }}".replace(':id', cartId),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status === "true") {
                        updateCartTotal();
                        updateCartCount();
                        round_success_noti(response.massage);
                        $('tr[data-id="' + cartId + '"]').remove();
                    } else {
                        round_error_noti('Failed to delete item from cart.');
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors; // Get validation errors
                        let errorMessages = '';

                        // Loop through errors and append to the message
                        $.each(errors, function (key, value) {
                            errorMessages += value[0] + '<br>'; // Add each error message
                        });

                        // Show all error messages
                        round_error_noti(errorMessages);
                    } else {
                        // Show generic error message
                        round_error_noti("Something went wrong. Please try again.");
                    }
                }
            });
        });


        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: 'GET',
                success: function (response) {
                    if (response.count > 0) {
                        $('#cart-count').text(response.count).show();
                    } else {
                        $('#cart-count').hide();
                    }
                },
                error: function () {
                    console.error('Failed to fetch cart count.');
                }
            });
        }

        function updateCartTotal() {
            $.ajax({
                url: "{{ route('cart.total') }}",
                method: 'GET',
                success: function (response) {
                    $('#cart-total').text('₹'+response.total)
                },
                error: function () {
                    console.error('Failed to fetch cart count.');
                }
            });
        }        

        function triggerBlinkEffect() {
            const cartWrapper = $('#cart-wrapper');

            // Add the blinking effect
            cartWrapper.addClass('outer-circle');

            // Remove the blinking effect after 30 seconds
            setTimeout(() => {
                cartWrapper.removeClass('outer-circle');
            }, 10000); // 10 seconds
        }

        // Call the function to update cart count on page load
        updateCartCount();
        updateCartTotal();

    });
</script>