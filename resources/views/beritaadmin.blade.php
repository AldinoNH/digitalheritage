<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="table-responsive">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#addberita">Tambah Berita</button>
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
                    @foreach ($berita as $item)
                        <tr>
                            <td>{{ $item->id_berita }}</td>
                            <td>{{ $item->judul_berita }}</td>
                            <td>{{ $item->deskripsi_berita }}</td>
                            <td><img src="{{ asset('/gambar_berita/' . $item->gambar_berita) }}" alt="Gambar Berita"></td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_berita }}">Edit</button>
                                    <button class="btn-delete btn btn-outline-danger" data-id_berita="{{ $item->id_berita }}">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $item->id_berita }}" tabindex="-1" role="dialog" aria-labelledby="editberita" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editberita">Edit Berita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('berita.update', $item->id_berita) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="judul_berita">Judul Berita</label>
                                                <input type="text" name="judul_berita" value="{{ $item->judul_berita }}" required class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi_berita">Deskripsi Berita</label>
                                                <textarea name="deskripsi_berita" required class="form-control">{{ $item->deskripsi_berita }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="gambar_berita">Gambar Berita</label>
                                                <input type="file" name="gambar_berita" class="form-control-file">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="addberita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul_berita" class="form-label">Judul Berita</label>
                                        <input type="text" name="judul_berita" id="judul_berita" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi_berita" class="form-label">Deskripsi Berita</label>
                                        <textarea name="deskripsi_berita" id="deskripsi_berita" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar_berita" class="form-label">Gambar Berita</label>
                                        <input type="file" name="gambar_berita" id="gambar_berita" class="form-control-file">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            </div>
        </div>
    </div>
</x-app-layout>
