<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelly Beans Catalog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-8">Jelly Beans Catalog</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Total Beans: {{ count($beans['items']) }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($beans['items'] as $bean)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <img
                            src="{{ $bean['imageUrl'] }}"
                            alt="{{ $bean['flavorName'] }}"
                            class="w-full max-h object-cover rounded-t-md mb-4">
                        <h2 class="text-lg font-bold text-gray-800">{{ $bean['flavorName'] }}</h2>
                        <p class="text-sm text-gray-600 mb-2">{{ $bean['description'] }}</p>
                        <p class="text-sm font-medium">Color Group: <span class="text-gray-800">{{ $bean['colorGroup'] }}</span></p>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-700">Ingredients:</p>
                            <ul class="list-disc list-inside text-sm text-gray-600">
                                @foreach ($bean['ingredients'] as $ingredient)
                                    <li>{{ $ingredient }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm font-medium">Kosher: <span class="{{ $bean['kosher'] ? 'text-green-600' : 'text-red-600' }}">{{ $bean['kosher'] ? 'Yes' : 'No' }}</span></p>
                            <p class="text-sm font-medium">Gluten-Free: <span class="{{ $bean['glutenFree'] ? 'text-green-600' : 'text-red-600' }}">{{ $bean['glutenFree'] ? 'Yes' : 'No' }}</span></p>
                            <p class="text-sm font-medium">Sugar-Free: <span class="{{ $bean['sugarFree'] ? 'text-green-600' : 'text-red-600' }}">{{ $bean['sugarFree'] ? 'Yes' : 'No' }}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <p>Data mentah yang ditransfer:</p>
    @dd($beans)

</body>
</html>
