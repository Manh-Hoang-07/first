@extends('admin.index')

@section('page_title', 'Thêm quyền')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Thêm quyền</li>
@endsection

@section('content')
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.permissions.store') }}" method="POST">
                            @csrf

                            <!-- Ý nghĩa quyền -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Ý nghĩa quyền</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tên quyền -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên quyền</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Quyền cha -->
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Quyền cha</label>
                                <select class="form-control select2 @error('parent_id') is-invalid @enderror"
                                    name="parent_id" data-selected="{{ old('parent_id') }}"
                                    data-url="{{ route('admin.permissions.autocomplete') }}">
                                    <option value="">Chọn quyền cha</option>
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nút -->
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
