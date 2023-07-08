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
                    <h2>Property Listing</h2>
                </div>
            </div>
        </div>

        <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <form action="{{route('post_listing')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col md-4">
                        <label for="property_type" class="form-label">Property Type</label>
                        <select class="form-select" name="property_type">
                            <option selected>Select property type</option>
                            <option value="Houses">Houses</option>
                            <option value="Cars">Cars</option>
                            <option value="Land">Land</option>
                            <option value="Computing">Computing</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Appliances">Appliances</option>
                            <option value="Health/Beauty">Health and Beauty</option>
                            <option value="Fashion">Fashion</option>
                        </select>
                    </div>
                    <div class="form-group col md-4">
                        <label for="property_name" class="form-label">Property Name</label>
                        <input type="text" class="form-control" name="property_name" placeholder="Property name">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col md-4">
                        <label for="location" class="form-label"
                            style="margin-bottom:10px;margin-top:15px;">Location</label>
                        <select class="form-select" name="location">
                            <option selected>Select Location</option>
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
                        <input type="text" class="form-control" name="price" placeholder="KES">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col md-4">
                        <label for="owner" class="form-label" style="margin-bottom:10px;margin-top:15px;">Owner</label>
                        <select name="owner_name" class="form-select">
                            <option selected>Select Owner</option>
                            @foreach($owners as $owner)
                                <option value="{{$owner}}">{{$owner}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col md-4">
                        <label for="location" class="form-label" style="margin-bottom:10px;margin-top:15px;">Purpose</label>
                        <select class="form-select" name="purpose">
                            <option selected>Select Item Purpose</option>
                            <option value="Sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="description" class="form-label"
                            style="margin-bottom:10px;margin-top:15px;">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="4"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="inputItemImage" style="margin-bottom:10px;margin-top:15px;">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <div style="margin-top:25px;">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

    </div>
</body>