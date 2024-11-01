$(document).ready(function(){
    // Function to update the total price
    function updateTotal() {
        let total = 0;
        $(".cart-item tbody tr").each(function() {
            const price = parseFloat($(this).find(".price").text());
            const qty = parseInt($(this).find(".qty input").val());
            const amount = price * qty;
            $(this).find(".amount").text(amount.toFixed(2));
            total += amount;
        });
        $(".cart-total").text(total.toFixed(2));
    }

    // Event listener for quantity changes
    $(".cart-item").on("input", ".qty input", function() {
        updateTotal();
    });

    // Event listener for removing items
    $(".cart-item").on("click", ".remove", function() {
        $(this).closest("tr").remove();
        updateTotal();
    });

    // Initial calculation
    updateTotal();
});
