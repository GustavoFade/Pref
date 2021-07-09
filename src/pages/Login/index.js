import React from 'react';

import SLogin from './style_login';
import '../../style/global.css';

function Login() {
  return (
    <>{/* Tem que colocar para receber os dados, form no react ????? */}
    <SLogin>
      <label>Nome:</label>
      <input type="text" />
      
      <label>Senha:</label>
      <input type="password" />  

      <a href="#">Entrar</a>
      <a href={"/newuser"}>Registrar</a>
    </SLogin>
    </>
  )
}

export default Login;


