@extends('frontend.layouts.app')
@section('title')
    Scan QR
@endsection
@section('css')
    .btn{
        color: #4a8854;

    }
@endsection
@section('content')
    <div class="col-lg-4 offset-lg-4 m-4" >
        <div class="card mt-4 py-5">
            <div class="text-center">
                <img src="{{asset('admin/images/qrScan.png')}}" width='200' alt="">

            </div>

            <div class="text-center mt-3">
                <!-- Button trigger modal -->
                <p>Click button, put QR code in the frame and pay</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Scan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <video src="" id="scanner" width="400" height="400"></video>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/js/qr-scanner.umd.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            const videoElem = document.getElementById('scanner');
            const qrScanner = new QrScanner(
                videoElem,
                function(result)
                {
                    if(result){
                        qrScanner.stop();
                        $('#exampleModal').modal('hide');
                        const to_phone  = result;
                        window.location.replace(`qrScanPay?to_phone=${to_phone}`) 
                    }
                    console.log(result);
                }
            );
            const myModalEl = document.getElementById('exampleModal')
            myModalEl.addEventListener('shown.bs.modal', event => {qrScanner.start()})
            myModalEl.addEventListener('hide.bs.modal', event => {qrScanner.stop()})

        })
    </script>
@endsection
