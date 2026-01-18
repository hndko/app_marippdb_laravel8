@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Calon Siswa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('students.index') }}" method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari Nama / NISN / No. Daftar" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="verified" {{ request('status')=='verified' ? 'selected' : '' }}>Verified
                            </option>
                            <option value="accepted" {{ request('status')=='accepted' ? 'selected' : '' }}>Diterima
                            </option>
                            <option value="rejected" {{ request('status')=='rejected' ? 'selected' : '' }}>Ditolak
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary w-100">
                            <i class="fas fa-search"></i> Filter
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>No. Pendaftaran</th>
                            <th>Nama Lengkap</th>
                            <th>L/P</th>
                            <th>Sekolah Asal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $key => $student)
                        <tr>
                            <td>{{ $students->firstItem() + $key }}</td>
                            <td>{{ $student->registration_number }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->school_origin }}</td>
                            <td>
                                @if($student->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($student->status == 'verified')
                                <span class="badge bg-info text-dark">Verified</span>
                                @elseif($student->status == 'accepted')
                                <span class="badge bg-success">Diterima</span>
                                @elseif($student->status == 'rejected')
                                <span class="badge bg-danger">Ditolak</span>
                                @else
                                <span class="badge bg-secondary">{{ $student->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}"
                                    class="btn btn-sm btn-info text-white"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data siswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection