@extends('admin.layouts.guest')

@section('datatable-title')
    Custom-Detail
@endsection

@section('main-content')

<style>
    /* General Page Styling */
    h1 {
        color: #333;
        font-size: 2em;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Card Styling */
    .card {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #4c51bf;
        color: white;
        text-align: center;
        font-size: 1.2em;
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    /* Table Styling */
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
    }

    .table-borderless th, .table-borderless td {
        padding: 0.8rem;
        font-size: 1.1em;
    }

    .table-bordered th, .table-bordered td {
        padding: 12px;
        text-align: center;
        background-color: #f9f9f9;
    }

    /* Image Styling */
    .img-fluid {
        max-width: 80px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Back Button Styling */
    .text-center a.btn {
        background-color: #4c51bf;
        color: white;
        padding: 12px 20px;
        font-size: 1.2em;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .text-center a.btn:hover {
        background-color: #2b3d91;
    }
</style>

<div class="container mt-4">
    <!-- Page Title -->
    <h1>Order Details</h1>
    <div class="row">
        <!-- Left Side: Customize Jacket Information -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Customize Jacket Information
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr><th>Name:</th><td>{{ $customize->name }}</td></tr>
                            <tr><th>Email:</th><td>{{ $customize->email }}</td></tr>
                            <tr><th>Phone:</th><td>{{ $customize->phone_number }}</td></tr>
                            <tr><th>Company:</th><td>{{ $customize->company ?? 'Not provided' }}</td></tr>
                            <tr><th>Country:</th><td>{{ $customize->country ?? 'Not provided' }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Side: Jacket Size Details -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Jacket Size Details
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr><th>Gender:</th><td>{{ $customize->gender ?? 'Not provided' }}</td></tr>
                            <tr><th>Chest Size:</th><td>{{ $customize->chest_size ?? 'Not provided' }}</td></tr>
                            <tr><th>Front Length:</th><td>{{ $customize->front_length ?? 'Not provided' }}</td></tr>
                            <tr><th>Shoulder Length:</th><td>{{ $customize->shoulder_length ?? 'Not provided' }}</td></tr>
                            <tr><th>Waist Size:</th><td>{{ $customize->waist_size ?? 'Not provided' }}</td></tr>
                            <tr><th>Description:</th><td>{{ $customize->description ?? 'No description provided' }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Summary Section -->
    <div class="card">
        <div class="card-header">
            Order Summary
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Color</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @if($customize->image !== 'No Image')
                                <img src="{{ asset('uploads/design/' . $customize->image) }}" alt="Item Image" class="img-fluid">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $customize->categories ?? 'Dope Duds Leather Blazer' }}</td>
                        <td>{{ $customize->color }}</td>
                        <td>{{ $customize->quantity }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-4">
        <a href="{{ URL::to('/dashboard/customize') }}" class="btn btn-primary btn-lg">Back to Orders List</a>
    </div>
</div>

@endsection
