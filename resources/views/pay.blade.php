<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container inner-page">
        <div class="card-panel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="color: white">Laravel Authorized.net Payment</h1>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-success">@if (session('success_msg'))
                            {{session('success_msg')}}
                        @endif</div>
                        <div class="alert alert-danger">@if (session('error_msg'))
                            {{session('error_msg')}}
                        @endif</div>
                    </div>
                    <div class="col-md-6" style="background: lightgreen; border-radius: 5px; padding: 10px;">
                        <div class="panel panel-primary">
                            <div>
                                <form action="{{route('dopay.online')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="owner">Owner</label>
                                            <input type="text" id="owner" name="owner" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cvv">CVV</label>
                                            <input type="number" id="cvv" name="cvv" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="card_number">Card Number</label>
                                            <input type="text" id="card_number" name="card_number" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="amount">Amount</label>
                                            <input type="number" id="amount" name="amount" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @php
                                            $months = ['1' => 'Jan','2' => 'Feb','3' => 'March','4' => 'April','5' => 'May','6' => 'Jun','7' => 'July','8' => 'August','9' => 'Sept','10' => 'Oct','11' => 'Nov','12' => 'Dec',]
                                        @endphp
                                        <div class="form-group col-md-6">
                                            <label for="exp_month">Exp Date</label>
                                            <select id="exp_month" name="exp_month">
                                            @foreach ($months as $k => $v)
                                                <option value="{{$k}}">{{$v}}</option>    
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exp_year">Exp Year</label>
                                            <select id="exp_year" name="exp_year">
                                            @for ($i = date('Y'); $i <= (date('Y') + 15); $i++)
                                                <option value="{{$i}}">{{$i}}</option>    
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit" style="color: black">Make Payment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
