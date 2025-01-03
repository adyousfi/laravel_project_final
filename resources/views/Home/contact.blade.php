<section class="contact_section" style="background-color: #f0f8ff; padding: 40px 0;">
    <div class="container px-0">
        <div class="heading_container text-center mb-5">
            <h2 style="font-size: 36px; font-weight: bold; color: #333;">Contact Us</h2>
            <p style="font-size: 18px; color: #555;">Feel free to reach out with any questions or feedback.</p>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="col-lg-6 col-md-8">
        <!-- Succesbericht -->
        @if (session('success'))
            <div style="
                font-size: 20px;
                color: #155724;
                background-color: #d4edda;
                border: 1px solid #c3e6cb;
                padding: 15px;
                border-radius: 10px;
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            ">
                {{ session('success') }}
            </div>
        @endif

        <!-- Fouten weergeven -->
        @if ($errors->any())
            <div class="alert alert-danger" style="font-size: 18px; padding: 15px; border-radius: 10px;">
                <ul style="margin: 0; padding: 0; list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Contact Form -->
        <form action="{{ route('contact.submit') }}" method="POST" style="background: #ffffff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
            @csrf
            <h4 class="mb-4 text-center" style="color: #333; font-size: 28px; font-weight: bold;">Send us a Message</h4>
            <div class="mb-4">
                <label for="name" class="form-label" style="font-size: 18px; color: #555;">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required style="border-radius: 10px; padding: 15px; font-size: 16px; border: 1px solid #ddd;">
            </div>
            <br>    
            <div class="mb-4">
                <label for="email" class="form-label" style="font-size: 18px; color: #555;">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required style="border-radius: 10px; padding: 15px; font-size: 16px; border: 1px solid #ddd;">
            </div>
            <br>
            <div class="mb-4">
                <label for="phone" class="form-label" style="font-size: 18px; color: #555;">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}" style="border-radius: 10px; padding: 15px; font-size: 16px; border: 1px solid #ddd;">
            </div>
            <br>
            <div class="mb-4">
                <label for="message" class="form-label" style="font-size: 18px; color: #555;">Your Message</label>
                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required style="border-radius: 10px; padding: 15px; font-size: 16px; border: 1px solid #ddd;"></textarea>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary send-message-btn" style="
                    padding: 15px 30px; 
                    font-size: 18px; 
                    border-radius: 10px; 
                    background-color: #007bff; 
                    border: none;
                    transition: all 0.3s ease;
                ">
                    SEND MESSAGE
                </button>
            </div>
        </form>
    </div>
</section>
<br><br><br>

<style>
    /* Hover-effect voor de knop */
    .send-message-btn:hover {
        cursor: pointer; /* Verander de cursor in een pointer */
        transform: scale(1.1); /* Vergroot de knop met 10% */
        background-color: #0056b3; /* Donkerder blauw bij hover */
    }
</style>
