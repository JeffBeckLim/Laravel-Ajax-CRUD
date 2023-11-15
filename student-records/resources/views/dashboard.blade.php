<html>
<head>
    <title>Student Record</title>
    <!--LARAVEL-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--LARAVEL-->
    
    <!-- BOORSTRAP -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--BOORSTRAP-->


    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- JQUERY --}}
</head>
    <body>
        
        <div class="container mt-5 py-5">
            <div class="row mb-2">
                <div class="col-12">
                    <a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</a>

                    {{-- modal for user create form --}}
                    @include('modal_user_create')
                </div>
            </div>
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Verified</th>
                        <th scope="col" style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a class="btn btn-primary" href="">Update</a>
                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </body>
        
</html>
