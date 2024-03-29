<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS LINK -->
    <link rel="stylesheet" href="../css/admin_style.css" />
    <link rel="stylesheet" href="../../css/common.css" />
    <!-- FontAwesome CDN -->
    <script
      src="https://kit.fontawesome.com/91eb112b1c.js"
      crossorigin="anonymous"
    ></script>
    <title>HSI | 관리자로그인</title>
  </head>
  <body>
    <!-- main -->
    <main id="login__main">
      <div class="login__bg"></div>
      <div class="login__box">
        <header class="login__header">
          <h1><i class="fa-solid fa-unlock-keyhole"></i> HSI Admin Sign In</h1>
        </header>
        <!-- Input -->
		<form action="../db/admin_check" method="post">
			<section class="login__input__box">
			  <div class="login__contents">
				<label for="admin__id">ID : </label>
				<input
				  type="text"
				  name="id"
				  placeholder="ID"
				  id="admin__id"
				  required
				/>
			  </div>
			  <div class="login__contents">
				<label for="admin__pass">Pass : </label>
				<input
				  type="password"
				  name="pass"
				  placeholder="Password"
				  id="admin__pass"
				  required
				/>
			  </div>
			  <input type="submit" value="Sign In" />
			</section>
		</form>
      </div>
    </main>
  </body>
</html>
