<x-app-layout>
    <x-slot name="head">
        <!-- DataTables CSS for Tailwind -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="block rounded-lg text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
                <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-white/10 text-right py-6">
                    <a href="{{ route('admin.users.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 mb-6 rounded">New User</a>
                </div>
                <div class="p-6">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com/3.4.4"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>

        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            const deleteId = (id) => {
                const url = `{{ route('admin.users.destroy', ':id') }}`.replace(':id', id);

                // Confirmation dialog with SweetAlert2
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: "DELETE",
                            dataType: "json",
                            success: (response) => {
                                console.log(response)
                                Swal.fire(
                                    response.status ? 'Deleted!' : 'Error!',
                                    response.message,
                                    response.status ? 'success' : 'error'
                                );
                                if (response.status) {
                                    $('#row_' + id).closest('tr').remove();
                                }
                            },
                            error: (xhr) => {
                                Swal.fire(
                                    "Error!",
                                    xhr.responseJSON ? xhr.responseJSON.message :
                                    "An error occurred.",
                                    "error"
                                );
                            }
                        });
                    }
                });
            };
        </script>
    </x-slot>
</x-app-layout>
