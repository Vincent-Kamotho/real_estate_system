<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Real Estate System</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    @include('admin.layouts.sidebar')

    <div class="main--content">
        @include('admin.layouts.header')
        <div class="container">
            <div class="row" style="margin-bottom:20px;">
                <div class="col-sm-4">
                    <h2>Listings</h2>
                </div>
                <div class="col-sm-8 d-flex justify-content-end">
                    <a href="{{route('add_listings')}}" class="btn btn-success">Add a Listing</a>
                </div>
            </div>
        </div>
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Property Type</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Owner</th>
                        <th>Purpose</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listings as $listing)
                    <tr>
                        <td>{{$listing->property_type}}</td>
                        <td>{{$listing->property_name}}</td>
                        <td>{{$listing->location}}</td>
                        <td>{{$listing->price}}</td>
                        <td>{{$listing->owner}}</td>
                        <td>{{$listing->purpose}}</td>
                        
                        <td>
                            <a href="{{url('admin/listings/edit/' . $listing->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/listings/delete/'. $listing->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>