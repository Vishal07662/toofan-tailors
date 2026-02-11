<div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="col-sm-6 offset-sm-3">
            <div class="login-form">
                <div class="login-form-title text-2xl font-bold mb-6 text-center">
                    Login
                </div>
                <div class="login-form-body">
                    @include('layout.errors')
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold" for="email">
                            Email:
                        </label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" id="email" />
                    </div>                    
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold" for="password">
                            Password:
                        </label>
                        <input type="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" id="password" />
                    </div>
                </div>
                <div class="login-form-actions">
                    <button type="submit" value="1" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded font-semibold transition" name="submitLogin">login</button>
                     <div class="mt-4 text-center text-gray-600">
                            Don&apos;t have an account?
                        <a href="{{ route('register')}}" class="text-blue-500 hover:underline">
                            Register
                        </a>
                    </div>
                    {{-- <button type="submit" value="1" class="btn btn-default" name="submitForgotPassword">Forgot Password?</button> --}}
                </div>
            </div>
        </div>
    </form>
</div>
