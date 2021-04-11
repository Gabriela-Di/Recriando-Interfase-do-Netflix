<section class="user__login">
    <div class="login">
    <form method="post" action="{app_url}usuarios/login">
        <h1 class="login__title">Acesse sua Conta</h1>
        <div class="login__group">
            <input class="login__group__input" name="email" type="email" required>
            <label class="login__group__label">Email ou número de telefone</label>
        </div>
        <div class="login__group">
            <input class="login__group__input" name="senha" type="password" required>
            <label class="login__group__label">Senha</label>
        </div>
        <button class="login__sign-in" type="submit" style="width:350px">Entrar</button>
        <div class="login__secondary-cta">
            <a href="" class="login__secondary-cta__text login__secondary-cta__text--need-help"> Precisa de ajuda?</a>
        </div>
        <div>
            <span class="login__secondary-cta__text">Novo por aqui?</span><a href="{app_url}/usuarios/newUser" class="user_anchor"> Se inscreva agora</a>
        </div>
    </form>
    </div>
</section>