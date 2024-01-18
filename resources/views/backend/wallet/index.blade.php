@extends('backend.layouts.app')
@section('title')
Wallet 
@endsection
@section('Search')

    
   <h4><i class="fa-solid fa-users mx-2  bg-white shadow-sm  p-2 " style="border-radius: 4px"></i>Wallet List</h4>
   
@endsection
@section('content')
    
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1 ">

                        <div class="card shadow border-2 border">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table  table-bordered DataTable ">
                                        <thead class="bg-light text-dark">
                                        <th>Account_number</th>
                                        <th>Account Person</th>
                                        <th>Amount</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        

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
            ajax: 'http://localhost/MagicPay/magicPay/public/admin_users/wallet/dataTable/ssd',
            columns:[
                {
                    data: 'account_number',
                    name: 'account_number'
                },
               
               {
                data: 'account_person',
                name: 'account_person'
               },
               {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
               
            ],
            order:[
                [4,"desc"]
            ],
            //   columnDefs: [
            //     { targets: [3, 4, 5], searchable:false, sortable: false},
              
    // ]
} );

})
    </script>
@endsection