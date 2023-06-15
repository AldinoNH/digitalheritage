<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Paket Wisata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#addpaketwisata">Tambah Paket Wisata</button>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Paket Wisata</th>
                                <th scope="col">Harga Paket Wisata</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paketwisata as $item)
                                <tr>
                                    <td>{{ $item->id_paketwisata }}</td>
                                    <td>{{ $item->nama_paketwisata }}</td>
                                    <td>{{ $item->harga_paketwisata }}</td>
                                    <td>
                                        <div class="btn-group me-2">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_paketwisata }}">Edit</button>
                                            <button class="btn-delete-paketwisata btn btn-outline-danger" data-id_paketwisata="{{ $item->id_paketwisata }}">Delete</button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $item->id_paketwisata }}" tabindex="-1" role="dialog" aria-labelledby="editpaketwisata" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editpaketwisata">Edit Paket Wisata</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('paketwisata.update', $item->id_paketwisata) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="nama_paketwisata">Nama Paket Wisata</label>
                                                        <input type="text" name="nama_paketwisata" value="{{ $item->nama_paketwisata }}" required class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga_paketwisata">Harga Paket Wisata</label>
                                                        <input type="text" name="harga_paketwisata" value="{{ $item->harga_paketwisata }}" required class="form-control">
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
                    <div class="modal fade" id="addpaketwisata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Paket Wisata</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('paketwisata.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nama_paketwisata" class="form-label">Nama Paket Wisata</label>
                                            <input type="text" name="nama_paketwisata" id="nama_paketwisata" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_paketwisata" class="form-label">Harga Paket Wisata</label>
                                            <input type="text" name="harga_paketwisata" id="harga_paketwisata" class="form-control">
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
