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
                    <h2>Owners</h2>
                </div>
            </div>
        </div>

        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                   {{ session('success') }}
                </div>
            @endif
            <form action="{{url('owners/update_owner/' . $owners->id )}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col md-4">
                        <label for="owner_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required="required" value={{$owners->owner_name}}>
                    </div>
                    <div class="form-group col md-4">
                        <label for="owner_email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required="required" value={{$owners->owner_email}}>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col md-4">
                        <label for="owner_contact" class="form-label" style="margin-bottom:10px;margin-top:15px;">Contacts</label>
                        <input type="text" class="form-control" name="contacts" required="required" value={{$owners->owner_contacts}}>
                    </div>
                    <div class="form-group col md-4">
                        <label for="owner_address" class="form-label" style="margin-bottom:10px;margin-top:15px;">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" value={{$owners->owner_address}}>
                    </div>
                </div>

                <div style="margin-top:25px;">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>