<x-layout>

<div class="container mx-auto px-4 mt-36">
            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-3xl font-bold text-center text-green-600 mb-8">Get in Touch</h2>

                <!-- Contact Form -->
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-lg font-semibold text-gray-700">Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full border border-gray-300 rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full border border-gray-300 rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="message" class="block text-lg font-semibold text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full border border-gray-300 rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 text-white font-semibold py-3 rounded-lg hover:bg-green-700 transition duration-300">Send
                        Message</button>
                </form>

                <!-- Contact Info -->
                <div class="mt-10">
                    <h3 class="text-2xl font-semibold text-gray-800">Our Contact Info</h3>
                    <p class="text-lg text-gray-600 mt-2">If you have any questions, feel free to contact us:</p>
                    <ul class="mt-4 text-lg text-gray-600 space-y-2">
                        <li><strong>Email:</strong> info@futsalbooking.com</li>
                        <li><strong>Phone:</strong> +62 812-3456-7890</li>
                        <li><strong>Address:</strong> Jl. Sport Center No. 45, Jakarta</li>
                    </ul>
                </div>
            </div>
        </div>
          
</x-layout>