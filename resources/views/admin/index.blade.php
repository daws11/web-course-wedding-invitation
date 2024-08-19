<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script>
        function copyLink(link) {
            navigator.clipboard.writeText(link).then(() => {
                alert('Link copied to clipboard!');
            });
        }
    </script>
</head>
<html>
<body>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

        <!-- Guest Management Section -->
        <div class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Guests</h2>

            <!-- Add Guest Form -->
            <form action="{{ route('admin.guests.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="flex gap-4">
                    <input type="text" name="name" placeholder="Guest Name" class="border p-3 rounded w-full" required>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Guest</button>
                </div>
            </form>

            <!-- Guests Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Slug</th>
                            <th class="py-3 px-6 text-left">URL</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guests as $guest)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $guest->name }}</td>
                            <td class="py-3 px-6">{{ $guest->slug }}</td>
                            <td class="py-3 px-6">
                                <a href="{{ url($guest->slug) }}" target="_blank" class="text-blue-500 underline">{{ url($guest->slug) }}</a>
                            </td>
                            <td class="py-3 px-6">
                                <button onclick="copyLink('{{ url($guest->slug) }}')" class="text-green-500"><i class="fas fa-copy"></i> Copy Link</button>
                                <form action="{{ route('admin.guests.delete', $guest->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-4"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Guests Pagination -->
            <div class="mt-4">
                {{ $guests->links() }}
            </div>
        </div>

        <!-- Response Form Section -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">Form Responses</h2>

            <!-- Responses Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">WhatsApp</th>
                            <th class="py-3 px-6 text-left">Angkatan</th>
                            <th class="py-3 px-6 text-left">Jurusan</th>
                            <th class="py-3 px-6 text-left">Kota Domisili</th>
                            <th class="py-3 px-6 text-left">Comment</th>
                            <th class="py-3 px-6 text-left">Bukti Transfer</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responses as $response)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $response->name }}</td>
                            <td class="py-3 px-6">{{ $response->whatsapp }}</td>
                            <td class="py-3 px-6">{{ $response->angkatan }}</td>
                            <td class="py-3 px-6">{{ $response->jurusan }}</td>
                            <td class="py-3 px-6">{{ $response->kota_domisili }}</td>
                            <td class="py-3 px-6">{{ $response->comment }}</td>
                            <td class="py-3 px-6">
                                @if($response->bukti_transfer)
                                <a href="{{ asset('storage/' . $response->bukti_transfer) }}" target="_blank" class="text-blue-500 underline">View</a>
                                @else
                                N/A
                                @endif
                            </td>
                            <td class="py-3 px-6">
                                <form action="{{ route('admin.comments.delete', $response->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Responses Pagination -->
            <div class="mt-4">
                {{ $responses->links() }}
            </div>
        </div>

        <div class="mb-10">
    <h2 class="text-2xl font-semibold mb-4">Ormawa Guests</h2>

<!-- Add Ormawa Guest Form -->
<form action="{{ route('admin.ormawa.guests.store') }}" method="POST" class="mb-6">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <input type="text" name="name" placeholder="Ormawa Guest Name" class="border p-3 rounded w-full" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full sm:w-auto">Add Ormawa Guest</button>
    </div>
</form>

<form action="{{ route('admin.ormawa.guests.bulkUpload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex gap-4">
        <input type="file" name="csv_file" accept=".csv" class="border p-3 rounded w-full" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload CSV</button>
    </div>
</form>


<!-- Ormawa Guests Table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Slug</th>
                <th class="py-2 px-4 text-left">URL</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ormawaGuests as $guest)
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4">{{ $guest->name }}</td>
                <td class="py-2 px-4">{{ $guest->slug }}</td>
                <td class="py-2 px-4">
                    <a href="{{ url('ormawa/'.$guest->slug) }}" target="_blank" class="text-blue-500 underline break-words">
                        {{ url('ormawa/'.$guest->slug) }}
                    </a>
                </td>
                <td class="py-2 px-4 flex items-center space-x-2">
                    <button onclick="copyLink('{{ url('ormawa/'.$guest->slug) }}')" class="text-green-500">
                        <i class="fas fa-copy"></i> Copy Link
                    </button>
                    <form action="{{ route('admin.ormawa.guests.delete', $guest->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>




<div class="mt-4">
    {{ $ormawaGuests->links() }}
</div>

</body>
</html>
