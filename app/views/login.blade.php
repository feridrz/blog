@include("template/header")
<style>
  @include('assets.form')
</style>

<section id="container">

  @include("template/navbar")

  <article class="blog-section">
    <div class="blog-wrapper">
      <div class="blog">
        <h2 class="blog-title">Login page</h2>

        @isset($_SESSION['error_data'])
          <p class="error">
            {{ $_SESSION['error_data'] }}
          </p>
        @else
          @php
            unset($_SESSION['error_data']);
          @endphp
        @endisset

        <form action="/login" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required><br>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required><br>

          <input type="submit" value="Login">
        </form>
      </div>
    </div>
  </article>
</section>


@include("template/footer")