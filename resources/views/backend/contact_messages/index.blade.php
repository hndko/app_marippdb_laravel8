@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Pesan Masuk</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pesan Masuk</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Daftar Pesan Masuk</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table id="contactMessagesTable"
                        class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($message->is_read)
                                    <span class="badge bg-light text-dark">Dibaca</span>
                                    @else
                                    <span class="badge bg-success">Baru</span>
                                    @endif
                                </td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('contact-messages.show', $message->id) }}"
                                        class="btn btn-sm btn-info"><i class="ri-eye-line"></i></a>
                                    <form action="{{ route('contact-messages.destroy', $message->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="ri-delete-bin-line"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#contactMessagesTable').DataTable({
            pagingType: "full_numbers",
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang cocok",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "Lanjut",
                    previous: "Mundur"
                }
            }
        });
    });
</script>
@endsection