@extends('frontend.layouts.app')
@section('css')
    .main-card{
    background: #ffdf55;
    }
    .side-card:hover{
    transform:scale(1.03);
    }
@endsection
@section('content')
    <div class="container  mt-5" x-data="{
        open: false,
        types: 'submit',
        isInputDisabled: false,
        formData: {
            to: '',
            amount: '',
            description: '',
        },
        walletData: [],
        toName: '',
        toPhone: '',
        passwordShow: false,
    
    
    }" x-init='load()'>
        <div class="row">
            <div class="col-4 d-lg-flex d-none align-items-center justify-content-center">
                <img src="{{ asset('admin/images/money-transfer-monochromatic-2f0a1.png') }}" alt="" class="w-75">
            </div>
            <div class="col-lg-4 " style="">
              @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if(session()->has('wrong'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{session()->get('wrong')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
              
                <div class="card main-card p-3 mt-4">
                    <div class="text-center">
                        <h3 x-show="!open">Fill all fields</h1>
                            <h3 x-show="open">Check information</h1>
                    </div>
                    <div class="container-lg-fluid ">
                        <div class="row">

                            <form action="{{route('clientTransfer')}}" class="form" method="POST">
                                @csrf
                                <div class="form-floating mb-3  main-card">
                                    <input required  style="background-color:#f5eadf " type="text"
                                        class="form-control " id="floatingInput" placeholder="09xxx-xxx-xx" disabled
                                        value="{{ Auth::user()->name }}-({{ Auth::user()->phone }})" autocomplete="off">
                                    <label for="floatingInput" class="side-car ">From</label>
                                </div>
                                <div class="form-floating mb-3  main-card">
                                    <input required hidden name='from' style="background-color:#f5eadf " type="text"
                                        class="form-control " id="floatingInput" placeholder="09xxx-xxx-xx" disabled
                                        value="{{ Auth::user()->name }}-({{ Auth::user()->phone }})" autocomplete="off">
                                    <label for="floatingInput" class="side-car ">From</label>
                                </div>
                                <div class="form-floating mb-3  main-card">
                                    <input x-model="formData.to" required  style="background-color:#f5eadf "
                                        x-bind:disabled="isInputDisabled" type="text" class="form-control "
                                        id="floatingInput" placeholder="09xxx-xxx-xx" autocomplete="off">
                                    <label for="floatingInput" class="side-car" >to</label>
                                </div>
                                <div class="form-floating mb-3  main-card">
                                    <input x-model="toPhone" required name='to' hidden  style="background-color:#f5eadf "
                                         type="text" class="form-control "
                                        id="floatingInput" placeholder="09xxx-xxx-xx" autocomplete="off">
                                    <label for="floatingInput" class="side-car" >to</label>
                                </div>

                                <div class="form-floating mb-3  main-card">
                                    <input x-model="formData.amount" required name='amount'
                                        style="background-color:#f5eadf " type="number" min="1000"
                                        class="form-control " id="floatingInput" placeholder="xxx,xxx,xxxMMK">
                                    <label for="floatingInput" class="side-car">Amount(MMK)</label>
                                </div>
                                <div class="form-floating main-card mb-3">
                                    <textarea x-model="formData.description" required name="description" class="form-control side-card"
                                        placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>

                                <button :type="types" x-show="!open" id='proceed-btn' class="btn w-100"
                                    @click='handleClickInput'>Proceed</button>

                                <div x-show="open" class="text-center">
                                    <button type="button" id='back-btn' class="btn " @click='handleClick'>Back</button>
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#inputModal">
                                        Open Modal with Input
                                    </button>
                                    <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="inputModalLabel">Enter Password</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <input autocomplete="new-password" type="password"
                                                            class="form-control" id="userInput" name='password'>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn "
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn " @click="processInput"
                                                        id='confirm-btn' data-bs-dismiss="modal">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-4 d-lg-flex d-none align-items-center justify-content-center">
                <img src="{{ asset('admin/images/money-transfer-monochromatic-2f0a1.png') }}" alt=""
                    class="w-75">
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        function handleClickInput() {

            // console.log(this.formData.amount > 1000);
            if (this.formData.to && this.formData.amount && this.formData.amount > 1000 && this.formData.description) {
                const filteredArray = walletData.filter(obj => obj.phone === this.formData.to);
                if (filteredArray.length !== 0) {
                    this.open = !this.open;
                    this.isInputDisabled = !this.isInputDisabled;
                    if (this.types === 'submit') {
                        this.types = 'button'
                    } else {
                        this.types = "submit"
                    }
                    this.toName = filteredArray[0].name;
                    this.toPhone = filteredArray[0].phone;

                    if (this.open) {
                        this.formData.to = this.toName + "-(" + this.formData.to + ")";
                        console.log(this.formData.to);
                    }
                    else{
                        this.formData.to = this.toPhone

                    }

                } else {
                    alert('invalid phone number');
                    this.types = 'button'

                }
            }

        }

        function handleClick() {
            this.open = !this.open;
            this.isInputDisabled = !this.isInputDisabled;
            if (this.types === 'submit') {
                this.types = 'button'
            } else {
                this.types = "submit"
            }
            this.formData.to = this.toPhone
        }

        function load() {
            var h = @json($data);
            var temp = [];
            for (i = 0; i < h.length; i++) {
                temp.push({
                    id: h[i]['id'],
                    name: h[i]['name'],
                    phone: h[i]['phone'],
                })

            }
            // console.log(this.walletData)
            // var h = []
            // h.push({ name: 'New Data', value: 42 });
            this.walletData = temp;
            console.log(this.walletData)

        }

        function confirmClick() {
            var password = prompt("Hello");
            console.log(password);
        }

        function processInput() {

            // Get the value from the input field
            const userInput = document.getElementById('userInput').value;

            // Do something with the input (you can replace this with your own logic)

            // Close the modal
            const modal = new bootstrap.Modal(document.getElementById('inputModal'));
            modal.hide();
           
        }
                
    </script>
@endsection
