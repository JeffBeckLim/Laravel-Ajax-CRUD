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
            <table id="#student-table" class="table border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </body>
<script>
    $(document).ready(function(){

        fetchStudent();

        function fetchStudent()
        {
            $.ajax({
                url: '/get_students',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('tbody').html("");
                    $.each(response.students, function(key, item) {
                        $('tbody').append(
                        '<tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.name+'</td>\
                                <td>'+item.email+'</td>\
                                <td>\
                                    <a id="'+item.id+'" class="btn btn-primary" href="">Update</a>\
                                    <a id="'+item.id+'" class="btn btn-danger" href="">Delete</a>\
                                </td>\
                            </tr>\
                        '
                    );
                });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        

        // CREATE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $(document).on('click' , '.add_student', function(e){
            e.preventDefault();
            
            console.log("Adding data...");
            
            var data  = {
                'email' : $('.email').val(),
                'name' : $('.name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({  
                type: "POST",
                url: "/students",
                data: data,
                dataType: "json",
                success: function (response){
                    // console.log(response);
                    if(response.status == 400)
                    {
                        $('#saveForm_errorList').html("");
                        $.each(response.errors, function(key, error_values)
                        {
                            $('#saveForm_errorList').append('<div class="alert alert-danger alert-dismissible fade show">'+error_values+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">'+'</div>');
                        });
                    }
                    else{
                        $('#saveForm_errorList').append('<div class="alert alert-success alert-dismissible fade show">'+response.message+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">'+'</div>');
                        // $.('#success_message').text(response.message)
                        fetchStudent();
                    }
                }
            });

        }); 
    })


    
</script>
</html>
