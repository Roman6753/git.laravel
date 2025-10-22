<x-layout>
    <x-slot:title>Register</x-slot:title>
    <section class="flex justify-center">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-6">Register</h2>

            <form method="POST" action="/register" class="space-y-6">
                @csrf
                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700 mb-1">Login</label>
                    <input type="text" id="login" name="login" placeholder="Login" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('login') }}">
                    @error('login')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="fio" class="block text-sm font-medium text-gray-700 mb-1">Fio</label>
                    <input type="text" id="fio" name="fio" placeholder="Fio" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('fio') }}">
                    @error('fio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tel" class="block text-sm font-medium text-gray-700 mb-1">Tel</label>
                    <input type="tel" id="tel" name="tel" placeholder="+7-(XXX)-XXX-XX-XX" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('tel') }}">
                    @error('tel')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmation password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmation password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Register
                </button>
            </form>
        </div>
    </section>
</x-layout>
