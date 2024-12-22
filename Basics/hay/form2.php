<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 p-4">
    <div class="container flex flex-col items-center justify-center h-screen mx-auto">
        <h1 class="text-2xl font-bold mb-4">Submit Your Details</h1>
        <form action="submit_form.php" method="post" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="w-[200px] border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="age" class="block text-gray-700">Age:</label>
                <input type="number" id="age" name="age" class="w-[200px] border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-[200px] border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="weight" class="block text-gray-700">Weight (kg):</label>
                <input type="number" id="weight" name="weight" step="0.1" class="w-[200px] border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="height" class="block text-gray-700">Height (cm):</label>
                <input type="number" id="height" name="height" step="0.1" class="w-[200px] border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Languages:</label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="PHP" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">PHP</span>
                </label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="JavaScript" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">JavaScript</span>
                </label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="Python" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">Python</span>
                </label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="React JS" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">Java</span>
                </label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="Vue JS" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">Vue JS</span>
                </label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="HTML" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">HTML</span>
                </label>
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="languages[]" value="CSS" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">CSS</span>
                </label>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</body>
</html>