<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Festival') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#addFestival">Tambah Festival</button>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Tanggal Upload</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($festival as $item)
                            <tr>
                                <td>{{ $item->id_festival }}</td>
                                <td>{{ $item->judul_festival }}</td>
                                <td>{{ $item->deskripsi_festival }}</td>
                                <td><img src="{{ asset('/gambar_festival/' . $item->gambar_festival) }}" alt="Gambar Festival"></td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group me-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_festival }}">Edit</button>
                                        <button class="btn-delete-festival btn btn-outline-danger" data-id_festival="{{ $item->id_festival }}">Delete</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $item->id_festival }}" tabindex="-1" role="dialog" aria-labelledby="editFestival" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editFestival">Edit Festival</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('festival.update', $item->id_festival) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="judul_festival" class="form-label">Judul Festival</label>
                                                    <input type="text" name="judul_festival" value="{{ $item->judul_festival }}" required class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi_festival" class="form-label">Deskripsi Festival</label>
                                                    <textarea name="deskripsi_festival" required class="form-control">{{ $item->deskripsi_festival }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar_festival" class="form-label">Gambar Festival</label>
                                                    <input type="file" name="gambar_festival" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="addFestival" tabindex="-1" aria-labelledby="addFestivalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addFestivalLabel">Tambah Festival</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('festival.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="judul_festival" class="form-label">Judul Festival</label>
                                            <input type="text" name="judul_festival" id="judul_festival" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi_festival" class="form-label">Deskripsi Festival</label>
                                            <textarea name="deskripsi_festival" id="deskripsi_festival" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar_festival" class="form-label">Gambar Festival</label>
                                            <input type="file" name="gambar_festival" id="gambar_festival" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
