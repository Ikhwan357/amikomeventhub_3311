@extends('layouts.admin')

@section('page-title', 'Laporan Transaksi')
@section('page-subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

        {{-- Search & Filter --}}
        <div class="px-8 py-6 bg-slate-50/50 border-b">

            <form method="GET" action="{{ route('admin.transactions.index') }}" class="flex flex-wrap gap-4 items-center">

                <div class="flex-1 min-w-[300px]">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari Order ID, Nama, Email, No HP, atau Event..."
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition uppercase text-sm font-medium tracking-wide">

                </div>

                <button type="submit"
                    class="px-6 py-3 bg-slate-900 text-white rounded-xl text-sm font-bold hover:bg-slate-800 transition">
                    Cari
                </button>

                @if (request('search'))

                    <a href="{{ route('admin.transactions.index') }}"
                        class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl text-sm font-bold hover:bg-slate-200 transition">
                        Reset
                    </a>

                @endif

            </form>

        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left border-collapse">

                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">

                    <tr>

                        <th class="px-8 py-4">
                            Order ID
                        </th>

                        <th class="px-8 py-4">
                            Detail Pembeli
                        </th>

                        <th class="px-8 py-4">
                            Event
                        </th>

                        <th class="px-8 py-4">
                            Tgl Transaksi
                        </th>

                        <th class="px-8 py-4">
                            Status
                        </th>

                        <th class="px-8 py-4 text-right">
                            Total Tagihan
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y border-t">

                    @forelse ($transactions as $transaction)

                        <tr class="hover:bg-slate-50/50 transition">

                            {{-- Order ID --}}
                            <td class="px-8 py-6">

                                <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg text-sm">

                                    #{{ $transaction->order_id }}

                                </span>

                            </td>

                            {{-- Customer Detail --}}
                            <td class="px-8 py-6">

                                <p class="font-bold text-slate-800">
                                    {{ $transaction->customer_name }}
                                </p>

                                <p class="text-xs text-slate-500">
                                    {{ $transaction->customer_email }}
                                </p>

                                <p class="text-xs text-slate-400">
                                    {{ $transaction->customer_phone }}
                                </p>

                            </td>

                            {{-- Event --}}
                            <td class="px-8 py-6">

                                <p class="font-medium text-slate-700">
                                    {{ $transaction->event->title ?? '-' }}
                                </p>

                            </td>

                            {{-- Date --}}
                            <td class="px-8 py-6 text-sm text-slate-500">

                                {{ $transaction->created_at->format('d M Y, H:i') }}

                            </td>

                            {{-- Status --}}
                            <td class="px-8 py-6">

                                @if ($transaction->status == 'paid')

                                    <span
                                        class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">

                                        Paid

                                    </span>

                                @elseif ($transaction->status == 'pending')

                                    <span
                                        class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-lg text-xs font-bold uppercase ring-1 ring-yellow-200">

                                        Pending

                                    </span>

                                @else

                                    <span
                                        class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase ring-1 ring-slate-200">

                                        {{ $transaction->status }}

                                    </span>

                                @endif

                            </td>

                            {{-- Total --}}
                            <td class="px-8 py-6 text-right font-black text-slate-900">

                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-8 py-12 text-center text-slate-400 font-medium">

                                Belum ada transaksi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="px-8 py-6 bg-slate-50/50 border-t">

            {{ $transactions->links() }}

        </div>

    </div>

@endsection