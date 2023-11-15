<!-- Create Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!-- Display Errors -->
            <div id="saveForm_errorList" >
                
            </div>
        <!-- Display Errors -->

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control email" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text ">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control name" id="name" name="name">
                </div>
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="add_student btn btn-primary">Add Student</button>
        </div>
    </div>
    </div>
</div>

<script>
    
    $(document).ready( function () {

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
                    }
                }
            });

        });  

    });
</script>