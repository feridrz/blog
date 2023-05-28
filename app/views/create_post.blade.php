@include('template.header')
<style>
    @include('assets.form')
</style>
<section id="container">
    @include('template.navbar')

    <article class="blog-section">
        <div class="blog-wrapper">

            <h2 class="blog-title">Create Post</h2>

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

            <form action="/create-post" method="POST" enctype="multipart/form-data">
                <label>Title:</label>
                <input type="text" id="title" name="title" required></br>

                <label>Description:</label>
                <textarea name="text" placeholder="" class="comment-textarea" rows="5" required></textarea>

                <label>Profile image:</label>
                <input type="file" id="img" name="image" accept="image/*" required></br>

                <input type="submit" value="Submit">
            </form>

        </div>
    </article>
</section>

@include('template.footer')
