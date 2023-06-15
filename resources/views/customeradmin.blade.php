<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tanggal Booking</th>
                                <th scope="col">Note</th>
                                <th scope="col">Tanggal Mengisi Form</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->nama_customer }}</td>
                                <td>{{ $customer->email_customer }}</td>
                                <td>{{ $customer->tanggal_booking }}</td>
                                <td>{{ $customer->note_customer }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>
                                    <form action="{{ route('customer.destroy', $customer->id_customer) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
