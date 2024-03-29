@extends('layouts.app')

@section('content')
<div class="min-h-screen min-w-screen bg-gray-100 flex flex-col items-center justify-center">
    <div class="w-5/6 lg:w-3/6 rounded-3xl bg-gradient-to-b shadow-xl">
        <div class=" text-white py-4 bg-gray-200 ">
            <div class="text-center font-bold  text-2xl text-blue-600 ">
                <h2>
                    <i class="fab fa-gg"></i>
                    Currency Converter
                </h2>
            </div>

            <form action="/convert" method="POST">
                @csrf
                <div class="px-4 py-12 text-white">
                    <div class="flex items-centr justify-between mb-5">
                        <div class="flex flex-col font-bold w-2/6 px-2">
                            <label for="amount" class="ml-2 mb-3 text-black">
                            Amount
                            </label>
                            <input
                            value="{{ session('amount') }}"
                            type="text"
                            name="amount"
                            placeholder="1.00"
                            class="py-3 px-3 rounded-lg focus:outline-none text-gray-600 focus:text-gray-600  border-4">
                        </div>
                        <div class="flex flex-col font-bold w-4/6 px-2">
                            <label for="from" class="mb-3 text-black">
                            From
                            </label>
                            <select
                            name="from"
                            class="py-3 px-3 rounded-lg focus:outline-none text-gray-600
                            focus:text-gray-600  border-4">
                            @foreach ($codes as $code => $value)
                                <option class="py-1" {{ $code == @session('from') || $code =='EUR' ? 'selected' : '' }}>
                                    {{ $code }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col font-bold w-4/6 px-2">
                            <label for="To" class="mb-3 text-black">
                            To
                            </label>
                            <select
                            name="to"
                            class="py-3 px-3 rounded-lg focus:outline-none text-gray-600
                            focus:text-gray-600  border-4 ">
                            @foreach ($codes as $code => $value)
                                <option class="py-1 " {{ $code == session('to') || $code == 'USD' ? 'selected':'' }}>
                                    {{ $code }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="float-right text-right">
                            <button type="submit" class="bg-blue-400 border font-bold mt-8 px-7 py-4
                            rounded-xl  hover:bg-blue-600">
                                Convert
                            </button>
                        </div>

                    </div>
                </div>
            </form>
            @if (session('conversion'))
            <div class="text-center font-bold  text-2xl text-blue-600 mb-5">
                {{ session('conversion') }}
            </div>
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="text-center font-bold  text-2xl text-red-600 mb-5">
                {{ $error }}
            </div>
            @endforeach

            @endif
        </div>
    </div>
</div>
@endsection
