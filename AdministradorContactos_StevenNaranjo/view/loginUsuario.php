
<?php
include_once 'public/header.php';
session_start(); 

?>

<div class="row" class="mt-auto pt-4"  style="width:80%; height:400px;">
    <div class="col-md-6 mx-auto p-0" style="width:100%">
        <div class="card" style="width:100%">
            <div class="login-box" style="width:100%">
                <div class="login-snip" style="width:100%"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrar</label>
                    <div class="login-space" style="width:100%">
                        <div class="login" style="width:100%">
                            <div class="group"> <label for="user" class="label">Usuario</label> <input id="user" type="text" class="input" placeholder="Ingrese su ID"> </div>
                            <div class="group"> <label for="pass" class="label">Contrasena</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Ingrese su contraseña"> </div>
                            <!--<div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>-->
                            <!--<div class="group"> <input type="submit" class="button" value="Sign In"> </div>-->
                            <div class="group"><input type="button" href="javascript:;" onclick="login($('#user').val(), $('#pass').val());return false;"  class="button" id="registrar" name="registrar" value="Ingresar"/> </div> 
                            <div class="hr"></div>
                            <div class="form-group"><CENTER><span id="resultadoLogin"></span> </CENTER></div>
                            <!--<div class="foot"> <a href="#">Forgot Password?</a> </div>-->
                        </div>
                        <div class="sign-up-form" style="width:100%">
                            <div class="group"> <label for="user" class="label">Nombre de usuario</label> <input id="userRegistro" type="text" class="input" placeholder="Asigne el ID"> </div>
                            <div class="group"> <label for="pass" class="label">Contraseña</label> <input id="passRegistro" type="password" class="input" data-type="password" placeholder="Asigne una conrtaseña"> </div>
                            <!--<div class="group"> <input type="submit" class="button" value="Registrar"> </div>-->
                            <div class="group"><input type="button" href="javascript:;" onclick="registrar($('#userRegistro').val(), $('#passRegistro').val());return false;"  class="button" id="registrar" name="registrar" value="Registrar"/> </div> 
                            <div class="hr"></div>
                            <div class="form-group"><CENTER><span id="resultadoRegistro"></span> </CENTER></div>

<!--                            <div class="foot"> <label for="tab-1">Already Member?</label> </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


