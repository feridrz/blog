@include('template.header')
<style>
    @include('assets.form')
</style>
<script src="https://kit.fontawesome.com/0e408e02c3.js" crossorigin="anonymous"></script>
<section id="container">
    @include('template.navbar')

    <article class="blog-section">
        <div class="blog-wrapper">

            <h2 class="blog-title">Update Post</h2>

            @if (!empty($_SESSION['error_data']))
                <ul class="error-list">
                    @foreach ($_SESSION['error_data'] as $error)
                        <li class="error">
                            {{ $error }}
                        </li>
                    @endforeach
                    @php
                        unset($_SESSION['error_data']);
                    @endphp
                </ul>
            @endif

            <form action="/update-post" method="POST" enctype="multipart/form-data">
                <input name="id" type="hidden" value="{{ $post->getId() }}" />
                <label>Title:</label>
                <input value="{{ $post->getTitle() }}" type="text" id="title" name="title" required></br>

                <label>Description:</label>
                <textarea name="content" class="comment-textarea" rows="5" required>{{ $post->getContent() }}</textarea>

                <label>Profile image:</label>
                <input type="file" id="img" name="image" accept="image/*"></br>

                <input type="submit" value="Submit">
            </form>

        </div>
    </article>


</section>

@include('template.footer')
