@extends('layout.layout')


@section('managepalletbutton', 'active') {{-- ini bagian folder nya --}}
@section('showmanagepallet', 'show') {{-- ini bagian folder nya yang buka tutup --}}
@section('managepallet', 'active') {{-- ini bagian button side panel yang di highlight nya --}}


@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                ini page buat manage pallet
                mungkin isinya harus bbrp data

                nama Barang
                jumlah stok
                BIN (ni kyk lokasi palet)
                keterangan

                harusnya 4 itu aja sih
            </div>
        </div>
    </div>
@endsection
