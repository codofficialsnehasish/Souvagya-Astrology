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
                        round_success_noti(response.massage);
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

        // Update quantity when plus or minus buttons are clicked
        $('.qty_button.plus').on('click', function() {
            var qtyInput = $(this).siblings('.qty');
            var qty = parseInt(qtyInput.val());
            if (qty < qtyInput.attr('max')) {
                qtyInput.val(qty + 1);
            }
        });

        $('.qty_button.minus').on('click', function() {
            var qtyInput = $(this).siblings('.qty');
            var qty = parseInt(qtyInput.val());
            if (qty > qtyInput.attr('min')) {
                qtyInput.val(qty - 1);
            }
        });
    });
</script>