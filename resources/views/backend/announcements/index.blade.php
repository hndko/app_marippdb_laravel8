@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Kelola Pengumuman</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengumuman</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Daftar Pengumuman</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('announcements.create') }}" class="btn btn-success btn-sm">
                        <i class="ri-add-line align-middle me-1"></i> Tambah Pengumuman
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table id="announcementTable"
                        class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($announcements as $announcement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($announcement->image)
                                    <img src="{{ asset('storage/' . $announcement->image) }}" alt=""
                                        class="avatar-sm rounded">
                                    @else
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-primary rounded">
                                            <i class="ri-image-line fs-18"></i>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $announcement->title }}</td>
                                <td>
                                    @if($announcement->is_active)
                                    <span class="badge bg-success-subtle text-success">Aktif</span>
                                    @else
                                    <span class="badge bg-danger-subtle text-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>{{ $announcement->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('announcements.edit', $announcement->id) }}"
                                            class="btn btn-warning btn-sm" title="Edit">
                                            <i class="ri-pencil-fill align-bottom"></i>
                                        </a>
                                        <form action="{{ route('announcements.destroy', $announcement->id) }}"
                                            method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm remove-item-btn"
                                                title="Hapus">
                                                <i class="ri-delete-bin-fill align-bottom"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <!-- Empty state handled by DataTables usually, but keeping for structure -->
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#announcementTable').DataTable({
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
@endsection