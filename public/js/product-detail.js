    // Function to select color when an image is clicked
    function selectColor(color) {
        // Set the hidden input's value to the selected color
        document.getElementById('selected-color').value = color;

        // Remove 'active' class from all images
        var colorImages = document.querySelectorAll('.product-color');
        colorImages.forEach(function(img) {
            img.classList.remove('active');
        });

        // Add 'active' class to the clicked image
        document.querySelector('img[data-color="' + color + '"]').classList.add('active');
    }

    // Get today's date
    const today = new Date();
    
    // Calculate the date 10 days from today
    const deliveryDate = new Date();
    deliveryDate.setDate(today.getDate() + 10);

    // Format the dates
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const formattedToday = today.toLocaleDateString(undefined, options);
    const formattedDeliveryDate = deliveryDate.toLocaleDateString(undefined, options);

    // Display the dates
    document.getElementById("delivery-date").textContent = `from ${formattedToday} to ${formattedDeliveryDate}`;





const imageSelector = document.querySelector('.image-selector');
const productColors = imageSelector.querySelectorAll('.product-color');

productColors.forEach(color => {
color.addEventListener('click', () => {
    productColors.forEach(c => c.classList.remove('active'));
    color.classList.add('active');
    // Handle selected color here, e.g., update product information
});
});

    // Function to change main image when clicking on small images
    function changeImage(smallImg) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = smallImg.src;
    }