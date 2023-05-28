@include('template.header')
<style>
    @include('assets.form')
</style>

<section id="container">

  @include('template.navbar')

  <article class="blog-section">
    <div class="blog-wrapper">
      <div class="blog">
        <h2 class="blog-title">Register page</h2>

        @if (!empty($_SESSION['error_data']))
            <ul class="error-list">
                @foreach ($_SESSION['error_data'] as $error)
                    <li class="error">
                        {{ $error }}
                    </li>
                @endforeach
                @php
                unset($_SESSION['error_data'])
                @endphp
            </ul>
        @endif

        <form action="/register" method="POST" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required></br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required></br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required></br>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="password_re" required></br>

            <label for="confirm-password">Profile image:</label>
            <input type="file" id="img" name="profile_image" accept="image/*" required></br>

            <input type="submit" value="Register">
        </form>
      </div>
    </div>
  </article>
</section>

@include('template.footer')
