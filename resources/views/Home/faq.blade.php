<section class="faq_section">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">Frequently Asked Questions</h2>
        @foreach ($faqCategories as $category)
            <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                <h3 class="fw-bold text-dark">{{ $category->name }}</h3>
                @if ($category->faqs->count() > 0)
                    <ul class="list-unstyled mt-3">
                        @foreach ($category->faqs as $faq)
                            <li class="mb-4">
                                <div class="faq-question">
                                    <span class="badge bg-primary text-white">Q</span>
                                    <span class="fw-bold text-dark">{{ $faq->question }}</span>
                                </div>
                                <div class="faq-answer mt-2">
                                    <span class="badge bg-success text-white">A</span>
                                    <span class="text-muted">{{ $faq->answer }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mt-3">No questions available in this category.</p>
                @endif
            </div>
        @endforeach
    </div>
</section>
