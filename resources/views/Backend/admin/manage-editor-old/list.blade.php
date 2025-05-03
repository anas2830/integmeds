@extends('Backend.Layout.app')

@section('main-content')


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Editors</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('manage-editor.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add New</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-0">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm">{{ session('success') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-header pb-0" style="display: flex;justify-content: space-between;">
                        <div class="intro">
                            <p class="text-sm mb-0">All valid editors list, here you can access & modify this list.</p>
                        </div>
                        <div class="search-form">
                            <form action="{{ route('manage-editor.index') }}" method="GET">
                                <div class="dataTable-search is-filled" style="text-align: right">
                                    <div class="input-group input-group-outline search_input_group">
                                        <input class="dataTable-input search_box" placeholder="type here..." name="search" value="{{ request('search') }}" type="text">
                                        <button type="submit">Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive" style="display: block;">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">

                                <table class="table table-flush dataTable-table" id="Editor-list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 40%;">
                                                <a href="{{ route('manage-editor.index', array_merge(request()->query(),
                                                    [
                                                        'sort_by' => 'name',
                                                        'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'name' ? 'desc' : 'asc'
                                                    ])) }}"
                                                >
                                                    Name
                                                    @if(request('sort_by') == 'name' || is_null(request('sort_by')) && $sortBy === 'name')
                                                        @if(request('sort_direction') == 'asc' || is_null(request('sort_direction')))
                                                            ▲ <!-- Ascending arrow by default -->
                                                        @else
                                                            ▼ <!-- Descending arrow -->
                                                        @endif
                                                    @else
                                                        ▼
                                                    @endif
                                                </a>
                                            </th>

                                            <th style="width: 20%;"><a href="#">Email</a></th>
                                            <th style="width: 20%;"><a href="#">Status</a></th>
                                            <th style="width: 10%;"><a href="#">Action</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_editors as $editor)
                                            <tr>
                                                <td>
                                                    abcd
                                                    <div class="d-flex">
                                                        @dump(public_path($editor->file_name));
                                                        @if(isset($editor->file_name) && file_exists(public_path($editor->file_name)))
                                                            <img class="w-10 ms-3" src="{{ asset($editor->file_name) }}" alt="editor">
                                                        @else
                                                            No image
                                                        @endif
                                                        <h6 class="ms-3 my-auto">{{ $editor->name }}</h6>
                                                    </div>
                                                </td>
                                                <td class="text-sm">{{ $editor->email }}</td>
                                                <td>
                                                    @if($editor->status == 1)
                                                        <span class="badge badge-success badge-sm">Active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-sm">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-sm">
                                                    <a href="{{ route('manage-editor.edit', $editor->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Editor">
                                                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                                    </a>
                                                    <a href="#" class="mx-3 delete-editor" data-id="{{ $editor->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete Editor">
                                                        <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <strong>No data found</strong>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex mt-4">
                                {{ $all_editors->links() }}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('custom-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const deleteEditorUrl = '{{ route('manage-editor.destroy', ':id') }}';
        $('.delete-editor').on('click', function(e){
            e.preventDefault();

            var editorId = $(this).data('id');
            const url = deleteEditorUrl.replace(':id', editorId);

            console.log('url', url);

            Swal.fire({
                title: "are you sure",
                text: "if you delete not get back",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "yes",
                cancelButtonText: "no",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_method: 'delete', _token : '{{ csrf_token() }}'},
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success"
                            }).then(() => {
                                location.reload(); // or redirect to the index page
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the Editor.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
