@include('template.header')

<script src="https://kit.fontawesome.com/0e408e02c3.js" crossorigin="anonymous"></script>
<section id="container">
    @include('template.navbar')

    <article class="blog-section">
        <div class="blog-wrapper">
            @foreach ($posts as $post)
                <div class="blog">
                    <h2 class="blog-title">
                        {{ $post->getTitle() }}
                    </h2>
                    <h3 class="blog-title">
                        {{ $post->getContent() }}
                    </h3>

                    @php
                        echo $post->getCreatedAt();
                    @endphp
                    <div class="blog-body">
                        <a href="/">
                            <img src="/uploads/posts/{{ $post->getImage() }}" alt="JavaScript logo" class="blog-image"
                                id="blog-image">
                        </a>

                        <div class="form-buttons">
                            @if ($post->getAuthor() == $_SESSION['id'])
                                <a href="/edit-post/{{ $post->getId() }}"><button class="remove"><i
                                            class="fa fa-refresh" aria-hidden="true"></i></button></a>
                                <form action="delete-post/{{ $post->getId() }}" method="POST">
                                    <button class="remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            @endif
                        </div>


                    </div>
                    <span">Comments: @php echo $post->getCommentCount(); @endphp</span>
                        <div class="blog-comments">
                            <div class="comment-list">

                                @foreach ($post->getComments() as $key => $comment)
                                    <div class="single-comment">

                                        <div class="comment-data">
                                            @php echo $key+1;  @endphp
                                            <div class="profile-right">
                                                <div class="profile-wrapper">
                                                    <div style="display:flex; gap:15px; align-items: center">
                                                        <h4 class="name">
                                                            {{ $comment->getAuthorData()['name'] }}
                                                        </h4>
                                                        <time class="comment-date" datetime="2022-03-03T13:52:00">
                                                            {{ $comment->getCreatedDate() }}
                                                        </time>
                                                    </div>
                                                    <p id="comment-text">
                                                        {{ $comment->getText() }}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                        @if ($comment->getUserId() == $_SESSION['id'])
                                            <form action="delete-comment/{{ $comment->getId() }}" method="POST">
                                                <button class="remove">Remove</button>
                                            </form>
                                        @endif

                                    </div>
                                @endforeach

                            </div>
                            <div class="new-comment">
                                <form action="/create-comment/{{ $post->getId() }}" method="POST"
                                    class="send-comment-form">
                                    <textarea name="text" placeholder="Write your comment" class="comment-textarea" id="comment-textarea" name="message"
                                        rows="5" required></textarea>
                                    <div class="submit-comment-wrapper">
                                        <button type="submit" id="submit-comment">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </article>
</section>

@include('template.footer')
