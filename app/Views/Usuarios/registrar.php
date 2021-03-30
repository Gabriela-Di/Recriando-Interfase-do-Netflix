<section class="basic_login">
    <div class="signupBasicHeader noBorderHeader nfHeader">
        <a class="logo basicLogo" href="">Logo</a>
        <a class="authLinks signupBasicHeader authBasic" href="{app_url/usuarios/login}">Entrar</a>
    </div>
    <div class="container d-flex justify-content-center">    
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 ">
            <div class="panel panel-info">
                <div class="panel-heading">
                </div>  
                <div class="panel-body" style="margin-top:20px" >
                    <form method="post" onsubmit="return validateForm()" action="{app_url}usuarios/registrar">
                        <form  class="form-horizontal" id="registerUser" method="post" >
                            <div id="div_id_email" class="form-group required">
                                <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="Seu email" required style="margin-bottom: 10px" type="email" />
                                </div>     
                            </div>
                            <div id="div_id_password1" class="form-group required">
                                <label for="id_password1" class="control-label col-md-4  requiredField">Senha<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 "> 
                                    <input class="input-md textinput textInput form-control" id="id_password1" name="senha" required placeholder="Digite uma senha" style="margin-bottom: 10px" type="password" />
                                </div>
                            </div>
                            <div id="div_id_password2" class="form-group required">
                                <label for="id_password2" class="control-label col-md-4  requiredField">Repita a Senha<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_password2" name="senha2" required placeholder="Repita sua senha" style="margin-bottom: 10px" type="password" />
                                </div>
                            </div>
                            <div id="div_id_name" class="form-group required"> 
                                <label for="id_name" class="control-label col-md-4  requiredField"> Nome Completo<span class="asteriskField">*</span> </label> 
                                <div class="controls col-md-8 "> 
                                    <input class="input-md textinput textInput form-control" id="id_name" name="nome" required placeholder="Seu nome completo" style="margin-bottom: 10px" type="text" />
                                </div>
                            </div>
                            <div id="div_id_number" class="form-group required">
                                <label for="id_number" class="control-label col-md-4  requiredField">Número de telefone<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_number" name="telefone" required placeholder="Telefone" style="margin-bottom: 10px" type="text" />
                                </div> 
                            </div> 
                            <div class="form-group">
                                <div class="controls col-md-offset-4 col-md-8 ">
                                    <div id="div_id_terms" class="checkbox required">
                                        <label for="id_terms" class=" requiredField">
                                            <input class="input-ms checkboxinput" id="id_terms" name="terms" style="margin-bottom: 10px" type="checkbox" required />
                                            Agree with the terms and conditions
                                        </label>
                                    </div> 
                                </div>
                            </div> 
                            <div class="form-group"> 
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8 text-center ">
                                    <input type="submit" value="Cadastrar" class="btn btn-info"/>
                                </div>
                            </div> 
                                
                        </form>

                    </form>
                </div>
            </div>
        </div> 
    </div>
</section>

<script src="{app_url}js/usuarios/registrar.js"></script>