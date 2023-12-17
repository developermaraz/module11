<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products - Store Keeper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap') }}" rel="stylesheet"> 
    <!-- Icon Font Stylesheet -->
    <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('component.sidebar')
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('component.header')
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                @if (session('success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">All Products</h6>
                                
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->price }}</td>
                                                <td>
                                                    <a href="/sell/{{ $row->id }}" class="btn btn-sm btn-success"><i class="fas fa-cart-plus"></i></a>
                                                    <a href="/update/{{ $row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="/delete/{{ $row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @include('component.footer')