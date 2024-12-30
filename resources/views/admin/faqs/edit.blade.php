@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Question</h1>
    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ $faq->answer }}</textarea>
        </div>
        <div class="mb-3">
            <label for="faq_category_id" class="form-label">Category</label>
            <select class="form-control" id="faq_category_id" name="faq_category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $faq->faq_category_id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
