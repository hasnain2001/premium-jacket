<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Leather Jackets Form</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling for the form and carousel buttons */
        .small-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.8rem;
            width: 30px;
            height: 30px;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            background-color: black;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Center carousel in column */
        .carousel-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('components.navbar')

    <div class="container mt-5">
        <h1 class="text-center">Custom Leather Jackets</h1>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; position: relative; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 5px;">
            <i class="fa fa-check-circle" style="margin-right: 8px;"></i>
            <strong>{{ session('success') }}</strong>
                        </div>
    @endif
    
    {{-- Error Alert --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <i class="fa fa-exclamation-circle" style="margin-right: 8px;"></i>
            <strong>Please fix the following errors:</strong>
            <ul style="margin-top: 10px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <p class="text-center">Design Custom Leather Jackets With Your Embroidery, Logo & Color.</p>
        
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-7 form-container">
                <form action="{{ route('custom.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone" placeholder="Enter your phone number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="company">Company or Organization</label>
                            <input type="text" name="company" class="form-control" id="company" placeholder="Enter company name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" min="1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <select name="country" id="country" class="form-control" required>
                                <option value="">Select a country</option>
                                <!-- Add country options here -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-3">
                            <label for="category">Category <span class="text-danger">*</span></label>
                            <select name="categories" id="category" class="form-control" required>
                                <option value="" disabled selected>--Select Category--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->slug }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="color">Color</label>
                            <input type="color" name="color" class="form-control" id="color" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="upload">Upload Art/Design/Logo</label>
                            <input type="file" name="image" class="form-control-file" id="image" required>
                        </div>
                    </div>
                    <!-- Size Options -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="chest">Chest</label>
                            <select name="chest_size" class="form-control" id="chest" required>
                                <option value="">Select Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="frontLength">Front Length</label>
                            <select name="front_length" class="form-control" id="frontLength" required>
                                <option value="">Select Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="shoulderLength">Shoulder Length</label>
                            <select name="shoulder_length" class="form-control" id="shoulderLength" required>
                                <option value="">Select Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="waist">Waist</label>
                            <select name="waist_size" class="form-control" id="waist" required>
                                <option value="">Select Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="sleeveLength">Sleeve Length</label>
                            <select name="sleeve_length" class="form-control" id="sleeveLength" required>
                                <option value="">Select Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="bottom">Bottom</label>
                            <select name="bottom_size" class="form-control" id="bottom" required>
                                <option value="">Select Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter additional details here" required></textarea>
                    </div>
                    <div class="d-grid gap-2">
           
                        <button class="btn btn-dark" type="submit">Submit</button>
                      </div>
                </form>
                
            </div>

            <!-- Image Carousel Column -->
            <div class="col-md-5 carousel-container">
                <div id="sizeImagesCarousel" class="carousel slide"  data-bs-ride="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div id="inchesSection" class="text-center">
                                <span class="badge bg-secondary">Inches</span>
                                <img src="{{ asset('images/size-guide-inches.png') }}" alt="Size Guide Inches" class="d-block w-100 img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div id="cmSection" class="text-center">
                                <span class="badge bg-secondary">CM</span>
                                <img src="{{ asset('images/size-guide-cm.png') }}" alt="Size Guide CM" class="d-block w-100 img-fluid rounded shadow-sm">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev small-btn" type="button" data-bs-target="#sizeImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next small-btn" type="button" data-bs-target="#sizeImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
    <script>
                     document.addEventListener("DOMContentLoaded", function () {
    fetch('https://restcountries.com/v3.1/all')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(countries => {
            // Sort the countries alphabetically by their common name
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            const countrySelect = document.getElementById('country');
            countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.cca2; // Using country code as value for better compatibility
                option.textContent = country.name.common;
                countrySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching countries:', error));
});
    </script>
    <script>
    // Get the color input element and the warning message
    const colorInput = document.getElementById('color');
    const colorWarning = document.getElementById('color-warning');
    
    // Listen for changes in the color input
    colorInput.addEventListener('input', function() {
        // Check if the selected color is black (#000000)
        if (colorInput.value === '#000000') {
            colorWarning.style.display = 'inline';  // Show the warning
        } else {
            colorWarning.style.display = 'none';   // Hide the warning
        }
    });

    // Optionally, add form validation before submission to prevent black color submission
    document.getElementById('colorForm').addEventListener('submit', function(event) {
        if (colorInput.value === '#000000') {
            event.preventDefault();  // Prevent form submission if color is black
            colorWarning.style.display = 'inline';  // Show the warning
        }
    });
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
