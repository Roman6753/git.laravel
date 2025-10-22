<x-layout>
    <x-slot:title>Login</x-slot:title>
    <section class="flex justify-center">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-6">Login</h2>

            <form method="POST" action="/login" class="space-y-6">
                @csrf
                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700 mb-1">Login</label>
                    <input type="login" id="login" name="login" placeholder="Login" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('login') }}">
                    @error('login')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Lorin
                </button>
            </form>
        </div>
    </section>
</x-layout>
