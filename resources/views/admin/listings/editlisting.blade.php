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
                    <h2>Edit Property</h2>
                </div>
                {{-- <div class="col-sm-8 d-flex justify-content-end">
                    <button class="btn btn-success">Add Property</button>
                </div> --}}
            </div>
        </div>

        <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <form action="{{url('admin/listings/update_record/' . $listing->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col md-4">
                        <label for="property_type" class="form-label">Property Type</label>
                        <select class="form-select" name="property_type">
                            <option value={{$listing->property_type}} selected={{$listing->property_type}}>{{$listing->property_type}}</option>
                            <option value="Houses">Houses</option>
                            <option value="Cars">Cars</option>
                            <option value="Land">Land</option>
                            <option value="Computing">Computing</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Appliances">Appliances</option>
                        </select>
                    </div>
                    <div class="form-group col md-4">
                        <label for="property_name" class="form-label">Property Name</label>
                        <input type="text" class="form-control" name="property_name" value={{$listing->property_name}}>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col md-4">
                        <label for="location" class="form-label" style="margin-bottom:10px;margin-top:15px;">Location</label>
                        <select class="form-select" name="location">
                            <option value="{{$listing->location}}" selected>{{$listing->location}}</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Mombasa">Mombasa</option>
                            <option value="Kisumu">Kisumu</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Meru">Meru</option>
                            <option value="Isiolo">Isiolo</option>
                            <option value="Embu">Embu</option>
                            <option value="Machakos">Machakos</option>
                        </select>
                    </div>
                    <div class="form-group col md-4">
                        <label for="price" class="form-label" style="margin-bottom:10px;margin-top:15px;">Price</label>
                        <input type="text" class="form-control" name="price" value={{$listing->price}}>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col md-4">
                        <label for="owner" class="form-label" style="margin-bottom:10px;margin-top:15px;">Owner</label>
                        <select name="owner_name" class="form-select">
                            <option value={{$listing->owner}}>{{$listing->owner}}</option>
                            @foreach($owners as $owner)
                                <option value="{{$owner}}">{{$owner}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col md-4">
                        <label for="location" class="form-label" style="margin-bottom:10px;margin-top:15px;">Purpose</label>
                        <select class="form-select" name="purpose">
                            <option value={{$listing->purpose}}>{{$listing->purpose}}</option>
                            <option value="Sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                </div>

                <div style="margin-top:25px;">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>

    </div>
</body>