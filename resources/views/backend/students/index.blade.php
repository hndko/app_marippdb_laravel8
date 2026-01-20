@extends('layouts.app')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Siswa</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">PPDB</a></li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Calon Siswa</h5>
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                    <i class="ri-add-line align-bottom me-1"></i> Tambah Siswa
                </a>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="alternative-pagination"
                        class="table table-nowrap dt-responsive align-middle table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No. Pendaftaran</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">L/P</th>
                                <th scope="col">Sekolah Asal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><a href="#" class="fw-semibold">{{ $student->registration_number }}</a></td>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->school_origin }}</td>
                                <td>
                                    @if($student->status == 'pending')
                                    <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                    @elseif($student->status == 'verified')
                                    <span class="badge bg-info-subtle text-info text-uppercase">Verified</span>
                                    @elseif($student->status == 'accepted')
                                    <span class="badge bg-success-subtle text-success text-uppercase">Diterima</span>
                                    @elseif($student->status == 'rejected')
                                    <span class="badge bg-danger-subtle text-danger text-uppercase">Ditolak</span>
                                    @else
                                    <span class="badge bg-light-subtle text-muted text-uppercase">{{ $student->status
                                        }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ route('students.show', $student->id) }}" class="link-info fs-15"><i
                                                class="ri-eye-line"></i></a>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="link-warning fs-15"><i class="ri-edit-2-line"></i></a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="link-danger fs-15 btn btn-link p-0"><i
                                                    class="ri-delete-bin-line"></i></button>
                                        </form>
                                    </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        new DataTable("#alternative-pagination", {
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