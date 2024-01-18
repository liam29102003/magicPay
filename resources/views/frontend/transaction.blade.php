@extends('frontend.layouts.app')
@section('content')
    <div class="container" x-data="{ filter: '', date: '' }">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="mt-3">
                    <div class="d-flex">
                        <select x-model="filter" class="form-select me-1" x-on:change="filterType" aria-label="Default select example">
                            <option selected>All</option>
                            <option value="1">Expense</option>
                            <option value="2">Income</option>
                        </select>
                        <input type="date" name="" id="" class="form-control" value="" x-model='date'
                            x-on:change="filterDate">
                    </div>
                    
                    <div class="scrolling-pagination">
                    </div>


                    @foreach ($data as $d)
                        <a href="{{ route('clientTransactionDetail', $d->id) }}" class="{{ $d->type }} all"
                            time='{{ $d->created_at->format('Y-m-d') }}'>
                            <div class="card mt-3 p-2 main-card ">
                                <div class="d-lg-flex justify-content-between align-items-center">
                                    <div class="card px-3 side-card w-lg-50">
                                        <p class=" mb-0 fs-5">Transaction no : <span
                                                class="text-secondary">{{ $d->ref_no }}</span> </p>
                                        <p class=" mb-0">
                                            @if ($d->type === 1)
                                                From<span class="text-secondary">{{ $d->source->name }}</span>
                                            @else
                                                To<span class="text-secondary">{{ $d->user->name }}</span>
                                            @endif
                                        </p>
                                        <p class=" mb-0">{{ $d->created_at }}</p>
                                    </div>
                                    <div class="text-lg-center pe-lg-3 mb-lg-0 mt-2 mt-lg-0 ms-1">
                                        @if ($d->type === 1)
                                            <p class="text-success mb-0">+ {{ $d->amount }} MMK </p>
                                        @else
                                            <p class="text-danger mb-0">- {{ $d->amount }} MMK </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });

        function filterType() {


            const a = document.getElementsByClassName('all');
            console.log(a[0]);
            for (i = 0; i < a.length; i++) {
                if (a[i].className === this.filter + " all") {
                    a[i].style.display = 'none';
                } else {
                    if (a[i].getAttribute('time') === this.date || this.date=='') {
                        a[i].style.display = 'block';
                    } else {
                        a[i].style.display = 'none';
                    }
                }
            }

        }

        function filterDate() {
            const a = document.getElementsByClassName('all');
            for (i = 0; i < a.length; i++) {
                console.log(a[i].getAttribute('time'));
                if (a[i].getAttribute('time') === this.date) {
                    if (a[i].className === this.filter + " all") {
                        a[i].style.display = 'none';
                    } else {
                        a[i].style.display = 'block';
                    }
                } else {
                    a[i].style.display = 'none';
                }

            }

        }
    </script>
@endsection
