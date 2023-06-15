<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Objek Wisata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#addObjekWisata">Tambah Objek Wisata</button>
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
                            @foreach ($objekwisata as $item)
                            <tr>
                                <td>{{ $item->id_objekwisata }}</td>
                                <td>{{ $item->judul_objekwisata }}</td>
                                <td>{{ $item->deskripsi_objekwisata }}</td>
                                <td><img src="{{ asset('/gambar_objekwisata/' . $item->gambar_objekwisata) }}" alt="Gambar Objek Wisata"></td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group me-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_objekwisata }}">Edit</button>
                                        <button class="btn-delete-objekwisata btn btn-outline-danger" data-id_objekwisata="{{ $item->id_objekwisata }}">Delete</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $item->id_objekwisata }}" tabindex="-1" role="dialog" aria-labelledby="editObjekWisata" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editObjekWisata">Edit Objek Wisata</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('objekwisata.update', $item->id_objekwisata) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="judul_objekwisata">Judul Objek Wisata</label>
                                                    <input type="text" name="judul_objekwisata" value="{{ $item->judul_objekwisata }}" required class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi_objekwisata">Deskripsi Objek Wisata</label>
                                                    <textarea name="deskripsi_objekwisata" required class="form-control">{{ $item->deskripsi_objekwisata }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar_objekwisata">Gambar Objek Wisata</label>
                                                    <input type="file" name="gambar_objekwisata" class="form-control-file">
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
                    <div class="modal fade" id="addObjekWisata" tabindex="-1" aria-labelledby="addObjekWisataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addObjekWisataLabel">Tambah Objek Wisata</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('objekwisata.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="judul_objekwisata" class="form-label">Judul Objek Wisata</label>
                                            <input type="text" name="judul_objekwisata" id="judul_objekwisata" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi_objekwisata" class="form-label">Deskripsi Objek Wisata</label>
                                            <textarea name="deskripsi_objekwisata" id="deskripsi_objekwisata" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar_objekwisata" class="form-label">Gambar Objek Wisata</label>
                                            <input type="file" name="gambar_objekwisata" id="gambar_objekwisata" class="form-control-file">
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
