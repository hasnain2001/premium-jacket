document.addEventListener("DOMContentLoaded", function () {
    // Fetch the country data
    fetch('https://restcountries.com/v3.1/all')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(countries => {
            // Sort countries alphabetically by their common name
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            const countrySelect = document.getElementById('country');
            countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.cca2; // Using country code as value
                option.textContent = country.name.common;
                countrySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
});


  // Function for PayPal Payment
function submitPayPalForm() {
    document.getElementById('payment_method').value = 'paypal';  // Set the payment method to 'paypal'
    document.getElementById('payment-form').submit();  // Submit the form for PayPal payment
}
