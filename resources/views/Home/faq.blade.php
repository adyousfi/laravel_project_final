<section class="faq_section">
    <div class="container mt-5">
      <h2 class="text-center mb-4">Frequently Asked Questions</h2>
      <div class="accordion" id="faqAccordion">
        @foreach ($faqCategories as $category)
          <div class="card">
            <div class="card-header" id="heading{{ $category->id }}">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
                  {{ $category->name }}
                </button>
              </h5>
            </div>

            <div id="collapse{{ $category->id }}" class="collapse" aria-labelledby="heading{{ $category->id }}" data-bs-parent="#faqAccordion">
              <div class="card-body">
                <ul>
                  @foreach ($category->faqs as $faq)
                    <li>
                      <strong>Q:</strong> {{ $faq->question }}
                      <br>
                      <strong>A:</strong> {{ $faq->answer }}
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>