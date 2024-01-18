@extends('backend.layouts.app')
@section('title')
    Users
@endsection
@section('Search')

    
   <h4><i class="fa-solid fa-users mx-2  bg-white shadow-sm  p-2 " style="border-radius: 4px"></i>Users Management</h4>
   
@endsection
@section('content')
    
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <a href="{{route('users.create')}}" class="btn btn-primary mb-2 shadow"><i class="fa-solid fa-plus mr-2"></i>User/Admin</a>

                        <div class="card shadow border-2 border">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table  table-bordered DataTable ">
                                        <thead class="bg-light text-dark">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>ip</th>
                                        <th>user_agent</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>

                                        <th>Actions</th>

                                    </thead>
                                    <tbody>
                                        {{-- <tr class="sha"></tr> --}}
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        
    
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
        // let table = new DataTable('.DataTable');
        var table = $('.DataTable').DataTable( {
            serverSide: true,
            ajax: 'http://localhost/MagicPay/magicPay/public/admin_users/userdataTable/ssd',
            columns:[
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'ip',
                    name: 'ip'
                },
                {
                    data: 'user_agent',
                    name: 'user_agent'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
            order:[
                [6,"desc"]
            ],
              columnDefs: [
                { targets: [3, 4, 5], searchable:false, sortable: false},
              
    ]
} );
$(document).on('click','.delete', function(e)
{
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    Swal.fire({
  title: 'Do you want to delete?',
  showCancelButton: true,
  confirmButtonText: 'Confirm',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    $.ajax({
        url:'http://localhost/MagicPay/magicPay/public/admin_users/destroy' + id,
        
        data:{},
        dataType : 'json',
        success: function()
        {
             table.ajax.reload()
        }
    })
    Toast.fire({
        icon: 'success',
        title: 'Successfully deleted'
        })
       
  }
})
});
})
    </script>
@endsection