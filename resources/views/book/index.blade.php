@extends('layout.master')

@section('title', 'Books List')

@section('content')
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    h1 {
        color: #333;
        margin-bottom: 30px;
        text-align: center;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        margin-bottom: 20px;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    .table thead th {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        text-align: left;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
    }
    .table tbody td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
        color: #333;
    }
    .table tbody tr:last-child td {
        border-bottom: none;
    }
    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    .btn {
        border: none;
        padding: 8px 12px;
        margin: 0 5px;
        border-radius: 4px;
        transition: all 0.3s;
    }
    .btn-danger {
        background-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
    .btn-info {
        background-color: #17a2b8;
    }
    .btn-info:hover {
        background-color: #138496;
    }
    .btn svg {
        vertical-align: middle;
    }
    h2 {
        color: #333;
        font-size: 18px;
        margin-top: 20px;
    }
    @media (max-width: 768px) {
        .table thead {
            display: none;
        }
        .table, .table tbody, .table tr, .table td {
            display: block;
            width: 100%;
        }
        .table tr {
            margin-bottom: 15px;
        }
        .table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
        }
        .button-container {
            margin-bottom: 20px;
        }

        .table {
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
    }
</style>

<div class="container">
    <h1>Daftar Buku</h1>
    <div class="button-container">
        <a class="btn btn-primary float-end" href="{{ route('books.create') }}">Tambah Buku</a>
    </div>
        <br><br><br>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td data-label="Judul">{{ $book->judul }}</td>
                <td data-label="Penulis">{{ $book->penulis }}</td>
                <td data-label="Harga">{{ "Rp ". number_format($book->harga,0,',','.') }}</td>
                <td data-label="Tanggal Terbit">{{ \Carbon\Carbon::parse($book->tgl_terbit)->format('d-m-Y') }}</td>
                <td data-label="Aksi">
                    <button class="btn btn-danger delete-btn" data-id="{{ $book->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                    </button>
                    <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button class="btn btn-info" onclick="window.location.href='/books/update/{{$book->id}}'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Jumlah buku : {{ $books->count() }}</h2>
    <h2 class="mb-5">Total Harga : {{ "Rp ". number_format($books->sum('harga'),0,',','.') }}</h2>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                
                const bookId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Apakah anda yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + bookId).submit();
                    }
                });
            });
        });
    });
</script>

@endsection