<?php include 'includes/header.php'; ?>

<main class="max-w-3xl mx-auto px-4 py-12">

    <div class="mb-10 text-center">
        <p class="text-sm font-semibold uppercase tracking-wider text-accent mb-2">
            Contact
        </p>

        <h1 class="text-4xl font-bold mb-4">
            Get in Touch
        </h1>

        <p class="text-muted max-w-xl mx-auto">
            Have a question about this demo project or would you like to know more about its implementation? Feel free to send a message.
        </p>
    </div>

    <div class="bg-surface rounded-2xl border border-white/5 p-8 shadow-xl">

        <form id="contact-form" class="space-y-6">

            <!-- Name + Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="c-name" class="block text-sm text-muted mb-2">
                        Name
                    </label>

                    <input
                        id="c-name"
                        type="text"
                        placeholder="John Doe"
                        required
                        class="w-full bg-bg border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-accent transition"
                    >
                </div>

                <div>
                    <label for="c-email" class="block text-sm text-muted mb-2">
                        Email
                    </label>

                    <input
                        id="c-email"
                        type="email"
                        placeholder="john@example.com"
                        required
                        class="w-full bg-bg border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-accent transition"
                    >
                </div>

            </div>

            <!-- Subject -->

            <div>

                <label for="c-subject" class="block text-sm text-muted mb-2">
                    Subject
                </label>

                <input
                    id="c-subject"
                    type="text"
                    placeholder="Product inquiry"
                    required
                    class="w-full bg-bg border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-accent transition"
                >

            </div>

            <!-- Message -->

            <div>

                <label for="c-message" class="block text-sm text-muted mb-2">
                    Message
                </label>

                <textarea
                    id="c-message"
                    rows="6"
                    placeholder="Write your message..."
                    required
                    class="w-full bg-bg border border-white/10 rounded-lg px-4 py-3 resize-none focus:outline-none focus:border-accent transition"
                ></textarea>

            </div>

            <!-- Button -->

            <div class="flex justify-end">

                <button
                    type="submit"
                    class="bg-accent hover:bg-accent/80 text-white font-semibold px-8 py-3 rounded-lg transition inline-flex items-center gap-2"
                >
                    <i data-lucide="send" class="w-4 h-4"></i>
                    Send Message
                </button>

            </div>

        </form>

        <div id="contact-success" class="hidden text-center py-10">

            <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="check-circle" class="w-8 h-8 text-green-400"></i>
            </div>

            <h2 class="text-xl font-semibold mb-2">
                Message Sent
            </h2>

            <p class="text-muted">
                Thank you! Your message has been successfully sent.
            </p>

        </div>

    </div>

</main>

<?php include 'includes/footer.php'; ?>