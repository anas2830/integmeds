@extends('Backend.Layout.app')

@section('site-title', 'Manage Editors')

@section('main-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="card-title">Buttons example</h4>
                        </div>
                        <div class="page-title-right">
                            <a href="{{ route('manage-editor.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                    </div>

                    <div class="mt-2 page-title-box d-flex align-items-center justify-content-between">
                        <div>
                            <p class="card-title-desc">The Buttons extension for DataTables</p>
                        </div>
                        <div class="page-title-right">
                            <div class="search-form">
                                <form action="{{ route('manage-editor.index') }}" method="GET" class="app-search d-none d-lg-block">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Go</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="no-sort">Profile Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($all_editors as $editor)
                                <tr>
                                    <td>
                                        @if($editor->file_name && file_exists($editor->file_name))
                                            <img class="w-10 ms-3" src="{{ asset($editor->file_name) }}" alt="editor" style="width:50px; height:50px;">
                                        @else 
                                            No image
                                        @endif
                                    </td>
                                    <td>{{ $editor->name }}</td>
                                    <td>{{ $editor->email }}</td>
                                    <td>
                                        @if($editor->status == 1)
                                            <span class="badge badge-success badge-sm">Active</span>
                                        @else
                                            <span class="badge badge-danger badge-sm">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('manage-editor.edit', $editor->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete-editor" data-id="{{ $editor->id }}">
                                            <i class="bx bx-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <strong>No data found</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex mt-4">
                        {{ $all_editors->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
        
@endsection

@push('custom-scripts')
    <script>
        const deleteEditorUrl = '{{ route('manage-editor.destroy', ':id') }}';
        $('.delete-editor').on('click', function(e){
            e.preventDefault();
            var editorId = $(this).data('id');
            const url = deleteEditorUrl.replace(':id', editorId);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                console.log('t', t);
                if(t.value){
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_method: 'delete', _token : '{{ csrf_token() }}'},
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                type: "success",
                            }).then(function(t) {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the Editor.",
                            });
                        }
                    });
                }
            })
        });
    </script>
@endpush
